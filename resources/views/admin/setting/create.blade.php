@extends('layouts.app')

@section('content')
<div class="card shadow-sm rounded-3 mb-4">
    <div class="card-body">
        <h5 class="mb-3">Pengaturan Lokasi Kantor</h5>

        <form class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nama Kantor</label>
                <input type="text" class="form-control" placeholder="Masukkan nama kantor">
            </div>
            <div class="col-md-6">
                <label class="form-label">Radius (meter)</label>
                <input type="number" class="form-control" placeholder="Contoh: 100">
            </div>
            <div class="col-md-6">
                <label class="form-label">Latitude</label>
                <input type="text" class="form-control" placeholder="-6.200000">
            </div>
            <div class="col-md-6">
                <label class="form-label">Longitude</label>
                <input type="text" class="form-control" placeholder="106.816666">
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