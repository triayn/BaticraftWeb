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

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validate = [
            'nama' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s\']+$/'],
            'alamat' => ['required', 'string', 'min:10', 'max:100', 'regex:/^[a-zA-Z0-9\s\.,]+$/'],
            'tanggal_lahir' => ['required', 'date'],
            'tempat_lahir' => ['required', 'min:3', 'max:50', 'regex:/^[a-zA-Z\s\']+$/'],
            'no_telpon' => ['required', 'string', 'min:9', 'max:15', 'regex:/^(08|\+62)\d{9,15}$/'],
            'image' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
        ];

        $messages = [
            'required' => 'Data wajib diisi.',
            'min' => 'Data harus diisi minimal :min karakter.',
            'max' => 'Data harus diisi maksimal :max karakter.',
            'nama.regex' => 'Format nama tidak valid',
            'alamat.regex' => 'Alamat hanya boleh berisi huruf, angka, titik, dan koma.',
            'no_telpon.regex' => 'Nomor telepon harus dimulai dengan "08" atau "+62" dan terdiri dari 9-15 digit angka.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format file yang diunggah harus berupa JPG, JPEG, PNG, atau GIF.',
            'image.max' => 'Ukuran file gambar tidak boleh lebih dari 2 MB.',
        ];

        // Validasi input
        $validatedData = $request->validate($validate, $messages);

        // Update data user
        $user->nama = $validatedData['nama'];
        $user->alamat = $validatedData['alamat'];
        $user->tanggal_lahir = $validatedData['tanggal_lahir'];
        $user->tempat_lahir = $validatedData['tempat_lahir'];
        $user->no_telpon = $validatedData['no_telpon'];

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($user->image) {
                Storage::delete('/public/user/' . $user->image);
            }

            // Upload dan simpan gambar baru
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/user', $image->hashName());
            $user->image = basename($imagePath);
        }

        // Simpan perubahan
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
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
