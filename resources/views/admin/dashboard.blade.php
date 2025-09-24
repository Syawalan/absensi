@extends('layouts.app')

@section('content')
    <div class="container py-4">
    <div class="row g-4">
        <!-- Pegawai Honorer -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-light p-3 rounded">
                        <i class="bi bi-people fs-2 text-secondary"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-0 text-muted">Pegawai Honorer</p>
                        <div class="stat-value">{{ $jumlahUser }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Absen -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-light p-3 rounded">
                        <i class="bi bi-box fs-2 text-secondary"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-0 text-muted">Absen</p>
                        <div class="stat-value">{{ $jumlahAbsensi }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Target (Gauge) -->
    </div>
</div>

<script>
    // Gauge Chart
    const ctxGauge = document.getElementById('gaugeChart').getContext('2d');
    new Chart(ctxGauge, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [75, 25],
                backgroundColor: ['#4e73df', '#e9ecef'],
                borderWidth: 0
            }]
        },
        options: {
            rotation: -90,
            circumference: 180,
            cutout: '80%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: false
                }
            }
        }
    });

    // Sales Bar Chart
    const ctxSales = document.getElementById('salesChart').getContext('2d');
    new Chart(ctxSales, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Sales',
                data: [150, 370, 180, 280, 160, 170, 260, 90, 180, 350, 250, 100],
                backgroundColor: '#4e73df',
                borderRadius: 8
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection