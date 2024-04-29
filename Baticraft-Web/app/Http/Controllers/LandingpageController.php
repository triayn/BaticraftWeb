<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Informations;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingpageController extends Controller
{
    public function index()
    {
        $data = Product::latest()->take(5)->where('status', 'tersedia')->get();
        $info = Informations::get();
        $images = ImageProduct::all();

        return view('LandingPage.LandingPage1', compact('data', 'info', 'images'));
    }
}
