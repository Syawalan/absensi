<?php

use App\Http\Controllers\AbsensiAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

// admin.data_pegawai
Route::get('/dashboard/data_pegawai', [UserController::class, 'index'])->name('data-pegawai.index');
Route::get('/dashboard/data_pegawai/tambah', [UserController::class, 'create'])->name('data-pegawai.create');
Route::post('/dashboard/data_pegawai', [UserController::class, 'store'])->name('data-pegawai.store');
Route::get('/dashboard/data_pegawai/edit', [UserController::class, 'edit'])->name('data-pegawai.edit');
Route::put('/dashboard/data_pegawai/{id}', [UserController::class, 'update'])->name('data-pegawai.update');
Route::delete('/dashboard/data_pegawai/{id}', [UserController::class, 'destroy'])->name('data-pegawai.destroy');

Route::get('/dashboard/absensi', [AbsensiAdminController::class, 'index'])->name('admin.absensi.index');

Route::get('/dashboard/setting', function() {
    return view('admin.setting.index');
})->name('setting.index');

Route::get('/dashboard/setting/tambah', function() {
    return view('admin.setting.create');
});

Route::get('/dashboard/rekapitulasi', [AbsensiAdminController::class, 'rekap'])->name('rekapitulasi.index');