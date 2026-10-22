@extends('layouts.app')

@section('css')
<style>
    .summary-card {
        border-radius: 8px;
        padding: 12px 16px;
        margin-bottom: 15px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }
    .summary-card h6 {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
        color: #6c757d;
    }
    .summary-card h3 {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0;
    }
</style>
@endsection

@section('remah')
    @php
        $isPureUser = Auth::check() && Auth::user()->hasAnyRole('User') && !Auth::user()->hasAnyRoles(['Ultraman', 'Umum', 'Akademik']);
    @endphp
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            @if($isPureUser)
                <li class="breadcrumb-item"><a href="{{ route('user.presensi') }}">Presensi Saya</a></li>
            @else
                <li class="breadcrumb-item"><a href="{{ route('absensi.index') }}">Presensi Relawan</a></li>
                <li class="breadcrumb-item"><a href="{{ route('absensi.show', $absen->id) }}">Presensi {{ ucfirst($absen->type) }} {{ namabulan($absen->bln) }} {{ $absen->thn }}</a></li>
            @endif
            <li class="breadcrumb-item active">Rincian Presensi</li>
        </ol>
    </div>
@endsection

@section('content')

@php
    $parts = explode("-", $list->data_peserta);
    $namaRelawan = $peserta ? $peserta->name : ($parts[0] ?? '-');
    $nikRelawan = $peserta ? $peserta->nik : ($parts[1] ?? '-');
    $divisiRelawan = $peserta ? formatDivisi($peserta->jabatan) : '-';

    $jabatanKey = strtolower($peserta->jabatan ?? 'persiapan');
    if ($jabatanKey === 'scurity') $jabatanKey = 'security';
    if ($jabatanKey === 'cs') $jabatanKey = 'kebersihan';

    $btsd = $settings['jam_datang_' . $jabatanKey] ?? $settings['jam_datang_persiapan'] ?? '08:00:00';
    $btsp = $settings['jam_pulang_' . $jabatanKey] ?? $settings['jam_pulang_persiapan'] ?? '17:00:00';
    $limd = strtotime($btsd);
    $limp = strtotime($btsp);

    $datum = explode("&", $list->presensi);
    array_pop($datum);

    $totalHariKerja = 0;
    $totalTepatWaktu = 0;
    $totalHadir = 0;
    $totalTidakHadir = 0;
    $totalLibur = 0;

    $parsedRows = [];

    foreach ($datum as $data) {
        $datax = explode("_", $data);
        $tglStr = $datax[0] ?? '';
        $isLibur = isset($datax[1]) && $datax[1] == 1;
        $dtgStr = $datax[2] ?? 0;
        $plgStr = $datax[3] ?? 0;

        $hariArr = [1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $dow = !empty($tglStr) ? date('N', strtotime($tglStr)) : null;
        $namaHari = $dow ? ($hariArr[$dow] ?? '-') : '-';

        if ($isLibur) {
            $totalLibur++;
            $status = "Libur";
            $badgeClass = "badge-secondary";
            $ket = "Hari Libur";
        } else {
            $totalHariKerja++;
            if ($dtgStr == 0 && $plgStr == 0) {
                $totalTidakHadir++;
                $status = "Tidak Hadir";
                $badgeClass = "badge-danger";
                $ket = "Alpa / Tanpa Keterangan";
            } else if ($dtgStr != 0 && $plgStr != 0) {
                $dtgTime = strtotime($dtgStr);
                $plgTime = strtotime($plgStr);

                $isOnTime = false;
                if ($limd && $limp) {
                    if ($limp < $limd) {
                        $dtgOnTime = ($dtgTime <= $limd || $dtgTime >= strtotime("12:00:00"));
                        $plgOnTime = ($plgTime >= $limp && $plgTime < strtotime("12:00:00"));
                        $isOnTime = ($dtgOnTime && $plgOnTime);
                    } else {
                        $isOnTime = ($dtgTime <= $limd && $plgTime >= $limp);
                    }
                }

                if ($isOnTime) {
                    $totalTepatWaktu++;
                    $status = "Tepat Waktu";
                    $badgeClass = "badge-success";
                    $ket = "Hadir Sesuai Jam Kerja";
                } else {
                    $totalHadir++;
                    $status = "Hadir";
                    $badgeClass = "badge-warning";
                    $reasons = [];
                    if ($dtgTime > $limd) $reasons[] = "Terlambat";
                    if ($plgTime < $limp) $reasons[] = "Pulang Awal";
                    $ket = !empty($reasons) ? implode(", ", $reasons) : "Hadir";
                }
            } else {
                $totalHadir++;
                $status = "Hadir (1x Scan)";
                $badgeClass = "badge-warning";
                $ket = ($dtgStr != 0) ? "Hanya scan datang" : "Hanya scan pulang";
            }
        }

        $parsedRows[] = [
            'tanggal' => $tglStr,
            'hari' => $namaHari,
            'datang' => ($dtgStr != 0) ? $dtgStr : '-',
            'pulang' => ($plgStr != 0) ? $plgStr : '-',
            'status' => $status,
            'badge' => $badgeClass,
            'keterangan' => $ket,
        ];
    }
@endphp

<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                        <h4 class="m-0 font-weight-bold text-primary">
                            <i class="cil-user mr-2"></i>Rincian Presensi: {{ $namaRelawan }}
                        </h4>
                        @php
                            $isPureUser = Auth::check() && Auth::user()->hasAnyRole('User') && !Auth::user()->hasAnyRoles(['Ultraman', 'Umum', 'Akademik']);
                            $backUrl = $isPureUser ? route('user.presensi') : route('absensi.show', $absen->id);
                            $pdfUrl = $isPureUser ? route('user.presensi.pdf', $list->id) : route('absensi.pdf.user', $list->id);
                        @endphp
                        <div>
                            <a href="{{ $backUrl }}" class="btn btn-sm btn-outline-secondary mr-2">
                                <i class="cil-arrow-left mr-1"></i> Kembali
                            </a>
                            <a href="{{ $pdfUrl }}" class="btn btn-sm btn-success">
                                <i class="cil-cloud-download mr-1"></i> Download Rincian (PDF)
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Informasi Relawan & Shift -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <table class="table table-sm table-borderless m-0">
                                        <tr>
                                            <th style="width: 140px;" class="text-muted">Nama Relawan</th>
                                            <td>: <strong class="text-dark">{{ $namaRelawan }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">NIK</th>
                                            <td>: {{ $nikRelawan }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Divisi</th>
                                            <td>: <span class="badge badge-info">{{ $divisiRelawan }}</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <table class="table table-sm table-borderless m-0">
                                        <tr>
                                            <th style="width: 140px;" class="text-muted">Periode</th>
                                            <td>: <strong>{{ ucfirst($absen->type) }} {{ namabulan($absen->bln) }} {{ $absen->thn }}</strong></td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Jadwal Shift</th>
                                            <td>: Datang: <code>{{ $btsd }}</code> | Pulang: <code>{{ $btsp }}</code></td>
                                        </tr>
                                        <tr>
                                            <th class="text-muted">Total Hari Kerja</th>
                                            <td>: <strong>{{ $totalHariKerja }} Hari</strong></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Summary Cards -->
                        <div class="row mb-3">
                            <div class="col-sm-6 col-md-3">
                                <div class="summary-card bg-light border-left border-primary" style="border-left-width: 4px !important;">
                                    <h6>Hari Kerja</h6>
                                    <h3 class="text-primary">{{ $totalHariKerja }}</h3>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="summary-card bg-light border-left border-success" style="border-left-width: 4px !important;">
                                    <h6>Tepat Waktu</h6>
                                    <h3 class="text-success">{{ $totalTepatWaktu }}</h3>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="summary-card bg-light border-left border-warning" style="border-left-width: 4px !important;">
                                    <h6>Hadir (Terlambat)</h6>
                                    <h3 class="text-warning">{{ $totalHadir }}</h3>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="summary-card bg-light border-left border-danger" style="border-left-width: 4px !important;">
                                    <h6>Tidak Hadir / Alpa</h6>
                                    <h3 class="text-danger">{{ $totalTidakHadir }}</h3>
                                </div>
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 50px;" class="text-center">No</th>
                                        <th style="width: 100px;">Hari</th>
                                        <th style="width: 140px;">Tanggal</th>
                                        <th style="width: 120px;" class="text-center">Jam Datang</th>
                                        <th style="width: 120px;" class="text-center">Jam Pulang</th>
                                        <th style="width: 140px;" class="text-center">Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($parsedRows as $row)
                                        <tr>
                                            <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                            <td class="font-weight-bold">{{ $row['hari'] }}</td>
                                            <td>{{ tgl($row['tanggal'], false) }}</td>
                                            <td class="text-center {{ $row['datang'] !== '-' ? 'font-weight-bold text-success' : 'text-muted' }}">
                                                {{ $row['datang'] }}
                                            </td>
                                            <td class="text-center {{ $row['pulang'] !== '-' ? 'font-weight-bold text-primary' : 'text-muted' }}">
                                                {{ $row['pulang'] }}
                                            </td>
                                            <td class="text-center">
                                                <span class="badge {{ $row['badge'] }} px-2 py-1">{{ $row['status'] }}</span>
                                            </td>
                                            <td class="text-muted">{{ $row['keterangan'] }}</td>
                                        </tr>
                                    @endforeach
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

@section('javascript')
    <script type="text/javascript" src="{{ asset('srcblog/jquery.min.js') }}"></script>
@endsection

