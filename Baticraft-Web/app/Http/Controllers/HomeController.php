<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Informations;
use App\Models\Product;
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

        $kain = Product::where('kategori', 'kain')->where('status', 'tersedia')->get();
        $kemeja = Product::where('kategori', 'kemeja')->where('status', 'tersedia')->get();
        $kaos = Product::where('kategori', 'kaos')->where('status', 'tersedia')->get();
        $images = ImageProduct::all(); // Ambil semua gambar terlebih dahulu
        $info = Informations::first(); // Ambil data informasi pertama dari tabel
        $whatsappNumber = $info->no_telpon; // Ambil nomor WhatsApp dari data informasi
        $infoImg = $info->image;

        return view('homePembeli', compact(
            'kain',
            'kaos',
            'kemeja',
            'images',
            'whatsappNumber',
            'info',
            'infoImg'
        ));
    }
}
