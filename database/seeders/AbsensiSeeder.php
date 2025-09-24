<?php

namespace Database\Seeders;

use App\Models\Absensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Absensi::create([
            'user_id'     => 1, 
            'tanggal'     => now()->toDateString(),
            'jam_masuk'   => '08:00:00',
            'jam_pulang'  => '17:00:00',
            'foto_masuk'  => 'masuk.jpg',
            'lat_masuk'   => 0.295004,
            'lng_masuk'   => 101.027513,
            'foto_pulang' => 'pulang.jpg',
            'lat_pulang'   => 0.295004,
            'lng_pulang'   => 101.027513,
            'status'      => 'hadir',
            'keterangan'  => 'tepat waktu'
        ]);
    }
}
