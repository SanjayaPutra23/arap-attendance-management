@extends('layouts.app')

@section('css')
<style>
    .dashboard-hero {
        background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        color: #fff;
        border-radius: 12px;
        padding: 24px;
        margin-bottom: 24px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .metric-card {
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 2px 6px rgba(0,0,0,0.04);
    }
    .metric-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0,0,0,0.08);
    }
    .metric-icon-box {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }
    .section-title-wrap {
        display: flex;
        align-items: center;
        margin-bottom: 16px;
        border-bottom: 2px solid #f3f4f6;
        padding-bottom: 8px;
    }
    .section-title-wrap h4 {
        margin: 0;
        font-weight: 700;
        color: #1f2937;
        font-size: 1.15rem;
    }
</style>
@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        
        <!-- Welcome Hero Banner -->
        <div class="dashboard-hero">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="font-weight-bold mb-1">Selamat Datang, {{ Auth::user()->name }}</h2>
                    <p class="mb-0 text-white-50">
                        Aplikasi Rapat dan Administrasi Presensi (ARAP) &mdash; SPPG Kalisapu
                    </p>
                </div>
                <div class="col-md-4 text-md-right mt-3 mt-md-0">
                    <span class="badge badge-light px-3 py-2 font-weight-normal text-dark" style="font-size: 0.9rem;">
                        <i class="cil-calendar mr-1"></i> {{ tgl(date('Y-m-d'), true) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Section 1: Presensi & Kepegawaian Relawan -->
        <div class="section-title-wrap">
            <i class="cil-fingerprint mr-2 text-primary" style="font-size: 1.3rem;"></i>
            <h4>Administrasi & Presensi Relawan</h4>
        </div>

        <div class="row">
            <!-- Total Relawan -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card metric-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Total Relawan</span>
                                <h2 class="font-weight-bold mt-2 mb-1 text-dark">{{ $totalRelawan }}</h2>
                                <span class="text-muted" style="font-size: 0.82rem;">Pegawai / Relawan Aktif</span>
                            </div>
                            <div class="metric-icon-box bg-primary text-white">
                                <i class="cil-user"></i>
                            </div>
                        </div>
                    </div>
                    @can('ultraman')
                    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
                        <a href="{{ route('admin.peserta.index') }}" class="btn btn-sm btn-outline-primary btn-block">
                            Kelola Pegawai &rarr;
                        </a>
                    </div>
                    @endcan
                </div>
            </div>

            <!-- Log Bulan Ini -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card metric-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Log Presensi Bulan Ini</span>
                                <h2 class="font-weight-bold mt-2 mb-1 text-success">{{ number_format($monthLogs, 0, ',', '.') }}</h2>
                                <span class="text-muted" style="font-size: 0.82rem;">{{ namabulan($thisMonth) }} {{ $thisYear }}</span>
                            </div>
                            <div class="metric-icon-box bg-success text-white">
                                <i class="cil-chart-line"></i>
                            </div>
                        </div>
                    </div>
                    @can('umum')
                    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
                        <a href="{{ route('absensi.index') }}" class="btn btn-sm btn-outline-success btn-block">
                            Lihat Rekap Absen &rarr;
                        </a>
                    </div>
                    @endcan
                </div>
            </div>

            <!-- Tap Presensi Hari Ini -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card metric-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Kehadiran Hari Ini</span>
                                <h2 class="font-weight-bold mt-2 mb-1 text-info">{{ $todayRelawanHadir }} <span style="font-size: 1rem;" class="text-muted font-weight-normal">relawan</span></h2>
                                <span class="text-muted" style="font-size: 0.82rem;">{{ $todayLogs }} kali catatan tap mesin</span>
                            </div>
                            <div class="metric-icon-box bg-info text-white">
                                <i class="cil-fingerprint"></i>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
                        <span class="badge badge-light text-muted font-weight-normal">
                            Tanggal: {{ date('d-m-Y') }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Mesin Presensi -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card metric-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Mesin Presensi</span>
                                <h2 class="font-weight-bold mt-2 mb-1 text-warning">{{ $totalMesin }} <span style="font-size: 1rem;" class="text-muted font-weight-normal">unit</span></h2>
                                <span class="text-muted" style="font-size: 0.78rem;">
                                    Sync: {{ $lastSync ? date('d/m/y H:i', strtotime($lastSync)) : 'Belum sync' }}
                                </span>
                            </div>
                            <div class="metric-icon-box bg-warning text-white">
                                <i class="cil-devices"></i>
                            </div>
                        </div>
                    </div>
                    @can('umum')
                    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
                        <a href="{{ route('pool.index') }}" class="btn btn-sm btn-outline-warning btn-block">
                            Tarik Data Mesin &rarr;
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
        </div>

        <!-- Section 2: Agenda Rapat & Notulensi -->
        <div class="section-title-wrap mt-2">
            <i class="cil-calendar mr-2 text-primary" style="font-size: 1.3rem;"></i>
            <h4>Agenda Rapat & Notulensi</h4>
        </div>

        <div class="row">
            <!-- Jumlah Rapat -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card metric-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Agenda Rapat</span>
                                <h2 class="font-weight-bold mt-2 mb-1 text-dark">{{ $rapat }}</h2>
                                <span class="text-muted" style="font-size: 0.82rem;">Rapat Dibuat</span>
                            </div>
                            <div class="metric-icon-box bg-dark text-white">
                                <i class="cil-calendar"></i>
                            </div>
                        </div>
                    </div>
                    @can('staff-access')
                    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
                        <a href="{{ route('presensi.index') }}" class="btn btn-sm btn-outline-secondary btn-block">
                            Kelola Agenda Rapat &rarr;
                        </a>
                    </div>
                    @endcan
                </div>
            </div>

            <!-- Peserta Hadir Rapat -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card metric-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Peserta Hadir</span>
                                <h2 class="font-weight-bold mt-2 mb-1 text-primary">{{ $peserta }}</h2>
                                <span class="text-muted" style="font-size: 0.82rem;">Tanda Tangan Kehadiran</span>
                            </div>
                            <div class="metric-icon-box bg-primary text-white">
                                <i class="cil-check-circle"></i>
                            </div>
                        </div>
                    </div>
                    @can('staff-access')
                    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
                        <a href="{{ route('kehadiran.index') }}" class="btn btn-sm btn-outline-primary btn-block">
                            Daftar Hadir Rapat &rarr;
                        </a>
                    </div>
                    @endcan
                </div>
            </div>

            <!-- Notulensi Selesai -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card metric-card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Notulensi</span>
                                <h2 class="font-weight-bold mt-2 mb-1 text-success">{{ $notulen }}</h2>
                                <span class="text-muted" style="font-size: 0.82rem;">Notulensi Tercatat</span>
                            </div>
                            <div class="metric-icon-box bg-success text-white">
                                <i class="cil-notes"></i>
                            </div>
                        </div>
                    </div>
                    @can('staff-access')
                    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3">
                        <a href="{{ route('notulensi.index') }}" class="btn btn-sm btn-outline-success btn-block">
                            Buka Notulensi &rarr;
                        </a>
                    </div>
                    @endcan
                </div>
            </div>

            <!-- Pintasan Cepat -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
                <div class="card metric-card h-100 bg-light">
                    <div class="card-body">
                        <span class="text-muted text-uppercase font-weight-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">Pintasan Cepat</span>
                        <div class="mt-3">
                            @can('staff-access')
                            <a href="{{ route('presensi.create') }}" class="btn btn-sm btn-primary btn-block mb-2 text-left">
                                <i class="cil-plus mr-1"></i> Buat Agenda Rapat
                            </a>
                            @endcan
                            @can('umum')
                            <a href="{{ route('absensi.index') }}" class="btn btn-sm btn-outline-dark btn-block text-left">
                                <i class="cil-fingerprint mr-1"></i> Rekap Absensi Relawan
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($latestAbsensi)
        <!-- Info Banner Periode Rekap Terakhir -->
        <div class="alert alert-info border-0 shadow-sm d-flex align-items-center mb-4" role="alert" style="border-radius: 8px;">
            <i class="cil-info mr-3 text-info" style="font-size: 1.5rem;"></i>
            <div>
                <strong>Periode Rekap Presensi Aktif Terakhir:</strong> 
                Tipe <em>{{ ucwords($latestAbsensi->type) }}</em> &mdash; Bulan <strong>{{ namabulan($latestAbsensi->bln) }} {{ $latestAbsensi->thn }}</strong> 
                (Rentang: {{ date('d/m/Y', strtotime($latestAbsensi->tgl_mulai)) }} s.d. {{ date('d/m/Y', strtotime($latestAbsensi->tgl_selesai)) }}).
            </div>
        </div>
        @endif

    </div>
</div>
@endsection

@section('javascript')
@endsection
