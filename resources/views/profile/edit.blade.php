@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Profile</h2>

    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" 
                   name="{{ session('role') === 'admin' ? 'nama_admin' : 'username' }}" 
                   value="{{ old(session('role') === 'admin' ? 'nama_admin' : 'username', 
                           session('role') === 'admin' ? $user->nama_admin : $user->username) }}" 
                   class="form-control">
            @error(session('role') === 'admin' ? 'nama_admin' : 'username')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password (kosongkan jika tidak diganti)</label>
            <input type="password" name="password" class="form-control">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
