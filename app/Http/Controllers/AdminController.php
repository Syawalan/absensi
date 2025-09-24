<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahUser = User::count();
        $jumlahAbsensi = Absensi::whereDate('tanggal', Carbon::today())->distinct('user_id')->count('user_id');
        $setting = Setting::first();

        return view('admin.dashboard', compact('jumlahUser', 'jumlahAbsensi', 'setting'));
    }
}
