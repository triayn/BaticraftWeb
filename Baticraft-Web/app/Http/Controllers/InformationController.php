<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Informations;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{
    public  function index()
    {
        $data = Informations::get();

        return view('admin.information.index', compact('data'));
    }

    public  function customer()
    {
        $data = Informations::get();

        return view('customer.InformasiToko', compact('data'));
    }

    public function edit(): View
    {
        $data = Informations::first();

        return view('admin.information.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_pemilik'      => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'nama_toko'         => 'required|min:3|regex:/^[a-zA-Z\s]+$/',
            'deskripsi'         => 'required|min:20',
            'no_telpon'         => 'required|max:15|min:11|regex:/^\+?[0-9]+$/',
            'alamat'            => 'required',
            'lokasi'            => 'required',
            'akun_ig'           => 'nullable',
            'akun_fb'           => 'nullable',
            'akun_tiktok'       => 'nullable',
            'email'             => 'required|email',
            'image'             => 'image|mimes:jpeg,jpg,png|max:2048'
        ], [
            'nama_pemilik.required'     => 'Nama pemilik wajib diisi.',
            'nama_pemilik.min'          => 'Nama pemilik minimal 3 karakter.',
            'nama_pemilik.regex'        => 'Nama pemilik hanya boleh berisi huruf dan spasi.',
            'nama_toko.required'        => 'Nama toko wajib diisi.',
            'nama_toko.min'             => 'Nama toko minimal 3 karakter.',
            'nama_toko.regex'           => 'Nama toko hanya boleh berisi huruf dan spasi.',
            'deskripsi.required'        => 'Deskripsi wajib diisi.',
            'deskripsi.min'             => 'Deskripsi minimal 20 karakter.',
            'no_telpon.required'        => 'Nomor telepon wajib diisi.',
            'no_telpon.max'             => 'Nomor telepon maksimal 15 karakter.',
            'no_telpon.min'             => 'Nomor telepon minimal 11 karakter.',
            'no_telpon.regex'           => 'Nomor telepon hanya boleh berisi angka dan karakter "+".',
            'alamat.required'           => 'Alamat wajib diisi.',
            'lokasi.required'           => 'Lokasi wajib diisi.',
            'email.required'            => 'Email wajib diisi.',
            'email.email'               => 'Format email tidak valid.',
            'image.image'               => 'File harus berupa gambar.',
            'image.mimes'               => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, jpg, png.',
            'image.max'                 => 'Ukuran gambar maksimal 2048 KB.'
        ]);

        $data = Informations::first();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('/public/information', $image->hashName());

            Storage::delete('/public/information' . $data->image);

            $data->update([
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
                'image'             => $image->hashName()
            ]);
        } else {
            $data->update([
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
        return redirect()->route('information.index')->with(['success' => 'Data Berhasil Diedit']);
    }
}
