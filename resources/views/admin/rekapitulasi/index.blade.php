@extends('layouts.app')

@section('title', 'Rekapitulasi Absensi')

@section('content')
<div class="container-fluid">
    <h4 class=" fs-4 my-4 fw-bold">Rekapitulasi Absensi</h4>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-3">
                    <label for="" class="form-label">Bulan</label>
                    <select class="form-select" name="" id="">
                        <option value="" selected>Pilih Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="" class="form-label">Pilih Tahun</label>
                    <select class="form-select" name="" id="">
                        <option selected>Pilih Tahun</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <button class="btn btn-outline-secondary me-2"><i class="bi bi-download"></i> Export</button>
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
                            <td>{{$r->totalHadir}}</td>
                            <td>{{ $r->totalIzin }}</td>
                            <td>{{ $r->totalSakit }}</td>
                            <td>{{ $r->totalAlpha }}</td>
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