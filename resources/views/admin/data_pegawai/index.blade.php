@extends('layouts.app')

@section('title', 'Data Pegawai')

@section('content')
<div class="container-fluid p-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h3 class="fs-4 fw-bold">Pegawai</h3>
        </div>
        <nav aria-label="breadcrumb" class="mt-2 mt-md-0">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href={{ route('admin.dashboard') }}>Dashboard</a></li>
                <li class="breadcrumb-item active">Pegawai</li>
            </ol>
        </nav>
    </div>

    <!-- Actions -->
    <div class="d-flex justify-content-between mb-3 flex-wrap gap-2">
        <form action="{{ route('admin.data_pegawai.index') }}" method="get" class="mb-3">
            <div class="input-group" style="max-width: 300px;">
                <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Search...">
            </div>
        </form>
        <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-primary" href="{{ route('admin.data_pegawai.create') }}"><i class="bi bi-plus-lg"></i> Tambah Data Pegawai</a>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm rounded">
        <div class="card-body p-0">
            <!-- Table wrapper -->
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">TTL</th>
                            <th scope="col">Bidang</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img style="width: 48px;" src="{{ asset('storage/'.$user->foto) }}" class="rounded me-2" alt="Foto">
                                    <span>{{$user->username}}</span>
                                </div>
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->tempat_lahir}}, {{ \Carbon\Carbon::parse($user->tgl_lahir)->format('d M Y') }}</td>
                            <td>{{$user->bidang}}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>
                                <div class="d-flex flex-wrap gap-1">
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.data_pegawai.edit', $user->id) }}"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.data_pegawai.destroy', $user->id) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-body-tertiary">Data pegawai masih kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($users instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="p-3">
                {{ $users->links() }}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
