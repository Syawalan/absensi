@extends('layouts.app')

@section('content')
<div class="card shadow-sm rounded-3 mb-4">
    <div class="card-body">
        <h5 class="mb-3">Pengaturan Lokasi Kantor</h5>

        <form action="{{ route('setting.update', $setting->id) }}" method="post" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Nama Kantor</label>
                <input type="text" name="nama_kantor" value="{{ old('nama_kantor', $setting->nama_kantor) }}" class="form-control" placeholder="Masukkan nama kantor">
            </div>
            <div class="col-md-6">
                <label class="form-label">Latitude</label>
                <input type="text" name="latitude" value="{{ old('latitude', $setting->latitude) }}" class="form-control" placeholder="-6.200000">
            </div>
            <div class="col-md-6">
                <label class="form-label">Longitude</label>
                <input type="text" name="longitude" value="{{ old('longitude', $setting->longitude) }}" class="form-control" placeholder="106.816666">
            </div>
            <div class="col-md-6">
                <label class="form-label">Radius (meter)</label>
                <input type="number" name="radius_meter" value="{{ old('radius_meter', $setting->radius_meter) }}" class="form-control" placeholder="Contoh: 100">
            </div>
            
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection