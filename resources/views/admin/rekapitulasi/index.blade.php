@extends('layouts.app')

@section('title', 'Rekapitulasi Absensi')

@section('content')
<div class="container-fluid">
    <h4 class=" fs-4 my-4 fw-bold">Rekapitulasi Absensi</h4>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('rekapitulasi.index') }}" method="get" class="row g-3">
                <div class="col-md-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select class="form-select" name="bulan" id="bulan">
                        @foreach ( [
                        1=>'Januari',2=>'Februari',3=>'Maret',4=>'April',
                        5=>'Mei',6=>'Juni',7=>'Juli',8=>'Agustus',
                        9=>'September',10=>'Oktober',11=>'November',12=>'Desember'
                        ] as $num => $nama)

                        <option value="{{ $num }}" {{ $bulan == $num ? 'selected' : '' }}>
                            {{ $nama }}
                        </option>

                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="tahun" class="form-label">Pilih Tahun</label>
                    <select class="form-select" name="tahun" id=tahun"">
                        <option selected>Pilih Tahun</option>
                        @for ($y = now()->year; $y >=2020; $y--)
                        <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>
                            {{ $y }}
                        </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-3 align-self-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>NO</th>
                            <th>Nama Pegawai</th>
                            <th>Total Hari Kerja</th>
                            <th>Hadir</th>
                            <th>Izin</th>
                            <th>Sakit</th>
                            <th>Alpha</th>
                            <th>Persentase Kehadiran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekap as $r)
                        @php
                        $totalAbsensi = $r->total_hadir + $r->total_izin + $r->total_sakit + $r->total_alpha;
                        $persentase = $hariKerja > 0 ? round(($r->total_hadir / $hariKerja) * 100, 2) : 0;
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $r->username }}</td>
                            <td>{{$hariKerja}}</td>
                            <td>{{$r->total_hadir}}</td>
                            <td>{{ $r->total_izin }}</td>
                            <td>{{ $r->total_sakit }}</td>
                            <td>{{ $r->total_alpha }}</td>
                            <td><span class="badge bg-success">{{ $persentase }}%</span></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-body-tertiary">Data ada absensi</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection