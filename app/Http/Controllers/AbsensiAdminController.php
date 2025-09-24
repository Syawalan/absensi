<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiAdminController extends Controller
{
    public function index(Request $request)
    {
        $absensi = Absensi::with('user')->when($request->bulan, function($q) use ($request) {
            $q->whereMonth('tanggal', $request->bulan);
        })
        ->when($request->tahun, function ($q) use ($request) {
            $q->whereYear('tanggal', $request->tahun);
        })
        ->orderBy('tanggal', 'desc')
        ->get();

        return view ('admin.absensi.index', compact('absensi'));
    }

    public function rekap(Request $request) 
    {
        $bulan = $request->bulan ?? now()->month;
        $tahun = $request->tahun ?? now()->year;

        $start = Carbon::createFromDate($tahun, $bulan, 1)->startOfMonth();
        $end = Carbon::createFromDate($tahun, $bulan, 1)->endOfYear();

        $hariKerja = CarbonPeriod::create($start, $end)
            ->filter(function($date) {
                return $date->isWeekday();
            })
            ->count();
        
        $rekap = DB::table('absensi')
            ->select(
                'user_id',
                'users.username',
                DB::raw("SUM(CASE WHEN status = 'hadir' THEN 1 ELSE 0 END) as total_hadir"),
                DB::raw("SUM(CASE WHEN status = 'izin' THEN 1 ELSE 0 END) as total_izin"),
                DB::raw("SUM(CASE WHEN status = 'sakit' THEN 1 ELSE 0 END) as total_sakit"),
                DB::raw("SUM(CASE WHEN status = 'alpha' THEN 1 ELSE 0 END) as total_alpha"),
            )
            ->join('users', 'absensi.user_id', '=', 'users.id')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy('absensi.user_id', 'users.username')
            ->get();
        return view('admin.rekapitulasi.index', compact('rekap', 'bulan', 'tahun', 'hariKerja'));
    }
}
