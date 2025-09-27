@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h4 class="fs-4 fw-bold">Profile {{ session('role') === 'admin' ? 'admin' : 'pegawai' }}</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow-sm rounded mb-4">
        @if (session('role') === 'admin')
        <div class="card-body d-flex align-items-center flex-wrap gap-3">
            <div>
                <h5>{{ $admin->nama_admin }}</h5>
                <p class="text-muted mb-1">Administrator</p>
                <small class="text-muted"><i class="bi bi-envelope"></i> {{ $admin->email }}</small>
            </div>
            <div class="ms-auto">
                <a class="btn btn-warning" href="{{ route('profile.edit') }}"><i class="bi bi-pencil"></i></a>
            </div>
        </div>

        @elseif (session('role') === 'pegawai')
        <div class="card-body">
            <div class="row mb-2 d-flex flex-wrap align-items-center gap-3">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $user->foto) }}"
                        class="rounded-circle" width="100" height="100" alt="Foto Pegawai">
                </div>
                <div class="col-md-6">
                    <div class="">Email:<strong> {{ $user->email }}</strong></div>
                    <div class="">Bidang:<strong>{{ $user->bidang }}</strong></div>
                </div>
            </div>
            <div class="d-flex flex-wrap align-items-center row mb-2">
                <div class="col-md-6">Tempat Tanggal Lahir:<strong>{{ $user->tempat_lahir }}</strong></div>
                <div class="col-md-6">Tanggal Lahir:
                    {{ $user->tgl_lahir ? \Carbon\Carbon::parse($user->tgl_lahir)->format('d M Y') : '-' }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"><strong>Alamat:</strong> {{ $user->alamat }} </div>
            </div>
            <div class="ms-auto">
                <a class="btn btn-warning" href="{{ route('profile.edit') }}"><i class="bi bi-pencil"></i></a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection