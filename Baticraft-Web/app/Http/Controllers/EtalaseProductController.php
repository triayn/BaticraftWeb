<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtalaseProductController extends Controller
{
    public function index()
    {
        return view('customer.EtalaseProduct.index');
    }

    public function kain()
    {
        return view('customer.EtalaseProduct.kain');
    }

    public function kemeja()
    {
        return view('customer.EtalaseProduct.kemeja');
    }

    public function kaos()
    {
        return view('customer.EtalaseProduct.kaos');
    }
}
