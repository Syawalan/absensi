<?php

namespace Database\Seeders;

use App\Models\Izin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IzinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Izin::create([
            'user_id'   => 1,
            'tanggal'   => now()->toDateString(),
            'jenis'     => 'izin',
            'alasan'    => 'Ada urusan keluarga',
            'lampiran'  => null,
        ]);
    }
}
