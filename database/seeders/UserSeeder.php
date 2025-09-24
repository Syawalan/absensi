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
            'username'      => 'Neldi Resvi Nandra',
            'email'         => 'neldi@gmail.com',
            'foto'          => null,
            'tempat_lahir'  => 'Jakarta',
            'tgl_lahir'     => '1995-05-20',
            'alamat'        => 'Jl. Merdeka No. 123',
            'password'      => Hash::make('password123'),
            'bidang'        => 'Tenaga Bidang Pelayanan & Pelestarian Bahan Perpustakaan'
        ]);
    }
}
