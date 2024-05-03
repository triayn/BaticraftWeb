<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EtalaseProductController extends Controller
{
    public  function index()
    {
        $data = Product::where('status', 'tersedia')->get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu

        return view('customer.EtalaseProduct.index', compact('data', 'images'));
    }

    public function kain()
    {
        $data = Product::where('kategori', 'kain')->where('status', 'tersedia')->get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu

        return view('customer.EtalaseProduct.kain', compact('data', 'images'));
    }

    public function kemeja()
    {
        $data = Product::where('kategori', 'kemeja')->where('status', 'tersedia')->get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu

        return view('customer.EtalaseProduct.kemeja', compact('data', 'images'));
    }

    public function kaos()
    {
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu
        $data = Product::where('kategori', 'kaos')->where('status', 'tersedia')->get();

        return view('customer.EtalaseProduct.kaos', compact('data', 'images'));
    }

    public function detail(string $id): View
    {
        $data = Product::findOrFail($id);
        $images = ImageProduct::where('product_id', $id)->get();

        return view('customer.EtalaseProduct.detail', compact('data', 'images'));
    }

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
            return $item->product;
        });

        return view('customer.keranjang.index', compact('cartItems', 'productsInCart'));
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
}
