@extends('layouts.app')

@section('title', 'Setting')

@section('content')
<div class="card shadow-sm rounded-3 my-4">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h5 class="mb-3">Daftar Pengaturan Lokasi Kantor</h5>
            <a class="btn btn-primary" href=""><i class="bi bi-plus-lg"></i>Tambah Data Setting</a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle border rounded-3">
                <thead class="table-light">
                    <tr>
                        <th>Nama Kantor</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Radius (meter)</th>
                        <th>Dibuat Pada</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Kantor Pusat</td>
                        <td>-6.200000</td>
                        <td>106.816666</td>
                        <td>100</td>
                        <td>15 Sep 2025</td>
                        <td>
                            <div class="d-flex flex-column flex-md-row gap-2">
                            <a href="#" class="btn btn-md btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <a href="#" class="btn btn-md btn-danger">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection