@extends('layouts.app')

@section('title', 'Rekap & Riwayat Saya')
@section('page_title', 'Rekapitulasi & Riwayat Presensi Pribadi')

@section('content')
<div class="container-fluid p-0">
    <!-- Banner Mode Riwayat Aktif dari Pengaturan Admin -->
    <div class="alert alert-info border-0 shadow-sm d-flex flex-wrap align-items-center justify-content-between mb-4 py-2 px-3 gap-2">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-info-circle-fill fs-5 text-primary"></i>
            <div>
                <span class="small fw-bold">Mode Rekapitulasi:</span>
                <span class="badge {{ $mode === 'mingguan' ? 'bg-primary' : 'bg-success' }} ms-1">
                    {{ $mode === 'mingguan' ? 'Mingguan (Senin - Minggu)' : 'Bulanan (Cut-off 20 - 19)' }}
                </span>
                <span class="small text-muted d-none d-md-inline ms-1">&bull; Standar Perhitungan SPPG Kalisapu</span>
            </div>
        </div>
        <div class="small fw-semibold text-primary">
            <i class="bi bi-calendar3 me-1"></i>
            {{ $range['label'] ?? ($range['start']->isoFormat('D MMM Y') . ' s.d. ' . $range['end']->isoFormat('D MMM Y')) }}
        </div>
    </div>

    <!-- Filter Periode (Mingguan atau Bulanan) -->
    <div class="card card-dashboard border-0 bg-white shadow-sm mb-4">
        <div class="card-body p-3 p-md-4">
            @if($mode === 'mingguan')
                <form method="GET" action="{{ route('mobile-attendance.history') }}" class="row g-2 align-items-center">
                    <div class="col-12 col-md-6">
                        <label class="form-label small fw-bold text-muted mb-1">Pilih Tanggal Minggu</label>
                        <div class="input-group input-group-sm">
                            <a href="{{ route('mobile-attendance.history', ['date' => $prevDate]) }}" class="btn btn-outline-secondary" title="Minggu Sebelumnya">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                            <input type="date" name="date" class="form-control" value="{{ $date }}" onchange="this.form.submit()">
                            <a href="{{ route('mobile-attendance.history', ['date' => $nextDate]) }}" class="btn btn-outline-secondary" title="Minggu Berikutnya">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 text-md-end mt-2 mt-md-0">
                        <span class="badge bg-light text-primary border p-2 w-100 text-start text-md-end">
                            <i class="bi bi-calendar-week me-1"></i>
                            Rentang Minggu: <strong>{{ $range['label'] }}</strong>
                        </span>
                    </div>
                </form>
            @else
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
                        <div class="input-group input-group-sm">
                            <select name="year" class="form-select form-select-sm" onchange="this.form.submit()">
                                @foreach(range(now()->year - 2, now()->year + 1) as $y)
                                    <option value="{{ $y }}" {{ $year === $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 text-md-end mt-3 mt-md-0">
                        <span class="badge bg-light text-primary border p-2 w-100 text-start text-md-end">
                            <i class="bi bi-calendar-range me-1"></i>
                            Rentang: <strong>{{ $range['start']->isoFormat('D MMM Y') }}</strong> s.d. <strong>{{ $range['end']->isoFormat('D MMM Y') }}</strong>
                        </span>
                    </div>
                </form>
            @endif
        </div>
    </div>

    @if(! $peserta)
        <!-- Empty State jika user belum ditautkan ke data profil Peserta -->
        <div class="card card-dashboard border-0 bg-white shadow-sm mb-4">
            <div class="card-body p-5 text-center">
                <i class="bi bi-person-exclamation fs-1 text-warning d-block mb-3"></i>
                <h5 class="fw-bold text-dark">Profil Pegawai Belum Ditautkan</h5>
                <p class="text-muted small mb-0">
                    Akun login Anda (<strong>{{ $user->email }}</strong>) belum ditautkan ke data profil Relawan/Pegawai SPPG.<br>
                    Silakan hubungi Petugas Tata Usaha atau Admin untuk menghubungkan akun Anda agar dapat melihat rekapitulasi kehadiran gabungan.
                </p>
            </div>
        </div>
    @else
        <!-- 6 Kartu Ringkasan Pribadi -->
        <div class="row g-3 mb-4">
            <div class="col-6 col-md-4 col-xl-2">
                <div class="card card-dashboard border-0 bg-white shadow-sm h-100">
                    <div class="card-body p-3">
                        <div class="text-muted small fw-semibold">Total Hari Kerja</div>
                        <h3 class="fw-bold my-1 text-dark">{{ $totalWorkingDays }} <span class="fs-6 text-muted fw-normal">Hari</span></h3>
                        <div class="small text-secondary"><i class="bi bi-calendar2-range me-1"></i> Hari aktif</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-xl-2">
                <div class="card card-dashboard border-0 bg-white shadow-sm h-100 border-start border-success border-4">
                    <div class="card-body p-3">
                        <div class="text-muted small fw-semibold">Hadir Tepat Waktu</div>
                        <h3 class="fw-bold my-1 text-success">{{ $record['hadir_tepat_waktu'] ?? 0 }} <span class="fs-6 text-muted fw-normal">Hari</span></h3>
                        <div class="small text-success"><i class="bi bi-check-circle me-1"></i> Skor 1.00</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-xl-2">
                <div class="card card-dashboard border-0 bg-white shadow-sm h-100 border-start border-warning border-4">
                    <div class="card-body p-3">
                        <div class="text-muted small fw-semibold">Terlambat/Awal</div>
                        <h3 class="fw-bold my-1 text-warning">{{ $record['hadir_terlambat_early'] ?? 0 }} <span class="fs-6 text-muted fw-normal">Hari</span></h3>
                        <div class="small text-warning"><i class="bi bi-clock-history me-1"></i> Skor 0.80</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-xl-2">
                <div class="card card-dashboard border-0 bg-white shadow-sm h-100 border-start border-info border-4">
                    <div class="card-body p-3">
                        <div class="text-muted small fw-semibold">Izin & Sakit</div>
                        <h3 class="fw-bold my-1 text-info">{{ ($record['izin'] ?? 0) + ($record['sakit'] ?? 0) }} <span class="fs-6 text-muted fw-normal">Hari</span></h3>
                        <div class="small text-info"><i class="bi bi-file-medical me-1"></i> {{ $record['izin'] ?? 0 }} Izin / {{ $record['sakit'] ?? 0 }} Sakit</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-xl-2">
                <div class="card card-dashboard border-0 bg-white shadow-sm h-100 border-start border-danger border-4">
                    <div class="card-body p-3">
                        <div class="text-muted small fw-semibold">Alpha</div>
                        <h3 class="fw-bold my-1 text-danger">{{ $record['alpha'] ?? 0 }} <span class="fs-6 text-muted fw-normal">Hari</span></h3>
                        <div class="small text-danger"><i class="bi bi-x-circle me-1"></i> Tanpa keterangan</div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-md-4 col-xl-2">
                <div class="card card-dashboard border-0 bg-primary-arap text-white shadow-sm h-100">
                    <div class="card-body p-3">
                        <div class="text-white-50 small fw-semibold">Total Akumulasi Poin</div>
                        <h3 class="fw-bold my-1 text-white">{{ number_format($record['total_points'] ?? 0, 2) }}</h3>
                        <div class="small text-white-50"><i class="bi bi-award-fill me-1"></i> Akumulasi Poin</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Komposisi Sumber Kehadiran & Tombol Cetak PDF -->
        <div class="card card-dashboard border-0 bg-white shadow-sm mb-4">
            <div class="card-body p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <span class="small fw-bold text-dark"><i class="bi bi-diagram-3-fill text-primary me-1"></i> Komposisi Presensi:</span>
                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle py-2 px-3">
                        <i class="bi bi-phone me-1"></i> Mobile PWA: <strong>{{ $record['sources']['mobile'] ?? 0 }}</strong> Hari
                    </span>
                    <span class="badge bg-secondary-subtle text-dark border border-secondary-subtle py-2 px-3">
                        <i class="bi bi-fingerprint me-1"></i> Mesin Sidik Jari: <strong>{{ $record['sources']['fingerprint'] ?? 0 }}</strong> Hari
                    </span>
                </div>
                <div>
                    <a href="{{ route('mobile-attendance.history.pdf', ['year' => $year, 'month' => $month, 'date' => $date]) }}"
                       class="btn btn-sm btn-danger fw-semibold px-3 shadow-sm"
                       title="Unduh Rekapitulasi Presensi Resmi Format PDF">
                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> Unduh PDF Rekap Saya
                    </a>
                </div>
            </div>
        </div>

        <!-- Tabel Rincian Harian Gabungan -->
        <div class="card card-dashboard border-0 bg-white shadow-sm mb-4">
            <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                <h6 class="fw-bold mb-0 text-primary-arap">
                    <i class="bi bi-calendar2-range-fill me-2"></i>Rincian Kehadiran Harian Gabungan
                </h6>
                <a href="{{ route('mobile-attendance.index') }}" class="btn btn-sm btn-primary-arap">
                    <i class="bi bi-camera me-1"></i> Presensi Hari Ini
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr class="small text-muted text-uppercase" style="font-size: 0.72rem;">
                                <th class="ps-3" style="width: 40px;">#</th>
                                <th style="min-width: 130px;">Tanggal & Hari</th>
                                <th style="min-width: 120px;">Sumber</th>
                                <th style="min-width: 100px;">Masuk (IN)</th>
                                <th style="min-width: 100px;">Pulang (OUT)</th>
                                <th style="min-width: 110px;">Status</th>
                                <th style="min-width: 70px;">Poin</th>
                                <th class="text-center pe-3" style="min-width: 120px;">Bukti Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dates as $index => $pDate)
                                @php
                                    $dStr = $pDate['date'];
                                    $day = $record['daily'][$dStr] ?? null;
                                    $status = $day['status'] ?? 'alpha';
                                    $score = $day['score'] ?? 0.0;
                                    $source = $day['source'] ?? '-';
                                    $checkIn = $day['check_in'] ?? '-';
                                    $checkOut = $day['check_out'] ?? '-';
                                    $isHoliday = $pDate['is_libur'];
                                    $holidayDesc = $pDate['libur_ket'];
                                    $inPhotoId = $day['in_photo_id'] ?? null;
                                    $outPhotoId = $day['out_photo_id'] ?? null;
                                    $parsedCarbon = \Carbon\Carbon::parse($dStr)->locale('id')->settings(['formatFunction' => 'translatedFormat']);
                                @endphp
                                <tr class="{{ $isHoliday ? 'table-warning-subtle' : '' }}">
                                    <td class="ps-3 text-muted small">{{ $index + 1 }}</td>
                                    <td>
                                        <div class="fw-bold text-dark" style="font-size: 0.85rem;">{{ $parsedCarbon->translatedFormat('d M Y') }}</div>
                                        <div class="small text-muted" style="font-size: 0.72rem;">{{ $parsedCarbon->translatedFormat('l') }}</div>
                                    </td>
                                    <td>
                                        @if($source === 'Mobile')
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle" style="font-size: 0.72rem;">
                                                <i class="bi bi-phone me-1"></i> Mobile PWA
                                            </span>
                                        @elseif($source === 'Fingerprint')
                                            <span class="badge bg-secondary-subtle text-dark border border-secondary-subtle" style="font-size: 0.72rem;">
                                                <i class="bi bi-fingerprint me-1"></i> Mesin Fisik
                                            </span>
                                        @elseif($source === 'Izin')
                                            <span class="badge bg-info-subtle text-info border border-info-subtle" style="font-size: 0.72rem;">
                                                <i class="bi bi-file-medical me-1"></i> Surat Izin
                                            </span>
                                        @elseif($source === 'Libur')
                                            <span class="badge bg-warning-subtle text-dark border border-warning-subtle" style="font-size: 0.72rem;">
                                                <i class="bi bi-calendar-event me-1"></i> Libur Nasional
                                            </span>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($checkIn !== '-')
                                            <div class="fw-semibold text-dark font-monospace" style="font-size: 0.85rem;">
                                                <i class="bi bi-box-arrow-in-right text-success me-1"></i>{{ $checkIn }}
                                            </div>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($checkOut !== '-')
                                            <div class="fw-semibold text-dark font-monospace" style="font-size: 0.85rem;">
                                                <i class="bi bi-box-arrow-left text-primary me-1"></i>{{ $checkOut }}
                                            </div>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($status === 'hadir' || $status === 'tepat_waktu')
                                            <span class="badge bg-success-subtle text-success fw-semibold" style="font-size: 0.72rem;">Hadir Tepat Waktu</span>
                                        @elseif($status === 'terlambat')
                                            <span class="badge bg-warning-subtle text-warning fw-semibold" style="font-size: 0.72rem;">Terlambat</span>
                                        @elseif($status === 'pulang_awal')
                                            <span class="badge bg-warning-subtle text-warning fw-semibold" style="font-size: 0.72rem;">Pulang Awal</span>
                                        @elseif($status === 'terlambat_pulang_awal')
                                            <span class="badge bg-warning-subtle text-warning fw-semibold" style="font-size: 0.72rem;">Terlambat & Awal</span>
                                        @elseif($status === 'izin')
                                            <span class="badge bg-info-subtle text-info fw-semibold" style="font-size: 0.72rem;">Izin Resmi</span>
                                        @elseif($status === 'sakit')
                                            <span class="badge bg-info-subtle text-info fw-semibold" style="font-size: 0.72rem;">Sakit</span>
                                        @elseif($status === 'libur')
                                            <span class="badge bg-secondary-subtle text-muted fw-semibold" style="font-size: 0.72rem;" title="{{ $holidayDesc }}">Libur</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger fw-semibold" style="font-size: 0.72rem;">Alpha</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-bold" style="font-size: 0.85rem; color: {{ $score >= 1.0 ? '#198754' : ($score > 0 ? '#ffc107' : '#6c757d') }};">
                                            {{ number_format($score, 2) }}
                                        </span>
                                    </td>
                                    <td class="text-center pe-3">
                                        @if($source === 'Mobile' && ($inPhotoId || $outPhotoId))
                                            <div class="btn-group btn-group-sm">
                                                @if($inPhotoId)
                                                    <button type="button" class="btn btn-outline-success btn-sm py-0 px-2"
                                                            onclick="showPhotoModal('{{ route('attendance-photos.show', $inPhotoId) }}', 'Foto Masuk (Check-in) - {{ $dStr }}')"
                                                            title="Lihat Foto Selfie Masuk">
                                                        <i class="bi bi-camera me-1"></i> Masuk
                                                    </button>
                                                @endif
                                                @if($outPhotoId)
                                                    <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2"
                                                            onclick="showPhotoModal('{{ route('attendance-photos.show', $outPhotoId) }}', 'Foto Pulang (Check-out) - {{ $dStr }}')"
                                                            title="Lihat Foto Selfie Pulang">
                                                        <i class="bi bi-camera me-1"></i> Pulang
                                                    </button>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
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
    @endif
</div>

<!-- Modal Penampil Foto Selfie Privat -->
<div class="modal fade" id="photoViewerModal" tabindex="-1" aria-labelledby="photoModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-primary-arap text-white py-2">
                <h6 class="modal-title fw-bold" id="photoModalTitle">Bukti Foto Selfie Presensi</h6>
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
