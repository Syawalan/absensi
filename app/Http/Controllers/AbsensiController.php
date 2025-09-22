<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Setting;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function absenMasuk(Request $request) {
        $user = Auth::user();
        $setting = Setting::first();

        $distance = $this->hitungJarak (
            $setting->latitude,
            $setting->longitude,
            $request->lat,
            $request->lng
        );

        if ($distance > $setting->radius_meter) {
            return response()->json(['error'=>'Di luar radius kantor'], 403);
        }

        $sudahAbsen = Absensi::where('user_id', $user->id)
            ->where('tanggal', now()->toDateString())
            ->exists();
        
        if($sudahAbsen) {
            return response()->json(['error' => 'Anda sudah absen masuk hari ini', 400]);
        }

        $request->validate([
            'foto_masuk' => 'required|image|max:2048'
        ]);

        $path = $request->file('foto_masuk')->store('absensi', 'public');

        Absensi::create([
            'user_id' => $user->id,
            'tanggal' => now()->toDateString(),
            'jam_masuk' => now()->toTimeString(),
            'foto_masuk' => $path,
            'lat_masuk' => $request->lat,
            'lng_masuk' => $request->lng,
            'status' => 'hadir'
        ]);

        return response()->json(['success' => 'Absensi masuk berhasil']);
    }

    public function absenPulang(Request $request) {
        $user = Auth::user();

        $absen = Absensi::where('user_id', $user->id)
        ->where('tanggal', now()->toDateString())
        ->first();

        if (!$absen) {
            return response()->json(['error' => 'Belum absen masuk'], 400);
        }

        if ($absen->jam_pulang) {
            return response()->json(['error' => 'Anda belum absen pulang'], 400);
        }

        $request->validate([
            'foto_pulang' => 'required|image|max:2048'
        ]);

        $path = $request->file('foto_pulang')->store('absensi', 'public');

        $absen->update([
            'jam_pulang' => now()->toTimeString(),
            'foto_pulang' => $path,
            'lat_pulang' => $request->lat,
            'lng_pulang' => $request->lng
        ]);

        return response()->json(['success' => 'Absensi pulang berhasil']);
    }

    public function rekap(Request $request) {
        $data = Absensi::with('user')->when($request->bulan, function($q) use ($request) {
            $q->whereMonth('tanggal', $request->bulan);
        })
        ->when($request->tahun, function($q) use ($request) {
            $q->whereYear('tanggal', $request->tahun);
        })
        ->get();

        return response()->json([$data]);
    }

    private function hitungJarak($lat1, $lon1, $lat2, $lon2) {
        $earthRadius = 6371000;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat/2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);
        
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        return $earthRadius * $c;

    }
}
