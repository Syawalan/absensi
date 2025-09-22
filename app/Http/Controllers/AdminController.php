<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahUser = User::count();
        $jumlahAbsensi = Absensi::count();
        $setting = Setting::first();

        return view('admin.dashboard', compact('jumlahUser', 'jumlahAbsensi', 'setting'));
    }
}
