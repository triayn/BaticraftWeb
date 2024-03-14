<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public  function index()
    {
        $data = Produk::get();

        return view('admin.produk.index', compact('data'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }
}
