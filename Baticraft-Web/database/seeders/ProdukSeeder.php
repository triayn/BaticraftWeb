<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::updateOrCreate(
            // [
            //     'nama'          => 'Tria Yunita',
            //     'deskripsi'     => '+62895342743004',
            //     'harga'        => 'Kabupaten Nganjuk, Jawa Timur',
            //     'stok' => 'perempuan',
            //     'tempat_lahir'  => 'Nganjuk',
            //     'tanggal_lahir' => '2003-06-04',
            //     'role'          => 'admin',
            //     'password'      => Hash::make('yaudah')
            // ]
        );
    }
}
