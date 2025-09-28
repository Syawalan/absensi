@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h4 class="fs-4 fw-bold">Profile</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                {{-- Foto Profil --}}
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <div class="position-relative d-inline-block">
                        @if(session('role') === 'admin')
                            <img src="{{ asset('images/admin-avatar.png') }}"
                                 class="rounded-circle border"
                                 width="150" height="150" alt="Foto Admin">
                        @else
                            <img src="{{ $user->foto ? asset('storage/' . $user->foto) : asset('images/default-avatar.png') }}"
                                 class="rounded-circle border"
                                 width="150" height="150" alt="Foto Pegawai">
                        @endif
                        <span class="position-absolute top-0 start-100 translate-middle badge bg-light border">
                            <i class="bi bi-camera"></i>
                        </span>
                    </div>
                </div>

                {{-- Detail Info --}}
                <div class="col-md-8">
                    @if (session('role') === 'admin')
                        <h5 class="fw-bold mb-1">{{ $admin->nama_admin }}</h5>
                        <p class="text-muted mb-2">Administrator</p>
                        <p class="mb-1"><i class="bi bi-envelope me-2"></i>{{ $admin->email }}</p>
                        <p class="mb-1"><i class="bi bi-telephone me-2"></i>{{ $admin->phone ?? '-' }}</p>
                        <p class="mb-1"><i class="bi bi-geo-alt me-2"></i>{{ $admin->alamat ?? '-' }}</p>
                    @else
                        <h5 class="fw-bold mb-1">{{ $user->username }}</h5>
                        <p class="text-muted mb-2">{{ $user->bidang ?? 'Pegawai' }}</p>
                        <p class="mb-1"><i class="bi bi-envelope me-2"></i>{{ $user->email }}</p>
                        <p class="mb-1"><i class="bi bi-geo-alt me-2"></i>{{ $user->alamat }}</p>
                        <p class="mb-1"><i class="bi bi-calendar me-2"></i>
                            {{ $user->tgl_lahir ? \Carbon\Carbon::parse($user->tgl_lahir)->format('d M Y') : '-' }}
                        </p>
                    @endif

                    <div class="mt-3">
                        <a class="btn btn-primary rounded-pill px-4" href="{{ route('profile.edit') }}">
                            <i class="bi bi-pencil me-2"></i>Edit Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection