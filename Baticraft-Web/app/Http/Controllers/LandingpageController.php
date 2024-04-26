<?php

namespace App\Http\Controllers;

use App\Models\Informations;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        $data = Product::latest()->take(5)->get();
        $info = Informations::get();

        return view('LandingPage.LandingPage1', compact('data', 'info'));
    }
}
