<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EtalaseProductController extends Controller
{
    public function index()
    {
        // Ambil produk yang tersedia dan stok lebih dari nol
        $data = Product::where('status', 'tersedia')->where('stok', '>', 0)->get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu

        return view('customer.EtalaseProduct.index', compact('data', 'images'));
    }

    public function kain()
    {
        // Ambil produk kategori 'kain', yang tersedia, dan memiliki stok lebih dari nol
        $data = Product::where('kategori', 'kain')
            ->where('status', 'tersedia')
            ->where('stok', '>', 0)
            ->get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu

        return view('customer.EtalaseProduct.kain', compact('data', 'images'));
    }

    public function kemeja()
    {
        // Ambil produk kategori 'kemeja', yang tersedia, dan memiliki stok lebih dari nol
        $data = Product::where('kategori', 'kemeja')
            ->where('status', 'tersedia')
            ->where('stok', '>', 0)
            ->get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu

        return view('customer.EtalaseProduct.kemeja', compact('data', 'images'));
    }

    public function kaos()
    {
        // Ambil produk kategori 'kaos', yang tersedia, dan memiliki stok lebih dari nol
        $data = Product::where('kategori', 'kaos')
            ->where('status', 'tersedia')
            ->where('stok', '>', 0)
            ->get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu

        return view('customer.EtalaseProduct.kaos', compact('data', 'images'));
    }

    public function detail(string $id): View
    {
        $data = Product::findOrFail($id);
        $images = ImageProduct::where('product_id', $id)->get();

        return view('customer.EtalaseProduct.detail', compact('data', 'images'));
    }
}
