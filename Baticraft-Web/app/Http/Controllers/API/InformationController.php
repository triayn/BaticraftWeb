<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public function index()
    {
        $information = Informations::first();
        return response()->json(['information' => $information], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_pemilik'      => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'nama_toko'         => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'deskripsi'         => 'required|min:20',
            'no_telpon'         => 'required|max:15|min:11|regex:/^\+?[0-9]+$/',
            'alamat'            => 'required',
            'lokasi'            => 'required',
            'akun_ig'           => 'nullable',
            'akun_fb'           => 'nullable',
            'akun_tiktok'       => 'nullable',
            'email'             => 'required',
            'image'             => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $information = Informations::first();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/information', $image->hashName());

            Storage::delete('public/information/' . $information->image);

            $information->update([
                'nama_pemilik'      => $request->nama_pemilik,
                'nama_toko'         => $request->nama_toko,
                'no_telpon'         => $request->no_telpon,
                'alamat'            => $request->alamat,
                'lokasi'            => $request->lokasi,
                'akun_ig'           => $request->akun_ig,
                'akun_fb'           => $request->akun_fb,
                'akun_tiktok'       => $request->akun_tiktok,
                'deskripsi'         => $request->deskripsi,
                'email'             => $request->email,
                'image'             => basename($imagePath)
            ]);
        } else {
            $information->update([
                'nama_pemilik'      => $request->nama_pemilik,
                'nama_toko'         => $request->nama_toko,
                'no_telpon'         => $request->no_telpon,
                'alamat'            => $request->alamat,
                'lokasi'            => $request->lokasi,
                'akun_ig'           => $request->akun_ig,
                'akun_fb'           => $request->akun_fb,
                'akun_tiktok'       => $request->akun_tiktok,
                'deskripsi'         => $request->deskripsi,
                'email'             => $request->email
            ]);
        }

        return response()->json(['message' => 'Data berhasil diupdate', 'information' => $information], 200);
    }
}
