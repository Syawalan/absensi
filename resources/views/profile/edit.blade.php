@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Profile {{ session('role') === 'admin' ? 'Admin' : 'Pegawai' }}</h2>

    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('PUT')

        @if (session('role') === 'admin')
        <div class="mb-3">
            <label for="nama_admin">Nama</label>
            <input type="text" name="nama_admin" class="form_control" value="{{ old('nama_admin') . $admin->nama_admin }}">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" class="form_control" value="{{ old('email') . $admin->email }}">
        </div>
        <div class="mb-3 gap-2">
            <label for="password_confirmation">Password Lama</label>
            <input type="password" name="password" class="form-control">
            <label for="password_confirmation">Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
        
        @elseif(session('key') === 'pegawai')
        <div class="mb-3">
            <label for="username">Nama</label>
            <input type="text" name="username" class="form_control" value="{{ old('username') . $user->username }}">
        </div>
        <div class="mb-3">
            <label for="email">Nama</label>
            <input type="text" name="email" class="form_control" value="{{ old('email') . $user->email }}">
        </div>
        <div class="mb-3 gap-2">
            <label for="password_confirmation">Password Lama</label>
            <input type="password" name="password" class="form-control">
            <label for="password_confirmation">Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
        @endif
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
