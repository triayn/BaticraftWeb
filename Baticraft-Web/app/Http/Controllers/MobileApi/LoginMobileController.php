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
         
                // Mengembalikan data pengguna jika role adalah admin
                return response()->json($user);
        
        
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

    public function uploadFoto(Request $request)
    {
        // Pastikan request adalah POST request
        if ($request->isMethod('post')) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $targetDir = 'storage/user/';
                $fileName = $file->getClientOriginalName();

                try {
                    $file->move(public_path($targetDir), $fileName);
                    $filePath = $targetDir . $fileName;
                    return response()->json(["message" => "File berhasil diunggah", "file_path" => $filePath]);
                } catch (\Exception $e) {
                    return response()->json(["error" => "Gagal menyimpan file"]);
                }
            } else {
                return response()->json(["error" => "File tidak ditemukan atau terjadi kesalahan saat mengunggah"]);
            }
        } else {
            return response()->json(["error" => "Metode request harus POST"]);
        }
    }

    public function update(Request $request)
    {
      
        $input = $request->all();

        $data = [
            'nama' => $input['nama'],
            'no_telpon' => $input['no_telpon'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'tempat_lahir' => $input['tempat_lahir'],
            'tanggal_lahir' => $input['tanggal_lahir'],
            'alamat' => $input['alamat']
        ];
        if (!empty($input['image'])) {
            $data['image'] = $input['image'];
        }

        try {
            

            User::where('id', $input['id'])->update($data);
                return response()->json(["message" => "Data berhasil diperbarui"]);
           

        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui data pengguna'], 500);
        }
    }

    public function checkEmail(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email'
        ]);

        // Ambil email dari request
        $email = $request->email;

        // Cari user berdasarkan email
        $user = User::where('email', $email)->first();

        // Periksa apakah user ditemukan
        if ($user) {
            // Jika user ditemukan, kembalikan response positif
            return response()->json(['message' => 'Email sudah terdaftar'], 200);
        } else {
            // Jika user tidak ditemukan, kembalikan response negatif
            return response()->json(['message' => 'Email belum terdaftar'], 404);
        }
    }
    public function updatePasswordLupaSandi(Request $request){

        $data = $request->all();
    
        $user = User::where('email', $data['email'])->first(); // Cari pengguna berdasarkan alamat email
    
        if ($user) {
            $hashedPassword = bcrypt($data['password_baru']);
            $user->update([
                'password' => $hashedPassword,
            ]);
    
            return response()->json(['message' => 'Password berhasil diperbarui']);
        } else {
            return response()->json(['error' => 'Pengguna tidak ditemukan'], 404);
        }
    }
    
}