<?php

use App\Http\Controllers\AbsensiAdminController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class])->name('logout');

// route untuk admin dan fitur yang dapat diakses

Route::middleware('admin')->prefix('admin/dashboard')->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    Route::get('/admin/dashboard/data_pegawai', [UserController::class, 'index'])->name('admin.data_pegawai.index');
    Route::get('/admin/dashboard/data_pegawai/tambah', [UserController::class, 'create'])->name('admin.data_pegawai.create');
    Route::post('/admin/dashboard/data_pegawai', [UserController::class, 'store'])->name('admin.data_pegawai.store');
    Route::get('/admin/dashboard/data_pegawai/edit/{id}', [UserController::class, 'edit'])->name('admin.data_pegawai.edit');
    Route::put('/admin/dashboard/data_pegawai/{id}', [UserController::class, 'update'])->name('admin.data_pegawai.update');
    Route::delete('/admin/dashboard/data_pegawai/{user}', [UserController::class, 'destroy'])->name('admin.data_pegawai.destroy');
    
    Route::get('/admin/dashboard/absensi', [AbsensiAdminController::class, 'index'])->name('admin.absensi.index');
    
    Route::get('/admin/dashboard/rekapitulasi', [AbsensiAdminController::class, 'rekap'])->name('rekapitulasi.index');
    
    Route::get('/admin/dashboard/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::get('/admin/dashboard/setting/tambah', [SettingController::class, 'create'])->name('setting.create');
    Route::post('/admin/dashboard/setting', [SettingController::class, 'store'])->name('setting.store');
});


Route::middleware('pegawai')->prefix('pegawai')->group(function() {
    Route::get('/pegawai/dashboard', [UserController::class, 'index'])->name('pegawai.dahsboard');
    
    Route::post('/pegawai/absensi', [AbsensiController::class, 'absenMasuk'])->name('absenMasuk');
    Route::put('/pegawai/absensi/pulang', [AbsensiController::class, 'absenPulang'])->name('absenPulang');
    
    Route::get('/pegawai/absensi', function() {
        return view('pegawai.absensi.index');
    });
    
    Route::get('/pegawai/izin/create', [IzinController::class, 'create'])->name('izin.create');
    Route::post('/pegawai/izin', [IzinController::class, 'store'])->name('izin.store');
});

// route untuk pegawai dan fitur yang dapat diakses
