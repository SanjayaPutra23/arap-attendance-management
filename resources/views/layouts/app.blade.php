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
    <div class="offcanvas offcanvas-start bg-sidebar-dark text-white" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
        <div class="offcanvas-header border-bottom border-sidebar-divider">
            <h5 class="offcanvas-title fw-bold text-white d-flex align-items-center gap-2" id="mobileSidebarLabel">
                <div class="bg-primary text-white rounded p-1 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                    <i class="bi bi-fingerprint fs-5"></i>
                </div>
                <span>ARAP SPPG</span>
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0 custom-scrollbar">
            @include('layouts.partials.sidebar-menu')
        </div>
        <div class="p-3 border-top border-sidebar-divider bg-sidebar-darker">
            <small class="text-slate-300 d-block text-truncate">
                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'Pengguna' }}
            </small>
            <span class="badge bg-primary text-uppercase" style="font-size: 0.65rem;">
                {{ Auth::user()->roles->pluck('name')->first() ?? 'Relawan' }}
            </span>
        </div>
    </div>

    <!-- Main App Container: 100vh height locked for independent scrolling on desktop -->
    <div class="app-layout-container">
        <!-- Desktop Sidebar: Fixed width 260px, 100vh height, own scrollbar -->
        <aside id="desktopSidebar" class="sidebar-desktop d-none d-lg-flex flex-column flex-shrink-0 bg-sidebar-dark text-white">
            <div class="p-3 border-bottom border-sidebar-divider d-flex align-items-center gap-2 flex-shrink-0">
                <div class="bg-primary text-white rounded p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                    <i class="bi bi-fingerprint fs-5"></i>
                </div>
                <div class="lh-sm">
                    <h6 class="fw-bold mb-0 text-white">ARAP SPPG</h6>
                    <small class="text-slate-400" style="font-size: 0.72rem;">Sistem Presensi Kalisapu</small>
                </div>
            </div>

            <!-- Scrollable menu container with anti-jump ID -->
            <div class="sidebar-scrollable flex-grow-1 custom-scrollbar py-2" id="sidebarMenuScrollable">
                @include('layouts.partials.sidebar-menu')
            </div>

            <script>
                // Anti-jump: Instant scroll restoration before paint
                (function() {
                    try {
                        var el = document.getElementById('sidebarMenuScrollable');
                        var pos = sessionStorage.getItem('arap_sidebar_scroll');
                        if (el && pos !== null) {
                            el.scrollTop = parseInt(pos, 10);
                        }
                    } catch (e) {}
                })();
            </script>

            <div class="p-3 border-top border-sidebar-divider bg-sidebar-darker flex-shrink-0">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="overflow-hidden me-2">
                        <small class="text-slate-300 d-block text-truncate fw-medium" style="font-size: 0.8rem;">
                            <i class="bi bi-person-circle me-1 text-slate-400"></i> {{ Auth::user()->name ?? 'Pengguna' }}
                        </small>
                        <small class="text-slate-400 d-block text-truncate" style="font-size: 0.7rem;">
                            {{ Auth::user()->peserta?->jabatan ?? (Auth::user()->roles->pluck('name')->first() ?? 'Relawan') }}
                        </small>
                    </div>
                    <span class="badge bg-primary text-uppercase flex-shrink-0" style="font-size: 0.65rem;">
                        {{ Auth::user()->roles->pluck('name')->first() ?? 'User' }}
                    </span>
                </div>
            </div>
        </aside>

        <!-- Main Content Area: Flex 1, 100vh, topbar pinned, main body scrollable -->
        <div class="content-wrapper d-flex flex-column flex-grow-1">
            <!-- Topbar Navigation -->
            <nav class="navbar navbar-expand bg-white topbar border-bottom flex-shrink-0 shadow-sm">
                <div class="container-fluid px-3 px-md-4">
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
                                <i class="bi bi-person-fill-gear text-primary fs-6"></i>
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

            <!-- Page Content Body: Independently Scrollable Container -->
            <main class="main-content-scrollable flex-grow-1 p-3 p-md-4">
                <!-- Flash Notification Banner -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')

                <!-- Footer inside scrollable -->
                <footer class="bg-white border-top py-3 px-3 text-center text-muted small mt-4 rounded-3 shadow-sm">
                    ARAP v2 &copy; {{ date('Y') }} SPPG Kalisapu &middot; Modernisasi Laravel 13 & PHP 8.5
                </footer>
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
