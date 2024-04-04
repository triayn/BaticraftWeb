<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemilik',
        'nama_toko',
        'deskripsi',
        'no_telpon',
        'alamat',
        'lokasi',
        'akun_ig',
        'akun_fb',
        'akun_tiktok',
        'email',
        'image',
    ];
}
