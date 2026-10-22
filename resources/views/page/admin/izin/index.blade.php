@extends('layouts.app')

@section('css')
<style>
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

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="font-weight-bold text-dark mb-1">Persetujuan Izin & Sakit Relawan</h3>
                <p class="text-muted mb-0">Verifikasi, setujui, atau tolak permohonan izin/sakit mandiri dari relawan.</p>
            </div>
        </div>

        <!-- Filter & Search Card -->
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="d-flex flex-wrap">
                            <a href="{{ route('admin.izin.index') }}" class="stat-badge-filter {{ !request('status') ? 'bg-primary text-white' : 'bg-light text-dark border' }}">
                                Semua <span class="badge badge-light ml-2">{{ $counts['total'] }}</span>
                            </a>
                            <a href="{{ route('admin.izin.index', ['status' => 'menunggu']) }}" class="stat-badge-filter {{ request('status') == 'menunggu' ? 'bg-warning text-dark font-weight-bold' : 'bg-light text-dark border' }}">
                                Menunggu <span class="badge badge-warning text-dark ml-2">{{ $counts['menunggu'] }}</span>
                            </a>
                            <a href="{{ route('admin.izin.index', ['status' => 'disetujui']) }}" class="stat-badge-filter {{ request('status') == 'disetujui' ? 'bg-success text-white' : 'bg-light text-dark border' }}">
                                Disetujui <span class="badge badge-success ml-2">{{ $counts['disetujui'] }}</span>
                            </a>
                            <a href="{{ route('admin.izin.index', ['status' => 'ditolak']) }}" class="stat-badge-filter {{ request('status') == 'ditolak' ? 'bg-danger text-white' : 'bg-light text-dark border' }}">
                                Ditolak <span class="badge badge-danger ml-2">{{ $counts['ditolak'] }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 mt-3 mt-lg-0">
                        <form method="GET" action="{{ route('admin.izin.index') }}" class="d-flex">
                            @if(request('status'))
                                <input type="hidden" name="status" value="{{ request('status') }}">
                            @endif
                            <input type="text" name="search" class="form-control mr-2" placeholder="Cari nama relawan / NIK..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="cil-magnifying-glass"></i> Cari
                            </button>
                            @if(request('search'))
                                <a href="{{ route('admin.izin.index', ['status' => request('status')]) }}" class="btn btn-outline-secondary ml-1" title="Reset Pencarian">
                                    <i class="cil-reload"></i>
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Data -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 font-weight-bold text-dark">
                    <i class="cil-list mr-2 text-primary"></i>Daftar Permohonan Izin & Sakit
                </h5>
                <span class="text-muted small">Total: {{ $izins->total() }} permohonan</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 50px;" class="text-center">No</th>
                                <th>Relawan</th>
                                <th style="width: 90px;" class="text-center">Jenis</th>
                                <th>Periode</th>
                                <th>Alasan</th>
                                <th style="width: 120px;" class="text-center">Surat Dokter</th>
                                <th style="width: 140px;" class="text-center">Status</th>
                                <th style="width: 130px;" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($izins as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $izins->firstItem() + $index }}</td>
                                    <td>
                                        <div class="font-weight-bold text-dark">{{ $item->user->name ?? 'User #'.$item->user_id }}</div>
                                        <div class="text-muted small">
                                            NIK: {{ $item->peserta->nik ?? ($item->user->nik ?? '-') }} &bull;
                                            Divisi: {{ $item->peserta->jabatan_formatted ?? ($item->peserta->jabatan ?? '-') }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge {{ $item->jenis == 'sakit' ? 'badge-sakit' : 'badge-izin' }} px-2 py-1">
                                            {{ strtoupper($item->jenis) }}
                                        </span>
                                    </td>
                                    <td>
                                        <strong>{{ $item->tgl_mulai->format('d/m/Y') }}</strong>
                                        @if($item->tgl_mulai->ne($item->tgl_selesai))
                                            s.d. <strong>{{ $item->tgl_selesai->format('d/m/Y') }}</strong>
                                        @endif
                                        <div class="text-muted small">{{ $item->durasi_hari }} Hari</div>
                                    </td>
                                    <td>
                                        <div style="max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $item->alasan }}">
                                            {{ $item->alasan }}
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        @if($item->surat_dokter)
                                            <a href="{{ route('admin.izin.download', $item->id) }}" class="btn btn-sm btn-outline-info" title="Unduh Berkas Surat Dokter">
                                                <i class="cil-paperclip mr-1"></i> Unduh
                                            </a>
                                        @else
                                            <span class="text-muted small"><em>-</em></span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <span class="badge {{ $item->status_badge_class }} px-2 py-1">
                                            {{ $item->status_label }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.izin.show', $item->id) }}" class="btn btn-sm {{ $item->status == 'menunggu' ? 'btn-primary' : 'btn-outline-primary' }}">
                                            <i class="cil-check-circle mr-1"></i> {{ $item->status == 'menunggu' ? 'Verifikasi' : 'Detail' }}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5 text-muted">
                                        <i class="cil-inbox display-4 text-secondary mb-3 d-block"></i>
                                        Tidak ada permohonan izin atau sakit yang ditemukan.
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
