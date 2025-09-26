@extends('layouts.app')

@section('title', 'Setting')

@section('content')
<div class="card shadow-sm rounded-3 my-4">
    <div class="card-body">
        <div class="d-flex justify-content-between mb-3">
            <h5 class="mb-3">Daftar Pengaturan Lokasi Kantor</h5>
            <a class="btn btn-primary" href="{{ route('setting.create') }}"><i class="bi bi-plus-lg"></i>Tambah Data Setting</a>
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
                    @if ($setting)
                    <tr>
                        <td>{{ $setting->nama_kantor }}</td>
                        <td>{{ $setting->latitude }}</td>
                        <td>{{ $setting->longitude }}</td>
                        <td>{{ $setting->radius_meter }}</td>
                        <td>{{ $setting->updated_at->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex flex-column flex-md-row gap-2">
                            <a href="{{ route('setting.edit',$setting->id) }}" class="btn btn-md btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection