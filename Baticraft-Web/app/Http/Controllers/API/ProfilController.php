<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        // Mengambil data profil pengguna yang sedang login
        $user = Auth::user();
        
        // Mengembalikan data dalam format JSON
        return response()->json(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|min:3|max:50',
            'alamat' => 'required|string|min:10|max:100',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|min:3|max:50',
            'no_telpon' => 'required|string|min:9|max:15',
        ]);

        // Mengambil data pengguna yang akan diperbarui
        $user = User::findOrFail($id);

        // Memperbarui data pengguna
        $user->update($request->all());

        // Mengembalikan respons berhasil
        return response()->json(['message' => 'Profil berhasil diperbarui']);
    }

    public function changePassword(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Mengambil data pengguna yang akan mengubah kata sandi
        $user = User::findOrFail($id);

        // Memeriksa kecocokan kata sandi saat ini
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Kata sandi saat ini tidak cocok'], 400);
        }

        // Mengubah kata sandi pengguna
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        // Mengembalikan respons berhasil
        return response()->json(['message' => 'Kata sandi berhasil diperbarui']);
    }
}
