@extends('layouts.app')

@section('title', 'Permohonan Izin & Sakit')
@section('page_title', 'Pengajuan Izin & Sakit Relawan')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-file-earmark-medical-fill me-2"></i>Permohonan Izin & Sakit Relawan
            </h4>
            <p class="text-muted small mb-0">
                Formulir pengajuan izin ketidakhadiran, sakit dengan surat dokter, serta pemantauan status persetujuan dari Tata Usaha.
            </p>
        </div>
        <div>
            <span class="badge bg-white border text-secondary px-3 py-2 shadow-sm">
                <i class="bi bi-person-circle me-1"></i> {{ $peserta->name ?? auth()->user()->name }}
                ({{ $peserta->jabatan ?? 'Relawan' }})
            </span>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Total Pengajuan</span>
                    <div class="h3 fw-bold text-dark my-1">{{ $stats['total'] }}</div>
                    <small class="text-secondary">Riwayat izin diajukan</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-warning border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Menunggu Verifikasi</span>
                    <div class="h3 fw-bold text-warning my-1">{{ $stats['menunggu'] }}</div>
                    <small class="text-warning"><i class="bi bi-hourglass-split me-1"></i> Sedang ditinjau</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-success border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Disetujui (Approved)</span>
                    <div class="h3 fw-bold text-success my-1">{{ $stats['disetujui'] }}</div>
                    <small class="text-success"><i class="bi bi-check-circle me-1"></i> Bebas sanksi alpha</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-danger border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Ditolak (Rejected)</span>
                    <div class="h3 fw-bold text-danger my-1">{{ $stats['ditolak'] }}</div>
                    <small class="text-danger"><i class="bi bi-x-circle me-1"></i> Tidak disetujui</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Form Pengajuan Izin / Sakit Baru -->
        <div class="col-12 col-xl-4">
            <div class="card border-0 shadow-sm bg-white sticky-top" style="top: 80px; z-index: 10;">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0 text-primary-arap">
                        <i class="bi bi-pencil-square me-1"></i> Form Pengajuan Izin / Sakit
                    </h6>
                </div>
                <div class="card-body p-3 p-md-4">
                    <form method="POST" action="{{ route('izin.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Jenis Permohonan -->
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Jenis Permohonan <span class="text-danger">*</span></label>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis" id="radioIzin" value="izin"
                                           {{ old('jenis', 'izin') === 'izin' ? 'checked' : '' }} required>
                                    <label class="form-check-label small fw-semibold" for="radioIzin">
                                        <i class="bi bi-calendar2-minus text-primary me-1"></i> Izin Keperluan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis" id="radioSakit" value="sakit"
                                           {{ old('jenis') === 'sakit' ? 'checked' : '' }}>
                                    <label class="form-check-label small fw-semibold" for="radioSakit">
                                        <i class="bi bi-heart-pulse text-danger me-1"></i> Sakit
                                    </label>
                                </div>
                            </div>
                            @error('jenis')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Rentang Tanggal -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label for="inputTglMulai" class="form-label small fw-semibold">Tanggal Mulai <span class="text-danger">*</span></label>
                                <input type="date" name="tgl_mulai" id="inputTglMulai"
                                       class="form-control form-control-sm @error('tgl_mulai') is-invalid @enderror"
                                       value="{{ old('tgl_mulai', date('Y-m-d')) }}" required>
                                @error('tgl_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="inputTglSelesai" class="form-label small fw-semibold">Tanggal Selesai <span class="text-danger">*</span></label>
                                <input type="date" name="tgl_selesai" id="inputTglSelesai"
                                       class="form-control form-control-sm @error('tgl_selesai') is-invalid @enderror"
                                       value="{{ old('tgl_selesai', date('Y-m-d')) }}" required>
                                @error('tgl_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Alasan / Keterangan -->
                        <div class="mb-3">
                            <label for="inputAlasan" class="form-label small fw-semibold">Alasan / Keterangan <span class="text-danger">*</span></label>
                            <textarea name="alasan" id="inputAlasan" rows="3"
                                      class="form-control form-control-sm @error('alasan') is-invalid @enderror"
                                      placeholder="Tuliskan alasan izin atau diagnosis sakit secara jelas..." required>{{ old('alasan') }}</textarea>
                            @error('alasan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Upload Surat Dokter / Bukti Pendukung -->
                        <div class="mb-4">
                            <label for="inputSuratDokter" class="form-label small fw-semibold">
                                Lampiran Surat Bukti / Surat Dokter
                            </label>
                            <input type="file" name="surat_dokter" id="inputSuratDokter"
                                   class="form-control form-control-sm @error('surat_dokter') is-invalid @enderror"
                                   accept=".pdf,.jpg,.jpeg,.png">
                            <small class="text-muted d-block mt-1" style="font-size: 0.72rem;">
                                <i class="bi bi-info-circle"></i> Format: PDF, JPG, PNG (Maksimal 3 MB). Disimpan secara terenkripsi privat.
                            </small>
                            @error('surat_dokter')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-sm btn-primary-arap w-100 fw-semibold py-2">
                            <i class="bi bi-send-fill me-1"></i> Kirim Permohonan Izin
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Riwayat Permohonan Izin Pribadi -->
        <div class="col-12 col-xl-8">
            <div class="card border-0 shadow-sm bg-white">
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0 text-primary-arap">
                        <i class="bi bi-clock-history me-2"></i>Riwayat Permohonan Saya ({{ $izins->total() }})
                    </h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                        <thead class="table-light">
                            <tr>
                                <th>Jenis</th>
                                <th>Periode Izin</th>
                                <th>Alasan</th>
                                <th>Bukti Surat</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($izins as $item)
                                <tr>
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
                                        <small class="text-muted">Diajukan: {{ $item->created_at ? $item->created_at->setTimezone('Asia/Jakarta')->format('d M Y H:i') : '' }}</small>
                                    </td>
                                    <td>
                                        <div class="text-dark">{{ $item->alasan }}</div>
                                        @if($item->catatan_admin)
                                            <div class="p-1 px-2 mt-1 rounded bg-light border small text-secondary">
                                                <strong>Catatan TU:</strong> {{ $item->catatan_admin }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->surat_dokter)
                                            <a href="{{ route('izin-attachments.show', $item) }}" target="_blank" class="btn btn-xs btn-outline-primary py-0 px-2">
                                                <i class="bi bi-file-earmark-arrow-down me-1"></i> Lihat Surat
                                            </a>
                                        @else
                                            <span class="text-muted small">-</span>
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
                                        @elseif($item->isRejected())
                                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle">
                                                <i class="bi bi-x-circle me-1"></i> Ditolak
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if($item->isPending())
                                            <form method="POST" action="{{ route('izin.destroy', $item) }}" class="d-inline"
                                                  onsubmit="return confirm('Batalkan pengajuan izin ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm py-0 px-2" title="Batalkan Permohonan">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                        Anda belum pernah mengajukan permohonan izin atau sakit.
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
    </div>
</div>
@endsection
