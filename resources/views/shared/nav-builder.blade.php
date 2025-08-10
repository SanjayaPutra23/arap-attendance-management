<div class="c-sidebar-brand">
    <h7 class="c-sidebar-brand-full">Aplikasi Rapat dan Administrasi Presensi</h7>
    <h4 class="c-sidebar-brand-minimized">ARAP</h4>
</div>

<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ url('/home') }}">
            <i class="cil-speedometer c-sidebar-nav-icon"></i>
            Dashboard</a>
    </li>
    @can('ultraman')
    <li class="c-sidebar-nav-title">Administrator</li>
     <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('admin.users.index') }}">
            <i class="cil-user c-sidebar-nav-icon"></i>
           Manage User</a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('admin.peserta.index') }}">
            <i class="cil-user c-sidebar-nav-icon"></i>
            Manage Pegawai</a>
    </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('mesin.index') }}">
                <i class="cil-lan c-sidebar-nav-icon"></i>
                Manage  Mesin Absen</a>
        </li>
    @endcan
    @can('umum')
    <li class="c-sidebar-nav-title">Tata Usaha</li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-settings c-sidebar-nav-icon"></i>Settings</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('setting.index') }}">
                    <span class="cil-clock c-sidebar-nav-icon"> </span>Setting Jam kerja</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('libur.index') }}">
                    <span class="cil-calendar c-sidebar-nav-icon"> </span>Setting Libur</a>
            </li>
            
        </ul>
    </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('pool.index') }}">
                <i class="cil-devices c-sidebar-nav-icon"></i>
                Mesin Absen</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('absensi.index') }}">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
               Absensi Karyawan</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('satpam.index') }}">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
                Absensi Satpam</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('cs.index') }}">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
                Absensi CS</a>
        </li>

    @endcan
    @can('user')
    <li class="c-sidebar-nav-title">Presensi Rapat</li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('presensi.index') }}">
            <i class="cil-clipboard c-sidebar-nav-icon"></i>
            Presensi Rapat</a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('notulensi.index') }}">
            <i class="cil-notes c-sidebar-nav-icon"></i>
            Notulensi Rapat</a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('peserta.index') }}">
            <i class="cil-user c-sidebar-nav-icon"></i>
            Manage Peserta Rapat</a>
    </li>
        @endcan
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
