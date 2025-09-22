@extends('layouts.app');

@section('title', 'Pengajuan Izin/Sakit')

@section('content')
<div class="container mt-4">
    <h4 class="mb-3">Pengajuan Izin</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('izin.store') }}" method="post" enctype="multipart/form-data" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Jenis Pengajuan</label>
            <select name="jenis" class="form-select" id="" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="alasan" class="form-label">Alasan</label>
            <textarea name="alasan" class="form-control" id="alasan" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="lampiran" class="form-label">Lampiran</label>
            <input type="file" class="form-control" id="lampiran">
            <small class="text-muted">Format: jpg, jpeg, png, pdf (max 2mb)</small>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
    </form>
</div>
@endsection