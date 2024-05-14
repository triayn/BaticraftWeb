<?php

namespace App\Http\Controllers\MobileApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class KelolaPengguna extends Controller
{
    public function getSemua(Request $request)
    {
        $searchText = $request->input('search');
        $user = DB::table('users as u')
            ->select('u.*')
            ->where('role', 'like', '%' . $searchText . '%')
            ->get();
        return response()->json($user);
    }
    public function search(Request $request)
    {
        $searchText = $request->input('search');
        $searchNama = $request->input('searchNama');
        $user = DB::table('users as u')
            ->select('u.*')
            ->where('role', 'like', '%' . $searchText . '%')
            ->where('nama', 'like', '%' . $searchNama . '%')
            ->get();
        return response()->json($user);
    }

    public function insert(Request $request)
    {

        $input = $request->all();

        $data = [
            'nama' => $input['nama'],
            'email' => $input['email'],
            'role' => "admin",
            'no_telpon' => $input['no_telpon'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'tempat_lahir' => $input['tempat_lahir'],
            'tanggal_lahir' => $input['tanggal_lahir'],
            'alamat' => $input['alamat'],
            'password' => $input['password'],
            'image' => $input['image']
        ];


        try {


            DB::table('users')->insert($data);
            return response()->json(["message" => "Data berhasil diperbarui"]);


        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui data pengguna',$e], 500);
        }
    }
}