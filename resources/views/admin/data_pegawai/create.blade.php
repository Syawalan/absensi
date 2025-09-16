@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fs-4 fw-bold">Pegawai</h3>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div>

    <!-- form -->
    <div class="card shadow-sm rounded-3">
        <div class="card-body">
            <h5 class="mb-3">Data Pegawai</h5>

            <form action="">
                <div class="mb-3">
                    <label for="" class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Masukkan nama pegawai">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" placeholder="Masukkan Email">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control" placeholder="Masukkan tempat lahir">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal lahir</label>
                    <input type="date" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" placeholder="Masukkan jabatan pegawai">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Alamat</label>
                    <input type="text" class="form-control" placeholder="Masukkan alamat pegawai">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Data</label>
                    <input type="Date" class="form-control">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- foto -->
     <div class="card shadow-sm rounded-3 mt-4">
        <div class="card-body">
            <h5 class="mb-3">Foto Pegawai</h5>

            <div class="border border-2 border-dashed rounded-3 p-5 text-center" style="border-style: dashed !important;">
                <label for="foto" class="d-block"  style="cursor: pointer;">
                    <div class="mb-3">
                        <i class="bi bi-upload fs-1"></i>
                    </div>
                    <p class="mb-1"><strong>Klik untuk upload</strong></p>
                    <small class="text-muted">JPG, PNG, JPEG</small>
                </label>
                <input type="file" id="foto" class="d-none" accept="image/*">
            </div>
        </div>
     </div>
</div>
@endsection