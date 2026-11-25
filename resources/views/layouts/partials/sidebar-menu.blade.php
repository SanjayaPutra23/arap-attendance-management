<ul class="nav nav-pills flex-column sidebar-nav mb-auto">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('mobile-attendance.index') }}" class="nav-link {{ request()->routeIs('mobile-attendance.index') ? 'active' : '' }}">
            <i class="bi bi-camera-fill text-primary"></i>
            <span>Presensi Mobile</span>
            <span class="badge bg-success ms-auto" style="font-size: 0.65rem;">PWA</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('mobile-attendance.history') }}" class="nav-link {{ request()->routeIs('mobile-attendance.history*') ? 'active' : '' }}">
            <i class="bi bi-calendar-check text-success"></i>
            <span>Rekap & Riwayat Saya</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('izin.index') }}" class="nav-link {{ request()->routeIs('izin.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-medical text-warning"></i>
            <span>Izin & Sakit</span>
        </a>
    </li>

    @can('staff-access')
    <li class="nav-header px-3 pt-3 pb-1 text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">
        Administrasi & Monitoring
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.monitoring.index') }}" class="nav-link {{ request()->routeIs('admin.monitoring.*') ? 'active' : '' }}">
            <i class="bi bi-display text-primary"></i>
            <span>Monitoring Presensi</span>
            <span class="badge bg-danger ms-auto" style="font-size: 0.65rem;">Live</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.izin.index') }}" class="nav-link {{ request()->routeIs('admin.izin.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-check text-info"></i>
            <span>Verifikasi Izin</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.rekap.index') }}" class="nav-link {{ request()->routeIs('admin.rekap.*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-spreadsheet text-success"></i>
            <span>Rekapitulasi (20-19)</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.arsip-fingerprint.index') }}" class="nav-link {{ request()->routeIs('admin.arsip-fingerprint.*') ? 'active' : '' }}">
            <i class="bi bi-hdd-network text-secondary"></i>
            <span>Arsip Fingerprint</span>
        </a>
    </li>
    @endcan

    @can('umum')
    <li class="nav-header px-3 pt-3 pb-1 text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">
        Pengaturan & Master
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.pegawai.index') }}" class="nav-link {{ request()->routeIs('admin.pegawai.*') ? 'active' : '' }}">
            <i class="bi bi-people text-primary"></i>
            <span>Master Pegawai / Officer</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.mesin.index') }}" class="nav-link {{ request()->routeIs('admin.mesin.*') ? 'active' : '' }}">
            <i class="bi bi-hdd-network text-info"></i>
            <span>Kelola Mesin & Sync</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.settings.locations.index') }}" class="nav-link {{ request()->routeIs('admin.settings.locations.*') ? 'active' : '' }}">
            <i class="bi bi-pin-map text-danger"></i>
            <span>Lokasi Geofence</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.settings.working-hours.index') }}" class="nav-link {{ request()->routeIs('admin.settings.working-hours.*') ? 'active' : '' }}">
            <i class="bi bi-clock-history text-warning"></i>
            <span>Jam Kerja Divisi</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('admin.libur.index') }}" class="nav-link {{ request()->routeIs('admin.libur.*') ? 'active' : '' }}">
            <i class="bi bi-calendar-event text-danger"></i>
            <span>Hari Libur Nasional</span>
        </a>
    </li>
    @endcan

    <li class="my-2 border-top border-sidebar-divider"></li>

    <li class="nav-item">
        <a href="{{ route('profile.password.edit') }}" class="nav-link {{ request()->routeIs('profile.password.*') ? 'active' : '' }}">
            <i class="bi bi-shield-lock text-warning"></i>
            <span>Ganti Password</span>
        </a>
    </li>

    <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}" class="m-0">
            @csrf
            <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
            </button>
        </form>
    </li>
</ul>
