<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EtalaseProductController extends Controller
{
    public  function index()
    {
        $data = Product::where('status', 'tersedia')->get();

        return view('customer.EtalaseProduct.index', compact('data'));
    }

    public function kain()
    {
        $data = Product::where('kategori', 'kain')->where('status', 'tersedia')->get();

        return view('customer.EtalaseProduct.kain', compact('data'));
    }

    public function kemeja()
    {
        $data = Product::where('kategori', 'kemeja')->where('status', 'tersedia')->get();

        return view('customer.EtalaseProduct.kemeja', compact('data'));
    }

    public function kaos()
    {
        $data = Product::where('kategori', 'kaos')->where('status', 'tersedia')->get();

        return view('customer.EtalaseProduct.kaos', compact('data'));
    }

    public function detail(string $id): View
    {
        $data = Product::findOrFail($id);

        return view('customer.EtalaseProduct.detail', compact('data'));
    }

    public  function card()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Pastikan user sedang login sebelum menambahkan ke keranjang
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        $data = Product::where($user)->get();

        return view('customer.keranjang.index', compact('data'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Ambil user yang sedang login
        $user = auth()->user();

        // Pastikan user sedang login sebelum menambahkan ke keranjang
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        Cart::add([
            'product_id' => $product->id,
            'user_id' => $user,
            'jumlah' => 1,
        ]);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
}
