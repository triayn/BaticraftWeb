<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    use HasFactory;

    protected $fillable = ['produk_id', 'gambar_path'];

    public function product()
    {
        return $this->belongsTo(Produk::class);
    }
}
