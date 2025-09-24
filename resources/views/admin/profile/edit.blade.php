@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Profile</h2>

    <form action="{{ route('profile.update', $admin->id) }}" method="post">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama_admin" value="{{ old('nama_admin', $admin->nama_admin) }}" class="form-control">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $admin->email) }}" class="form-control">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password (kosongkan jika tidak diganti)</label>
            <input type="password" name="password" class="form-control">
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection