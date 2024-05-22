<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Informations;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        DB::listen(function ($query) {
            Log::info($query->sql);
            Log::info($query->bindings);
        });

        $bulan = Carbon::now()->month;
        $tahun = Carbon::now()->year;
        $hari = Carbon::now()->toDateString();

        // Jumlah customer bulan ini
        $customer = Transaction::select('user_id')
            ->where(function ($query) use ($bulan, $tahun) {
                $query->where(function ($query) use ($bulan, $tahun) {
                    $query->where('jenis_transaksi', 'langsung')
                        ->whereMonth('created_at', $bulan)
                        ->whereYear('created_at', $tahun);
                })->orWhere(function ($query) use ($bulan, $tahun) {
                    $query->where('jenis_transaksi', 'pesan')
                        ->whereMonth('updated_at', $bulan)
                        ->whereYear('updated_at', $tahun);
                });
            })
            ->distinct()
            ->count();

        // Pendapatan bulan ini
        $pendapatan = Transaction::select(DB::raw('SUM(total_harga) as total'))
            ->where(function ($query) use ($bulan, $tahun) {
                $query->where(function ($query) use ($bulan, $tahun) {
                    $query->where('jenis_transaksi', 'langsung')
                        ->whereMonth('created_at', $bulan)
                        ->whereYear('created_at', $tahun);
                })->orWhere(function ($query) use ($bulan, $tahun) {
                    $query->where('jenis_transaksi', 'pesan')
                        ->whereMonth('updated_at', $bulan)
                        ->whereYear('updated_at', $tahun);
                });
            })
            ->first()
            ->total;

        // Statistik hari ini
        $harian = Transaction::whereDate('created_at', $hari)
            ->orWhere(function ($query) use ($hari) {
                $query->where('jenis_transaksi', 'pesan')
                    ->whereDate('updated_at', $hari);
            });

        $menunggu = $harian->where('status_transaksi', 'menunggu')->count();

        $selesai = $harian->where('status_transaksi', 'selesai')->count();

        $item = $harian->sum('total_item');

        $pendapatanH = $harian->sum('total_harga');

        $topProducts = TransactionDetail::select('product_id', 'nama_product', DB::raw('SUM(jumlah) as total_jumlah'))
            ->groupBy('product_id', 'nama_product')
            ->orderBy('total_jumlah', 'desc')
            ->with('product') // Eager load product data
            ->take(2) // Batasi hasil query hanya 3 item
            ->get();

        // Ambil total penjualan produk per kategori
        $salesByCategory = TransactionDetail::select('products.kategori', DB::raw('SUM(transaction_details.jumlah) as total_penjualan'))
            ->join('products', 'transaction_details.product_id', '=', 'products.id')
            ->groupBy('products.kategori')
            ->orderBy('total_penjualan', 'desc')
            ->get();

        // Ambil jumlah transaksi berdasarkan status
        $masuk = Transaction::where('status_transaksi', 'menunggu')->count();
        $diproses = Transaction::where('status_transaksi', 'diproses')->count();

        return view('homeAdmin', compact(
            'customer',
            'pendapatan',
            'menunggu',
            'selesai',
            'item',
            'pendapatanH',
            'topProducts',
            'salesByCategory',
            'masuk',
            'diproses'
        ));
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
