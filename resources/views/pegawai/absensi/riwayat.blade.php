@extends('layouts.app')

@section('title', 'presensi')

@section('content')
<div class="card shadow-sm rounded-3 mt-3 mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="mb-3">Riwayat Presensi</h3>
        </div>
        <table class="table table-striped mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Jam Masuk</th>
                    <th>Foto Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Foto Pulang</th>
                </tr>
            </thead>
            <tbody>
                @forelse($riwayat as $absensi)
                <tr>
                    <td>
                        {{ Carbon\Carbon::parse($absensi->tanggal)->format('d-m-y') }}
                    </td>
                    <td>
                        @if($absensi->status === 'hadir')
                        <span class="badge bg-success">Hadir</span>
                        @elseif($absensi->status === 'izin')
                        <span class="badge bg-inf0">Izin</span>
                        @elseif($absensi->status === 'sakit')
                        <span class="badge bg-warning">Sakit</span>
                        @else
                        <span class="badge bg-danger">Alpha</span>
                        @endif
                    </td>
                    <td>{{ $absensi->jam_masuk ?? '-' }}</td>
                    <td>
                        @if($absensi->foto_masuk)
                            <img src="{{ asset('storage/' . $absensi->foto_masuk) }}" 
                                 alt="Foto Masuk" width="80" height="80" 
                                 style="object-fit: cover; border-radius: 8px;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>{{ $absensi->jam_pulang ?? '-' }}</td>
                    <td>
                        @if($absensi->foto_pulang)
                            <img src="{{ asset('storage/' . $absensi->foto_pulang) }}" 
                                 alt="Foto Pulang" width="80" height="80" 
                                 style="object-fit: cover; border-radius: 8px;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada riwayat presensi</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $riwayat->links() }}
    </div>
</div>
@endsection