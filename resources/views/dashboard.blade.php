@extends('layouts.app')

@section('title', 'Dashboard Utama')
@section('page_title', 'Dashboard Operasional')

@section('content')
<div class="container-fluid p-0">
    <!-- Welcome Header Card -->
    <div class="card card-dashboard border-0 bg-primary-arap text-white mb-4">
        <div class="card-body p-4">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <span class="badge bg-light text-primary mb-2">ARAP Modernization v2.0</span>
                    <h3 class="fw-bold mb-1">Selamat Datang, {{ $user->name ?? 'Pengguna' }}!</h3>
                    <p class="mb-2 text-white-50">
                        Sistem Presensi Relawan dan Pegawai Sentra Pelayanan Pertanian Terpadu (SPPG) Kalisapu.
                    </p>
                    <div class="d-flex flex-wrap gap-2 align-items-center pt-1">
                        <span class="small text-white-50"><i class="bi bi-shield-lock me-1"></i> Peran Aktif:</span>
                        @forelse($roles as $role)
                            <span class="badge bg-white text-primary fw-semibold">{{ $role }}</span>
                        @empty
                            <span class="badge bg-secondary">Relawan</span>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <div class="d-inline-flex flex-column align-items-md-end">
                        <div class="small text-white-50"><i class="bi bi-calendar3 me-1"></i> {{ date('l, d F Y') }}</div>
                        <div class="h5 fw-bold mb-0 text-white"><i class="bi bi-clock me-1"></i> <span id="liveClock">{{ date('H:i:s') }} WIB</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Action Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-dashboard h-100 bg-white">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Presensi Mobile</span>
                        <div class="bg-primary-subtle text-primary p-2 rounded">
                            <i class="bi bi-geo-alt-fill fs-5"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">Geofencing & Selfie</h5>
                    <p class="text-muted small mb-3">Tersedia untuk {{ $totalPeserta ?? 0 }} Relawan & Staf SPPG Kalisapu aktif.</p>
                    <button class="btn btn-sm btn-outline-primary w-100 fw-semibold" onclick="alert('Fitur Presensi Mobile GPS & Kamera akan aktif di Phase 4.')">
                        <i class="bi bi-camera me-1"></i> Buka Kamera Presensi
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-dashboard h-100 bg-white">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Riwayat Kehadiran</span>
                        <div class="bg-success-subtle text-success p-2 rounded">
                            <i class="bi bi-calendar2-check-fill fs-5"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">Log & Arsip Mesin</h5>
                    <p class="text-muted small mb-3">Arsip {{ number_format($totalPools ?? 0, 0, ',', '.') }} log mesin FPDAPUR1 & presensi mobile.</p>
                    <button class="btn btn-sm btn-outline-success w-100 fw-semibold" onclick="alert('Riwayat kehadiran sedang disiapkan.')">
                        <i class="bi bi-list-check me-1"></i> Lihat Riwayat Log
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-dashboard h-100 bg-white">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Permohonan Izin</span>
                        <div class="bg-warning-subtle text-warning p-2 rounded">
                            <i class="bi bi-file-earmark-medical-fill fs-5"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">Izin & Sakit</h5>
                    <p class="text-muted small mb-3">Ajukan surat izin atau sakit dengan upload dokumen bukti / surat dokter.</p>
                    <button class="btn btn-sm btn-outline-warning w-100 fw-semibold" onclick="alert('Pengajuan izin/sakit sedang disiapkan.')">
                        <i class="bi bi-plus-circle me-1"></i> Ajukan Izin / Sakit
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card card-dashboard h-100 bg-white">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Rekapitulasi Poin</span>
                        <div class="bg-info-subtle text-info p-2 rounded">
                            <i class="bi bi-award-fill fs-5"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">Periode 20 - 19</h5>
                    <p class="text-muted small mb-3">Perhitungan poin kehadiran (1.0 Tepat Waktu, 0.8 Terlambat/Pulang Cepat, 0 Alpha).</p>
                    <button class="btn btn-sm btn-outline-info w-100 fw-semibold" onclick="alert('Rekapitulasi laporan periode 20-19 aktif di Phase 5.')">
                        <i class="bi bi-file-earmark-bar-graph me-1"></i> Rekap Bulanan
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modernization Status Information Card -->
    <div class="card card-dashboard border-0 bg-white shadow-sm mb-4">
        <div class="card-header bg-white border-bottom py-3">
            <div class="d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0 text-primary-arap">
                    <i class="bi bi-cpu-fill me-2"></i>Status Fondasi Arsitektur ARAP v2 (Phase 2 Scaffolding)
                </h6>
                <span class="badge bg-success">Active & Stable</span>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="p-3 border rounded bg-light">
                        <div class="text-muted small fw-semibold">Framework</div>
                        <div class="fw-bold fs-6 text-dark">Laravel {{ app()->version() }}</div>
                        <small class="text-success"><i class="bi bi-check-circle-fill"></i> Framework v13.x</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 border rounded bg-light">
                        <div class="text-muted small fw-semibold">Runtime Environment</div>
                        <div class="fw-bold fs-6 text-dark">PHP {{ phpversion() }}</div>
                        <small class="text-success"><i class="bi bi-check-circle-fill"></i> Sockets & Zip Active</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 border rounded bg-light">
                        <div class="text-muted small fw-semibold">Frontend Engine</div>
                        <div class="fw-bold fs-6 text-dark">Bootstrap 5.3 + Vite</div>
                        <small class="text-success"><i class="bi bi-check-circle-fill"></i> PWA & Service Worker</small>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3 border rounded bg-light">
                        <div class="text-muted small fw-semibold">Autentikasi & RBAC</div>
                        <div class="fw-bold fs-6 text-dark">Fortify Flexible Auth</div>
                        <small class="text-success"><i class="bi bi-check-circle-fill"></i> Email / NIK + Gates</small>
                    </div>
                </div>
            </div>

            <div class="mt-3 p-3 bg-light rounded border">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-info-circle-fill text-primary"></i>
                    <span class="small text-secondary">
                        <strong>Strategi Non-Destruktif:</strong> Branch <code>main</code> (Laravel 8 legacy) dan database operasional <code>arap</code> tetap utuh tanpa modifikasi destruktif. Branch <code>v2/laravel-13-modernization</code> siap melanjutkan ke Phase 3 (Database Compatibility).
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' WIB';
        const el = document.getElementById('liveClock');
        if (el) el.textContent = timeString;
    }
    setInterval(updateClock, 1000);
</script>
@endpush
