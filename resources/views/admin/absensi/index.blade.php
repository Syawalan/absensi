@extends('layouts.app')

@section('title', 'Absensi Pegawai')

@section('content')
<div class="card shadow-sm rounded-3 mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h5 class="mb-3">Absensi Harian</h5>
        </div>

        <form action="{{ route('admin.absensi.index') }}" method="get" class="row g-3 mb-4">
            <div class="col-md-3">
                <label for="" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Bulan</label>
                <input type="month" name="bulan" value="{{ request('bulan_filter') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Nama Pegawai</label>
                <input type="text" name="nama" value="{{ request('nama') }}" class="form-control" placeholder="Cari nama pegawai">
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Cari
                </button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Foto Masuk</th>
                        <th>Foto Pulang</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($absensi as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item->foto_masuk) }}" width="50" class="rounded-circle" alt="foto">
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $item->foto_pulang) }}" width="50" class="rounded-circle" alt="foto">
                        </td>
                        <td>{{$item->user->username}}</td>
                        <td>{{$item->tanggal}}</td>
                        <td>{{$item->jam_masuk ?? '-'}}</td>
                        <td>{{$item->jam_pulang ?? '-'}}</td>
                        <td>{{ucfirst($item->status)}}</td>
                        <td><a href="https://www.google.com/maps?q={{ $item->lat_masuk }},{{ $item->lng_masuk }}" target="_blank" class="btn btn-sm btn-outline-info">
                                <i class="bi bi-geo-alt"></i> Lihat
                            </a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-body-tertiary">Data ada data absensi</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($absensi instanceof Illuminate\Pagination\LengthAwarePaginator)
            <div class="p-3">
                {{ $absensi->links() }}
            </div>
        @endif
    </div>
</div>
@endsection