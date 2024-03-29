<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // public function getKodeProdukAttribute()
    // {
    //     $id = $this->id;
    //     $kode_produk = 'BTK' . str_pad($id, 3, '0', STR_PAD_LEFT);
    //     return $kode_produk;
    // }
}
