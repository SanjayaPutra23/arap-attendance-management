@extends('layouts.app')

@section('css')
<style>
    .volunteer-header-card {
        background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
        color: #ffffff;
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .stat-badge-filter {
        display: inline-flex;
        align-items: center;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none !important;
        margin-right: 8px;
        margin-bottom: 8px;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }
    .stat-badge-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    .badge-izin {
        background-color: #0284c7;
        color: #ffffff;
    }
    .badge-sakit {
        background-color: #ea580c;
        color: #ffffff;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="cil-check-circle mr-2"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="cil-warning mr-2"></i> {{ session('warning') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Header Card -->
        <div class="volunteer-header-card">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                <div>
                    <h3 class="mb-1 font-weight-bold">Pengajuan Izin & Sakit Mandiri</h3>
                    <p class="mb-0 text-light opacity-75">
                        Relawan: <strong>{{ $user->name }}</strong> (NIK: {{ $peserta->nik ?? ($user->nik ?? '-') }}) &bull; Divisi: <strong>{{ $peserta->jabatan_formatted ?? ($peserta->jabatan ?? '-') }}</strong>
                    </p>
                </div>
                <div class="mt-3 mt-md-0">
                    <a href="{{ route('user.izin.create') }}" class="btn btn-primary btn-lg shadow-sm">
                        <i class="cil-plus mr-1"></i> Buat Pengajuan Baru
                    </a>
                </div>
            </div>
        </div>

        <!-- Filter & Statistics -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="d-flex flex-wrap">
                        <a href="{{ route('user.izin.index') }}" class="stat-badge-filter {{ !request('status') ? 'bg-primary text-white' : 'bg-light text-dark border' }}">
                            Semua <span class="badge badge-light ml-2">{{ $counts['total'] }}</span>
                        </a>
                        <a href="{{ route('user.izin.index', ['status' => 'menunggu']) }}" class="stat-badge-filter {{ request('status') == 'menunggu' ? 'bg-warning text-dark font-weight-bold' : 'bg-light text-dark border' }}">
                            Menunggu <span class="badge badge-warning text-dark ml-2">{{ $counts['menunggu'] }}</span>
                        </a>
                        <a href="{{ route('user.izin.index', ['status' => 'disetujui']) }}" class="stat-badge-filter {{ request('status') == 'disetujui' ? 'bg-success text-white' : 'bg-light text-dark border' }}">
                            Disetujui <span class="badge badge-success ml-2">{{ $counts['disetujui'] }}</span>
                        </a>
                        <a href="{{ route('user.izin.index', ['status' => 'ditolak']) }}" class="stat-badge-filter {{ request('status') == 'ditolak' ? 'bg-danger text-white' : 'bg-light text-dark border' }}">
                            Ditolak <span class="badge badge-danger ml-2">{{ $counts['ditolak'] }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 font-weight-bold text-dark">
                    <i class="cil-history mr-2 text-primary"></i>Riwayat Pengajuan Saya
                </h5>
                <span class="text-muted small">Total: {{ $izins->total() }} catatan</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 50px;" class="text-center">No</th>
                                <th style="width: 100px;">Jenis</th>
                                <th>Periode Izin / Sakit</th>
                                <th>Alasan / Keterangan</th>
                                <th style="width: 130px;" class="text-center">Bukti Dokter</th>
                                <th style="width: 160px;" class="text-center">Status</th>
                                <th>Catatan Admin</th>
                                <th style="width: 100px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($izins as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $izins->firstItem() + $index }}</td>
                                    <td>
                                        <span class="badge {{ $item->jenis == 'sakit' ? 'badge-sakit' : 'badge-izin' }} px-2 py-1">
                                            {{ strtoupper($item->jenis) }}
                                        </span>
                                    </td>
                                    <td>
                                        <strong>{{ $item->tgl_mulai->format('d/m/Y') }}</strong>
                                        @if($item->tgl_mulai->ne($item->tgl_selesai))
                                            s.d. <strong>{{ $item->tgl_selesai->format('d/m/Y') }}</strong>
                                        @endif
                                        <div class="text-muted small">Durasi: {{ $item->durasi_hari }} hari</div>
                                    </td>
                                    <td>
                                        <div style="max-width: 280px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $item->alasan }}">
                                            {{ $item->alasan }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($item->surat_dokter)
                                            <a href="{{ route('user.izin.download', $item->id) }}" class="btn btn-sm btn-outline-info" title="Unduh Berkas Surat Dokter">
                                                <i class="cil-paperclip mr-1"></i> Unduh
                                            </a>
                                        @else
                                            <span class="text-muted small"><em>Tidak ada</em></span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="badge {{ $item->status_badge_class }} px-3 py-2">
                                            {{ $item->status_label }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($item->catatan_admin)
                                            <span class="text-dark">{{ $item->catatan_admin }}</span>
                                        @else
                                            <span class="text-muted small"><em>-</em></span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('user.izin.show', $item->id) }}" class="btn btn-sm btn-info text-white" title="Lihat Detail">
                                            <i class="cil-info"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5 text-muted">
                                        <i class="cil-description display-4 text-secondary mb-3 d-block"></i>
                                        Belum ada riwayat pengajuan izin atau sakit.
                                        <div class="mt-2">
                                            <a href="{{ route('user.izin.create') }}" class="btn btn-outline-primary btn-sm">
                                                <i class="cil-plus mr-1"></i> Buat Pengajuan Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($izins->hasPages())
                <div class="card-footer bg-white d-flex justify-content-end py-2">
                    {{ $izins->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
