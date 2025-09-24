@extends ('layouts.app')

@section ('title', 'dashboard | pegawai')

@section('content')
<div class="row mt-3">
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <div class="d-flex align-items-center">
                <div class="bg-light p-3 rounded">
                    <i class="bi bi-people fs-2 text-secondary"></i>
                </div>
                <div class="ms-3">
                    <p>Total Kehadiran</p>
                    <div class="stat-value">{{ $totalHadir }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <div class="d-flex align-items-center">
                <div class="bg-light p-3 rounded">
                    <i class="bi bi-people fs-2 text-secondary"></i>
                </div>
                <div class="ms-3">
                    <p>Total Izin</p>
                    <div class="stat-value">{{$totalIzin}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm p-3">
            <div class="d-flex align-items-center">
                <div class="bg-light p-3 rounded">
                    <i class="bi bi-people fs-2 text-secondary"></i>
                </div>
                <div class="ms-3">
                    <p>Total Sakit</p>
                    <div class="stat-value">{{$totalSakit}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection