<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'ukuran', 
        'bahan',
        'jenis_lengan',
        'jenis_kerah'
    ];
}
