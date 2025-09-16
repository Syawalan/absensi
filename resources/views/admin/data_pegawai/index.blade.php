@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
<div class="container-fluid p-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h3 class="fs-4 fw-bold">Pegawai</h3>
        </div>
        <nav aria-label="breadcrumb" class="mt-2 mt-md-0">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                <li class="breadcrumb-item active">Pegawai</li>
            </ol>
        </nav>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
        <div class="input-group" style="max-width: 300px;">
            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
            <input type="text" class="form-control border-start-0" placeholder="Search...">
        </div>
        <div class="d-flex flex-wrap gap-2">
            <button class="btn btn-outline-secondary"><i class="bi bi-download"></i> Export</button>
            <a class="btn btn-primary" href="{{ route('pegawai.create') }}"><i class="bi bi-plus-lg"></i> Tambah Data Pegawai</a>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm rounded">
        <div class="card-body p-0">
            <!-- Table wrapper -->
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tgl Data</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh Data -->
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img style="width: 48px;" src="https://via.placeholder.com/48" class="rounded me-2" alt="Foto">
                                    <span>John Doe</span>
                                </div>
                            </td>
                            <td>johndoe@gmail.com</td>
                            <td>01 Jan 1990</td>
                            <td>Staff IT</td>
                            <td>Pekanbaru</td>
                            <td>15 Sep 2025</td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <button class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <!-- End Contoh Data -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
