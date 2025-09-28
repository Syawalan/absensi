<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            width: 260px;
            background-color: #fff;
            border-right: 1px solid #e5e7eb;
            padding: 1rem;
        }

        .sidebar .nav-link {
            color: #374151;
            font-weight: 500;
            border-radius: 0.5rem;
            padding: 0.6rem 1rem;
        }

        .sidebar .nav-link.active {
            background-color: #eef2ff;
            color: #4f46e5;
        }

        .sidebar .nav-link:hover {
            background-color: #f3f4f6;
        }

        .badge-new {
            font-size: 0.7rem;
            background-color: #d1fae5;
            color: #065f46;
            border-radius: 0.5rem;
            padding: 0.25rem 0.5rem;
        }

        .search-box {
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .search-box input {
            border: none;
            box-shadow: none;
        }

        .icon-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 10px;
            background-color: #fff;
        }

        .icon-btn .notify {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 10px;
            height: 10px;
            background-color: orange;
            border-radius: 50%;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .card {
            border-radius: 15px;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .trend-up {
            color: #198754;
            font-size: 0.9rem;
        }

        .trend-down {
            color: #dc3545;
            font-size: 0.9rem;
        }

        .gauge-container {
            position: relative;
            width: 100%;
            height: 250px;
        }

        .gauge-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .gauge-center h3 {
            margin: 0;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            @if (session('role') === 'admin')
            <!-- Sidebar (default tampil di desktop, offcanvas di mobile) -->
            <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileSidebar">
                <div class="offcanvas-header">
                    <h5 class="fw-bold">PRESENSI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <!-- Isi sidebar (copy paste dari sidebar aslinya) -->
                    <p class="text-muted small">MENU</p>
                    <ul class="nav flex-column gap-2">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active': '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-grid"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.pegawai.*') ? 'active':'' }}" href="{{ route('admin.data_pegawai.index') }}">
                                <i class="bi bi-person"></i> Data Pegawai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.absensi.*') ? 'active':'' }}" href="{{ route('admin.absensi.index') }}">
                                <i class="bi bi-calendar-check"></i> Kelola Presensi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.rekapitulasi.*') ? 'active' : '' }}" href="{{ route('rekapitulasi.index') }}">
                                <i class="bi bi-clipboard-data"></i> Rekapitulasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.setting.*') ? 'active':'' }}" href="{{ route('setting.index') }}">
                                <i class="bi bi-gear"></i> Settings
                            </a>
                        </li>
                    </ul>
                    <p class="text-muted small mt-4">SUPPORT</p>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-chat"></i> Chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-envelope"></i> Email</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-2 d-none d-md-block container-fluid">
                <div class="d-flex">
                    <!-- Sidebar -->
                    <div class="sidebar">
                        <h5 class="mb-4 fw-bold">PRESENSI</h5>
                        <p class="text-muted small">MENU</p>
                        <ul class="nav flex-column gap-2">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active': '' }}" href="{{ route('admin.dashboard') }}">
                                    <i class="bi bi-grid"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.pegawai.*') ? 'active':'' }}" href="{{ route('admin.data_pegawai.index') }}">
                                    <i class="bi bi-person"></i> Data Pegawai
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('admin.absensi.*') ? 'active':'' }}" href="{{ route('admin.absensi.index') }}">
                                    <i class="bi bi-calendar-check"></i> Kelola Presensi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('rekapitulasi.*') ? 'active' : '' }}" href="{{ route('rekapitulasi.index') }}"><i class="bi bi-clipboard-data"></i> Rekapitulasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('setting.*') ? 'active':'' }}" href="{{ route('setting.index') }}">
                                    <i class="bi bi-gear"></i> Settings
                                </a>
                            </li>
                        </ul>
                        <p class="text-muted small mt-4">SUPPORT</p>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-chat"></i> Chat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-envelope"></i> Email</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Content -->
                </div>
            </div>
            @endif







            @if (session('role') === 'pegawai')
            <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="mobileSidebar">
                <div class="offcanvas-header">
                    <h5 class="fw-bold">PRESENSI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <!-- Isi sidebar (copy paste dari sidebar aslinya) -->
                    <p class="text-muted small">MENU</p>
                    <ul class="nav flex-column gap-2">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('pegawai.dashboard') ? 'active': '' }}" href="{{ route('pegawai.dashboard') }}">
                                <i class="bi bi-grid"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            @php $routeName = 'pegawai.absensi.index' @endphp

                            @if (Route::has($routeName))
                            <a class="nav-link {{ request()->routeIs('pegawai.absensi.*') ? 'active':'' }}"
                                href="{{ route('pegawai.absensi.index') }}">
                                <i class="bi bi-person"></i> Presensi
                            </a>
                            @else
                            <a class="nav-link" href="{{ url('/pegawai/absensi') }}"></a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pegawai.absensi.riwayat') }}">
                                <i class="bi bi-journal-check"></i> Riwayat Presensi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('pegawai.izin.*') ? 'active':'' }}" href="{{ route('pegawai.izin.create') }}">
                                <i class="bi bi-calendar-check"></i> Izin
                            </a>
                        </li>
                    </ul>
                    <p class="text-muted small mt-4">SUPPORT</p>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-chat"></i> Chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-envelope"></i> Email</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-2 d-none d-md-block container-fluid">
                <div class="d-flex">
                    <!-- Sidebar -->
                    <div class="sidebar">
                        <h5 class="mb-4 fw-bold">Presensi</h5>
                        <p class="text-muted small">MENU</p>
                        <ul class="nav flex-column gap-2">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('pegawai.dashboard') ? 'active': '' }}" href="{{ route('pegawai.dashboard') }}">
                                    <i class="bi bi-grid"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                @php $routeName = 'pegawai.absensi.index' @endphp

                                @if (Route::has($routeName))
                                <a class="nav-link {{ request()->routeIs('pegawai.absensi.*') ? 'active':'' }}"
                                    href="{{ route('pegawai.absensi.index') }}">
                                    <i class="bi bi-person"></i> Presensi
                                </a>
                                @else
                                <a class="nav-link" href="{{ url('/pegawai/absensi') }}"></a>
                                @endif
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('pegawai.absensi.riwayat') }}">
                                    <i class="bi bi-journal-check"></i> Riwayat Presensi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('pegawai.izin.*') ? 'active':'' }}" href="{{ route('pegawai.izin.create') }}">
                                    <i class="bi bi-calendar-check"></i> Izin
                                </a>
                            </li>
                        </ul>
                        <p class="text-muted small mt-4">SUPPORT</p>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-chat"></i> Chat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="bi bi-envelope"></i> Email</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Content -->
                </div>
            </div>
            @endif



            <!-- navbar -->
            <div class="col-sm-10">
                <nav class="navbar bg-white shadow-sm px-3">
                    <div class="container-fluid d-flex align-items-center justify-content-between">

                        <!-- Left: Toggle + Search -->
                        <div class="d-flex align-items-center">
                            <!-- Sidebar Toggle -->
                            <button class="btn me-2 border border-1 border-light-subtle d-md-none" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                                <i class="bi bi-list fs-4"></i>
                            </button>

                            <!-- Search Box -->
                            <div class="input-group search-box">
                                <span class="input-group-text bg-white border-0"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control border-0" placeholder="Search or type command...">
                                <span class="input-group-text bg-white border-0"><kbd>⌘K</kbd></span>
                            </div>
                        </div>

                        <!-- Right: Icons + Profile -->
                        <div class="d-flex align-items-center">
                            <!-- Profile -->
                            <div class="dropdown ms-3">
                                <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span>{{ session('nama') }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- content -->
                <div class="">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    @stack('script')
</body>