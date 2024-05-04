<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginMobileController extends Controller
{
    public function login(Request $request)
    {
        // Menerima data dari request
        $email = $request->input('email');
        $password = $request->input('password');

        // Melakukan pemeriksaan email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([]);
        }

        // Melakukan query ke database
        $user = DB::table('users')->where('email', $email)->first();

        // Memeriksa apakah user ditemukan
        if ($user) {
            $hashedPassword = $user->password;

            // Memeriksa apakah password yang dimasukkan oleh pengguna cocok dengan hash di database
            if (password_verify($password, $hashedPassword)) {
                $role_db = $user->role;
                if ($role_db == 'admin') {
                    return response()->json($user);
                } else {
                    return response()->json([]);
                }
            } else {
                return response()->json([]);
            }
        } else {
            return response()->json([]);
        }
    }
    public function detailprofil()
    {
        // Mendapatkan pengguna berdasarkan ID tertentu, misalnya ID 1
        $id_user = $_POST['id_user'];

        $user = DB::table('users')->where('id', $id_user)->first();

        // Memeriksa apakah pengguna ditemukan
        if ($user) {
            // Mendapatkan data password dan role
            $role_db = $user->role;

            // Memeriksa apakah role user adalah admin
            if ($role_db == 'admin') {
                // Mengembalikan data pengguna jika role adalah admin
                return response()->json($user);
            } else {
                // Mengembalikan response kosong jika bukan admin
                return response()->json([]);
            }
        } else {
            // Mengembalikan response kosong jika user tidak ditemukan
            return response()->json([]);
        }
    }

    public function updatePassword(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'id' => 'required|String', // Pastikan ID yang diterima adalah integer
            'password_baru' => 'required|string', // Validasi panjang minimal password
        ]);

        // Dapatkan data yang diposting
        $data = $request->all();

        // Cari pengguna berdasarkan ID
        $user = User::find($data['id']);

        // Perbarui password jika pengguna ditemukan
        if ($user) {
            // Enkripsi password menggunakan Bcrypt
            $hashedPassword = bcrypt($data['password_baru']);

            // Perbarui password pengguna
            $user->update([
                'password' => $hashedPassword,
            ]);

            return response()->json(['message' => 'Password berhasil diperbarui']);
        } else {
            return response()->json(['error' => 'Pengguna tidak ditemukan'], 404);
        }
    }

    public function checkCurrentPassword(Request $request)
    {
        // Validasi permintaan
        $request->validate([
            'id' => 'required|String', // Pastikan ID yang diterima adalah integer
            'password' => 'required|string', // Validasi password saat ini
        ]);

        // Dapatkan data yang diposting
        $data = $request->all();

        // Cari pengguna berdasarkan ID
        $user = User::find($data['id']);

        // Periksa apakah pengguna ditemukan
        if ($user) {
            $hashedPassword = $user->password;

            if (password_verify($data['password'], $hashedPassword)) {
                return response()->json(['message' => 'sesuai']);
            } else {
                return response()->String('tidak');
            }
        } else {
            return response()->json(['error' => 'Pengguna tidak ditemukan']);
        }
    }
}
