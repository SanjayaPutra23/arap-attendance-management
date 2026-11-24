@extends('layouts.app')

@section('title', 'Arsip Log Fingerprint')
@section('page_title', 'Arsip Log Mesin FPDAPUR1')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-hdd-network-fill me-2"></i>Arsip Log Mesin Fingerprint (FPDAPUR1)
            </h4>
            <p class="text-muted small mb-0">
                Data historis tap mesin presensi fisik dapur SPPG Kalisapu (read-only) sebagai sumber arsip dan rujukan rekapitulasi.
            </p>
        </div>
        <div>
            <span class="badge bg-secondary-subtle text-secondary border px-3 py-2">
                <i class="bi bi-lock-fill me-1"></i> Data Historis Terkunci (Read-Only)
            </span>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm bg-white h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Total Log Mesin Tercatat</span>
                    <div class="h3 fw-bold text-dark my-1">{{ number_format($stats['total_logs'], 0, ',', '.') }}</div>
                    <small class="text-secondary"><i class="bi bi-database me-1"></i> Rekaman tabel <code>pools</code></small>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-primary border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Peserta Terdaftar Mesin</span>
                    <div class="h3 fw-bold text-primary my-1">{{ number_format($stats['total_peserta_mesin'], 0, ',', '.') }}</div>
                    <small class="text-primary"><i class="bi bi-people me-1"></i> Distinct UID User</small>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-info border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Perangkat Mesin</span>
                    <div class="h3 fw-bold text-info my-1">{{ $stats['mesin_count'] }} Unit</div>
                    <small class="text-muted">FPDAPUR1 & terminal terdaftar</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Panel -->
    <div class="card border-0 shadow-sm bg-white mb-4">
        <div class="card-body p-3 p-md-4">
            <form method="GET" action="{{ route('admin.arsip-fingerprint.index') }}">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-3">
                        <label class="form-label small fw-semibold text-muted mb-1">Tanggal Mulai</label>
                        <input type="date" name="start_date" class="form-control form-control-sm" value="{{ $startDate }}">
                    </div>
                    <div class="col-12 col-md-3">
                        <label class="form-label small fw-semibold text-muted mb-1">Tanggal Selesai</label>
                        <input type="date" name="end_date" class="form-control form-control-sm" value="{{ $endDate }}">
                    </div>
                    <div class="col-12 col-md-2">
                        <label class="form-label small fw-semibold text-muted mb-1">Pilihan Mesin</label>
                        <select name="mesin_id" class="form-select form-select-sm">
                            <option value="all" {{ ($mesinId === 'all' || !$mesinId) ? 'selected' : '' }}>Semua Mesin</option>
                            @foreach($mesins as $m)
                                <option value="{{ $m->id }}" {{ (string)$mesinId === (string)$m->id ? 'selected' : '' }}>
                                    {{ $m->name }} (ID: {{ $m->id }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-2">
                        <label class="form-label small fw-semibold text-muted mb-1">Cari Nama / UID</label>
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Nama / UID..." value="{{ $search }}">
                    </div>
                    <div class="col-12 col-md-2 d-flex gap-2">
                        <button type="submit" class="btn btn-sm btn-primary-arap flex-grow-1">
                            <i class="bi bi-search me-1"></i> Filter
                        </button>
                        <a href="{{ route('admin.arsip-fingerprint.index') }}" class="btn btn-sm btn-outline-secondary" title="Reset">
                            <i class="bi bi-arrow-counterclockwise"></i>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table -->
    <div class="card border-0 shadow-sm bg-white">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold mb-0 text-primary-arap">
                <i class="bi bi-list-ul me-2"></i>Daftar Riwayat Log Mesin Fisik (Menampilkan {{ $logs->firstItem() ?? 0 }} - {{ $logs->lastItem() ?? 0 }} dari {{ number_format($logs->total(), 0, ',', '.') }})
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.85rem;">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Waktu Tap Mesin</th>
                        <th>Relawan / Pegawai</th>
                        <th>UID Mesin</th>
                        <th>Mesin Fingerprint</th>
                        <th>Tipe / State</th>
                        <th>Timestamp Mentah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $index => $item)
                        <tr>
                            <td class="text-muted">{{ $logs->firstItem() + $index }}</td>
                            <td>
                                <div class="fw-bold text-dark">
                                    <i class="bi bi-calendar-event me-1 text-primary"></i>
                                    {{ $item->date ? $item->date->format('d/m/Y') : '-' }}
                                </div>
                                <span class="badge bg-light text-dark border">
                                    <i class="bi bi-clock me-1"></i>{{ $item->time ?? '-' }} WIB
                                </span>
                            </td>
                            <td>
                                @if($item->peserta)
                                    <div class="fw-semibold text-dark">{{ $item->peserta->name }}</div>
                                    <small class="text-muted">NIK: {{ $item->peserta->nik ?? '-' }} &bull; {{ $item->peserta->jabatan }}</small>
                                @else
                                    <span class="text-muted fst-italic">UID {{ $item->iduser }} (Belum ditautkan)</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary px-2">
                                    {{ $item->iduser }}
                                </span>
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $item->mesin?->name ?? "Mesin #{$item->mesin_id}" }}</div>
                                @if($item->mesin?->ip)
                                    <small class="text-muted">{{ $item->mesin->ip }}</small>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border">
                                    State: {{ $item->state }} &bull; Type: {{ $item->type }}
                                </span>
                            </td>
                            <td>
                                <code class="small text-muted">{{ $item->timestamp ? $item->timestamp->format('Y-m-d H:i:s') : '-' }}</code>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="bi bi-hdd-network fs-3 d-block mb-2"></i>
                                Tidak ada log mesin yang sesuai dengan kriteria filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
            <div class="card-footer bg-white border-top py-3">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
