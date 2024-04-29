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
    public function index()
    {
        $data = Product::get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu

        return view('admin.product.index', compact('data', 'images'));
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
                $image_name = $image->hashName();  // Hanya hash name tanpa path
                $image_path = $image->storeAs('public/product', $image_name);  // Tetapkan path jika diperlukan

                // Menyimpan informasi gambar ke database
                ImageProduct::create([
                    'product_id' => $product->id,
                    'image_path' => $image_name  // Simpan hanya hash name ke database
                ]);
            }
        }

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }


    public function show(string $id): View
    {
        $data = Product::findOrFail($id);
        $images = ImageProduct::where('product_id', $id)->get();

        return view('admin.product.show', compact('data', 'images'));
    }

    public function edit(string $id): View
    {
        $data = Product::findOrFail($id);
        // Mengambil gambar-gambar terkait dengan produk
        $images = ImageProduct::where('product_id', $id)->get();

        return view('admin.product.edit', compact('data', 'images'));
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
