@extends('layouts.app')

@section('title', 'Verifikasi Izin & Sakit')
@section('page_title', 'Verifikasi Permohonan Izin & Sakit')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-file-earmark-check-fill me-2"></i>Verifikasi Permohonan Izin & Sakit Relawan
            </h4>
            <p class="text-muted small mb-0">
                Pusat persetujuan (approval) izin dan verifikasi surat sakit relawan serta Officer SPPG Kalisapu oleh Tata Usaha.
            </p>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Total Masuk</span>
                    <div class="h3 fw-bold text-dark my-1">{{ $stats['total'] }}</div>
                    <small class="text-secondary">Seluruh pengajuan</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-warning border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Menunggu Verifikasi</span>
                    <div class="h3 fw-bold text-warning my-1">{{ $stats['menunggu'] }}</div>
                    <small class="text-warning"><i class="bi bi-hourglass-split me-1"></i> Perlu tindakan TU</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-success border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Disetujui</span>
                    <div class="h3 fw-bold text-success my-1">{{ $stats['disetujui'] }}</div>
                    <small class="text-success"><i class="bi bi-check-circle me-1"></i> Izin resmi</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-danger border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Ditolak</span>
                    <div class="h3 fw-bold text-danger my-1">{{ $stats['ditolak'] }}</div>
                    <small class="text-danger"><i class="bi bi-x-circle me-1"></i> Ditolak</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Panel -->
    <div class="card border-0 shadow-sm bg-white mb-4">
        <div class="card-body p-3 p-md-4">
            <form method="GET" action="{{ route('admin.izin.index') }}" id="filterAdminIzinForm">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-5">
                        <label class="form-label small fw-semibold text-muted mb-1">Pencarian Nama atau NIK</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama relawan atau NIK..." value="{{ $search }}">
                            <button type="submit" class="btn btn-primary-arap">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                        <label class="form-label small fw-semibold text-muted mb-1">Status Keputusan</label>
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="all" {{ ($status === 'all' || !$status) ? 'selected' : '' }}>Semua Status</option>
                            <option value="menunggu" {{ $status === 'menunggu' ? 'selected' : '' }}>Menunggu Verifikasi (Pending)</option>
                            <option value="disetujui" {{ $status === 'disetujui' ? 'selected' : '' }}>Disetujui (Approved)</option>
                            <option value="ditolak" {{ $status === 'ditolak' ? 'selected' : '' }}>Ditolak (Rejected)</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('admin.izin.index') }}" class="btn btn-sm btn-outline-secondary w-100">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                        </a>
                    </div>
                </div>

                <!-- Division Filter Buttons -->
                <div class="mt-3 pt-3 border-top">
                    <label class="form-label small fw-semibold text-muted mb-2 d-block">
                        <i class="bi bi-funnel me-1"></i> Filter Divisi / Jabatan:
                    </label>
                    <div class="d-flex flex-wrap gap-1">
                        <input type="hidden" name="divisi" id="inputIzinDivisi" value="{{ $divisi ?? 'all' }}">

                        <button type="button" class="btn btn-sm {{ (!$divisi || $divisi === 'all') ? 'btn-primary-arap' : 'btn-outline-secondary' }} btn-izin-divisi" data-divisi="all">
                            Semua ({{ $stats['total'] }})
                        </button>

                        @foreach($divisions as $div)
                            @php
                                $isOfficer = strtolower($div) === 'officer';
                                $isActive = strtolower((string)$divisi) === strtolower($div);
                            @endphp
                            <button type="button"
                                    class="btn btn-sm {{ $isActive ? ($isOfficer ? 'btn-primary' : 'btn-primary-arap') : ($isOfficer ? 'btn-outline-primary fw-bold' : 'btn-outline-secondary') }} btn-izin-divisi"
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

    <!-- Data Table -->
    <div class="card border-0 shadow-sm bg-white">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold mb-0 text-primary-arap">
                <i class="bi bi-table me-2"></i>Daftar Pengajuan Izin & Sakit ({{ $izins->total() }})
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                <thead class="table-light">
                    <tr>
                        <th>Relawan / Pegawai</th>
                        <th>Divisi</th>
                        <th>Jenis</th>
                        <th>Periode Izin</th>
                        <th>Alasan & Catatan</th>
                        <th>Bukti Surat</th>
                        <th>Status</th>
                        <th class="text-end">Aksi Verifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($izins as $item)
                        <tr>
                            <td>
                                <div class="fw-bold text-dark">{{ $item->peserta?->name ?? ($item->user?->name ?? 'Tamu') }}</div>
                                <small class="text-muted">NIK: {{ $item->peserta?->nik ?? '-' }}</small>
                            </td>
                            <td>
                                @if(strtolower((string)$item->peserta?->jabatan) === 'officer')
                                    <span class="badge bg-primary px-2 py-1">Officer</span>
                                @else
                                    <span class="badge bg-light text-secondary border px-2 py-1">
                                        {{ $item->peserta?->jabatan ?? '-' }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                @if($item->jenis === 'sakit')
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle">
                                        <i class="bi bi-heart-pulse me-1"></i> Sakit
                                    </span>
                                @else
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle">
                                        <i class="bi bi-calendar2-minus me-1"></i> Izin
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold">
                                    {{ $item->tgl_mulai ? $item->tgl_mulai->format('d/m/Y') : '-' }} s.d. {{ $item->tgl_selesai ? $item->tgl_selesai->format('d/m/Y') : '-' }}
                                </div>
                                <small class="text-muted">Diajukan: {{ $item->created_at ? $item->created_at->setTimezone('Asia/Jakarta')->format('d M Y') : '' }}</small>
                            </td>
                            <td>
                                <div class="text-dark">{{ $item->alasan }}</div>
                                @if($item->catatan_admin)
                                    <div class="p-1 px-2 mt-1 rounded bg-light border small text-secondary">
                                        <strong>Catatan:</strong> {{ $item->catatan_admin }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($item->surat_dokter)
                                    <a href="{{ route('izin-attachments.show', $item) }}" target="_blank" class="btn btn-xs btn-outline-primary py-0 px-2">
                                        <i class="bi bi-file-earmark-arrow-down me-1"></i> Unduh / Buka
                                    </a>
                                @else
                                    <span class="text-muted small">Tanpa Surat</span>
                                @endif
                            </td>
                            <td>
                                @if($item->isPending())
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">
                                        <i class="bi bi-hourglass-split me-1"></i> Menunggu
                                    </span>
                                @elseif($item->isApproved())
                                    <span class="badge bg-success-subtle text-success border border-success-subtle">
                                        <i class="bi bi-check-circle me-1"></i> Disetujui
                                    </span>
                                    @if($item->approver)
                                        <small class="d-block text-muted" style="font-size: 0.7rem;">Oleh: {{ $item->approver->name }}</small>
                                    @endif
                                @elseif($item->isRejected())
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle">
                                        <i class="bi bi-x-circle me-1"></i> Ditolak
                                    </span>
                                    @if($item->approver)
                                        <small class="d-block text-muted" style="font-size: 0.7rem;">Oleh: {{ $item->approver->name }}</small>
                                    @endif
                                @endif
                            </td>
                            <td class="text-end">
                                @can('umum')
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-review-izin py-1 px-2"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->peserta?->name ?? 'Relawan' }}"
                                            data-jenis="{{ strtoupper($item->jenis) }}"
                                            data-dates="{{ $item->tgl_mulai ? $item->tgl_mulai->format('d/m/Y') : '' }} s.d. {{ $item->tgl_selesai ? $item->tgl_selesai->format('d/m/Y') : '' }}"
                                            data-alasan="{{ $item->alasan }}"
                                            data-status="{{ $item->status }}"
                                            data-notes="{{ $item->catatan_admin }}"
                                            title="Tinjau & Putuskan">
                                        <i class="bi bi-pencil-square me-1"></i> Tinjau
                                    </button>
                                @else
                                    <span class="text-muted small">Hanya View</span>
                                @endcan
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-5">
                                <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                Tidak ada permohonan izin yang sesuai filter.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($izins->hasPages())
            <div class="card-footer bg-white border-top py-3">
                {{ $izins->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Modal Review / Approval Permohonan Izin -->
<div class="modal fade" id="reviewIzinModal" tabindex="-1" aria-labelledby="reviewIzinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-primary-arap" id="reviewIzinModalLabel">
                    <i class="bi bi-check2-circle me-1"></i> Verifikasi Permohonan Izin
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="" id="formReviewIzin">
                @csrf
                <div class="modal-body p-4">
                    <div class="p-3 bg-light rounded border mb-3">
                        <div class="fw-bold fs-6 text-dark" id="modalReviewName">Nama Relawan</div>
                        <div class="small text-muted" id="modalReviewDates">Periode Izin</div>
                        <div class="small mt-1 text-secondary" id="modalReviewAlasan">Alasan permohonan</div>
                    </div>

                    <!-- Keputusan Status -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Keputusan Persetujuan <span class="text-danger">*</span></label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="radioApprove" value="disetujui" required>
                                <label class="form-check-label small fw-semibold text-success" for="radioApprove">
                                    <i class="bi bi-check-circle-fill me-1"></i> Setujui (Approve)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="radioReject" value="ditolak">
                                <label class="form-check-label small fw-semibold text-danger" for="radioReject">
                                    <i class="bi bi-x-circle-fill me-1"></i> Tolak (Reject)
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Catatan Admin -->
                    <div class="mb-2">
                        <label for="inputReviewNotes" class="form-label small fw-semibold">Catatan Tata Usaha (Opsional)</label>
                        <textarea name="catatan_admin" id="inputReviewNotes" rows="3" class="form-control form-control-sm"
                                  placeholder="Tuliskan catatan verifikasi atau alasan penolakan..."></textarea>
                    </div>
                </div>

                <div class="modal-footer border-top py-2">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary-arap fw-semibold px-4">
                        <i class="bi bi-save me-1"></i> Simpan Keputusan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Filter Divisi
        document.querySelectorAll('.btn-izin-divisi').forEach(btn => {
            btn.addEventListener('click', function() {
                const divisi = this.getAttribute('data-divisi');
                document.getElementById('inputIzinDivisi').value = divisi;
                document.getElementById('filterAdminIzinForm').submit();
            });
        });

        // Review Button
        document.querySelectorAll('.btn-review-izin').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const jenis = this.getAttribute('data-jenis');
                const dates = this.getAttribute('data-dates');
                const alasan = this.getAttribute('data-alasan');
                const status = this.getAttribute('data-status');
                const notes = this.getAttribute('data-notes');

                const form = document.getElementById('formReviewIzin');
                form.action = `/admin/izin/${id}/review`;

                document.getElementById('modalReviewName').textContent = `${name} (${jenis})`;
                document.getElementById('modalReviewDates').textContent = `Periode: ${dates}`;
                document.getElementById('modalReviewAlasan').textContent = `Alasan: ${alasan}`;
                document.getElementById('inputReviewNotes').value = notes || '';

                if (status === 'disetujui' || status === 'approved') {
                    document.getElementById('radioApprove').checked = true;
                } else if (status === 'ditolak' || status === 'rejected') {
                    document.getElementById('radioReject').checked = true;
                } else {
                    document.getElementById('radioApprove').checked = true;
                }

                const modal = new bootstrap.Modal(document.getElementById('reviewIzinModal'));
                modal.show();
            });
        });
    });
</script>
@endpush
