<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // PENGGUNA ADMIN
    public  function index()
    {
        $data = User::where('role', 'admin')->get();

        return view('admin.users.index', compact('data'));
    }

    public function create()
    {
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
        try {
            $image->storeAs('public/user', $image->hashName());
        } catch (\Exception $e) {
            return redirect()->route('user.index')->
            with('error', "Gagal menyimpan gambar. Error: " . $e->getMessage());
        }

        User::create([
            'nama'              => $request->nama,
            'no_telpon'         => $request->no_telpon,
            'alamat'            => $request->alamat,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => $request->tanggal_lahir,
            'role'              => $request->role,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'image'             => $image->hashName()
        ]);

        return redirect()->route('user.index')->with('success', "Data Berhasil Ditambahkan");
    }

    public function show(string $id): View
    {
        $data = User::findOrFail($id);

        return view('admin.users.show', compact('data'));
    }

    public function edit(string $id): View
    {
        $data = User::findOrFail($id);

        return view('admin.users.edit', compact('data'));
    }

    public function update(Request $request, $id): RedirectResponse
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
            'image'             => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $data = User::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('/public/user', $image->hashName());

            Storage::delete('/public/user' . $data->image);

            $data->update([
                'nama'              => $request->nama,
                'no_telpon'         => $request->no_telpon,
                'alamat'            => $request->alamat,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'tempat_lahir'      => $request->tempat_lahir,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'role'              => $request->role,
                'email'             => $request->email,
                'image'             => $image->hashName()
            ]);
        } else {
            $data->update([
                'nama'              => $request->nama,
                'no_telpon'         => $request->no_telpon,
                'alamat'            => $request->alamat,
                'jenis_kelamin'     => $request->jenis_kelamin,
                'tempat_lahir'      => $request->tempat_lahir,
                'tanggal_lahir'     => $request->tanggal_lahir,
                'role'              => $request->role,
                'email'             => $request->email,
            ]);
        }

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diedit']);
    }

    public function destroy(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        // Hapus file gambar dari penyimpanan jika ada
        if (Storage::exists('public/user/' . $user->image)) {
            Storage::delete('public/user/' . $user->image);
        }

        // Hapus data pengguna
        $user->delete();

        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus']);
    }

    // PENGGUNA CUSTOMER
    public  function index_customer()
    {
        $data = User::where('role', 'pembeli')->get();

        return view('admin.customer.index', compact('data'));
    }

    public function destroy_customer(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        // Hapus file gambar dari penyimpanan jika ada
        if (Storage::exists('public/user/' . $user->image)) {
            Storage::delete('public/user/' . $user->image);
        }

        // Hapus data pengguna
        $user->delete();

        return redirect()->route('customer.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
