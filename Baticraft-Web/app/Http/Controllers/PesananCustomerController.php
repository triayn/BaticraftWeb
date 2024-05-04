<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class PesananCustomerController extends Controller
{
    public function index()
    {
        $menunggu = Transaction::where('status_transaksi', 'menunggu')->get();
        $diproses = Transaction::where('status_transaksi', 'diproses')->get();
        $ditolak = Transaction::where('status_transaksi', 'ditolak')->get();
        $selesai = Transaction::where('status_transaksi', 'selesai')->get();

        return view('customer.pesanan.index', compact('menunggu', 'diproses', 'ditolak', 'selesai'));
    }
    
    public function menunggu()
    {
        // $data = Transaction::get();
        // $detail = TransactionDetail::get();

        return view('customer.pesanan.menunggu');
    }

    public function diproses()
    {
        // $data = Transaction::get();
        // $detail = TransactionDetail::get();

        return view('customer.pesanan.diproses');
    }

    public function ditolak()
    {
        // $data = Transaction::get();
        // $detail = TransactionDetail::get();

        return view('customer.pesanan.ditolak');
    }

    public function selesai()
    {
        // $data = Transaction::get();
        // $detail = TransactionDetail::get();

        return view('customer.pesanan.selesai');
    }
}
