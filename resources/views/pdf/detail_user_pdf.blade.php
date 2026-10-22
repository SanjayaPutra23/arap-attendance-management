<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Rincian Presensi - {{ $peserta ? $peserta->name : 'Relawan' }}</title>
    <style>
        @page {
            margin: 20px 25px 25px 25px;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 8.5pt;
            color: #1e293b;
            line-height: 1.3;
            margin: 0;
            padding: 0;
        }
        .header-kop {
            text-align: center;
            margin-bottom: 10px;
            width: 100%;
        }
        .header-kop img {
            width: 100%;
            height: auto;
            display: block;
        }
        .divider {
            border-bottom: 2px solid #0f172a;
            margin-top: 4px;
            margin-bottom: 10px;
        }
        .report-title {
            text-align: center;
            font-size: 11pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #0f172a;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .meta-table {
            width: 100%;
            margin-bottom: 12px;
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
        }
        .meta-table td {
            padding: 4px 8px;
            vertical-align: top;
            font-size: 8.5pt;
        }
        .meta-label {
            color: #475569;
            width: 110px;
            font-weight: 600;
        }
        .meta-value {
            color: #0f172a;
            font-weight: bold;
        }
        .data-table {
            width: 100%;
            margin-bottom: 12px;
            border-collapse: collapse;
        }
        .data-table th {
            background-color: #f1f5f9;
            color: #0f172a;
            font-weight: bold;
            font-size: 8pt;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            padding: 5px 4px;
            border: 1px solid #cbd5e1;
            text-align: center;
        }
        .data-table td {
            padding: 4px 4px;
            border: 1px solid #cbd5e1;
            font-size: 8pt;
            vertical-align: middle;
        }
        .data-table tr.even {
            background-color: #f8fafc;
        }
        .text-center { text-align: center; }
        .text-left { text-align: left; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        
        .status-tepat {
            color: #15803d;
            font-weight: bold;
        }
        .status-hadir {
            color: #b45309;
            font-weight: bold;
        }
        .status-absen {
            color: #b91c1c;
            font-weight: bold;
        }
        .status-libur {
            color: #64748b;
        }

        .summary-table {
            width: 100%;
            margin-bottom: 15px;
            border-collapse: separate;
            border-spacing: 4px;
        }
        .summary-box {
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            padding: 6px 8px;
            text-align: center;
            vertical-align: middle;
        }
        .summary-box .title {
            font-size: 7.5pt;
            text-transform: uppercase;
            color: #64748b;
            font-weight: 600;
            display: block;
            margin-bottom: 2px;
        }
        .summary-box .val {
            font-size: 11pt;
            font-weight: bold;
            color: #0f172a;
            display: block;
        }

        .signature-table {
            width: 100%;
            margin-top: 15px;
            page-break-inside: avoid;
        }
        .signature-table td {
            vertical-align: top;
            font-size: 8.5pt;
        }
        .sign-space {
            height: 50px;
        }
    </style>
</head>
<body>

@php
    $parts = explode("-", $list->data_peserta);
    $namaRelawan = $peserta ? $peserta->name : ($parts[0] ?? '-');
    $nikRelawan = $peserta ? $peserta->nik : ($parts[1] ?? '-');
    $uidRelawan = $peserta ? $peserta->uid : ($list->id_peserta ?? '-');
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
    $firstDate = null;
    $lastDate = null;

    $hariArr = [1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

    foreach ($datum as $data) {
        $datax = explode("_", $data);
        $tglStr = $datax[0] ?? '';
        $isLibur = isset($datax[1]) && $datax[1] == 1;
        $dtgStr = $datax[2] ?? 0;
        $plgStr = $datax[3] ?? 0;

        if (!$firstDate && !empty($tglStr)) $firstDate = $tglStr;
        if (!empty($tglStr)) $lastDate = $tglStr;

        $dow = !empty($tglStr) ? date('N', strtotime($tglStr)) : null;
        $namaHari = $dow ? ($hariArr[$dow] ?? '-') : '-';

        if ($isLibur) {
            $totalLibur++;
            $status = "Libur";
            $statusClass = "status-libur";
            $ket = "Hari Libur / Weekend";
        } else {
            $totalHariKerja++;
            if ($dtgStr == 0 && $plgStr == 0) {
                $totalTidakHadir++;
                $status = "Tidak Hadir";
                $statusClass = "status-absen";
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
                    $statusClass = "status-tepat";
                    $ket = "Hadir Sesuai Jam Kerja";
                } else {
                    $totalHadir++;
                    $status = "Hadir";
                    $statusClass = "status-hadir";
                    $reasons = [];
                    if ($dtgTime > $limd) $reasons[] = "Terlambat";
                    if ($plgTime < $limp) $reasons[] = "Pulang Awal";
                    $ket = !empty($reasons) ? implode(", ", $reasons) : "Hadir";
                }
            } else {
                $totalHadir++;
                $status = "Hadir (1x)";
                $statusClass = "status-hadir";
                $ket = ($dtgStr != 0) ? "Hanya scan datang" : "Hanya scan pulang";
            }
        }

        $parsedRows[] = [
            'tanggal' => $tglStr,
            'hari' => $namaHari,
            'datang' => ($dtgStr != 0) ? $dtgStr : '-',
            'pulang' => ($plgStr != 0) ? $plgStr : '-',
            'status' => $status,
            'statusClass' => $statusClass,
            'keterangan' => $ket,
        ];
    }

    $rentangTanggal = ($firstDate && $lastDate) ? (tgl($firstDate, false) . " s/d " . tgl($lastDate, false)) : "-";
@endphp

    <div class="header-kop">
        @if(file_exists(public_path('srcblog/kop_sppg.jpg')))
            <img src="{{ public_path('srcblog/kop_sppg.jpg') }}" alt="Kop Surat SPPG Kalisapu">
        @elseif(file_exists(public_path('srcblog/kop.jpg')))
            <img src="{{ public_path('srcblog/kop.jpg') }}" alt="Kop Surat">
            <div class="divider"></div>
        @endif
    </div>

    <div class="report-title">
        Laporan Rincian Presensi Relawan
    </div>

    <!-- Metadata Header -->
    <table class="meta-table">
        <tr>
            <td style="width: 50%;">
                <table style="width: 100%;">
                    <tr>
                        <td class="meta-label">Nama Relawan</td>
                        <td>:</td>
                        <td class="meta-value">{{ $namaRelawan }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">NIK / UID</td>
                        <td>:</td>
                        <td class="meta-value">{{ $nikRelawan }} / {{ $uidRelawan }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Divisi</td>
                        <td>:</td>
                        <td class="meta-value">{{ $divisiRelawan }}</td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%;">
                <table style="width: 100%;">
                    <tr>
                        <td class="meta-label">Periode</td>
                        <td>:</td>
                        <td class="meta-value">{{ ucfirst($absen->type) }} {{ namabulan($absen->bln) }} {{ $absen->thn }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Rentang Tanggal</td>
                        <td>:</td>
                        <td class="meta-value">{{ $rentangTanggal }}</td>
                    </tr>
                    <tr>
                        <td class="meta-label">Jam Kerja Shift</td>
                        <td>:</td>
                        <td class="meta-value">{{ $btsd }} - {{ $btsp }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Tabel Presensi -->
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 12%;">Hari</th>
                <th style="width: 17%;">Tanggal</th>
                <th style="width: 13%;">Jam Masuk</th>
                <th style="width: 13%;">Jam Pulang</th>
                <th style="width: 16%;">Status</th>
                <th style="width: 24%;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parsedRows as $index => $row)
                <tr class="{{ $index % 2 == 1 ? 'even' : '' }}">
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td class="font-bold">{{ $row['hari'] }}</td>
                    <td>{{ tgl($row['tanggal'], false) }}</td>
                    <td class="text-center font-bold">{{ $row['datang'] }}</td>
                    <td class="text-center font-bold">{{ $row['pulang'] }}</td>
                    <td class="text-center {{ $row['statusClass'] }}">{{ $row['status'] }}</td>
                    <td style="color: #475569;">{{ $row['keterangan'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Ringkasan Kehadiran -->
    <table class="summary-table">
        <tr>
            <td class="summary-box" style="width: 20%;">
                <span class="title">Total Hari Kerja</span>
                <span class="val">{{ $totalHariKerja }} Hari</span>
            </td>
            <td class="summary-box" style="width: 20%;">
                <span class="title">Tepat Waktu</span>
                <span class="val" style="color: #15803d;">{{ $totalTepatWaktu }}</span>
            </td>
            <td class="summary-box" style="width: 20%;">
                <span class="title">Hadir</span>
                <span class="val" style="color: #b45309;">{{ $totalHadir }}</span>
            </td>
            <td class="summary-box" style="width: 20%;">
                <span class="title">Tidak Hadir / Alpa</span>
                <span class="val" style="color: #b91c1c;">{{ $totalTidakHadir }}</span>
            </td>
            <td class="summary-box" style="width: 20%;">
                <span class="title">Libur / Weekend</span>
                <span class="val" style="color: #64748b;">{{ $totalLibur }}</span>
            </td>
        </tr>
    </table>

    <!-- Tanda Tangan -->
    <table class="signature-table">
        <tr>
            <td style="width: 45%; text-align: center;">
                Mengetahui,<br>
                <strong>Relawan Yang Bersangkutan</strong>
                <div class="sign-space"></div>
                <strong><u>( {{ $namaRelawan }} )</u></strong><br>
                <span style="color: #64748b;">NIK. {{ $nikRelawan }}</span>
            </td>
            <td style="width: 10%;"></td>
            <td style="width: 45%; text-align: center;">
                Cirebon, {{ tgl(date('Y-m-d'), false) }}<br>
                <strong>Bagian Tata Usaha / Administrasi</strong>
                <div class="sign-space"></div>
                <strong><u>( .................................................... )</u></strong><br>
                <span style="color: #64748b;">Petugas Presensi</span>
            </td>
        </tr>
    </table>

</body>
</html>