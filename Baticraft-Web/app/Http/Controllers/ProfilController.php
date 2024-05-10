<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('admin.profil.index', compact('user'));
    }
    
    public function indexCustomer()
    {
        $user = auth()->user();

        return view('customer.profil.index', compact('user'));
    }

    public function editCustomer()
    {
        $user = auth()->user();

        return view('customer.profil.edit', compact('user'));
    }

    public function updateCustomer(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'no_telpon' => 'required|max:15|min:11',
            'alamat' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('/public/user', $image->hashName());

            if ($user->image) {
                Storage::delete('/public/user/' . $user->image);
            }

            $user->update([
                'nama' => $request->nama,
                'no_telpon' => $request->no_telpon,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'email' => $request->email,
                'image' => $image
            ]);
        } else {
            $user->update([
                'nama' => $request->nama,
                'no_telpon' => $request->no_telpon,
                'alamat' => $request->alamat,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'email' => $request->email
            ]);
        }

        return redirect()->route('profil.customer.index')->with('success', 'Profil berhasil diperbarui.');
    }

    public function gantiCustomer()
    {
        return view('customer.profil.ganti');
    }

    public function verifikasiCustomer(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Kata sandi lama salah.'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('success', 'Kata sandi berhasil diubah.');
    }
}
