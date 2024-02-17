<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama'          => 'Tria Yunita',
            'no_telpon'     => '+62895342743004',
            'alamat'        => 'Kabupaten Nganjuk, Jawa Timur',
            'jenis_kelamin' => 'perempuan',
            'tempat_lahir'  => 'Nganjuk',
            'tanggal_lahir' => '2003-06-04',
            'role'          => 'admin',
            'email'         => 'triaynta@gmail.com',
            'password'      => Hash::make('yaudah')
        ]);
    }
}
