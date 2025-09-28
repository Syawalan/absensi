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
            <input type="text" name="nama_admin" class="form-control" value="{{ old('nama_admin' , $admin->nama_admin )}}">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email' , $admin->email) }}">
        </div>
        <div class="mb-3 gap-2">
            <label for="password">Password Lama</label>
            <div class="input-group">
                <input type="password" id="password" name="password"
                    value="{{ old('password') }}" class="form-control">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <i class="bi bi-eye"></i>
                </button>
            </div>

            <label for="password_confirmation" class="mt-3">Password Baru</label>
            <div class="input-group">
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="form-control">
                <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>

        @elseif(session('role') === 'pegawai')
        <div class="mb-3">
            <label for="username">Nama</label>
            <input type="text" name="username" class="form-control" value="{{ old('username' ,  $user->username) }}">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{ old('email', ) }}">
        </div>
        <div class="mb-3 gap-2">
            <label for="password">Password Lama</label>
            <div class="input-group">
                <input type="password" id="password" name="password"
                    value="{{ old('password') }}" class="form-control">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                    <i class="bi bi-eye"></i>
                </button>
            </div>

            <label for="password_confirmation" class="mt-3">Password Baru</label>
            <div class="input-group">
                <input type="password" id="password_confirmation" name="password_confirmation"
                    class="form-control">
                <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Simpan</button>
        @endif
        <a href="{{ route('profile.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    // Toggle untuk password lama
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const icon = this.querySelector('i');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    });

    // Toggle untuk password baru
    document.getElementById('togglePasswordConfirm').addEventListener('click', function() {
        const passwordInput = document.getElementById('password_confirmation');
        const icon = this.querySelector('i');
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    });
</script>
@endsection