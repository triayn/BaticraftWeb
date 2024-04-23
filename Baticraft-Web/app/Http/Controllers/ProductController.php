<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

    // public function store(Request $request): RedirectResponse
    // {
    //     $this->validate($request, [
    //         'kode_product'       => 'required|unique:products',
    //         'nama'              => 'required|min:3',
    //         'deskripsi'         => 'required',
    //         'harga'             => 'required|numeric',
    //         'stok'              => 'required|integer',
    //         'kategori'          => 'required',
    //         'ukuran'            => 'required',
    //         'bahan'             => 'nullable',
    //         'panjang_kain'      => 'nullable',
    //         'lebar_kain'        => 'nullable',
    //         'jenis_batik'       => 'nullable',
    //         'jenis_lengan'      => 'nullable',
    //         'status'            => 'required'
    //     ], [
    //         'nama.required' => 'Kolom nama wajib diisi.',
    //         'kode_product.required' => 'Kolom kode produk wajib diisi.',
    //         'kode_product.unique' => 'Kode produk sudah terdaftar.',
    //         'nama.min' => 'Kolom nama minimal harus 3 karakter.',
    //         'deskripsi.required' => 'Kolom deskripsi wajib diisi.',
    //         'harga.required' => 'Kolom harga wajib diisi.',
    //         'harga.numeric' => 'Kolom harga harus berupa angka.',
    //         'stok.required' => 'Kolom stok wajib diisi.',
    //         'stok.integer' => 'Kolom stok harus berupa angka bulat.',
    //         'kategori.required' => 'Kolom kategori wajib diisi.',
    //         'ukuran.required' => 'Kolom ukuran wajib diisi.',
    //     ]);

    //     Product::create([
    //         'kode_product' => $request->kode_product,
    //         'nama' => $request->nama,
    //         'deskripsi' => $request->deskripsi,
    //         'harga' => $request->harga,
    //         'stok' => $request->stok,
    //         'kategori' => $request->kategori,
    //         'ukuran' => $request->ukuran,
    //         'bahan' => $request->bahan,
    //         'panjang_kain' => $request->panjang_kain,
    //         'lebar_kain' => $request->lebar_kain,
    //         'jenis_batik' => $request->jenis_batik,
    //         'jenis_lengan' => $request->jenis_lengan,
    //         'status' => $request->status,
    //     ]);
    //     return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    // }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'kode_product' => 'required|unique:products',
            'nama' => 'required|min:3',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'ukuran' => 'nullable',
            'bahan' => 'nullable',
            'panjang_kain' => 'nullable',
            'lebar_kain' => 'nullable',
            'jenis_batik' => 'nullable',
            'jenis_lengan' => 'nullable',
            'status' => 'required',
            'images' => 'required|array|max:5',
            'images.*' => 'image|max:2048'
        ], [
            'nama.required' => 'Kolom nama wajib diisi.',
            'nama.min' => 'Kolom nama minimal harus 3 karakter.',
            'kode_product.required' => 'Kolom kode produk wajib diisi.',
            'kode_product.unique' => 'Kode produk sudah terdaftar.',
            'harga.required' => 'Kolom harga wajib diisi.',
            'harga.numeric' => 'Kolom harga harus berupa angka.',
            'stok.required' => 'Kolom stok wajib diisi.',
            'stok.integer' => 'Kolom stok harus berupa angka bulat.',
            'kategori.required' => 'Kolom kategori wajib diisi.',
            'ukuran.required' => 'Kolom ukuran wajib diisi.',
        ]);

        $product = Product::create([
            'kode_product' => $request->kode_product,
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
        ]);

        // Gambar
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = $image->hashName();
                $image_path = $image->storeAs('public/product', $image_name);

                // Menyimpan informasi gambar ke database
                ImageProduct::create([
                    'product_id' => $product->id,
                    'image_path' => $image_path  // Pastikan kolom image_path memiliki nilai
                ]);
            }
        }

        try {
            $image_path = $image->storeAs('public/product', $image_name);
            // Menyimpan informasi gambar ke database
            ImageProduct::create([
                'product_id' => $product->id,
                'image_path' => $image_path
            ]);
        } catch (\Exception $e) {
            // Tangani kesalahan
            dd($e->getMessage()); // Cetak pesan kesalahan
        }

        dd($product->toSql());

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }


    public function show(string $id): View
    {
        $data = Product::findOrFail($id);

        return view('admin.product.show', compact('data'));
    }

    public function edit(string $id): View
    {
        $data = Product::findOrFail($id);

        return view('admin.product.edit', compact('data'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'kode_product' => 'required',
            'nama' => 'required|min:3',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'stok' => 'required|integer',
            'ukuran' => 'nullable',
            'bahan' => 'nullable',
            'panjang_kain' => 'nullable',
            'lebar_kain' => 'nullable',
            'jenis_batik' => 'nullable',
            'jenis_lengan' => 'nullable',
            'status' => 'required'
        ]);

        $data = Product::findOrFail($id);

        $data->update([
            'kode_product' => $request->kode_product,
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
        ]);

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $user = Product::findOrFail($id);

        // Hapus file gambar dari penyimpanan jika ada
        // if (Storage::exists('public/user/' . $user->image)) {
        //     Storage::delete('public/user/' . $user->image);
        // }

        // Hapus data pengguna
        $user->delete();

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
