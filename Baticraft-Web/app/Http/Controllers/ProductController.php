<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public  function index()
    {
        $data = Product::get();

        return view('admin.product.index', compact('data'));
    }

    public function create()
    {
        // Mendapatkan ID terakhir dari tabel produk
        $lastProductId = Product::latest()->value('id');

        // Membuat kode produk baru dengan format 'BTK' + id_produk + 000
        $nextProductId = 'BTK' . str_pad($lastProductId + 1, 3, '0', STR_PAD_LEFT);

        return view('admin.product.create', compact('nextProductId'));
    }

    public function store(Request $request): RedirectResponse
    {
        $product = new Product();

        $this->validate($request, [
            'kode_produk'       => 'required|unique:products',
            'nama'              => 'required|min:3',
            'deskripsi'         => 'required',
            'harga'             => 'required|numeric',
            'stok'              => 'required|integer',
            'kategori'          => 'required',
            'ukuran'            => 'required',
            'bahan'             => 'nullable',
            'panjang_kain'      => 'nullable|numeric',
            'lebar_kain'        => 'nullable|numeric',
            'jenis_batik'       => 'nullable',
            'jenis_lengan'      => 'nullable',
            'status'            => 'required',
            'image'             => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ], [
            'nama.required' => 'Kolom nama wajib diisi.',
            'kode_produk.required' => 'Kolom kode produk wajib diisi.',
            'kode_produk.unique' => 'Kode produk sudah terdaftar.',
            'nama.min' => 'Kolom nama minimal harus 3 karakter.',
            'deskripsi.required' => 'Kolom deskripsi wajib diisi.',
            'harga.required' => 'Kolom harga wajib diisi.',
            'harga.numeric' => 'Kolom harga harus berupa angka.',
            'stok.required' => 'Kolom stok wajib diisi.',
            'stok.integer' => 'Kolom stok harus berupa angka bulat.',
            'kategori.required' => 'Kolom kategori wajib diisi.',
            'ukuran.required' => 'Kolom ukuran wajib diisi.',
            'image.required' => 'Gambar produk wajib diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Gambar harus berekstensi JPEG, JPG, atau PNG.',
            'image.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $image = $request->file('image');

        if ($image) {
            $image_path = $image->storeAs('public/product', $image->hashName());

            $product = Product::create([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kategori' => $request->kategori,
                'ukuran' => $request->ukuran,
                'bahan' => $request->bahan,
                'panjang_kain' => $request->panjang_kain,
                'lebar_kain' => $request->lebar_kain,
                'jenis_batik' => $request->jenis_batik,
                'jenis_lengan' => $request->jenis_lengan,
                'status' => $request->status,
                'image' => $image->hashName(),
            ]);

            ImageProduct::create([
                'product_id' => $product->id,
                'image_path' => $image_path,
            ]);

            return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
        } else {
            return redirect()->route('product.index')->with('error', 'Gagal menyimpan gambar.');
        }

        $product = Product::create([
            'kode_produk' => 'BTK' . str_pad($product->id, 3, '0', STR_PAD_LEFT),
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
            'ukuran' => $request->ukuran,
            'bahan' => $request->bahan,
            'panjang_kain' => $request->panjang_kain,
            'lebar_kain' => $request->lebar_kain,
            'jenis_batik' => $request->jenis_batik,
            'jenis_lengan' => $request->jenis_lengan,
            'status' => $request->status,
            'image' => $image->hashName(),
        ]);

        return redirect()->route('user.index')->with('success', "Data Berhasil Ditambahkan");
    }
}
