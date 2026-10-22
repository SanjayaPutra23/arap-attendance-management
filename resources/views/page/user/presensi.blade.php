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
    .volunteer-avatar-circle {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        font-weight: 700;
        color: #ffffff;
        border: 2px solid rgba(255, 255, 255, 0.25);
    }
    .badge-shift {
        background: rgba(255, 255, 255, 0.15);
        color: #e2e8f0;
        font-size: 12px;
        padding: 6px 12px;
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .period-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
    }
    .period-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08);
    }
</style>
@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Presensi Saya</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        
        <!-- Header Info Relawan -->
        <div class="volunteer-header-card">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <div class="d-flex align-items-center mb-3 mb-md-0">
                    <div class="volunteer-avatar-circle mr-3">
                        {{ strtoupper(substr($peserta->name, 0, 1)) }}
                    </div>
                    <div>
                        <h3 class="mb-1 font-weight-bold">{{ $peserta->name }}</h3>
                        <div class="d-flex flex-wrap align-items-center text-light" style="opacity: 0.9; font-size: 13.5px;">
                            <span class="mr-3"><i class="cil-credit-card mr-1"></i> NIK / UID: <strong>{{ $peserta->nik }}</strong></span>
                            <span class="mr-3"><i class="cil-tag mr-1"></i> Divisi: <strong>{{ formatDivisi($peserta->jabatan) }}</strong></span>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="badge-shift d-inline-block">
                        <i class="cil-clock mr-1"></i> Shift: Datang <strong>{{ $btsd }}</strong> &bull; Pulang <strong>{{ $btsp }}</strong>
                    </span>
                </div>
            </div>
        </div>

        @if(session('msg'))
            @php $alert = explode("-", session('msg')); @endphp
            <div class="alert alert-{{ $alert[0] }} alert-dismissible fade show" role="alert">
                {{ $alert[1] ?? session('msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Daftar Laporan Presensi Pribadi -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-primary">
                    <i class="cil-calendar mr-2"></i>Daftar Laporan Presensi Anda
                </h5>
                <span class="badge badge-light border text-muted">
                    Total: {{ $detailList->total() }} Periode
                </span>
            </div>
            <div class="card-body p-0">
                @if($detailList->isEmpty())
                    <div class="p-4 text-center text-muted">
                        <i class="cil-folder-open" style="font-size: 48px; opacity: 0.5;"></i>
                        <p class="mt-2 mb-0">Belum ada rekapan data absensi untuk akun Anda.</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 60px;" class="text-center">No</th>
                                    <th>Periode Presensi</th>
                                    <th>Jenis</th>
                                    <th class="text-center">Ringkasan Kehadiran</th>
                                    <th style="width: 260px;" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailList as $index => $detail)
                                    @php
                                        $absen = $detail->absensi;
                                        $datum = explode("&", $detail->presensi);
                                        array_pop($datum);

                                        $totalKerja = 0;
                                        $hadirCount = 0;
                                        $alpaCount = 0;

                                        foreach ($datum as $d) {
                                            $dx = explode("_", $d);
                                            $isLibur = isset($dx[1]) && $dx[1] == 1;
                                            if (!$isLibur) {
                                                $totalKerja++;
                                                if (($dx[2] ?? 0) != 0 || ($dx[3] ?? 0) != 0) {
                                                    $hadirCount++;
                                                } else {
                                                    $alpaCount++;
                                                }
                                            }
                                        }
                                    @endphp
                                    <tr>
                                        <td class="text-center text-muted">{{ $detailList->firstItem() + $index }}</td>
                                        <td>
                                            <strong class="text-dark">
                                                {{ $absen ? ucfirst($absen->type) . ' ' . namabulan($absen->bln) . ' ' . $absen->thn : 'Periode Absensi #' . $detail->id_absen }}
                                            </strong>
                                            <div class="small text-muted">ID Data: #{{ $detail->id }}</div>
                                        </td>
                                        <td>
                                            <span class="badge badge-secondary px-2 py-1">
                                                {{ $absen ? ucfirst($absen->type) : 'Absensi' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge badge-light border text-dark mr-1" title="Hari Kerja">
                                                {{ $totalKerja }} Hari Kerja
                                            </span>
                                            <span class="badge badge-success mr-1" title="Hadir">
                                                {{ $hadirCount }} Hadir
                                            </span>
                                            @if($alpaCount > 0)
                                                <span class="badge badge-danger" title="Alpa / Tidak Hadir">
                                                    {{ $alpaCount }} Alpa
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('user.presensi.show', $detail->id) }}" class="btn btn-sm btn-outline-primary mr-1">
                                                <i class="cil-description mr-1"></i> Lihat Rincian
                                            </a>
                                            <a href="{{ route('user.presensi.pdf', $detail->id) }}" class="btn btn-sm btn-success">
                                                <i class="cil-cloud-download mr-1"></i> Unduh PDF
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
            @if($detailList->hasPages())
                <div class="card-footer bg-white d-flex justify-content-end py-2">
                    {{ $detailList->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
