@extends('layouts.app')

@section('title', 'Kelola Hari Libur Nasional')
@section('page_title', 'Master Hari Libur Nasional')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Title & Action Buttons -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-calendar-event-fill me-2"></i>Kelola Hari Libur Nasional
            </h4>
            <p class="text-muted small mb-0">
                Atur kalender libur nasional dan cuti bersama resmi untuk akurasi perhitungan rekapitulasi kehadiran SPPG Kalisapu.
            </p>
        </div>
        <div class="d-flex align-items-center gap-2 flex-wrap">
            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#syncApiModal">
                <i class="bi bi-cloud-arrow-down me-1"></i> Sinkronkan Libur Nasional (API)
            </button>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addLiburModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah Hari Libur
            </button>
        </div>
    </div>

    <!-- Filter & Search Card -->
    <div class="card border-0 shadow-sm bg-white mb-4">
        <div class="card-body p-3">
            <form method="GET" action="{{ route('admin.libur.index') }}" class="row g-2 align-items-center">
                <div class="col-12 col-md-3">
                    <label for="filterYear" class="form-label small fw-semibold text-muted mb-1">Filter Tahun</label>
                    <select name="year" id="filterYear" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="all" {{ ($selectedYear === 'all' || ! $selectedYear) ? 'selected' : '' }}>Semua Tahun (Arsip Lengkap)</option>
                        @foreach($availableYears as $yearOption)
                            <option value="{{ $yearOption }}" {{ (string) $selectedYear === (string) $yearOption ? 'selected' : '' }}>
                                Tahun {{ $yearOption }} {{ $yearOption == $currentYear ? '(Tahun Berjalan)' : '' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 col-md-6">
                    <label for="searchQuery" class="form-label small fw-semibold text-muted mb-1">Cari Keterangan / Tanggal</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text bg-light text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" id="searchQuery" class="form-control" placeholder="Contoh: Idul Fitri, Kemerdekaan, 2026-08..." value="{{ $search }}">
                    </div>
                </div>

                <div class="col-12 col-md-3 d-flex align-items-end gap-2 pt-md-3">
                    <button type="submit" class="btn btn-sm btn-primary flex-grow-1">
                        <i class="bi bi-funnel me-1"></i> Filter
                    </button>
                    <a href="{{ route('admin.libur.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- List Table Card -->
    <div class="card border-0 shadow-sm bg-white">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold mb-0 text-primary-arap">
                <i class="bi bi-list-check me-2"></i>Daftar Hari Libur ({{ $liburs->total() }} Data Ditemukan)
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                <thead class="table-light">
                    <tr>
                        <th style="width: 50px;" class="text-center">#</th>
                        <th style="width: 250px;">Tanggal & Hari</th>
                        <th>Keterangan Hari Libur</th>
                        <th style="width: 130px;" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($liburs as $index => $item)
                        @php
                            $parsedDate = null;
                            try {
                                $parsedDate = \Carbon\Carbon::parse($item->tanggal)->locale('id')->settings(['formatFunction' => 'translatedFormat']);
                            } catch (\Throwable $e) {}
                        @endphp
                        <tr>
                            <td class="text-center text-muted">{{ $liburs->firstItem() + $index }}</td>
                            <td>
                                @if($parsedDate)
                                    <div class="fw-bold text-dark">{{ $parsedDate->translatedFormat('l, d F Y') }}</div>
                                    <small class="text-muted font-monospace"><i class="bi bi-calendar3 me-1"></i>{{ $item->tanggal }}</small>
                                @else
                                    <span class="font-monospace fw-bold">{{ $item->tanggal }}</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-semibold text-secondary">{{ $item->ket }}</span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline-secondary btn-edit-libur"
                                        data-id="{{ $item->id }}"
                                        data-tanggal="{{ $item->tanggal }}"
                                        data-ket="{{ $item->ket }}"
                                        title="Edit Hari Libur">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-delete-libur"
                                        data-id="{{ $item->id }}"
                                        data-ket="{{ $item->ket }}"
                                        data-tanggal="{{ $item->tanggal }}"
                                        title="Hapus Hari Libur">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                                <form id="delete-form-{{ $item->id }}" action="{{ route('admin.libur.destroy', $item) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-calendar-x fs-1 d-block mb-2 text-secondary"></i>
                                <span>Tidak ada data hari libur yang sesuai dengan filter atau kata kunci pencarian.</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($liburs->hasPages())
            <div class="card-footer bg-white border-top py-3 d-flex justify-content-center">
                {{ $liburs->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Modal Tambah Hari Libur -->
<div class="modal fade" id="addLiburModal" tabindex="-1" aria-labelledby="addLiburModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form method="POST" action="{{ route('admin.libur.store') }}">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h6 class="modal-title fw-bold" id="addLiburModalLabel">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Hari Libur Nasional
                    </h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="addTanggal" class="form-label small fw-semibold">Tanggal Hari Libur <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" id="addTanggal" class="form-control" required value="{{ old('tanggal', date('Y-m-d')) }}">
                        <div class="form-text">Pilih tanggal spesifik yang ditetapkan sebagai hari libur nasional atau cuti bersama.</div>
                    </div>
                    <div class="mb-3">
                        <label for="addKet" class="form-label small fw-semibold">Keterangan / Nama Libur <span class="text-danger">*</span></label>
                        <input type="text" name="ket" id="addKet" class="form-control" placeholder="Contoh: Hari Raya Idul Fitri 1447 H" required maxlength="255" value="{{ old('ket') }}">
                    </div>
                </div>
                <div class="modal-footer bg-light py-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Simpan Hari Libur
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Hari Libur -->
<div class="modal fade" id="editLiburModal" tabindex="-1" aria-labelledby="editLiburModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form id="editLiburForm" method="POST" action="">
                @csrf
                @method('PUT')
                <div class="modal-header bg-dark text-white">
                    <h6 class="modal-title fw-bold" id="editLiburModalLabel">
                        <i class="bi bi-pencil-square me-1"></i> Edit Hari Libur Nasional
                    </h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="editTanggal" class="form-label small fw-semibold">Tanggal Hari Libur <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal" id="editTanggal" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="editKet" class="form-label small fw-semibold">Keterangan / Nama Libur <span class="text-danger">*</span></label>
                        <input type="text" name="ket" id="editKet" class="form-control" required maxlength="255">
                    </div>
                </div>
                <div class="modal-footer bg-light py-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="bi bi-check-circle me-1"></i> Perbarui Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Sinkronkan API -->
<div class="modal fade" id="syncApiModal" tabindex="-1" aria-labelledby="syncApiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form method="POST" action="{{ route('admin.libur.sync-api') }}">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h6 class="modal-title fw-bold" id="syncApiModalLabel">
                        <i class="bi bi-cloud-arrow-down me-1"></i> Sinkronisasi Hari Libur Nasional dari API
                    </h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-muted small">
                        Fitur ini akan mengambil daftar libur nasional resmi Republik Indonesia secara otomatis melalui API publik dan menyimpannya ke database.
                    </p>
                    <div class="alert alert-info py-2 small mb-3">
                        <i class="bi bi-info-circle me-1"></i> Data yang sudah ada di database tidak akan ditimpa atau diduplikasi.
                    </div>
                    <div class="mb-3">
                        <label for="syncTargetYear" class="form-label small fw-semibold">Pilih Tahun Target Sinkronisasi <span class="text-danger">*</span></label>
                        <select name="target_year" id="syncTargetYear" class="form-select" required>
                            @foreach($availableYears as $yearOption)
                                <option value="{{ $yearOption }}" {{ $yearOption == $currentYear ? 'selected' : '' }}>
                                    Tahun {{ $yearOption }} {{ $yearOption == $currentYear ? '(Tahun Berjalan)' : '' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light py-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary" id="btnSubmitSync">
                        <i class="bi bi-cloud-download me-1"></i> Mulai Sinkronisasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Handler Modal Edit
    var editModal = new bootstrap.Modal(document.getElementById('editLiburModal'));
    var editForm = document.getElementById('editLiburForm');
    var editTanggal = document.getElementById('editTanggal');
    var editKet = document.getElementById('editKet');

    document.querySelectorAll('.btn-edit-libur').forEach(function (button) {
        button.addEventListener('click', function () {
            var id = this.getAttribute('data-id');
            var tanggal = this.getAttribute('data-tanggal');
            var ket = this.getAttribute('data-ket');

            editForm.action = '/admin/libur/' + id;
            editTanggal.value = tanggal;
            editKet.value = ket;

            editModal.show();
        });
    });

    // Handler Konfirmasi Hapus
    document.querySelectorAll('.btn-delete-libur').forEach(function (button) {
        button.addEventListener('click', function () {
            var id = this.getAttribute('data-id');
            var ket = this.getAttribute('data-ket');
            var tanggal = this.getAttribute('data-tanggal');

            if (confirm('Apakah Anda yakin ingin menghapus hari libur: "' + ket + '" (' + tanggal + ')?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    });

    // Loading indicator on sync API submit
    var syncForm = document.querySelector('#syncApiModal form');
    var btnSubmitSync = document.getElementById('btnSubmitSync');
    if (syncForm && btnSubmitSync) {
        syncForm.addEventListener('submit', function () {
            btnSubmitSync.disabled = true;
            btnSubmitSync.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Menghubungkan API...';
        });
    }
});
</script>
@endpush
