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
        User::updateOrCreate(
            ['email' => 'triaynta@gmail.com'],
            [
                'nama'          => 'Tria Yunita',
                'no_telpon'     => '+62895342743004',
                'alamat'        => 'Kabupaten Nganjuk, Jawa Timur',
                'jenis_kelamin' => 'perempuan',
                'tempat_lahir'  => 'Nganjuk',
                'tanggal_lahir' => '2003-06-04',
                'role'          => 'admin',
                'password'      => Hash::make('yaudah')
            ]
        );

        User::updateOrCreate(
            ['email' => 'tria@gmail.com'],
            [
                'nama'          => 'Tria Aja',
                'no_telpon'     => '+6289122743004',
                'alamat'        => 'Kabupaten Nganjuk, Jawa Timur',
                'jenis_kelamin' => 'perempuan',
                'tempat_lahir'  => 'Nganjuk',
                'tanggal_lahir' => '2003-06-04',
                'role'          => 'pembeli',
                'password'      => Hash::make('yaudah')
            ]
        );
    }
}
