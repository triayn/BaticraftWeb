<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function masuk()
    {
        // $data = Transaction::get();
        // $detail = TransactionDetail::get();

        return view('admin.PesananMasuk.index');
    }

    public function diproses()
    {
        // $data = Transaction::get();
        // $detail = TransactionDetail::get();

        return view('admin.PesananDiproses.index');
    }

    public function riwayat()
    {
        // $data = Transaction::get();
        // $detail = TransactionDetail::get();

        return view('admin.RiwayatPesanan.index');
    }
}
