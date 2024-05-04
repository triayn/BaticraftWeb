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
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public  function card()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Pastikan user sedang login sebelum menambahkan ke keranjang
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil data keranjang berdasarkan user yang sedang login
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Ambil data produk yang ada di keranjang
        $productsInCart = $cartItems->map(function ($item) {
            $product = $item->product;

            // Assuming the product ID is stored in 'product_id' column
            $image = ImageProduct::where('product_id', $product->id)->first();

            if ($image) {
                $product->image_path = $image->image_path;
            }

            return $product;
        });

        return view('customer.keranjang.index', compact('cartItems', 'productsInCart', 'images'));
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

    public function updateQuantity($id, Request $request)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $item = Cart::find($id);
        if (!$item) {
            return back()->with('error', 'Produk tidak ditemukan di keranjang.');
        }

        // Cek apakah jumlah produk yang diminta melebihi stok yang tersedia
        if ($request->jumlah > $item->product->stok) {
            return back()->with('error', 'Jumlah produk melebihi stok yang tersedia.');
        }

        $item->jumlah = $request->input('jumlah');
        $item->save();

        return back()->with('success', 'Jumlah produk berhasil diperbarui.');
    }

    public function showTotal()
    {
        $cartItems = Cart::all();
        $totalItems = 0;
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalItems += $item->jumlah; // Tambahkan jumlah item ke totalItems
            $totalPrice += $item->jumlah * $item->product->harga; // Hitung total harga
        }

        return view('customer.keranjang.index', ['cartItems' => $cartItems, 'totalItems' => $totalItems, 'totalPrice' => $totalPrice]);
    }

    public function checkout(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode_transaksi' => 'required',
            'user_id' => 'required',
            'kasir' => 'nullable',
            'jenis_transaksi' => 'required',
            'total_item' => 'required|numeric|min:1',
            'total_harga' => 'required|numeric|min:5',
            'metode_pembayaran' => 'nullable',
            'catatan_customer' => 'nullable|string|max:255',
            'catatan_admin' => 'nullable|string|max:255',
            'status_transaksi' => 'required',
            'tanggal_konfirmasi' => 'nullable',
            'tanggal_expired' => 'nullable',
            'items' => 'required|array',
            'items.*.produk_id' => 'required|numeric|min:1',
            'items.*.nama_produk' => 'required|string|max:255',
            'items.*.jumlah' => 'required|numeric|min:1',
            'items.*.harga_total' => 'required|numeric|min:1',
        ]);

        $cartItems = Cart::all(); // Misalnya, ambil semua item dari tabel Cart

        $totalItems = 0;
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalItems += $item->jumlah;
            $totalPrice += $item->jumlah * $item->product->harga;
        }

        try {
            DB::beginTransaction();

            // Membuat kode transaksi otomatis
            $kode_transaksi = Carbon::now()->format('Ymd') . Str::random(4);
            $catatan_customer = $request->input('catatan_customer');

            // Simpan data transaksi
            $transaction = new Transaction();
            $transaction->kode_transaksi = $kode_transaksi;
            $transaction->user_id = auth()->user()->id; 
            $transaction->jenis_transaksi = 'pesan'; 
            $transaction->total_item = $totalItems;
            $transaction->total_harga = $totalPrice;
            $transaction->catatan_customer = $catatan_customer;
            $transaction->status_transaksi = 'menunggu'; 
            $transaction->save();

            // Simpan detail transaksi
            foreach ($cartItems as $cartItem) {
                $transactionDetail = new TransactionDetail();
                $transactionDetail->transaction_id = $transaction->id;
                $transactionDetail->product_id = $cartItem->product_id;
                $transactionDetail->nama_product = $cartItem->product->nama;
                $transactionDetail->jumlah = $cartItem->jumlah;
                $transactionDetail->harga_total = $cartItem->jumlah * $cartItem->product->harga;
                $transactionDetail->save();
            }

            // Kosongkan keranjang (opsional)
            Cart::truncate();

            DB::commit();

            return redirect()->route('pesanan.index')->with('success', 'Transaksi berhasil diproses');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat memproses transaksi');
        }
    }

    public function destroy(string $id): RedirectResponse
    {
        $user = Cart::findOrFail($id);

        // Hapus data pengguna
        $user->delete();

        return redirect()->route('keranjang.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
