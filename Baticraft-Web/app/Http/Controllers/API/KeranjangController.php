<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KeranjangController extends Controller
{
    public function cart()
    {
        $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)->with('product')->get();

        $totalItems = 0;
        $totalPrice = 0;

        foreach ($carts as $item) {
            $totalItems += $item->jumlah;
            $totalPrice += $item->jumlah * $item->product->harga;
        }

        return response()->json([
            'carts' => $carts,
            'totalItems' => $totalItems,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $productId = $request->input('product_id');
        $jumlah = $request->input('jumlah');
        $userId = auth()->id();

        $existingCartItems = Cart::where('product_id', $productId)->where('user_id', $userId)->get();

        if ($existingCartItems->isEmpty()) {
            try {
                Cart::create([
                    'product_id' => $productId,
                    'user_id' => $userId,
                    'jumlah' => $jumlah,
                ]);

                return response()->json(['message' => 'Produk berhasil ditambahkan ke keranjang.'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Gagal menambahkan produk ke keranjang.'], 500);
            }
        } else {
            try {
                foreach ($existingCartItems as $cartItem) {
                    $cartItem->jumlah += $jumlah;
                    $cartItem->save();
                }

                return response()->json(['message' => 'Jumlah produk di keranjang berhasil diperbarui.'], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Gagal memperbarui jumlah produk di keranjang.'], 500);
            }
        }
    }

    public function destroy($id)
    {
        try {
            $data = Cart::findOrFail($id);
            $data->delete();

            return response()->json(['message' => 'Data berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data.'], 500);
        }
    }

    public function checkout(Request $request)
    {
        DB::beginTransaction();

        try {
            $userId = Auth::id();
            $cartItems = Cart::where('user_id', $userId)->get();

            if ($cartItems->isEmpty()) {
                return response()->json(['message' => 'Keranjang kosong'], 400);
            }

            foreach ($cartItems as $item) {
                if ($item->jumlah > $item->product->stok) {
                    Log::debug('Jumlah produk melebihi stok: ' . $item->product->nama);
                    return response()->json(['message' => 'Jumlah produk "' . $item->product->nama . '" melebihi stok yang tersedia'], 400);
                }
            }

            $kode_transaksi = strtoupper(Carbon::now()->format('Ymd') . Str::random(4));

            $transaction = Transaction::create([
                'kode_transaksi' => $kode_transaksi,
                'user_id' => $userId,
                'jenis_transaksi' => 'pesan',
                'total_item' => $cartItems->count(),
                'total_harga' => $cartItems->sum(function ($item) {
                    return $item->product->harga * $item->jumlah;
                }),
                'catatan_customer' => $request->input('catatan_customer'),
                'status_transaksi' => 'menunggu',
            ]);

            foreach ($cartItems as $item) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $item->product_id,
                    'nama_product' => $item->product->nama,
                    'jumlah' => $item->jumlah,
                    'harga_total' => $item->product->harga * $item->jumlah,
                ]);
            }

            Cart::where('user_id', $userId)->delete();

            DB::commit();

            return response()->json(['message' => 'Pemesanan berhasil diproses.'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Terjadi kesalahan saat memproses transaksi.'], 500);
        }
    }
}
