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
                Kelola Mesin (IP & Port)</a>
        </li>
    @endcan
    @can('umum')
    <li class="c-sidebar-nav-title">Tata Usaha</li>
        <li class="c-sidebar-nav-dropdown" id="dropdown-tu-settings"><a class="c-sidebar-nav-dropdown-toggle" href="#">
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
                Tarik Data Presensi Mesin</a>
        </li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-fingerprint c-sidebar-nav-icon"></i>Absensi Relawan</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('absensi.index') }}">
                        <span class="cil-fingerprint c-sidebar-nav-icon"></span>Absensi Relawan</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('absensi.officer') }}">
                        <span class="cil-fingerprint c-sidebar-nav-icon"></span>Absensi Officer</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('absensi.divisi', 'persiapan') }}">
                        <span class="cil-fingerprint c-sidebar-nav-icon"></span>Absensi Persiapan</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('absensi.divisi', 'pengolahan') }}">
                        <span class="cil-fingerprint c-sidebar-nav-icon"></span>Absensi Pengolahan</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('absensi.divisi', 'pemorsian') }}">
                        <span class="cil-fingerprint c-sidebar-nav-icon"></span>Absensi Pemorsian</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('absensi.divisi', 'distribusi') }}">
                        <span class="cil-fingerprint c-sidebar-nav-icon"></span>Absensi Distribusi</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('absensi.divisi', 'ompreng') }}">
                        <span class="cil-fingerprint c-sidebar-nav-icon"></span>Absensi Ompreng</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('satpam.index') }}">
                        <span class="cil-fingerprint c-sidebar-nav-icon"></span>Absensi Keamanan</a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('cs.index') }}">
                        <span class="cil-fingerprint c-sidebar-nav-icon"></span>Absensi Kebersihan</a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('admin.izin.index') }}">
                <i class="cil-envelope-open c-sidebar-nav-icon"></i>
                Persetujuan Izin/Sakit
                @php
                    $pendingIzinCount = \App\Models\PermohonanIzin::where('status', 'menunggu')->count();
                @endphp
                @if($pendingIzinCount > 0)
                    <span class="badge badge-warning text-dark ml-auto">{{ $pendingIzinCount }}</span>
                @endif
            </a>
        </li>

    @endcan
     @can('akademik')
    <li class="c-sidebar-nav-title">Akademik</li>
        <li class="c-sidebar-nav-dropdown" id="dropdown-akademik-settings"><a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-settings c-sidebar-nav-icon"></i>Settings</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('setting.index', ['grup' => 7]) }}">
                    <span class="cil-clock c-sidebar-nav-icon"> </span>Setting Batas Jam</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('libur.index') }}">
                    <span class="cil-calendar c-sidebar-nav-icon"> </span>Setting Libur</a>
            </li>
            
        </ul>
    </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('akademik.index') }}">
                <i class="cil-devices c-sidebar-nav-icon"></i>
                Tarik Data Presensi Akademik</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('akademik.persepsi') }}">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
               Absensi Persamaan Persepsi </a>
        </li>
        
    @endcan

    @can('staff-access')
    <li class="c-sidebar-nav-title">Rapat & Notulensi</li>
    <li class="c-sidebar-nav-dropdown" id="dropdown-rapat"><a class="c-sidebar-nav-dropdown-toggle" href="#">
        <i class="cil-calendar c-sidebar-nav-icon"></i>Rapat & Notulensi</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('presensi.index') }}">
                    <span class="cil-calendar c-sidebar-nav-icon"></span>Agenda Rapat</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('kehadiran.index') }}">
                    <span class="cil-check-circle c-sidebar-nav-icon"></span>Daftar Hadir Rapat</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="{{ route('notulensi.index') }}">
                    <span class="cil-notes c-sidebar-nav-icon"></span>Notulensi Rapat</a>
            </li>
        </ul>
    </li>
    @endcan

    @can('user')
        @cannot('ultraman')
        @cannot('umum')
        @cannot('akademik')
        <li class="c-sidebar-nav-title">Menu Relawan</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('user.presensi') }}">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
                Presensi Saya</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('user.izin.index') }}">
                <i class="cil-description c-sidebar-nav-icon"></i>
                Pengajuan Izin/Sakit</a>
        </li>
        @endcannot
        @endcannot
        @endcannot
    @endcan
      
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tuSettings = document.getElementById('dropdown-tu-settings');
    var akSettings = document.getElementById('dropdown-akademik-settings');

    function syncSettingsDropdowns() {
        var url = window.location.href;
        if (!tuSettings && !akSettings) return;

        if (url.indexOf('grup=7') !== -1) {
            if (tuSettings) {
                tuSettings.classList.remove('c-show');
                tuSettings.querySelectorAll('.c-sidebar-nav-link').forEach(function (el) {
                    el.classList.remove('c-active');
                });
            }
            if (akSettings) {
                akSettings.classList.add('c-show');
            }
        } else if (url.indexOf('/setting') !== -1) {
            if (akSettings) {
                akSettings.classList.remove('c-show');
                akSettings.querySelectorAll('.c-sidebar-nav-link').forEach(function (el) {
                    el.classList.remove('c-active');
                });
            }
            if (tuSettings) {
                tuSettings.classList.add('c-show');
            }
        } else if (url.indexOf('/libur') !== -1) {
            if (akSettings) {
                akSettings.classList.remove('c-show');
                akSettings.querySelectorAll('.c-sidebar-nav-link').forEach(function (el) {
                    el.classList.remove('c-active');
                });
            }
        }
    }

    if (tuSettings) {
        var tuToggle = tuSettings.querySelector('.c-sidebar-nav-dropdown-toggle');
        if (tuToggle) {
            tuToggle.addEventListener('click', function () {
                if (akSettings) {
                    akSettings.classList.remove('c-show');
                }
            });
        }
    }

    if (akSettings) {
        var akToggle = akSettings.querySelector('.c-sidebar-nav-dropdown-toggle');
        if (akToggle) {
            akToggle.addEventListener('click', function () {
                if (tuSettings) {
                    tuSettings.classList.remove('c-show');
                }
            });
        }
    }

    syncSettingsDropdowns();
    window.addEventListener('load', syncSettingsDropdowns);
    setTimeout(syncSettingsDropdowns, 150);
});
</script>
