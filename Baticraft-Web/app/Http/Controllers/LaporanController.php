<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

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
        $transactions = Transaction::when(function ($query) use ($request) {
                $query->where('jenis_transaksi', 'langsung')
                      ->whereBetween('created_at', [Carbon::parse($request->tanggal_awal)->startOfWeek(), Carbon::parse($request->tanggal_akhir)->endOfWeek()]);
            }, function ($query) use ($request) {
                $query->where('jenis_transaksi', 'pesan')
                      ->whereBetween('updated_at', [Carbon::parse($request->tanggal_awal)->startOfWeek(), Carbon::parse($request->tanggal_akhir)->endOfWeek()]);
            })
            ->where('status_transaksi', 'selesai')
            ->get();

        return view('admin.laporan.mingguan', compact('transactions'));
    }

    public function bulanan(Request $request)
    {
        $transactions = Transaction::when(function ($query) use ($request) {
                $query->where('jenis_transaksi', 'langsung')
                      ->whereYear('created_at', $request->tahun)
                      ->whereMonth('created_at', $request->bulan);
            }, function ($query) use ($request) {
                $query->where('jenis_transaksi', 'pesan')
                      ->whereYear('updated_at', $request->tahun)
                      ->whereMonth('updated_at', $request->bulan);
            })
            ->where('status_transaksi', 'selesai')
            ->get();

        return view('admin.laporan.bulanan', compact('transactions'));
    }
}
