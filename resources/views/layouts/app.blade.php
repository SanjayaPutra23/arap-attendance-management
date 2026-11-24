<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#1e3a8a">
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <title>{{ config('app.name', 'ARAP SPPG Kalisapu') }} - @yield('title', 'Dashboard')</title>

    <!-- Vite Assets (Bootstrap 5.3 + Custom SCSS + App JS) -->
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <!-- Mobile Offcanvas Sidebar Drawer -->
    <div class="offcanvas offcanvas-start bg-white" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title fw-bold text-primary-arap" id="mobileSidebarLabel">
                <i class="bi bi-fingerprint me-2"></i>ARAP v2
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            @include('layouts.partials.sidebar-menu')
        </div>
    </div>

    <!-- Main App Container -->
    <div class="d-flex min-vh-100">
        <!-- Desktop Sidebar -->
        <aside class="sidebar d-none d-lg-flex flex-column flex-shrink-0">
            <div class="p-3 border-bottom d-flex align-items-center gap-2">
                <div class="bg-primary-arap text-white rounded p-2 d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                    <i class="bi bi-fingerprint fs-5"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-0 text-primary-arap">ARAP SPPG</h6>
                    <small class="text-muted" style="font-size: 0.75rem;">Sistem Presensi Kalisapu</small>
                </div>
            </div>

            <div class="py-2 flex-grow-1 overflow-auto">
                @include('layouts.partials.sidebar-menu')
            </div>

            <div class="p-3 border-top bg-light">
                <small class="text-muted d-block text-truncate">
                    <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'Pengguna' }}
                </small>
                <span class="badge bg-primary text-uppercase" style="font-size: 0.65rem;">
                    {{ Auth::user()->roles->pluck('name')->first() ?? 'Relawan' }}
                </span>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="content-wrapper d-flex flex-column flex-grow-1">
            <!-- Topbar Navigation -->
            <nav class="navbar navbar-expand bg-white topbar sticky-top shadow-sm">
                <div class="container-fluid px-2 px-md-3">
                    <!-- Hamburger button for mobile -->
                    <button class="btn btn-outline-secondary d-lg-none me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                        <i class="bi bi-list fs-5"></i>
                    </button>

                    <span class="navbar-brand mb-0 h6 fw-semibold text-secondary d-none d-sm-inline">
                        @yield('page_title', 'Dashboard')
                    </span>

                    <div class="ms-auto d-flex align-items-center gap-2">
                        <!-- User Dropdown & Info -->
                        <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle d-flex align-items-center gap-2 py-1 px-2 border" type="button" id="userMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill-gear text-primary-arap fs-6"></i>
                                <span class="d-none d-md-inline fw-semibold small">{{ Auth::user()->name ?? 'Akun' }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="userMenuButton">
                                <li class="px-3 py-2 border-bottom">
                                    <div class="fw-semibold small text-truncate">{{ Auth::user()->name ?? 'User' }}</div>
                                    <div class="text-muted" style="font-size: 0.75rem;">{{ Auth::user()->email ?? '' }}</div>
                                    @if(Auth::user() && Auth::user()->nik)
                                        <div class="badge bg-light text-dark border mt-1" style="font-size: 0.7rem;">NIK: {{ Auth::user()->nik }}</div>
                                    @endif
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" id="logoutForm" class="m-0">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger small py-2 d-flex align-items-center gap-2">
                                            <i class="bi bi-box-arrow-right"></i> Keluar (Logout)
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content Body -->
            <main class="p-3 p-md-4 flex-grow-1">
                <!-- Flash Notification Banner -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white border-top py-2 px-3 text-center text-muted small mt-auto">
                ARAP v2 &copy; {{ date('Y') }} SPPG Kalisapu &middot; Modernisasi Laravel 13 & PHP 8.5
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
