<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public  function index() 
    {
        $data = User::get();
        
        return view('admin.users.index', compact('data'));
    }

    public function create() {
        return view('admin.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama'              => 'required|min:3',
            'no_telpon'         => 'required|max:15|min:11',
            'alamat'            => 'required|max:50',
            'jenis_kelamin'     => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'role'              => 'required',
            'email'             => 'required',
            'password'          => 'required|min:6',
            'image'             => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/user', $image->hashName());

        User::create([
            'nama'              => $request->nama,
            'no_telpon'         => $request->no_telpon,
            'alamat'            => $request->alamat,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'role'              => 'admin',
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'image'             => $image->hashName()
        ]);

        return redirect()->route('user.index')->with(['success', "Data Berhasil Ditambahkan"]);
    }

    public function show() {
        return view('admin.users.show');
    }

    public function edit() {
        return view('admin.users.edit');
    }
    
}
