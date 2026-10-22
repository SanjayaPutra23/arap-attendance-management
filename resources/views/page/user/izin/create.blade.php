@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                @if(isset($errors) && $errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="cil-warning mr-1"></i> Mohon periksa kembali formulir:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 font-weight-bold">
                                <i class="cil-pencil mr-2"></i>Formulir Pengajuan Izin / Sakit Mandiri
                            </h5>
                            <a href="{{ route('user.izin.index') }}" class="btn btn-outline-light btn-sm">
                                <i class="cil-arrow-left mr-1"></i> Kembali ke Riwayat
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('user.izin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body p-4">
                            <!-- Informasi Relawan -->
                            <div class="alert alert-secondary mb-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <small class="text-muted d-block">Nama Relawan</small>
                                        <strong>{{ $user->name }}</strong>
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <small class="text-muted d-block">NIK / Divisi</small>
                                        <strong>{{ $peserta->nik ?? ($user->nik ?? '-') }} &bull; {{ $peserta->jabatan_formatted ?? ($peserta->jabatan ?? '-') }}</strong>
                                    </div>
                                </div>
                            </div>

                            <!-- Pilihan Jenis Pengajuan -->
                            <div class="form-group mb-4">
                                <label class="font-weight-bold text-dark d-block">
                                    Jenis Pengajuan <span class="text-danger">*</span>
                                </label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jenis_izin" name="jenis" value="izin" class="custom-control-input" {{ old('jenis', 'izin') == 'izin' ? 'checked' : '' }} onchange="toggleDokterNote()">
                                    <label class="custom-control-label font-weight-bold" for="jenis_izin">
                                        <i class="cil-description text-primary mr-1"></i> Izin (Urusan Pribadi / Keperluan Lain)
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="jenis_sakit" name="jenis" value="sakit" class="custom-control-input" {{ old('jenis') == 'sakit' ? 'checked' : '' }} onchange="toggleDokterNote()">
                                    <label class="custom-control-label font-weight-bold" for="jenis_sakit">
                                        <i class="cil-medical-cross text-danger mr-1"></i> Sakit
                                    </label>
                                </div>
                                @error('jenis')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Periode Tanggal -->
                            <div class="row mb-3">
                                <div class="col-md-6 form-group">
                                    <label for="tgl_mulai" class="font-weight-bold text-dark">
                                        Tanggal Mulai <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control @error('tgl_mulai') is-invalid @enderror" value="{{ old('tgl_mulai', date('Y-m-d')) }}" required>
                                    @error('tgl_mulai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="tgl_selesai" class="font-weight-bold text-dark">
                                        Tanggal Selesai <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control @error('tgl_selesai') is-invalid @enderror" value="{{ old('tgl_selesai', date('Y-m-d')) }}" required>
                                    @error('tgl_selesai')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Alasan / Keterangan -->
                            <div class="form-group mb-4">
                                <label for="alasan" class="font-weight-bold text-dark">
                                    Alasan / Keterangan Lengkap <span class="text-danger">*</span>
                                </label>
                                <textarea id="alasan" name="alasan" rows="4" class="form-control @error('alasan') is-invalid @enderror" placeholder="Jelaskan alasan pengajuan izin atau diagnosa singkat jika sakit..." required>{{ old('alasan') }}</textarea>
                                <small class="form-text text-muted">Jelaskan keterangan izin secara jelas untuk pertimbangan persetujuan Admin.</small>
                                @error('alasan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Unggah Surat Dokter / Bukti -->
                            <div class="form-group mb-4" id="suratDokterSection">
                                <label for="surat_dokter" class="font-weight-bold text-dark">
                                    Unggah Bukti Surat Dokter / Dokumen Pendukung
                                    <span id="badgeOpsional" class="badge badge-secondary ml-1 font-weight-normal">Opsional</span>
                                </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('surat_dokter') is-invalid @enderror" id="surat_dokter" name="surat_dokter" accept=".pdf,.jpg,.jpeg,.png" onchange="updateFileLabel(this)">
                                    <label class="custom-file-label" for="surat_dokter" id="suratDokterLabel">Pilih file bukti (PDF, JPG, PNG maks 2MB)...</label>
                                </div>
                                <small class="form-text text-muted mt-2" id="suratDokterHelp">
                                    <i class="cil-info mr-1 text-info"></i> Untuk pengajuan sakit lebih dari 1 hari, sangat disarankan melampirkan surat keterangan dokter. Format berkas: PDF / JPG / PNG, ukuran maksimal 2 MB.
                                </small>
                                @error('surat_dokter')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer bg-light px-4 py-3 d-flex justify-content-between">
                            <a href="{{ route('user.izin.index') }}" class="btn btn-secondary">
                                <i class="cil-x mr-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="cil-check mr-1"></i> Kirim Pengajuan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateFileLabel(input) {
    var fileName = input.files && input.files.length > 0 ? input.files[0].name : 'Pilih file bukti (PDF, JPG, PNG maks 2MB)...';
    document.getElementById('suratDokterLabel').innerText = fileName;
}

function toggleDokterNote() {
    var isSakit = document.getElementById('jenis_sakit').checked;
    var badge = document.getElementById('badgeOpsional');
    var help = document.getElementById('suratDokterHelp');
    if (isSakit) {
        badge.className = 'badge badge-warning text-dark ml-1 font-weight-normal';
        badge.innerText = 'Sangat Disarankan';
        help.innerHTML = '<i class="cil-warning mr-1 text-warning"></i> Untuk kategori Sakit, unggah surat keterangan dokter agar proses verifikasi Admin lebih cepat disetujui.';
    } else {
        badge.className = 'badge badge-secondary ml-1 font-weight-normal';
        badge.innerText = 'Opsional';
        help.innerHTML = '<i class="cil-info mr-1 text-info"></i> Format berkas yang didukung: PDF / JPG / PNG, ukuran maksimal 2 MB.';
    }
}
document.addEventListener('DOMContentLoaded', toggleDokterNote);
</script>
@endsection
