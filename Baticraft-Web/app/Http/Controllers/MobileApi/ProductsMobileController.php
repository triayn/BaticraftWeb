<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsMobileController extends Controller
{
    public function semua(Request $request)
    {
        $products = DB::table('products as p')
            ->select('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at', DB::raw('MIN(ip.image_path) AS image_path'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->get();
        return response()->json($products);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $products = DB::table('products as p')
            ->select('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at', DB::raw('MIN(ip.image_path) AS image_path'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('nama', 'like', '%' . $searchText . '%')
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->get();
        return response()->json($products);
    }
    public function searchKain(Request $request)
    {
        $searchText = $request->input('search');
        $products = DB::table('products as p')
            ->select('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at', DB::raw('MIN(ip.image_path) AS image_path'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('nama', 'like', '%' . $searchText . '%')
            ->where('p.kategori', 'kain')
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->get();
        return response()->json($products);
    }
    public function searchKemeja(Request $request)
    {
        $searchText = $request->input('search');
        $products = DB::table('products as p')
            ->select('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at', DB::raw('MIN(ip.image_path) AS image_path'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('nama', 'like', '%' . $searchText . '%')
            ->where('p.kategori', 'kemeja')
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->get();
        return response()->json($products);
    }
    public function searchKaos(Request $request)
    {
        $searchText = $request->input('search');
        $products = DB::table('products as p')
            ->select('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at', DB::raw('MIN(ip.image_path) AS image_path'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('nama', 'like', '%' . $searchText . '%')
            ->where('p.kategori', 'kaos')
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->get();
        return response()->json($products);
    }
    public function getProductsKain()
    {
        $products = DB::table('products as p')
            ->select('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at', DB::raw('MIN(ip.image_path) AS image_path'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('p.kategori', 'kain')
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->get();

        if ($products->isEmpty()) {
            // Jika tidak ada produk dengan kategori "kain" ditemukan, kirimkan pesan kesalahan
            $response = [
                'error' => 'Tidak ada produk kategori kain yang ditemukan'
            ];
        } else {
            // Memformat data produk dan gambar utama ke dalam array
            $response = $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'kode_product' => $product->kode_product,
                    'nama' => $product->nama,
                    'deskripsi' => $product->deskripsi,
                    'harga' => $product->harga,
                    'kategori' => $product->kategori,
                    'stok' => $product->stok,
                    'ukuran' => $product->ukuran,
                    'bahan' => $product->bahan,
                    'panjang_kain' => $product->panjang_kain,
                    'lebar_kain' => $product->lebar_kain,
                    'jenis_batik' => $product->jenis_batik,
                    'jenis_lengan' => $product->jenis_lengan,
                    'status' => $product->status,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at,
                    'image_path' => $product->image_path // Menampilkan satu gambar utama
                ];
            })->toArray();
        }

        return response()->json($response);
    }

    public function getProductsKaos()
    {
        $products = DB::table('products as p')
            ->select('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at', DB::raw('MIN(ip.image_path) AS image_path'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('p.kategori', 'kaos')
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->get();

        if ($products->isEmpty()) {
            // Jika tidak ada produk dengan kategori "kaos" ditemukan, kirimkan pesan kesalahan
            $response = [
                'error' => 'Tidak ada produk kategori kaos yang ditemukan'
            ];
        } else {
            // Memformat data produk dan gambar utama ke dalam array
            $response = $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'kode_product' => $product->kode_product,
                    'nama' => $product->nama,
                    'deskripsi' => $product->deskripsi,
                    'harga' => $product->harga,
                    'kategori' => $product->kategori,
                    'stok' => $product->stok,
                    'ukuran' => $product->ukuran,
                    'bahan' => $product->bahan,
                    'panjang_kain' => $product->panjang_kain,
                    'lebar_kain' => $product->lebar_kain,
                    'jenis_batik' => $product->jenis_batik,
                    'jenis_lengan' => $product->jenis_lengan,
                    'status' => $product->status,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at,
                    'image_path' => $product->image_path // Menampilkan satu gambar utama
                ];
            })->toArray();
        }

        return response()->json($response);
    }

    public function getProductsKemeja()
    {
        $products = DB::table('products as p')
            ->select('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at', DB::raw('MIN(ip.image_path) AS image_path'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('p.kategori', 'kemeja')
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->get();

        if ($products->isEmpty()) {
            // Jika tidak ada produk dengan kategori "kemeja" ditemukan, kirimkan pesan kesalahan
            $response = [
                'error' => 'Tidak ada produk kategori kemeja yang ditemukan'
            ];
        } else {
            // Memformat data produk dan gambar utama ke dalam array
            $response = $products->map(function ($product) {
                return [
                    'id' => $product->id,
                    'kode_product' => $product->kode_product,
                    'nama' => $product->nama,
                    'deskripsi' => $product->deskripsi,
                    'harga' => $product->harga,
                    'kategori' => $product->kategori,
                    'stok' => $product->stok,
                    'ukuran' => $product->ukuran,
                    'bahan' => $product->bahan,
                    'panjang_kain' => $product->panjang_kain,
                    'lebar_kain' => $product->lebar_kain,
                    'jenis_batik' => $product->jenis_batik,
                    'jenis_lengan' => $product->jenis_lengan,
                    'status' => $product->status,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at,
                    'image_path' => $product->image_path // Menampilkan satu gambar utama
                ];
            })->toArray();
        }

        return response()->json($response);
    }
    public function deleteProduct(Request $request)
    {
        $id_produk = $request->input('id_produk');

        try {
            // Hapus data gambar dari tabel image_products
            ImageProduct::where('product_id', $id_produk)->delete();

            // Hapus data produk dari tabel products
            Product::where('id', $id_produk)->delete();

            return response()->json(['message' => 'Data produk dan gambar berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage()]);
        }
    }

    public function getDetailKain(Request $request)
    {
        $id_produk = $request->input('id_produk');

        $product = DB::table('products as p')
            ->select('p.*', DB::raw('GROUP_CONCAT(ip.image_path) AS image_paths'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('p.kategori', 'kain')
            ->where('p.id', $id_produk)
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->first();

        if ($product) {
            // Memisahkan path gambar menjadi array
            $image_paths = explode(',', $product->image_paths);

            // Hanya mengambil 5 gambar pertama jika ada
            $image_paths = array_slice($image_paths, 0, 5);

            // Memformat data produk dan gambar ke dalam array
            $response = [
                'id' => $product->id,
                'kode_product' => $product->kode_product,
                'nama' => $product->nama,
                'deskripsi' => $product->deskripsi,
                'harga' => $product->harga,
                'kategori' => $product->kategori,
                'stok' => $product->stok,
                'ukuran' => $product->ukuran,
                'bahan' => $product->bahan,
                'panjang_kain' => $product->panjang_kain,
                'lebar_kain' => $product->lebar_kain,
                'jenis_batik' => $product->jenis_batik,
                'jenis_lengan' => $product->jenis_lengan,
                'status' => $product->status,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'image_paths' => $image_paths // Mengirimkan array path gambar
            ];
        } else {
            // Jika tidak ada produk dengan kategori "kain" atau produk dengan id tertentu ditemukan, kirimkan pesan kesalahan
            return response()->json([]);
        }

        return response()->json($response);
    }
    public function getDetailKaos(Request $request)
    {
        $id_produk = $request->input('id_produk');

        $product = DB::table('products as p')
            ->select('p.*', DB::raw('GROUP_CONCAT(ip.image_path) AS image_paths'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('p.kategori', 'kaos')
            ->where('p.id', $id_produk)
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->first();

        if ($product) {
            // Memisahkan path gambar menjadi array
            $image_paths = explode(',', $product->image_paths);

            // Hanya mengambil 5 gambar pertama jika ada
            $image_paths = array_slice($image_paths, 0, 5);

            // Memformat data produk dan gambar ke dalam array
            $response = [
                'id' => $product->id,
                'kode_product' => $product->kode_product,
                'nama' => $product->nama,
                'deskripsi' => $product->deskripsi,
                'harga' => $product->harga,
                'kategori' => $product->kategori,
                'stok' => $product->stok,
                'ukuran' => $product->ukuran,
                'bahan' => $product->bahan,
                'panjang_kain' => $product->panjang_kain,
                'lebar_kain' => $product->lebar_kain,
                'jenis_batik' => $product->jenis_batik,
                'jenis_lengan' => $product->jenis_lengan,
                'status' => $product->status,
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
                'image_paths' => $image_paths // Mengirimkan array path gambar
            ];
        } else {
            // Jika tidak ada produk dengan kategori "kaos" atau produk dengan id tertentu ditemukan, kirimkan pesan kesalahan
            return response()->json([]);
        }

        return response()->json($response);
    }

    public function getDetailKemeja(Request $request)
    {
        $id_produk = $request->input('id_produk');

        $productDetail = DB::table('products as p')
            ->select('p.*', DB::raw('GROUP_CONCAT(ip.image_path) AS image_paths'))
            ->leftJoin('image_products as ip', 'p.id', '=', 'ip.product_id')
            ->where('p.id', '=', $id_produk)
            ->groupBy('p.id', 'p.kode_product', 'p.nama', 'p.deskripsi', 'p.harga', 'p.kategori', 'p.stok', 'p.ukuran', 'p.bahan', 'p.panjang_kain', 'p.lebar_kain', 'p.jenis_batik', 'p.jenis_lengan', 'p.status', 'p.created_at', 'p.updated_at')
            ->first();
        if ($productDetail) {
            // Memisahkan path gambar menjadi array
            $image_paths = explode(',', $productDetail->image_paths);

            // Hanya mengambil 5 gambar pertama jika ada
            $image_paths = array_slice($image_paths, 0, 5);

            // Memformat data produk dan gambar ke dalam array
            $response = [
                'id' => $productDetail->id,
                'kode_product' => $productDetail->kode_product,
                'nama' => $productDetail->nama,
                'deskripsi' => $productDetail->deskripsi,
                'harga' => $productDetail->harga,
                'kategori' => $productDetail->kategori,
                'stok' => $productDetail->stok,
                'ukuran' => $productDetail->ukuran,
                'bahan' => $productDetail->bahan,
                'panjang_kain' => $productDetail->panjang_kain,
                'lebar_kain' => $productDetail->lebar_kain,
                'jenis_batik' => $productDetail->jenis_batik,
                'jenis_lengan' => $productDetail->jenis_lengan,
                'status' => $productDetail->status,
                'created_at' => $productDetail->created_at,
                'updated_at' => $productDetail->updated_at,
                'image_paths' => $image_paths // Mengirimkan array path gambar
            ];
        } else {
            // Jika tidak ada produk dengan id tertentu ditemukan, kirimkan pesan kesalahan
            return response()->json([]);
        }

        return response()->json($response);
    }
    public function addImagesToProduct(Request $request)
    {
        // Data ID produk dan daftar nama file gambar
        $id_produk = $request->input('id_produk');
        $image_paths = $request->input('image_paths'); // Array berisi daftar nama file gambar
        $response = [];

        // Memeriksa apakah terdapat data nama file gambar yang akan ditambahkan
        if (!empty($image_paths)) {
            foreach ($image_paths as $image_path) {
                // Memeriksa apakah nama file gambar sudah ada dalam database
                $existingImage = ImageProduct::where('product_id', $id_produk)->where('image_path', $image_path)->first();
                if (!$existingImage) {
                    // Jika nama file gambar belum ada, maka tambahkan ke database
                    $newImage = new ImageProduct();
                    $newImage->product_id = $id_produk;
                    $newImage->image_path = $image_path;
                    $newImage->save();
                    $response['message'] = "Data gambar berhasil ditambahkan.";
                } else {
                    $response['message'] = "Nama file gambar '$image_path' sudah ada dalam database.";
                }
            }
        } else {
            $response['error'] = "Tidak ada nama file gambar yang ditambahkan.";
        }

        // Mengirimkan response dalam format JSON
        return response()->json($response);
    }

    public function updateProduct(Request $request)
    {
        // Mengambil data produk dari request
        $nama = $request->input('nama');
        $deskripsi = $request->input('deskripsi');
        $harga = $request->input('harga');
        $stok = $request->input('stok');
        $ukuran = $request->input('ukuran', null);
        $bahan = $request->input('bahan', null);
        $panjang_kain = $request->input('panjang_kain');
        $lebar_kain = $request->input('lebar_kain');
        $jenis_batik = $request->input('jenis_batik');
        $jenis_lengan = $request->input('jenis_lengan', null);
        $id = $request->input('id_produk'); // ID produk yang akan diperbarui

        // Memperbarui informasi produk di tabel products
        try {
            $product = Product::findOrFail($id);
            $product->nama = $nama;
            $product->deskripsi = $deskripsi;
            $product->harga = $harga;
            $product->stok = $stok;
            $product->ukuran = $ukuran;
            $product->bahan = $bahan;
            $product->panjang_kain = $panjang_kain;
            $product->lebar_kain = $lebar_kain;
            $product->jenis_batik = $jenis_batik;
            $product->jenis_lengan = $jenis_lengan;
            $product->save();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage()]);
        }

        // Memeriksa apakah ada gambar yang diunggah
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $image_name = 'product_image_' . uniqid() . '.' . $image->getClientOriginalExtension();
                // Simpan gambar ke direktori
                $image->move('images', $image_name);
                // Menyimpan informasi gambar ke tabel image_products
                ImageProduct::create([
                    'product_id' => $id,
                    'image_path' => $image_name
                ]);
            }
        }

        return response()->json(['message' => 'Produk berhasil diperbarui.']);
    }


    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'kode_product' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'stok' => 'required|numeric',
            'panjang_kain' => 'required|numeric',
            'lebar_kain' => 'required|numeric',
            'jenis_batik' => 'required',
            'status' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        // Menyimpan informasi produk ke tabel products
        $productId = DB::table('products')->insertGetId([
            'kode_product' => $request->kode_product,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'ukuran' => $request->input('ukuran'),
            'bahan' => $request->input('bahan'),
            'panjang_kain' => $request->panjang_kain,
            'lebar_kain' => $request->lebar_kain,
            'jenis_batik' => $request->jenis_batik,
            'jenis_lengan' => $request->input('jenis_lengan'),
            'status' => $request->status,
        ]);

        // Memeriksa apakah ada gambar yang diunggah
        if ($request->hasFile('images')) {
            // Memproses setiap gambar yang diunggah
            foreach ($request->file('images') as $image) {
                $imageName = 'product_image_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);

                // Menyimpan informasi gambar ke tabel image_products
                DB::table('image_products')->insert([
                    'product_id' => $productId,
                    'image_path' => $imageName,
                ]);
            }
        }

        // Menampilkan pesan sukses
        return response()->json(['message' => 'Produk dan gambar berhasil disimpan.']);
    }

    public function generateProductCode()
    {
        // Query untuk mendapatkan kode produk terbaru dari database
        $lastProduct = DB::table('products')->orderBy('id', 'desc')->first();

        if ($lastProduct) {
            // Mendapatkan angka dari kode produk terbaru
            $lastNumber = intval(substr($lastProduct->kode_product, 3));

            // Menambah 1 ke angka terakhir dan membuat kode produk baru
            $nextNumber = $lastNumber + 1;
            $nextProductCode = 'BTK' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        } else {
            // Jika tidak ada produk di database, kode produk baru akan dimulai dari BTK001
            $nextProductCode = 'BTK001';
        }

        // Mengirimkan kode produk berikutnya sebagai respon
        return response()->json(['next_product_code' => $nextProductCode]);
    }
}
