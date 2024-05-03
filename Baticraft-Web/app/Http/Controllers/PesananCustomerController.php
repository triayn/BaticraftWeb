<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananCustomerController extends Controller
{
    public function index()
    {
        // $data = Transaction::get();
        // $detail = TransactionDetail::get();

        return view('customer.pesanan.index');
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
