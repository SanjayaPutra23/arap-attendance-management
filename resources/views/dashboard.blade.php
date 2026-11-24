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
                        <div class="small text-white-50"><i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($todayDate)->translatedFormat('l, d F Y') }}</div>
                        <div class="h5 fw-bold mb-0 text-white"><i class="bi bi-clock me-1"></i> <span id="liveClock">{{ date('H:i:s') }} WIB</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @can('staff-access')
    <!-- Operational Monitoring Section (Staff & Admins) -->
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h5 class="fw-bold mb-0 text-dark">
            <i class="bi bi-activity text-primary me-2"></i>Monitoring Presensi Hari Ini
        </h5>
        <a href="{{ route('admin.monitoring.index') }}" class="btn btn-sm btn-primary-arap fw-semibold">
            <i class="bi bi-display me-1"></i> Buka Monitoring Peta & Log Lengkap
        </a>
    </div>

    <!-- 6 KPI Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-white">
                <div class="card-body p-3">
                    <div class="text-muted small fw-semibold">Total Relawan/Staf</div>
                    <div class="h3 fw-bold text-dark my-1">{{ $kpi['total_peserta'] ?? 0 }}</div>
                    <div class="small text-secondary"><i class="bi bi-people me-1"></i> Terdaftar aktif</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-white border-start border-success border-4">
                <div class="card-body p-3">
                    <div class="text-muted small fw-semibold">Tepat Waktu</div>
                    <div class="h3 fw-bold text-success my-1">{{ $kpi['hadir_tepat_waktu'] ?? 0 }}</div>
                    <div class="small text-success"><i class="bi bi-check-circle me-1"></i> Skor 1.00</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-white border-start border-warning border-4">
                <div class="card-body p-3">
                    <div class="text-muted small fw-semibold">Terlambat/Awal</div>
                    <div class="h3 fw-bold text-warning my-1">{{ $kpi['terlambat_early'] ?? 0 }}</div>
                    <div class="small text-warning"><i class="bi bi-exclamation-circle me-1"></i> Skor 0.80</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-white border-start border-info border-4">
                <div class="card-body p-3">
                    <div class="text-muted small fw-semibold">Izin / Sakit</div>
                    <div class="h3 fw-bold text-info my-1">{{ $kpi['izin_sakit'] ?? 0 }}</div>
                    <div class="small text-info"><i class="bi bi-file-medical me-1"></i> Disetujui</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-white border-start border-secondary border-4">
                <div class="card-body p-3">
                    <div class="text-muted small fw-semibold">Belum Hadir</div>
                    <div class="h3 fw-bold text-secondary my-1">{{ $kpi['belum_hadir'] ?? 0 }}</div>
                    <div class="small text-muted"><i class="bi bi-hourglass-split me-1"></i> Menunggu presensi</div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm h-100 bg-white border-start border-danger border-4">
                <div class="card-body p-3">
                    <div class="text-muted small fw-semibold">Percobaan Ditolak</div>
                    <div class="h3 fw-bold text-danger my-1">{{ $kpi['ditolak_hari_ini'] ?? 0 }}</div>
                    <div class="small text-danger"><i class="bi bi-shield-x me-1"></i> Luar radius / akurasi</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Division Breakdown & Recent Attendance Row -->
    <div class="row g-3 mb-4">
        <!-- Division Breakdown Table -->
        <div class="col-12 col-xl-6">
            <div class="card border-0 shadow-sm h-100 bg-white">
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0 text-primary-arap">
                        <i class="bi bi-pie-chart-fill me-2"></i>Rekap Kehadiran per Divisi
                    </h6>
                    <span class="badge bg-light text-dark">Hari Ini</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                        <thead class="table-light">
                            <tr>
                                <th>Divisi / Jabatan</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Hadir</th>
                                <th class="text-center">Tepat Waktu</th>
                                <th class="text-center">Terlambat/Awal</th>
                                <th class="text-center">Belum Hadir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($divisionSummary ?? [] as $div)
                                <tr>
                                    <td class="fw-semibold">
                                        @if(strtolower($div['name']) === 'officer')
                                            <span class="badge bg-primary me-1">Officer</span>
                                        @else
                                            {{ $div['name'] }}
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $div['total'] }}</td>
                                    <td class="text-center">
                                        <span class="badge {{ $div['hadir'] > 0 ? 'bg-success-subtle text-success' : 'bg-light text-muted' }}">
                                            {{ $div['hadir'] }}
                                        </span>
                                    </td>
                                    <td class="text-center text-success fw-semibold">{{ $div['tepat_waktu'] }}</td>
                                    <td class="text-center text-warning fw-semibold">{{ $div['terlambat_early'] }}</td>
                                    <td class="text-center text-muted">{{ $div['belum_hadir'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">Tidak ada data divisi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent 10 Activities -->
        <div class="col-12 col-xl-6">
            <div class="card border-0 shadow-sm h-100 bg-white">
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0 text-primary-arap">
                        <i class="bi bi-clock-history me-2"></i>10 Presensi Terkini
                    </h6>
                    <a href="{{ route('admin.monitoring.index') }}" class="small text-primary text-decoration-none">
                        Lihat Semua <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="font-size: 0.85rem;">
                        <thead class="table-light">
                            <tr>
                                <th>Relawan / Staf</th>
                                <th>Divisi</th>
                                <th>Jam Masuk</th>
                                <th>Status</th>
                                <th class="text-center">Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentActivities ?? [] as $act)
                                <tr>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $act->peserta?->name ?? 'Tanpa Nama' }}</div>
                                        <small class="text-muted">{{ $act->peserta?->nik ?? '-' }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-secondary border">
                                            {{ $act->peserta?->jabatan ?? '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ $act->check_in_at ? $act->check_in_at->setTimezone('Asia/Jakarta')->format('H:i:s') : '-' }}</div>
                                        <small class="text-muted">{{ (int) $act->check_in_distance_meters }}m dari sentral</small>
                                    </td>
                                    <td>
                                        @if($act->status === 'tepat_waktu')
                                            <span class="badge bg-success-subtle text-success">Tepat Waktu</span>
                                        @elseif(in_array($act->status, ['terlambat', 'pulang_awal', 'terlambat_pulang_awal']))
                                            <span class="badge bg-warning-subtle text-warning">Terlambat/Awal</span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($act->status) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $photo = $act->photos->firstWhere('type', 'check_in') ?? $act->photos->first();
                                        @endphp
                                        @if($photo)
                                            <button type="button" class="btn btn-sm btn-outline-primary py-0 px-2 btn-view-photo"
                                                    data-bs-toggle="modal" data-bs-target="#photoModal"
                                                    data-photo-url="{{ route('attendance-photos.show', $photo) }}"
                                                    data-photo-title="Selfie Check-in: {{ $act->peserta?->name }}"
                                                    data-photo-desc="{{ $act->check_in_at ? $act->check_in_at->setTimezone('Asia/Jakarta')->format('d M Y H:i:s') : '-' }} &bull; Jarak: {{ (int) $act->check_in_distance_meters }}m &bull; Akurasi GPS: &plusmn;{{ (int) $act->check_in_accuracy_meters }}m">
                                                <i class="bi bi-camera-fill"></i>
                                            </button>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Belum ada aktivitas presensi masuk hari ini.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endcan

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
                    <a href="{{ route('mobile-attendance.index') }}" class="btn btn-sm btn-outline-primary w-100 fw-semibold">
                        <i class="bi bi-camera me-1"></i> Buka Kamera Presensi
                    </a>
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
                    <a href="{{ route('mobile-attendance.history') }}" class="btn btn-sm btn-outline-success w-100 fw-semibold">
                        <i class="bi bi-list-check me-1"></i> Lihat Riwayat Log
                    </a>
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
                    <button class="btn btn-sm btn-outline-warning w-100 fw-semibold" onclick="alert('Pengajuan izin/sakit sedang disiapkan pada Phase 5B.')">
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
                    <button class="btn btn-sm btn-outline-info w-100 fw-semibold" onclick="alert('Rekapitulasi laporan periode 20-19 aktif di Phase 5B.')">
                        <i class="bi bi-file-earmark-bar-graph me-1"></i> Rekap Bulanan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bukti Foto Selfie Reusable -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h6 class="modal-title fw-bold" id="photoModalLabel">Bukti Foto Selfie Presensi</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-3">
                <div id="photoSpinner" class="py-5 text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Memuat foto...</span>
                    </div>
                </div>
                <img id="modalPhotoImage" src="" alt="Bukti Selfie" class="img-fluid rounded border shadow-sm d-none" style="max-height: 400px; width: auto; object-fit: contain;">
                <p id="photoDesc" class="small text-muted mt-3 mb-0"></p>
            </div>
            <div class="modal-footer border-top py-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
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

    // Modal Photo Viewer Handler
    document.addEventListener('DOMContentLoaded', () => {
        const photoModal = document.getElementById('photoModal');
        if (photoModal) {
            photoModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const photoUrl = button.getAttribute('data-photo-url');
                const photoTitle = button.getAttribute('data-photo-title');
                const photoDesc = button.getAttribute('data-photo-desc');

                const titleEl = photoModal.querySelector('#photoModalLabel');
                const imgEl = photoModal.querySelector('#modalPhotoImage');
                const spinnerEl = photoModal.querySelector('#photoSpinner');
                const descEl = photoModal.querySelector('#photoDesc');

                if (titleEl) titleEl.textContent = photoTitle || 'Bukti Foto Selfie';
                if (descEl) descEl.innerHTML = photoDesc || '';

                if (imgEl && spinnerEl) {
                    imgEl.classList.add('d-none');
                    spinnerEl.classList.remove('d-none');
                    imgEl.onload = function() {
                        spinnerEl.classList.add('d-none');
                        imgEl.classList.remove('d-none');
                    };
                    imgEl.src = photoUrl;
                }
            });
        }
    });
</script>
@endpush
