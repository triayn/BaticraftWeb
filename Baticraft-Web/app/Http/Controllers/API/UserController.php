<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'              => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'no_telpon'         => 'required|max:15|min:11|regex:/^\+?[0-9]+$/',
            'alamat'            => 'required|max:50',
            'jenis_kelamin'     => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required|date',
            'role'              => 'required',
            'email'             => 'required|email|unique:users,email|regex:/^[\w\.-]+@gmail\.com$/',
            'password'          => 'required|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/',
            'image'             => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $image = $request->file('image');
        $imagePath = $image->storeAs('public/user', $image->hashName());

        $user = User::create([
            'nama'              => $request->nama,
            'no_telpon'         => $request->no_telpon,
            'alamat'            => $request->alamat,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'role'              => $request->role,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'image'             => basename($imagePath)
        ]);

        return response()->json(['message' => 'Data berhasil ditambahkan', 'user' => $user], 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['user' => $user], 200);
    }
}
