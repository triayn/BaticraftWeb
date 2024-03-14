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
            [
                'nama' => 'Batik Sarimbitan',
                'deskripsi' => 'Batik Sarimbit adalah jenis batik yang dijual berpasangan untuk dipakai berpasangan pula, biasanya oleh suami istri. Pasangan batik tersebut biasanya memiliki kesamaan dari segi corak atau warna.',
                'kategori' => 'Kain',
                'harga' => 150000,
                'stok' => 10,
                'ukuran' => '2.5 m',
                'bahan' => 'Katun Primis',
                'status' => 'tersedia',
            ]
        );
    }
}
