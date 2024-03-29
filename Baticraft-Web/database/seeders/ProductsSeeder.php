<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama' => 'Kain Batik Sarimbitan dengan Motif Khas Batik Jayastamba',
            'deskripsi' => 'Sarimbit berasal dari bahasa Jawa yang berarti pasangan. 
            Batik sarimbit memiliki arti batik yang khusus didesain untuk pasangan atau batik couple. 
            Mengutip Wirawanbatik Batik sarimbit adalah jenis batik khas Indonesia yang dirancang untuk pasangan suami istri. ',
            'kategori' => 'kain',
        ]);
    }
}
