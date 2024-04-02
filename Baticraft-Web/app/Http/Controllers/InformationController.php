<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Informations;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public  function index()
    {
        $data = Informations::get();

        return view('admin.information.index', compact('data'));
    }

    public function edit(string $id): View
    {
        $data = Informations::findOrFail($id);

        return view('admin.information.edit', compact('data'));
    }
}
