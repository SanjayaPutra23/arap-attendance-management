@extends('layouts.app')

@section('title', 'Riwayat Presensi Pribadi')
@section('page_title', 'Riwayat Presensi Pribadi Relawan')

@section('content')
<div class="container-fluid p-0">
    <!-- Filter Periode Bulanan (Aturan 20 - 19) -->
    <div class="card card-dashboard border-0 bg-white shadow-sm mb-4">
        <div class="card-body p-3 p-md-4">
            <form method="GET" action="{{ route('mobile-attendance.history') }}" class="row g-2 align-items-center">
                <div class="col-12 col-md-4">
                    <label class="form-label small fw-bold text-muted mb-1">Pilih Bulan Periode</label>
                    <select name="month" class="form-select form-select-sm" onchange="this.form.submit()">
                        @foreach(range(1, 12) as $m)
                            <option value="{{ $m }}" {{ $month === $m ? 'selected' : '' }}>
                                {{ Carbon\Carbon::create(2026, $m, 1)->locale('id')->isoFormat('MMMM') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-3">
                    <label class="form-label small fw-bold text-muted mb-1">Pilih Tahun</label>
                    <select name="year" class="form-select form-select-sm" onchange="this.form.submit()">
                        @foreach(range(now()->year - 2, now()->year + 1) as $y)
                            <option value="{{ $y }}" {{ $year === $y ? 'selected' : '' }}>{{ $y }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-5 text-md-end mt-3 mt-md-0">
                    <span class="badge bg-light text-primary border p-2 w-100 text-start text-md-end">
                        <i class="bi bi-calendar-range me-1"></i>
                        Rentang: <strong>{{ $range['start']->isoFormat('D MMM Y') }}</strong> s.d. <strong>{{ $range['end']->isoFormat('D MMM Y') }}</strong>
                    </span>
                </div>
            </form>
        </div>
    </div>

    <!-- Statistik Ringkasan Poin Periode -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-4">
            <div class="card card-dashboard border-0 bg-white shadow-sm h-100">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Hadir Tepat Waktu</span>
                        <div class="bg-success-subtle text-success p-2 rounded">
                            <i class="bi bi-check2-circle fs-5"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0 text-success">{{ $countTepatWaktu }} <span class="fs-6 text-muted fw-normal">Hari (1.00)</span></h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="card card-dashboard border-0 bg-white shadow-sm h-100">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-muted small fw-semibold">Terlambat / Pulang Awal</span>
                        <div class="bg-warning-subtle text-warning p-2 rounded">
                            <i class="bi bi-clock-history fs-5"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0 text-warning">{{ $countBiasa }} <span class="fs-6 text-muted fw-normal">Hari (0.80)</span></h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="card card-dashboard border-0 bg-primary-arap text-white shadow-sm h-100">
                <div class="card-body p-3">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="text-white-50 small fw-semibold">Total Akumulasi Poin</span>
                        <div class="bg-white bg-opacity-20 text-white p-2 rounded">
                            <i class="bi bi-award-fill fs-5"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-0 text-white">{{ number_format($totalScore, 2) }} <span class="fs-6 text-white-50 fw-normal">Poin</span></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Presensi Harian -->
    <div class="card card-dashboard border-0 bg-white shadow-sm mb-4">
        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
            <h6 class="fw-bold mb-0 text-primary-arap">
                <i class="bi bi-list-check me-2"></i>Catatan Presensi Periode Ini
            </h6>
            <a href="{{ route('mobile-attendance.index') }}" class="btn btn-sm btn-primary-arap">
                <i class="bi bi-camera me-1"></i> Presensi Hari Ini
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="small text-muted text-uppercase" style="font-size: 0.75rem;">
                            <th class="ps-3">Tanggal</th>
                            <th>Masuk (Check-in)</th>
                            <th>Pulang (Check-out)</th>
                            <th>Jarak Geofence</th>
                            <th>Status</th>
                            <th>Poin</th>
                            <th class="text-center pe-3">Foto Selfie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($attendances as $item)
                            <tr>
                                <td class="ps-3">
                                    <div class="fw-bold text-dark">{{ Carbon\Carbon::parse($item->attendance_date)->isoFormat('dddd, D MMM Y') }}</div>
                                    <div class="small text-muted">{{ $item->source === 'mobile' ? 'Mobile PWA' : 'Fingerprint' }}</div>
                                </td>
                                <td>
                                    @if($item->check_in_at)
                                        <div class="fw-bold text-dark"><i class="bi bi-box-arrow-in-right text-success me-1"></i>{{ $item->check_in_at->format('H:i:s') }}</div>
                                        <div class="small text-muted" style="font-size: 0.7rem;">Akurasi: {{ $item->check_in_accuracy_meters ?? '-' }} m</div>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->check_out_at)
                                        <div class="fw-bold text-dark"><i class="bi bi-box-arrow-left text-primary me-1"></i>{{ $item->check_out_at->format('H:i:s') }}</div>
                                        <div class="small text-muted" style="font-size: 0.7rem;">Akurasi: {{ $item->check_out_accuracy_meters ?? '-' }} m</div>
                                    @else
                                        <span class="badge bg-secondary" style="font-size: 0.7rem;">Belum Pulang</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="small">
                                        <i class="bi bi-geo-alt me-1 text-primary"></i>{{ $item->check_in_distance_meters ?? 0 }} m
                                    </div>
                                    <div class="text-muted" style="font-size: 0.7rem;">{{ $item->location->name ?? 'SPPG Kalisapu' }}</div>
                                </td>
                                <td>
                                    @if($item->status === 'hadir')
                                        <span class="badge bg-success-subtle text-success fw-semibold">Hadir</span>
                                    @elseif($item->status === 'terlambat')
                                        <span class="badge bg-warning-subtle text-warning fw-semibold">Terlambat</span>
                                    @elseif($item->status === 'pulang_awal')
                                        <span class="badge bg-info-subtle text-info fw-semibold">Pulang Awal</span>
                                    @elseif($item->status === 'izin' || $item->status === 'sakit')
                                        <span class="badge bg-secondary-subtle text-secondary fw-semibold">{{ ucfirst($item->status) }}</span>
                                    @else
                                        <span class="badge bg-danger-subtle text-danger fw-semibold">Alpha</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="fw-bold text-dark">{{ number_format($item->score, 2) }}</span>
                                </td>
                                <td class="text-center pe-3">
                                    <div class="btn-group btn-group-sm">
                                        @php
                                            $inPhoto = $item->photos->firstWhere('type', 'check_in');
                                            $outPhoto = $item->photos->firstWhere('type', 'check_out');
                                        @endphp
                                        @if($inPhoto)
                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="showPhotoModal('{{ route('attendance-photos.show', $inPhoto->id) }}', 'Foto Masuk (Check-in) - {{ $item->attendance_date }}')">
                                                <i class="bi bi-camera me-1"></i> Masuk
                                            </button>
                                        @endif
                                        @if($outPhoto)
                                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="showPhotoModal('{{ route('attendance-photos.show', $outPhoto->id) }}', 'Foto Pulang (Check-out) - {{ $item->attendance_date }}')">
                                                <i class="bi bi-camera me-1"></i> Pulang
                                            </button>
                                        @endif
                                        @if(! $inPhoto && ! $outPhoto)
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-muted">
                                    <i class="bi bi-calendar-x fs-3 d-block mb-2 text-secondary"></i>
                                    Tidak ada catatan presensi pada periode ini.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Penampil Foto Selfie Privat -->
<div class="modal fade" id="photoViewerModal" tabindex="-1" aria-labelledby="photoModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary-arap text-white py-2">
                <h6 class="modal-title fw-bold" id="photoModalTitle">Bukti Foto Selfie</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3 text-center bg-dark">
                <div id="photoSpinner" class="spinner-border text-light my-5" role="status">
                    <span class="visually-hidden">Memuat foto...</span>
                </div>
                <img id="modalPhotoImage" src="" alt="Bukti Presensi" class="img-fluid rounded d-none shadow" style="max-height: 480px; object-fit: contain;">
            </div>
            <div class="modal-footer py-2 justify-content-between">
                <small class="text-muted"><i class="bi bi-shield-lock me-1"></i>Private storage terenkripsi</small>
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function showPhotoModal(photoUrl, title) {
        const modal = new window.bootstrap.Modal(document.getElementById('photoViewerModal'));
        const modalTitle = document.getElementById('photoModalTitle');
        const modalImage = document.getElementById('modalPhotoImage');
        const spinner = document.getElementById('photoSpinner');

        if (modalTitle) modalTitle.textContent = title;
        if (modalImage && spinner) {
            modalImage.classList.add('d-none');
            spinner.classList.remove('d-none');
            modalImage.src = photoUrl;
            modalImage.onload = () => {
                spinner.classList.add('d-none');
                modalImage.classList.remove('d-none');
            };
            modalImage.onerror = () => {
                spinner.classList.add('d-none');
                alert('Gagal memuat berkas foto atau akses ditolak.');
            };
        }
        modal.show();
    }
</script>
@endpush
