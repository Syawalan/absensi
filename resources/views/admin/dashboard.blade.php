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
                        <div class="stat-value">3,782</div>
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
                        <div class="stat-value">5,359</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Target (Gauge) -->
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h6 class="fw-bold">Monthly Target</h6>
                <div class="gauge-container">
                    <canvas id="gaugeChart"></canvas>
                    <div class="gauge-center">
                        <h3>75.55%</h3>
                        <span class="badge bg-success">+10%</span>
                    </div>
                </div>
                <p class="text-muted small">
                    You earn $3287 today, it's higher than last month.<br>
                    Keep up your good work!
                </p>
                <div class="d-flex justify-content-around border-top pt-2 mt-2">
                    <div class="text-center">
                        <p class="mb-0 text-muted small">Target</p>
                        <strong>$20K</strong> <span class="trend-down"><i class="bi bi-arrow-down"></i></span>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 text-muted small">Revenue</p>
                        <strong>$20K</strong> <span class="trend-up"><i class="bi bi-arrow-up"></i></span>
                    </div>
                    <div class="text-center">
                        <p class="mb-0 text-muted small">Today</p>
                        <strong>$20K</strong> <span class="trend-up"><i class="bi bi-arrow-up"></i></span>
                    </div>
                </div>
            </div>
        </div>
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