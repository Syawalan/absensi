@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Profile</h2>
    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div>
                <!-- Nama dan email bisa admin atau pegawai -->
                <h4 class="mb-1">{{ session('role') === 'admin' ? $user->nama_admin : $user->username }}</h4>
                <p class="mb-0 text-muted">{{ $user->email }}</p>
            </div>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection