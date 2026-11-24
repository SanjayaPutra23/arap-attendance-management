@extends('layouts.app')

@section('title', $mode === 'mingguan' ? 'Rekapitulasi Presensi Mingguan' : 'Rekapitulasi Presensi Bulanan')
@section('page_title', $mode === 'mingguan' ? 'Rekapitulasi Presensi Mingguan' : 'Rekapitulasi Presensi Periode 20 - 19')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-3 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-file-earmark-spreadsheet-fill me-2"></i>Rekapitulasi Kehadiran Gabungan ({{ $mode === 'mingguan' ? 'Periode Mingguan' : 'Periode 20 – 19' }})
            </h4>
            <p class="text-muted small mb-0">
                Kalkulasi poin kehadiran relawan & Officer menggabungkan Presensi Mobile GPS + Log Mesin Fingerprint + Izin Resmi SPPG Kalisapu.
            </p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <!-- Export Excel Button -->
            <a href="{{ route('admin.rekap.export-excel', request()->query()) }}" class="btn btn-sm btn-outline-success fw-semibold">
                <i class="bi bi-file-earmark-excel-fill me-1"></i> Export Excel
            </a>
            <!-- Export PDF Button -->
            <a href="{{ route('admin.rekap.export-pdf', request()->query()) }}" class="btn btn-sm btn-outline-danger fw-semibold">
                <i class="bi bi-file-earmark-pdf-fill me-1"></i> Export PDF
            </a>
        </div>
    </div>

    <!-- Mode Selector Tabs: Bulanan (20-19) vs Mingguan -->
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-3 gap-2">
        <div class="btn-group" role="group" aria-label="Mode Rekapitulasi">
            <a href="{{ route('admin.rekap.index', array_merge(request()->except(['mode', 'page']), ['mode' => 'bulanan'])) }}"
               class="btn btn-sm {{ $mode === 'bulanan' ? 'btn-primary-arap fw-bold' : 'btn-outline-secondary' }}">
                <i class="bi bi-calendar-month me-1"></i> Mode Bulanan (Cut-off 20 &ndash; 19)
            </a>
            <a href="{{ route('admin.rekap.index', array_merge(request()->except(['mode', 'page']), ['mode' => 'mingguan'])) }}"
               class="btn btn-sm {{ $mode === 'mingguan' ? 'btn-primary-arap fw-bold' : 'btn-outline-secondary' }}">
                <i class="bi bi-calendar-week me-1"></i> Mode Mingguan (Senin &ndash; Minggu)
            </a>
        </div>
    </div>

    <!-- Admin Setting Panel: Tampilan Riwayat Relawan (can:umum) -->
    @can('umum')
    <div class="card border-0 shadow-sm mb-4" style="background-color: #f1f5f9; border-left: 4px solid var(--arap-primary) !important;">
        <div class="card-body p-3 d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div class="d-flex align-items-center gap-3">
                <div class="bg-primary-arap text-white rounded p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                    <i class="bi bi-sliders fs-5"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-0 text-dark">Mode Riwayat Presensi Relawan (Mobile PWA)</h6>
                    <small class="text-muted">
                        Saat ini relawan melihat riwayat presensi dalam format:
                        <span class="badge {{ $relawanRecapMode === 'mingguan' ? 'bg-info text-dark' : 'bg-success' }}">
                            {{ $relawanRecapMode === 'mingguan' ? 'Mingguan (Senin - Minggu)' : 'Bulanan (Cut-off 20 - 19)' }}
                        </span>
                    </small>
                </div>
            </div>
            <form method="POST" action="{{ route('admin.rekap.period-setting') }}" class="d-flex align-items-center gap-2 m-0">
                @csrf
                <select name="mode" class="form-select form-select-sm" style="width: auto;">
                    <option value="bulanan" {{ $relawanRecapMode === 'bulanan' ? 'selected' : '' }}>Bulanan (Cut-off 20 - 19)</option>
                    <option value="mingguan" {{ $relawanRecapMode === 'mingguan' ? 'selected' : '' }}>Mingguan (Senin - Minggu)</option>
                </select>
                <button type="submit" class="btn btn-sm btn-primary-arap text-nowrap">
                    <i class="bi bi-check2-circle me-1"></i> Terapkan
                </button>
            </form>
        </div>
    </div>
    @endcan

    <!-- Filter Card: Bulan/Tahun atau Tanggal Minggu, Divisi, Search -->
    <div class="card border-0 shadow-sm bg-white mb-4">
        <div class="card-body p-3 p-md-4">
            <form method="GET" action="{{ route('admin.rekap.index') }}" id="filterRekapForm">
                <input type="hidden" name="mode" value="{{ $mode }}">

                <div class="row g-3 align-items-end">
                    @if($mode === 'bulanan')
                        <div class="col-12 col-sm-6 col-md-3">
                            <label class="form-label small fw-semibold text-muted mb-1">Bulan Periode Berjalan</label>
                            <select name="month" class="form-select form-select-sm" onchange="this.form.submit()">
                                @for($m = 1; $m <= 12; $m++)
                                    <option value="{{ $m }}" {{ $month === $m ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create(2026, $m, 1)->translatedFormat('F') }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="col-12 col-sm-6 col-md-2">
                            <label class="form-label small fw-semibold text-muted mb-1">Tahun</label>
                            <select name="year" class="form-select form-select-sm" onchange="this.form.submit()">
                                @for($y = date('Y') + 1; $y >= 2023; $y--)
                                    <option value="{{ $y }}" {{ $year === $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                    @else
                        <div class="col-12 col-sm-6 col-md-5">
                            <label class="form-label small fw-semibold text-muted mb-1">Pilih Tanggal Acuan Minggu</label>
                            <div class="input-group input-group-sm">
                                <a href="{{ route('admin.rekap.index', array_merge(request()->query(), ['date' => \Carbon\Carbon::parse($date)->subWeek()->toDateString()])) }}"
                                   class="btn btn-outline-secondary" title="Minggu Sebelumnya">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                                <input type="date" name="date" class="form-control" value="{{ $date }}" onchange="this.form.submit()">
                                <a href="{{ route('admin.rekap.index', array_merge(request()->query(), ['date' => \Carbon\Carbon::parse($date)->addWeek()->toDateString()])) }}"
                                   class="btn btn-outline-secondary" title="Minggu Berikutnya">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    @endif

                    <div class="col-12 col-md-4">
                        <label class="form-label small fw-semibold text-muted mb-1">Pencarian Nama / NIK</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama relawan atau NIK..." value="{{ $search }}">
                            <button type="submit" class="btn btn-primary-arap">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>

                    <div class="col-12 col-md-3">
                        <div class="p-2 border rounded bg-light text-center small">
                            <i class="bi bi-calendar3 me-1 text-primary"></i>
                            <strong>{{ $recap['period']['label'] }}</strong>
                        </div>
                    </div>
                </div>

                <!-- Division Filter Buttons -->
                <div class="mt-3 pt-3 border-top">
                    <label class="form-label small fw-semibold text-muted mb-2 d-block">
                        <i class="bi bi-funnel me-1"></i> Filter Divisi / Jabatan:
                    </label>
                    <div class="d-flex flex-wrap gap-1">
                        <input type="hidden" name="divisi" id="inputRekapDivisi" value="{{ $divisi ?? 'all' }}">

                        <button type="button" class="btn btn-sm {{ (!$divisi || $divisi === 'all') ? 'btn-primary-arap' : 'btn-outline-secondary' }} btn-rekap-divisi" data-divisi="all">
                            Semua ({{ count($recap['records']) }})
                        </button>

                        @foreach($divisions as $div)
                            @php
                                $isOfficer = strtolower($div) === 'officer';
                                $isActive = strtolower((string)$divisi) === strtolower($div);
                            @endphp
                            <button type="button"
                                    class="btn btn-sm {{ $isActive ? ($isOfficer ? 'btn-primary' : 'btn-primary-arap') : ($isOfficer ? 'btn-outline-primary fw-bold' : 'btn-outline-secondary') }} btn-rekap-divisi"
                                    data-divisi="{{ strtolower($div) }}">
                                @if($isOfficer)
                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                @endif
                                {{ $div }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Summary KPI Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-success border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Tepat Waktu (1.0)</span>
                    <div class="h3 fw-bold text-success my-1">{{ number_format($recap['summary']['total_hadir_tepat_waktu'], 0, ',', '.') }}</div>
                    <small class="text-success"><i class="bi bi-check-circle me-1"></i> Poin Maksimal</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-warning border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Terlambat/Awal (0.8)</span>
                    <div class="h3 fw-bold text-warning my-1">{{ number_format($recap['summary']['total_terlambat_early'], 0, ',', '.') }}</div>
                    <small class="text-warning"><i class="bi bi-exclamation-circle me-1"></i> Potongan 0.20</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-info border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Izin & Sakit</span>
                    <div class="h3 fw-bold text-info my-1">{{ $recap['summary']['total_izin'] + $recap['summary']['total_sakit'] }}</div>
                    <small class="text-info">{{ $recap['summary']['total_izin'] }} Izin &bull; {{ $recap['summary']['total_sakit'] }} Sakit</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-danger border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Total Alpha (0.0)</span>
                    <div class="h3 fw-bold text-danger my-1">{{ number_format($recap['summary']['total_alpha'], 0, ',', '.') }}</div>
                    <small class="text-danger"><i class="bi bi-x-circle me-1"></i> Tanpa Keterangan</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-primary border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Total Poin Periode</span>
                    <div class="h3 fw-bold text-primary my-1">{{ number_format($recap['summary']['total_points'], 2) }}</div>
                    <small class="text-primary"><i class="bi bi-award me-1"></i> Akumulasi Poin</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-secondary border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Komposisi Sumber</span>
                    <div class="h6 fw-bold text-dark my-1">
                        <i class="bi bi-phone text-primary me-1"></i> {{ $recap['summary']['source_mobile'] }}
                        &bull;
                        <i class="bi bi-fingerprint text-success me-1"></i> {{ $recap['summary']['source_fingerprint'] }}
                    </div>
                    <small class="text-muted">Mobile vs Mesin</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table Card -->
    <div class="card border-0 shadow-sm bg-white">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold mb-0 text-primary-arap">
                <i class="bi bi-card-checklist me-2"></i>Tabel Rekapitulasi Kehadiran Peserta ({{ count($recap['records']) }} Orang)
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                <thead class="table-light">
                    <tr>
                        <th style="width: 40px;">#</th>
                        <th>Relawan / Officer</th>
                        <th>Divisi</th>
                        <th class="text-center">Tepat (1.0)</th>
                        <th class="text-center">Late (0.8)</th>
                        <th class="text-center">Total Hadir</th>
                        <th class="text-center">Izin / Sakit</th>
                        <th class="text-center">Alpha</th>
                        <th class="text-center">Total Poin</th>
                        <th class="text-center">Sumber</th>
                        <th class="text-end">Rincian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recap['records'] as $index => $row)
                        <tr>
                            <td class="text-muted">{{ $index + 1 }}</td>
                            <td>
                                <div class="fw-bold text-dark">{{ $row['peserta']->name }}</div>
                                <small class="text-muted">NIK: {{ $row['peserta']->nik ?? '-' }} &bull; UID: {{ $row['peserta']->uid ?? '-' }}</small>
                            </td>
                            <td>
                                @if(strtolower((string)$row['peserta']->jabatan) === 'officer')
                                    <span class="badge bg-primary px-2 py-1">
                                        <i class="bi bi-star-fill text-warning me-1"></i> Officer
                                    </span>
                                @else
                                    <span class="badge bg-light text-secondary border px-2 py-1">
                                        {{ $row['peserta']->jabatan }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-center text-success fw-bold">{{ $row['hadir_tepat_waktu'] }}</td>
                            <td class="text-center text-warning fw-semibold">{{ $row['hadir_terlambat_early'] }}</td>
                            <td class="text-center fw-bold">{{ $row['total_hadir'] }}</td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">
                                    {{ $row['izin'] }} Izin / {{ $row['sakit'] }} Sakit
                                </span>
                            </td>
                            <td class="text-center text-danger fw-bold">{{ $row['alpha'] }}</td>
                            <td class="text-center fw-bold text-primary fs-6">
                                {{ number_format($row['total_points'], 2) }}
                            </td>
                            <td class="text-center">
                                <small class="text-muted">
                                    <span class="badge bg-primary-subtle text-primary" title="Mobile">{{ $row['sources']['mobile'] }}M</span>
                                    <span class="badge bg-success-subtle text-success" title="Mesin Fingerprint">{{ $row['sources']['fingerprint'] }}F</span>
                                </small>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.rekap.show', [$row['peserta'], 'mode' => $mode, 'date' => $date, 'year' => $year, 'month' => $month]) }}" class="btn btn-sm btn-outline-primary py-1 px-2" title="Lihat Rincian Harian">
                                    <i class="bi bi-calendar3 me-1"></i> Harian
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Tidak ada data rekapitulasi yang sesuai dengan kriteria filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.btn-rekap-divisi').forEach(btn => {
            btn.addEventListener('click', function() {
                const divisi = this.getAttribute('data-divisi');
                document.getElementById('inputRekapDivisi').value = divisi;
                document.getElementById('filterRekapForm').submit();
            });
        });
    });
</script>
@endpush
