<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_transaksi',
        'user_id',
        'kasir',
        'jenis_transaksi',
        'total_item',
        'total_harga',
        'metode_pembayaran',
        'catatan_customer',
        'status_transaksi',
        'catatan_admin',
        'tanggal_konfirmasi',
        'tanggal_expired'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
