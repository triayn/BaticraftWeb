<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ImageProduct;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KeranjangController extends Controller
{
    public function cart()
    {
        // Ambil ID user yang sedang login
        $images = ImageProduct::all();
        $userId = Auth::id();

        // Ambil data keranjang sesuai dengan ID user
        $carts = Cart::where('user_id', $userId)->with('product')->get();

        // Hitung total item dan total harga
        $totalItems = 0;
        $totalPrice = 0;

        foreach ($carts as $item) {
            $totalItems += $item->jumlah; // Tambahkan jumlah item ke totalItems
            $totalPrice += $item->jumlah * $item->product->harga; // Hitung total harga
        }

        // Kirim data keranjang, total item, dan total harga ke view
        return view('customer.keranjang.index', compact('images', 'carts', 'totalItems', 'totalPrice'));
    }

    public function addToCart(Request $request)
    {
        // Validate request
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Dapatkan data yang diperlukan dari request
        $productId = $request->input('product_id');
        $jumlah = $request->input('jumlah');
        $userId = auth()->id(); // Dapatkan ID pengguna yang sedang login

        // Cek apakah produk sudah ada di keranjang untuk pengguna tertentu
        $existingCartItems = Cart::where('product_id', $productId)->where('user_id', $userId)->get();

        if ($existingCartItems->isEmpty()) {
            // Jika produk belum ada di keranjang, tambahkan sebagai produk baru
            try {
                Cart::create([
                    'product_id' => $productId,
                    'user_id' => $userId,
                    'jumlah' => $jumlah,
                ]);

                // Redirect kembali ke halaman sebelumnya atau halaman tertentu
                return back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
            } catch (\Exception $e) {
                // Handle any exceptions that might occur during cart creation
                return back()->with('error', 'Gagal menambahkan produk ke keranjang. Silakan coba lagi.');
            }
        } else {
            // Jika produk sudah ada di keranjang, perbarui jumlahnya
            try {
                foreach ($existingCartItems as $cartItem) {
                    $cartItem->jumlah += $jumlah;
                    $cartItem->save();
                }

                // Redirect kembali ke halaman sebelumnya atau halaman tertentu
                return back()->with('success', 'Jumlah produk di keranjang berhasil diperbarui.');
            } catch (\Exception $e) {
                // Handle any exceptions that might occur during cart quantity update
                return back()->with('error', 'Gagal memperbarui jumlah produk di keranjang. Silakan coba lagi.');
            }
        }
    }

    public function checkout(Request $request)
    {
        DB::beginTransaction();

        try {
            // Ambil keranjang belanja user yang sedang login
            $userId = Auth::id();
            $cartItems = Cart::where('user_id', $userId)->get();

            if ($cartItems->isEmpty()) {
                return response()->json(['message' => 'Keranjang Masih Kosong'], 400);
            }

            // Cek stok produk 
            foreach ($cartItems as $item) {
                if ($item->jumlah > $item->product->stok) {
                    // Pesan debugging
                    Log::debug('Jumlah produk melebihi stok: ' . $item->product->nama);
                    return back()->with('error', 'Jumlah produk "' . $item->product->nama . '" melebihi stok yang tersedia');
                }
            }

            // Membuat kode transaksi otomatis
            $kode_transaksi = strtoupper(Carbon::now()->format('Ymd') . Str::random(4));

            // Buat transaksi baru
            $transaction = Transaction::create([
                'kode_transaksi' => $kode_transaksi,
                'user_id' => $userId,
                'jenis_transaksi' => 'pesan',
                'total_item' => $request->input('total_item'),
                'total_harga' => $request->input('total_harga'),
                'catatan_customer' => $request->input('catatan_customer'),
                'status_transaksi' => 'menunggu',
            ]);

            // Buat detail transaksi dari item keranjang
            foreach ($cartItems as $item) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $item->product_id,
                    'nama_product' => $item->product->nama,
                    'jumlah' => $item->jumlah,
                    'harga_total' => $item->product->harga * $item->jumlah,
                ]);
            }

            // Kosongkan keranjang user setelah transaksi berhasil dibuat
            Cart::where('user_id', $userId)->delete();

            DB::commit();

            return redirect()->route('pesanan.index')->with('success', 'Pemesanan berhasil diproses, Cek status pesanan disini');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memproses pesanan');
        }
    }

    public function destroy(string $id): RedirectResponse
    {
        $data = Cart::findOrFail($id);

        $data->delete();

        return redirect()->route('keranjang.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $quantity = $request->input('jumlah');

        // Validate that quantity is a positive integer and not more than product stock
        if ($quantity > 0 && $quantity <= $cart->product->stok) {
            $cart->jumlah = $quantity;
            $cart->save();
        }

        return redirect()->route('keranjang.index')->with('success', 'Jumlah produk telah diperbarui.');
    }
}
