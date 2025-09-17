@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fs-4 fw-bold">Edit Pegawai</h3>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"></a>Dashboard</li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div>

    <div class="card shadow-sm rounded-3">
        <div class="card-body">
            <h5 class="mb-3">Data Pegawai</h5>

            <form action="{{ route('data-pegawai.update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" placeholder="Masukan nama pegawai">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="Masukan email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password (opsional)</label>
                    <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $user->tempat_lahir) }}" placeholder="Masukan tempat lahir">
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $user->tgl_lahir) }}" placeholder="Masukan tanggal lahir pegawai">
                </div>
                <div class="mb-3">
                    <label for="bidang" class="form-label">Bidang</label>
                    <input type="text" name="bidang" class="form-control" value="{{ old('bidang', $user->bidang) }}" placeholder="Masukan jabatan pegawai">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" placeholder="Masukan nama pegawai">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>

                <div class="card shadow-sm rounded-3 mt-4">
                    <div class="card-body">
                        <h5 class="mb-3">Foto Pegawai</h5>

                        @if ($user->foto)
                        <div class="mb-3 text-center">
                            <img src="{{ asset('storage/'.$user->foto) }}" alt="foto pegawai" class="img-thumbnail" width="150">
                        </div>
                        @endif

                        <div class="border border-2 border-dashed rounded-3 p-5 text-center" style="border-style: dashed !important;">
                            <label for="foto" class="d-block" style="cursor: pointer;">
                                <div class="mb-3">
                                    <i class="bi bi-upload fs-1"></i>
                                </div>
                                <p class="mb-1"><strong>Klik untuk upload</strong></p>
                                <small class="text-muted">JPG, PNG, JPEG</small>
                            </label>
                            <input type="file" id="foto" name="foto" class="d-none" accept="image/*">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection