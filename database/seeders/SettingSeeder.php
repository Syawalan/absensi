<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'nama_kantor' => 'Dinas Perpustakaan dan Kearsipan Kabupaten Kampar',
            'latitude' => 0.295004,
            'longitude' => 101.027513,
            'radius_meter' => 100
        ]);
    }
}
