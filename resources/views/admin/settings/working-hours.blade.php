@extends('layouts.app')

@section('title', 'Pengaturan Jam Kerja Divisi')
@section('page_title', 'Pengaturan Jam Kerja & Officer')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-clock-history me-2"></i>Pengaturan Jam Kerja Divisi & Officer SPPG
            </h4>
            <p class="text-muted small mb-0">
                Tentukan batas jam kedatangan (check-in) dan jam kepulangan (check-out) per divisi kerja untuk kalkulasi status presensi dan poin otomatis.
            </p>
        </div>
    </div>

    <!-- Info Alert -->
    <div class="alert alert-info border-0 shadow-sm d-flex align-items-start gap-3 mb-4">
        <i class="bi bi-info-circle-fill fs-4 text-info mt-1"></i>
        <div class="small">
            <strong>Aturan Bisnis Jam Kerja & Penilaian Poin SPPG Kalisapu:</strong>
            <ul class="mb-0 mt-1 ps-3">
                <li>Relawan yang melakukan check-in sebelum atau tepat pada <strong>Jam Datang</strong> dan check-out setelah <strong>Jam Pulang</strong> berhak atas poin penuh <strong>1.00 (Tepat Waktu)</strong>.</li>
                <li>Kedatangan setelah jam datang (terlambat) atau kepulangan sebelum jam pulang (pulang awal) mendapatkan skor <strong>0.80</strong>.</li>
                <li>Perubahan jam kerja di bawah ini langsung tersimpan ke tabel <code>settings</code> secara non-destruktif tanpa mempengaruhi konfigurasi sistem lainnya.</li>
            </ul>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.settings.working-hours.update') }}" id="workingHoursForm">
        @csrf

        <div class="row g-4 mb-4">
            @foreach($divisions as $key => $div)
                @php
                    $isOfficer = $key === 'officer';
                    // Format waktu untuk input time (HH:MM:SS atau HH:MM)
                    $jamDatang = substr($div['jam_datang'], 0, 5);
                    $jamPulang = substr($div['jam_pulang'], 0, 5);
                @endphp
                <div class="col-12 col-md-6 col-xl-3">
                    <div class="card h-100 border-0 shadow-sm bg-white {{ $isOfficer ? 'border-top border-primary border-4' : '' }}">
                        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-bold mb-0 {{ $isOfficer ? 'text-primary' : 'text-dark' }}">
                                    @if($isOfficer)
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                    @endif
                                    {{ $div['label'] }}
                                </h6>
                                <small class="text-muted" style="font-size: 0.72rem;">{{ $div['description'] }}</small>
                            </div>
                            <span class="badge bg-light text-secondary border">
                                <i class="bi bi-people me-1"></i> {{ $div['peserta_count'] }} relawan
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-2">
                                <div class="col-6">
                                    <label class="form-label small fw-semibold text-muted mb-1">
                                        <i class="bi bi-box-arrow-in-right text-success me-1"></i> Jam Datang
                                    </label>
                                    <input type="time" step="1" name="hours[{{ $key }}][jam_datang]"
                                           class="form-control form-control-sm @error("hours.{$key}.jam_datang") is-invalid @enderror"
                                           value="{{ old("hours.{$key}.jam_datang", $jamDatang) }}" required>
                                    @error("hours.{$key}.jam_datang")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label class="form-label small fw-semibold text-muted mb-1">
                                        <i class="bi bi-box-arrow-right text-danger me-1"></i> Jam Pulang
                                    </label>
                                    <input type="time" step="1" name="hours[{{ $key }}][jam_pulang]"
                                           class="form-control form-control-sm @error("hours.{$key}.jam_pulang") is-invalid @enderror"
                                           value="{{ old("hours.{$key}.jam_pulang", $jamPulang) }}" required>
                                    @error("hours.{$key}.jam_pulang")
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-light py-2 px-3 small text-muted border-top d-flex justify-content-between align-items-center" style="font-size: 0.75rem;">
                            <span>Setting Key:</span>
                            <code>jam_datang_{{ $key }}</code>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Submit Button Card -->
        <div class="card border-0 shadow-sm bg-white p-3 d-flex flex-row align-items-center justify-content-between">
            <span class="small text-muted">
                <i class="bi bi-shield-lock me-1"></i> Hanya staf berwenang (Gate: <code>umum</code> / Ultraman) yang dapat memperbarui pengaturan ini.
            </span>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.settings.working-hours.index') }}" class="btn btn-sm btn-outline-secondary">
                    Batal
                </a>
                <button type="submit" class="btn btn-sm btn-primary-arap fw-semibold px-4">
                    <i class="bi bi-save me-1"></i> Simpan Seluruh Jadwal Jam Kerja
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
