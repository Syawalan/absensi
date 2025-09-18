<?php

use App\Http\Controllers\AbsensiAdminController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// admin.data_pegawai
Route::get('/dashboard/data_pegawai', [UserController::class, 'index'])->name('admin.data_pegawai.index');
Route::get('/dashboard/data_pegawai/tambah', [UserController::class, 'create'])->name('admin.data_pegawai.create');
Route::post('/dashboard/data_pegawai', [UserController::class, 'store'])->name('admin.data_pegawai.store');
Route::get('/dashboard/data_pegawai/edit/{id}', [UserController::class, 'edit'])->name('admin.data_pegawai.edit');
Route::put('/dashboard/data_pegawai/{id}', [UserController::class, 'update'])->name('admin.data_pegawai.update');
Route::delete('/dashboard/data_pegawai/{user}', [UserController::class, 'destroy'])->name('admin.data_pegawai.destroy');

Route::get('/dashboard/absensi', [AbsensiAdminController::class, 'index'])->name('admin.absensi.index');

Route::get('/dashboard/rekapitulasi', [AbsensiAdminController::class, 'rekap'])->name('rekapitulasi.index');

Route::get('/dashboard/setting', [SettingController::class, 'index'])->name('setting.index');
Route::get('/dashboard/setting/tambah', [SettingController::class, 'create'])->name('setting.create');
Route::post('/dashboard/setting', [SettingController::class, 'store'])->name('setting.store');


Route::get('/pegawai/dashboard', function() {
    return view('pegawai.dashboard');
});

Route::get('/pegawai/absensi', function() {
    return view('pegawai.absensi.index');
});