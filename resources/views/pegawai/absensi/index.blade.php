@extends('layouts.app');

@section ('title', 'Absensi')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
            <h3 class="fs-4 fw-bold">Absensi Pegawai</h3>
        </div>
        <nav aria-label="breadrumb" class="mt-2 mt-md-0">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">Dashboard</li>
                <li class="breadcrumb-item">Absensi</li>
            </ol>
        </nav>
    </div>

    <form action="">
        <div class="mb-4">
            <label for="" class="block text-sm mb-2">Ambil Foto</label>
            <input type="file" name="foto" accept="image/*" capture="camera" required class="border rounded-2 w-full">
        </div>

        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">

        <div class="flex space-x-4">
            <button type="submit" name="status" value="masuk" class="bg-green-500 text-white px-4 py-2 rounded">Absen Masuk</button>
            <button type="submit" name="status" value="pulang" class="bg-blue-500 text-white px-4 py-2 rounded">Absen Pulang</button>
            <button type="submit" name="status" value="izin" class="bg-yellow-500 text-white px-4 py-2 rounded">Izin</button>
            <button type="submit" name="status" value="sakit" class="bg-red-500 text-white px-4 py-2 rounded">Sakit</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition((position) => {
                document.getElementById('latitdue').value = position.coords.latitude
                document.getElementById('longitude').value = position.coords.longitude
            }, () => {
                alert('Aktifkan GPS untuk melakukan absensi')
            })
        } else {
            alert('Browser tidak mendukung GPS !')
        }
    })
</script>
@endsection