<?php

use App\Http\Controllers\AbsensiAdminController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->prefix('admin')->group(function (){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('data_pegawai')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('admin.data_pegawai.index');
        Route::get('/tambah', [UserController::class, 'create'])->name('admin.data_pegawai.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.data_pegawai.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.data_pegawai.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('admin.data_pegawai.update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.data_pegawai.destroy');
    });

    Route::get('/absensi', [AbsensiAdminController::class, 'index'])->name('admin.absensi.index');

    Route::get('/rekapitulasi', [AbsensiAdminController::class, 'rekap'])->name('rekapitulasi.index');

    Route::prefix('setting')->group(function() {
        Route::get('/', [SettingController::class, 'index'])->name('setting.index');
        Route::get('/tambah', [SettingController::class, 'create'])->name('setting.create');
        Route::post('/', [SettingController::class, 'store'])->name('setting.store');
        Route::get('/edit/{id}', [SettingController::class, 'edit'])->name('setting.edit');
        Route::put('/{id}', [SettingController::class, 'update'])->name('setting.update');
    });

    Route::prefix('profile')->group(function() {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
    });
});

Route::middleware(['pegawai'])->prefix('pegawai')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboardPegawai'])->name('pegawai.dashboard');

    Route::prefix('profile')->group(function() {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::get('/absensi', [AbsensiController::class, 'index'])->name('pegawai.absensi.index');

    Route::post('/absensi', [AbsensiController::class, 'absenMasuk'])->name('absenMasuk');
    Route::put('/absensi/pulang', [AbsensiController::class, 'absenPulang'])->name('absenPulang');

    Route::get('/izin', [IzinController::class, 'create'])->name('pegawai.izin.create');
    Route::post('/izin/tambah', [IzinController::class, 'store'])->name('pegawai.izin.store');
});