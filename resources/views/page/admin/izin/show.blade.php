@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                @if(isset($errors) && $errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="cil-warning mr-1"></i> Terjadi kesalahan:</strong>
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

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 font-weight-bold text-dark">
                            <i class="cil-clipboard mr-2 text-primary"></i>Verifikasi Permohonan Izin / Sakit
                        </h5>
                        <a href="{{ route('admin.izin.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="cil-arrow-left mr-1"></i> Kembali ke Daftar
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <!-- Relawan Profil Banner -->
                        <div class="card bg-light border-0 mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="text-muted small">NAMA RELAWAN / PEGAWAI</div>
                                        <h5 class="font-weight-bold text-dark mb-1">{{ $izin->user->name ?? 'User #'.$izin->user_id }}</h5>
                                        <div class="text-muted small">Email: {{ $izin->user->email ?? '-' }} &bull; Telepon: {{ $izin->user->telp ?? '-' }}</div>
                                    </div>
                                    <div class="col-md-6 mt-3 mt-md-0 border-left-md">
                                        <div class="text-muted small">IDENTITAS PRESENSI / DIVISI</div>
                                        <h6 class="font-weight-bold text-dark mb-1">
                                            NIK: {{ $izin->peserta->nik ?? ($izin->user->nik ?? '-') }} &bull; UID: {{ $izin->peserta->uid ?? '-' }}
                                        </h6>
                                        <div class="text-muted small">Divisi: <strong>{{ $izin->peserta->jabatan_formatted ?? ($izin->peserta->jabatan ?? '-') }}</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Permohonan -->
                        <div class="table-responsive mb-4">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 220px;" class="bg-light">Jenis Permohonan</th>
                                        <td>
                                            <span class="badge {{ $izin->jenis == 'sakit' ? 'badge-info' : 'badge-primary' }} px-3 py-1 font-size-14">
                                                {{ strtoupper($izin->jenis) }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Periode Izin / Sakit</th>
                                        <td>
                                            <strong>{{ $izin->tgl_mulai->format('d F Y') }}</strong>
                                            @if($izin->tgl_mulai->ne($izin->tgl_selesai))
                                                sampai dengan <strong>{{ $izin->tgl_selesai->format('d F Y') }}</strong>
                                            @endif
                                            <span class="badge badge-secondary ml-2">Total {{ $izin->durasi_hari }} Hari</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Alasan / Keterangan</th>
                                        <td>
                                            <div class="p-2 bg-white rounded border">
                                                {{ $izin->alasan }}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Surat Keterangan Dokter</th>
                                        <td>
                                            @if($izin->surat_dokter)
                                                <div class="d-flex align-items-center">
                                                    <i class="cil-file text-danger mr-2 font-size-24"></i>
                                                    <div>
                                                        <div><strong>Berkas Terlampir:</strong> {{ basename($izin->surat_dokter) }}</div>
                                                        <a href="{{ route('admin.izin.download', $izin->id) }}" class="btn btn-primary btn-sm mt-1">
                                                            <i class="cil-data-transfer-down mr-1"></i> Unduh / Buka Dokumen
                                                        </a>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-muted"><em>Tidak ada surat keterangan dokter yang dilampirkan.</em></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Waktu Pengajuan</th>
                                        <td>{{ $izin->created_at->format('d/m/Y H:i:s') }} WIB</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Status Saat Ini</th>
                                        <td>
                                            <span class="badge {{ $izin->status_badge_class }} px-3 py-2 font-size-14">
                                                {{ $izin->status_label }}
                                            </span>
                                            @if($izin->approved_at)
                                                <span class="text-muted small ml-2">
                                                    (Oleh: <strong>{{ $izin->approver->name ?? 'Admin' }}</strong> pada {{ $izin->approved_at->format('d/m/Y H:i') }} WIB)
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @if($izin->catatan_admin)
                                        <tr>
                                            <th class="bg-light">Catatan / Alasan Admin</th>
                                            <td>
                                                <div class="p-2 bg-light border-left border-{{ $izin->status == 'disetujui' ? 'success' : 'danger' }} rounded">
                                                    {{ $izin->catatan_admin }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        <!-- Form Tindakan Verifikasi (Jika masih menunggu atau ingin update) -->
                        <div class="card border {{ $izin->status == 'menunggu' ? 'border-primary' : 'border-secondary' }} shadow-none">
                            <div class="card-header {{ $izin->status == 'menunggu' ? 'bg-primary text-white' : 'bg-light text-dark' }} py-2 font-weight-bold">
                                <i class="cil-check-circle mr-1"></i> Tindakan Verifikasi Admin
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Kolom Setujui -->
                                    <div class="col-md-6 border-right">
                                        <h6 class="font-weight-bold text-success mb-2">
                                            <i class="cil-check mr-1"></i> Setujui Permohonan
                                        </h6>
                                        <p class="text-muted small mb-3">
                                            Berikan persetujuan jika data dan alasan pengajuan izin/sakit valid.
                                        </p>
                                        <form action="{{ route('admin.izin.approve', $izin->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="catatan_approve" class="small text-muted">Catatan Admin (Opsional):</label>
                                                <input type="text" name="catatan_admin" id="catatan_approve" class="form-control form-control-sm" placeholder="Contoh: Disetujui, jaga kesehatan.">
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block" onclick="return confirm('Apakah Anda yakin ingin MENYETUJUI permohonan ini?')">
                                                <i class="cil-check mr-1"></i> Setujui Pengajuan
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Kolom Tolak -->
                                    <div class="col-md-6 mt-4 mt-md-0">
                                        <h6 class="font-weight-bold text-danger mb-2">
                                            <i class="cil-x mr-1"></i> Tolak Permohonan
                                        </h6>
                                        <p class="text-muted small mb-3">
                                            Tolak permohonan dengan menyertakan alasan yang jelas kepada relawan.
                                        </p>
                                        <form action="{{ route('admin.izin.reject', $izin->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="catatan_reject" class="small text-muted">Alasan Penolakan <span class="text-danger">*</span>:</label>
                                                <input type="text" name="catatan_admin" id="catatan_reject" class="form-control form-control-sm" placeholder="Contoh: Bukti surat dokter tidak jelas / jadwal mendesak." required>
                                            </div>
                                            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Apakah Anda yakin ingin MENOLAK permohonan ini?')">
                                                <i class="cil-x mr-1"></i> Tolak Pengajuan
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
