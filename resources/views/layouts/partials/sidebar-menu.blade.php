<ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link text-secondary" onclick="alert('Fitur Presensi Mobile GPS & Selfie akan aktif di Phase 4'); return false;">
            <i class="bi bi-camera-fill text-primary"></i>
            <span>Presensi Mobile</span>
            <span class="badge bg-success ms-auto" style="font-size: 0.65rem;">PWA</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link text-secondary" onclick="alert('Modul Riwayat Kehadiran sedang disiapkan'); return false;">
            <i class="bi bi-calendar-check"></i>
            <span>Riwayat Kehadiran</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link text-secondary" onclick="alert('Modul Permohonan Izin / Sakit sedang disiapkan'); return false;">
            <i class="bi bi-file-earmark-medical"></i>
            <span>Izin & Sakit</span>
        </a>
    </li>

    @can('staff-access')
    <li class="nav-header px-3 pt-3 pb-1 text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">
        Administrasi & Laporan
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link text-secondary" onclick="alert('Modul Rekapitulasi Periode 20-19 akan aktif di Phase 5'); return false;">
            <i class="bi bi-file-earmark-spreadsheet text-success"></i>
            <span>Rekapitulasi (20-19)</span>
        </a>
    </li>
    @endcan

    @can('ultraman')
    <li class="nav-header px-3 pt-3 pb-1 text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">
        Super Admin
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link text-secondary" onclick="alert('Manajemen Master Relawan & Mesin FPDAPUR1 sedang disiapkan'); return false;">
            <i class="bi bi-people"></i>
            <span>Master Relawan</span>
        </a>
    </li>

    <li class="nav-item">
        <a href="#" class="nav-link text-secondary" onclick="alert('Status Sinkronisasi Mesin FPDAPUR1'); return false;">
            <i class="bi bi-hdd-network text-info"></i>
            <span>Mesin FPDAPUR1</span>
        </a>
    </li>
    @endcan

    <li class="my-3 border-top"></li>

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
