<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Informations;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {
        return view('homeAdmin');
    }

    public function pembeli()
    {

        $kain = Product::where('kategori', 'kain')->where('status', 'tersedia')->where('stok', '>', 0)->get();
        $kemeja = Product::where('kategori', 'kemeja')->where('status', 'tersedia')->where('stok', '>', 0)->get();
        $kaos = Product::where('kategori', 'kaos')->where('status', 'tersedia')->where('stok', '>', 0)->get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu
        $info = Informations::first(); // Ambil data informasi pertama dari tabel
        $whatsappNumber = $info->no_telpon; // Ambil nomor WhatsApp dari data informasi
        $pesan = Transaction::orderBy('updated_at', 'desc')->limit(3)->get();

        return view('homePembeli', compact(
            'kain',
            'kaos',
            'kemeja',
            'images',
            'whatsappNumber',
            'info',
            'pesan'
        ));
    }
}
