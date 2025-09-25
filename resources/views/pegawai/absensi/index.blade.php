@extends('layouts.app');

@section ('title', 'Absensi')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h3 class="fs-4 fw-bold">Absensi</h3>
        </div>
        <nav aria-label="breadrumb" class="mt-2 mt-md-0">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item ">Dashboard</li>
                <li class="breadcrumb-item">Absensi</li>
            </ol>
        </nav>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            @if (!$absensi)
            <div>
                <h3 class="fs-4 fw-bold">Silahkan Absen Masuk</h3>
            </div>
            <p><strong>Tanggal:</strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
            <form action="{{ route('absenMasuk') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Upload Foto Masuk</label>
                    <input type="file" class="form-control" name="foto_masuk" required>
                </div>
                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
            @elseif ($absensi && !$absensi->jam_pulang)
            <div>
                <h3 class="fs-4 fw-bold">Silahkan Absen Pulang</h3>
            </div>
            <p><strong>Tanggal:</strong>{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</p>
            <form action="{{ route('absenPulang', $absensi->id) }}" method="post" enctype="multipart/form-data" required>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Upload Foto Pulang</label>
                    <input type="file" name="foto_pulang" class="form-control" required>
                </div>
                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lng" id="lng">
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
            @else
            <div class="alert alert-info">
                Anda sudah melakukan absen masuk & pulang hari ini!
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                document.getElementById('lat').value = position.coords.latitude
                document.getElementById('lng').value = position.coords.longitude
            }, () => {
                alert('Aktifkan GPS untuk melakukan absensi')
            })
        } else {
            alert('Browser tidak mendukung GPS !')
        }
    })
</script>
@endsection