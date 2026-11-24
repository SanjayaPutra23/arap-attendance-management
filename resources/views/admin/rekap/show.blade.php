@extends('layouts.app')

@section('title', 'Rincian Kehadiran Harian - ' . $peserta->name)
@section('page_title', 'Rincian Kehadiran Harian Relawan')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-calendar-range-fill me-2"></i>Rincian Kehadiran: {{ $peserta->name }}
            </h4>
            <p class="text-muted small mb-0">
                Divisi: <strong>{{ $peserta->jabatan }}</strong> &bull; NIK: {{ $peserta->nik ?? '-' }} &bull; UID: {{ $peserta->uid ?? '-' }} &bull; Periode: <strong>{{ $recap['period']['label'] }}</strong>
            </p>
        </div>
        <div>
            <a href="{{ route('admin.rekap.index', ['mode' => $mode ?? 'bulanan', 'date' => $date ?? null, 'year' => $year, 'month' => $month]) }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Rekapitulasi
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-success border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Tepat Waktu (1.0)</span>
                    <div class="h3 fw-bold text-success my-1">{{ $record['hadir_tepat_waktu'] }} Hari</div>
                    <small class="text-success"><i class="bi bi-check-circle me-1"></i> Poin Maksimal</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-warning border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Terlambat/Awal (0.8)</span>
                    <div class="h3 fw-bold text-warning my-1">{{ $record['hadir_terlambat_early'] }} Hari</div>
                    <small class="text-warning"><i class="bi bi-exclamation-circle me-1"></i> Potongan 0.20</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-info border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Izin & Sakit</span>
                    <div class="h3 fw-bold text-info my-1">{{ $record['izin'] + $record['sakit'] }} Hari</div>
                    <small class="text-info">{{ $record['izin'] }} Izin &bull; {{ $record['sakit'] }} Sakit</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-danger border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Alpha (0.0)</span>
                    <div class="h3 fw-bold text-danger my-1">{{ $record['alpha'] }} Hari</div>
                    <small class="text-danger"><i class="bi bi-x-circle me-1"></i> Tidak Hadir</small>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 col-xl-4">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-primary border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Total Poin Terkumpul</span>
                    <div class="h2 fw-bold text-primary my-1">{{ number_format($record['total_points'], 2) }} Poin</div>
                    <small class="text-muted">
                        Sumber: <span class="badge bg-primary-subtle text-primary">{{ $record['sources']['mobile'] }} Mobile</span>
                        &bull;
                        <span class="badge bg-success-subtle text-success">{{ $record['sources']['fingerprint'] }} Mesin Fisik</span>
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Daily Breakdown Table -->
    <div class="card border-0 shadow-sm bg-white">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold mb-0 text-primary-arap">
                <i class="bi bi-calendar3 me-2"></i>Catatan Presensi Harian Lengkap (Periode {{ $recap['period']['label'] }})
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                <thead class="table-light">
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Tanggal & Hari</th>
                        <th>Status Kehadiran</th>
                        <th>Jam Masuk (IN)</th>
                        <th>Jam Pulang (OUT)</th>
                        <th>Sumber Data</th>
                        <th class="text-center">Skor Poin</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recap['dates'] as $index => $pDate)
                        @php
                            $dStr = $pDate['date'];
                            $dayDetail = $record['daily'][$dStr] ?? null;
                            $status = $dayDetail['status'] ?? 'alpha';
                            $score = $dayDetail['score'] ?? 0.0;
                            $source = $dayDetail['source'] ?? '-';
                            $checkIn = $dayDetail['check_in'] ?? '-';
                            $checkOut = $dayDetail['check_out'] ?? '-';
                            $isHoliday = $pDate['is_libur'];
                            $holidayDesc = $pDate['libur_ket'];
                        @endphp
                        <tr class="{{ $isHoliday ? 'table-warning-subtle' : '' }}">
                            <td class="text-muted">{{ $index + 1 }}</td>
                            <td>
                                <div class="fw-bold text-dark">
                                    {{ \Carbon\Carbon::parse($dStr)->translatedFormat('l, d F Y') }}
                                </div>
                                @if($isHoliday)
                                    <small class="text-danger fw-semibold"><i class="bi bi-calendar-x me-1"></i> {{ $holidayDesc }}</small>
                                @endif
                            </td>
                            <td>
                                @if($status === 'tepat_waktu' || $status === 'hadir')
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">
                                        <i class="bi bi-check-circle me-1"></i> Tepat Waktu
                                    </span>
                                @elseif($status === 'terlambat')
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">
                                        <i class="bi bi-clock-history me-1"></i> Terlambat
                                    </span>
                                @elseif($status === 'pulang_awal')
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">
                                        <i class="bi bi-box-arrow-right me-1"></i> Pulang Cepat
                                    </span>
                                @elseif($status === 'terlambat_pulang_awal')
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">
                                        <i class="bi bi-exclamation-triangle me-1"></i> Terlambat & Awal
                                    </span>
                                @elseif($status === 'izin')
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">
                                        <i class="bi bi-calendar2-minus me-1"></i> Izin Resmi
                                    </span>
                                @elseif($status === 'sakit')
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle">
                                        <i class="bi bi-heart-pulse me-1"></i> Sakit
                                    </span>
                                @elseif($status === 'libur')
                                    <span class="badge bg-secondary-subtle text-secondary border">
                                        <i class="bi bi-moon-stars me-1"></i> Libur
                                    </span>
                                @else
                                    <span class="badge bg-danger text-white">
                                        <i class="bi bi-x-circle me-1"></i> Alpha
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if($checkIn !== '-')
                                    <span class="badge bg-light text-dark border"><i class="bi bi-clock me-1"></i>{{ $checkIn }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($checkOut !== '-')
                                    <span class="badge bg-light text-dark border"><i class="bi bi-clock-fill me-1"></i>{{ $checkOut }}</span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                @if($source === 'Mobile')
                                    <span class="badge bg-primary"><i class="bi bi-phone me-1"></i> Mobile PWA</span>
                                @elseif($source === 'Fingerprint')
                                    <span class="badge bg-success"><i class="bi bi-fingerprint me-1"></i> Mesin Fisik</span>
                                @elseif($source === 'Izin')
                                    <span class="badge bg-info text-dark"><i class="bi bi-file-medical me-1"></i> Surat Izin</span>
                                @elseif($source === 'Libur')
                                    <span class="badge bg-secondary">Hari Libur</span>
                                @else
                                    <span class="text-muted small">Sistem</span>
                                @endif
                            </td>
                            <td class="text-center fw-bold {{ $score >= 1.0 ? 'text-success' : ($score > 0 ? 'text-warning' : 'text-muted') }}">
                                {{ number_format($score, 2) }}
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ $dayDetail['notes'] ?? ($isHoliday ? $holidayDesc : '-') }}
                                </small>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
