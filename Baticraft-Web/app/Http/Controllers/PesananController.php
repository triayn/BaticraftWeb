<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function masuk()
    {
        $menunggu = Transaction::with('user')->where('status_transaksi', 'menunggu')->get();

        return view('admin.PesananMasuk.index', compact('menunggu'));
    }

    public function diproses()
    {
        $diproses = Transaction::with('user')->where('status_transaksi', 'diproses')->get();

        return view('admin.PesananDiproses.index', compact('diproses'));
    }

    public function riwayat()
    {
        $riwayat = Transaction::with('user')
            ->where('status_transaksi', 'ditolak')
            ->orWhere('status_transaksi', 'selesai')
            ->get();

        return view('admin.RiwayatPesanan.index', compact('riwayat'));
    }

    public function editMasuk($id){

        $transaction = Transaction::with('user')->findOrFail($id);
        $detail = TransactionDetail::where('transaction_id', $id)->get();
        $produk = Product::whereIn('id', $detail->pluck('product_id'))->get();

        return view('admin.PesananMasuk.konfirmasi', compact('transaction', 'detail', 'produk'));
    }
}
