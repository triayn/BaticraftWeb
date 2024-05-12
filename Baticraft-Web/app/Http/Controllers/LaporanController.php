<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LaporanController extends Controller
{
    public function harian()
    {
        $transactions = Transaction::where(function ($query) {
            $query->where('jenis_transaksi', 'langsung')
                ->whereDate('created_at', Carbon::today());
        })
            ->orWhere(function ($query) {
                $query->where('jenis_transaksi', 'pesan')
                    ->whereDate('updated_at', Carbon::today());
            })
            ->where('status_transaksi', 'selesai')
            ->get();

        // Menghitung total pendapatan
        $totalPendapatan = $transactions->sum('total_harga');

        // Menghitung jumlah customer
        $jumlahCustomer = $transactions->unique('id')->count();

        // Mengirim data ke tampilan
        return view('admin.laporan.harian', compact('transactions', 'totalPendapatan', 'jumlahCustomer'));
    }

    public function mingguan(Request $request)
    {
        DB::listen(function ($query) {
            Log::info($query->sql);
            Log::info($query->bindings);
        });

        $transactions = Transaction::where(function ($query) use ($request) {
            $query->where('jenis_transaksi', 'langsung')
                ->whereBetween('created_at', [Carbon::parse($request->tanggal_awal)->startOfDay(), Carbon::parse($request->tanggal_akhir)->endOfDay()]);
        })
            ->orWhere(function ($query) use ($request) {
                $query->where('jenis_transaksi', 'pesan')
                    ->whereBetween('updated_at', [Carbon::parse($request->tanggal_awal)->startOfDay(), Carbon::parse($request->tanggal_akhir)->endOfDay()]);
            })
            ->where('status_transaksi', 'selesai')
            ->get();

        // Menghitung total pendapatan
        $totalPendapatan = $transactions->sum('total_harga');

        // Menghitung jumlah customer
        $jumlahCustomer = $transactions->unique('id')->count();

        // Mengirim data ke tampilan
        return view('admin.laporan.mingguan', compact('transactions', 'totalPendapatan', 'jumlahCustomer'));
    }

    public function bulanan(Request $request)
    {
        DB::listen(function ($query) {
            Log::info($query->sql);
            Log::info($query->bindings);
        });

        // Set default bulan dan tahun jika tidak ada request
        $tahunDefault = Carbon::today()->year;

        // Menggunakan default bulan dan tahun jika tidak ada request
        $tahun = $request->filled('tahun') ? $request->tahun : $tahunDefault;

        $transactions = Transaction::selectRaw('SUM(total_harga) AS totalPerbulan,
                                            CASE WHEN jenis_transaksi = "langsung" THEN MONTH(created_at)
                                                 WHEN jenis_transaksi = "pesan" THEN MONTH(updated_at)
                                            END AS Bulan_ke,
                                            CASE WHEN jenis_transaksi = "langsung" THEN YEAR(created_at)
                                                 WHEN jenis_transaksi = "pesan" THEN YEAR(updated_at)
                                            END AS Tahun,
                                            SUM(total_item) AS produk,
                                            COUNT(*) AS jumlah_baris')
            ->where(function ($query) {
                $query->whereMonth('created_at', '>=', 1)
                    ->orWhereMonth('updated_at', '>=', 1);
            })
            ->where(function ($query) use ($tahun) {
                $query->whereYear('created_at', $tahun)
                    ->orWhereYear('updated_at', $tahun);
            })
            ->where('status_transaksi', 'selesai')
            ->groupBy('Bulan_ke', 'Tahun')
            ->get();

        // Menghitung total pendapatan
        $totalPendapatany = $transactions->sum('totalPerbulan');

        // Menghitung jumlah customer
        $jumlahCustomery = $transactions->sum('jumlah_baris');

        // Get nama bulan
        $bulanNama = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        return view('admin.laporan.bulanan', compact(
            'transactions',
            'totalPendapatany',
            'jumlahCustomery',
            'bulanNama'
        ));
    }

    public function detailLaporan(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $detailTransactions = Transaction::where(function ($query) use ($bulan, $tahun) {
            $query->where('jenis_transaksi', 'langsung')
                ->whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun);
        })
            ->orWhere(function ($query) use ($bulan, $tahun) {
                $query->where('jenis_transaksi', 'pesan')
                    ->whereMonth('updated_at', $bulan)
                    ->whereYear('updated_at', $tahun);
            })
            ->where('status_transaksi', 'selesai')
            ->get();

        return view('admin.laporan.bulanan', compact('detailTransactions'));
    }
}
