<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'id' => $product->id,
                'kode_product' => $product->kode_product,
                'nama' => $product->nama,
                'deskripsi' => $product->deskripsi,
                'harga' => $product->harga,
                'stok' => $product->stok,
                'kategori' => $product->kategori,
                'ukuran' => $product->ukuran,
                'bahan' => $product->bahan,
                'panjang_kain' => $product->panjang_kain,
                'lebar_kain' => $product->lebar_kain,
                'jenis_batik' => $product->jenis_batik,
                'jenis_lengan' => $product->jenis_lengan,
                'status' => $product->status,
                // Tambahkan properti produk lain sesuai kebutuhan
            ];
        }

        return response()->json($data, 200);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $data = [
            'id' => $product->id,
            'kode_product' => $product->kode_product,
            'nama' => $product->nama,
            'deskripsi' => $product->deskripsi,
            'harga' => $product->harga,
            'stok' => $product->stok,
            'kategori' => $product->kategori,
            'ukuran' => $product->ukuran,
            'bahan' => $product->bahan,
            'panjang_kain' => $product->panjang_kain,
            'lebar_kain' => $product->lebar_kain,
            'jenis_batik' => $product->jenis_batik,
            'jenis_lengan' => $product->jenis_lengan,
            'status' => $product->status,
            // Tambahkan properti produk lain sesuai kebutuhan
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_product' => 'required|unique:products',
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori' => 'required',
            'ukuran' => 'required',
            'bahan' => 'required',
            'panjang_kain' => 'required|numeric',
            'lebar_kain' => 'required|numeric',
            'jenis_batik' => 'required',
            'jenis_lengan' => 'required',
            'status' => 'required',
            // Tambahkan validasi untuk properti produk lainnya
        ]);

        // Simpan data produk
        $product = new Product;
        $product->kode_product = $request->input('kode_product');
        $product->nama = $request->input('nama');
        $product->deskripsi = $request->input('deskripsi');
        $product->harga = $request->input('harga');
        $product->stok = $request->input('stok');
        $product->kategori = $request->input('kategori');
        $product->ukuran = $request->input('ukuran');
        $product->bahan = $request->input('bahan');
        $product->panjang_kain = $request->input('panjang_kain');
        $product->lebar_kain = $request->input('lebar_kain');
        $product->jenis_batik = $request->input('jenis_batik');
        $product->jenis_lengan = $request->input('jenis_lengan');
        $product->status = $request->input('status');
        $product->save();

        // Kembalikan respon JSON
        return response()->json(['message' => 'Produk Berhasil Ditambahkan'], 201);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kode_product' => 'required|unique:products,id,' . $id,
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kategori' => 'required',
            'ukuran' => 'required',
            'bahan' => 'required',
            'panjang_kain' => 'required|numeric',
            'lebar_kain' => 'required|numeric',
            'jenis_batik' => 'required',
            'jenis_lengan' => 'required',
            'status' => 'required',
            // Tambahkan validasi untuk properti produk lainnya
        ]);

        // Temukan produk dengan ID yang diberikan
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Perbarui data produk
        $product->kode_product = $request->input('kode_product');
        $product->nama = $request->input('nama');
        $product->deskripsi = $request->input('deskripsi');
        $product->harga = $request->input('harga');
        $product->stok = $request->input('stok');
        $product->kategori = $request->input('kategori');
        $product->ukuran = $request->input('ukuran');
        $product->bahan = $request->input('bahan');
        $product->panjang_kain = $request->input('panjang_kain');
        $product->lebar_kain = $request->input('lebar_kain');
        $product->jenis_batik = $request->input('jenis_batik');
        $product->jenis_lengan = $request->input('jenis_lengan');
        $product->status = $request->input('status');
        $product->save();

        // Kembalikan respon JSON
        return response()->json(['message' => 'Produk Berhasil Diupdate'], 200);
    }

    public function destroy($id)
    {
        // Temukan produk dengan ID yang diberikan
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Hapus data produk
        $product->delete();

        // Kembalikan respon JSON
        return response()->json(['message' => 'Produk Berhasil Dihapus'], 200);
    }
}
