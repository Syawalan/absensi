@extends('layouts.app')

@section('title', 'Absensi Pegawai')

@section('content')
<div class="card shadow-sm rounded-3 mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h5 class="mb-3">Absensi Harian</h5>
            <button class="btn btn-outline-secondary me-2"><i class="bi bi-download"></i> Export</button>
        </div>

        <form action="" class="row g-3 mb-4">
            <div class="col-md-3">
                <label for="" class="form-label">Tanggal</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Bulan</label>
                <input type="month" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Nama Pegawai</label>
                <input type="text" class="form-control" placeholder="Cari nama pegawai">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-funnel"></i> Filter
                </button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Foto</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="https://via.placeholder.com/60" class="rounded-circle" alt="foto">
                        </td>
                        <td>Andi Pratama</td>
                        <td>2025-09-15</td>
                        <td>08:02</td>
                        <td>17:05</td>
                        <td><a href="#" class="btn btn-sm btn-outline-info">
                                <i class="bi bi-geo-alt"></i> Lihat
                            </a></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://via.placeholder.com/60" class="rounded-circle" alt="foto">
                        </td>
                        <td>Siti Rahma</td>
                        <td>2025-09-15</td>
                        <td>08:10</td>
                        <td>17:15</td>
                        <td><a href="#" class="btn btn-sm btn-outline-info">
                                <i class="bi bi-geo-alt"></i> Lihat
                            </a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection