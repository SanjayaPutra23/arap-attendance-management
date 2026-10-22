@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 font-weight-bold text-dark">
                            <i class="cil-info mr-2 text-primary"></i>Detail Pengajuan Izin / Sakit
                        </h5>
                        <a href="{{ route('user.izin.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="cil-arrow-left mr-1"></i> Kembali ke Daftar
                        </a>
                    </div>
                    <div class="card-body p-4">
                        <!-- Status Banner -->
                        <div class="alert alert-{{ $izin->status == 'disetujui' ? 'success' : ($izin->status == 'ditolak' ? 'danger' : 'warning') }} d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h6 class="font-weight-bold mb-1">Status Pengajuan: {{ strtoupper($izin->status_label) }}</h6>
                                <small>Diajukan pada: {{ $izin->created_at->format('d/m/Y H:i') }} WIB</small>
                            </div>
                            <span class="badge {{ $izin->status_badge_class }} px-3 py-2 font-size-14">
                                {{ $izin->status_label }}
                            </span>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;" class="bg-light">Jenis Pengajuan</th>
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
                                            <span class="badge badge-light border ml-2">Total {{ $izin->durasi_hari }} Hari</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Alasan / Keterangan</th>
                                        <td>{{ $izin->alasan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Surat Keterangan Dokter</th>
                                        <td>
                                            @if($izin->surat_dokter)
                                                <div class="d-flex align-items-center">
                                                    <i class="cil-file text-danger mr-2 font-size-20"></i>
                                                    <a href="{{ route('user.izin.download', $izin->id) }}" class="btn btn-outline-primary btn-sm">
                                                        <i class="cil-data-transfer-down mr-1"></i> Unduh Berkas Surat Dokter
                                                    </a>
                                                </div>
                                            @else
                                                <span class="text-muted"><em>Tidak ada berkas yang dilampirkan.</em></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Verifikasi Admin</th>
                                        <td>
                                            @if($izin->approved_at)
                                                <div><strong>Diverifikasi oleh:</strong> {{ $izin->approver->name ?? 'Admin TU' }}</div>
                                                <div><small class="text-muted">Pada: {{ $izin->approved_at->format('d/m/Y H:i') }} WIB</small></div>
                                            @else
                                                <span class="text-muted"><em>Menunggu pemeriksaan dari pihak Admin.</em></span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Catatan / Umpan Balik Admin</th>
                                        <td>
                                            @if($izin->catatan_admin)
                                                <div class="p-2 bg-light border-left border-info rounded">
                                                    {{ $izin->catatan_admin }}
                                                </div>
                                            @else
                                                <span class="text-muted"><em>Tidak ada catatan khusus dari Admin.</em></span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
