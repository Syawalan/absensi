<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/dashboard/data_pegawai', function() {
    return view('admin.data_pegawai.index');
})->name('pegawai.index');

Route::get('/dashboard/data_pegawai/tambah', function() {
    return view('admin.data_pegawai.create');
})->name('pegawai.create');

Route::get('/dashboard/absensi', function() {
    return view('admin.absensi.index');
})->name('absensi.index');

Route::get('/dashboard/setting', function() {
    return view('admin.setting.index');
})->name('setting.index');

Route::get('/dashboard/setting/tambah', function() {
    return view('admin.setting.create');
});

Route::get('/dashboard/rekapitulasi', function() {
    return view ('admin.rekapitulasi.index');
})->name('rekapitulasi.index');