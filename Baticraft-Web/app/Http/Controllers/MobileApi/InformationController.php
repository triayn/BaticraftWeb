<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class InformationController extends Controller
{
    public function show()
    {
        // Mengambil semua data dari tabel informations
        $details = Informations::all();
        
        // Mengembalikan data dalam format JSON
        return response()->json($details);
    }

    public function update(Request $request)
    {
        // Pastikan request adalah POST request
        if ($request->isMethod('post')) {
            // Baca data yang dikirimkan dalam body permintaan
            $input = $request->all();

            // Siapkan data untuk update
            $data = [
                'nama_pemilik' => $input['nama_pemilik'],
                'alamat' => $input['alamat'],
                'lokasi' => $input['lokasi'],
                'deskripsi' => $input['deskripsi'],
                'no_telpon' => $input['no_telpon'],
                'email' => $input['email'],
                'akun_ig' => $input['akun_ig']??null,
                'akun_fb' => $input['akun_fb']??null,
                'akun_tiktok' => $input['akun_tiktok']??null
            ];

            // Tambahkan perubahan gambar jika data gambar tidak kosong
            if (!empty($input['image'])) {
                $data['image'] = $input['image'];
            }

            // Lakukan update data berdasarkan ID
            try {
                Informations::where('id', 1)->update($data);
                return response()->json(["message" => "Data berhasil diperbarui"]);
            } catch (\Exception $e) {
                return response()->json(["error" => "Gagal memperbarui data: " . $e->getMessage()]);
            }
        } else {
            return response()->json(["error" => "Metode request harus POST"]);
        }

    }

    public function uploadFoto(Request $request)
    {
        // Pastikan request adalah POST request
        if ($request->isMethod('post')) {
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $file = $request->file('image');
                $targetDir = 'storage/information/';
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
}