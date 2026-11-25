<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Detail Presensi - {{ $peserta->name }} - {{ $recap['period']['label'] }}</title>
    <style>
        @page {
            size: a4 portrait;
            margin: 10mm 12mm 12mm 12mm;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 8pt;
            color: #1e293b;
            line-height: 1.3;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 6px;
            margin-bottom: 10px;
        }
        .header h2 {
            font-size: 12pt;
            margin: 0;
            color: #1e3a8a;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .header h3 {
            font-size: 10pt;
            margin: 2px 0 0 0;
            color: #334155;
            font-weight: 600;
        }
        .header p {
            margin: 2px 0 0 0;
            font-size: 7.5pt;
            color: #64748b;
        }
        .meta-box {
            background-color: #f8fafc;
            border: 0.5pt solid #cbd5e1;
            border-radius: 4px;
            padding: 6px 10px;
            margin-bottom: 10px;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
        }
        .meta-table td {
            font-size: 8pt;
            padding: 2.5pt 4pt;
            vertical-align: top;
        }
        .metrics-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .metrics-table td {
            border: 0.5pt solid #cbd5e1;
            padding: 5pt;
            text-align: center;
            background-color: #ffffff;
            width: 25%;
        }
        .metrics-table .metric-label {
            font-size: 7pt;
            color: #64748b;
            text-transform: uppercase;
            font-weight: bold;
            display: block;
            margin-bottom: 2px;
        }
        .metrics-table .metric-val {
            font-size: 11pt;
            font-weight: bold;
            color: #0f172a;
        }
        .metrics-table .highlight-box {
            background-color: #eff6ff;
            border: 1pt solid #3b82f6;
        }
        .metrics-table .highlight-box .metric-val {
            color: #1d4ed8;
            font-size: 13pt;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }
        table.data-table th, table.data-table td {
            border: 0.5pt solid #94a3b8;
            padding: 3.5pt 4pt;
        }
        table.data-table th {
            background-color: #1e3a8a;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
            font-size: 7.5pt;
        }
        table.data-table tr:nth-child(even) td {
            background-color: #f8fafc;
        }
        table.data-table tr.holiday-row td {
            background-color: #fef3c7;
        }
        .text-center { text-align: center; }
        .text-end { text-align: right; }
        .text-start { text-align: left; }
        .fw-bold { font-weight: bold; }
        .font-mono { font-family: monospace; }
        .badge {
            display: inline-block;
            padding: 1px 4px;
            font-size: 7pt;
            font-weight: bold;
            border-radius: 3px;
        }
        .badge-success { background-color: #dcfce7; color: #166534; }
        .badge-warning { background-color: #fef9c3; color: #854d0e; }
        .badge-info { background-color: #e0f2fe; color: #075985; }
        .badge-danger { background-color: #fee2e2; color: #991b1b; }
        .badge-secondary { background-color: #f1f5f9; color: #475569; }
        .signature-section {
            width: 100%;
            margin-top: 15px;
            page-break-inside: avoid;
        }
        .signature-table {
            width: 100%;
            border-collapse: collapse;
        }
        .signature-table td {
            text-align: center;
            vertical-align: top;
            width: 33.33%;
            font-size: 7.5pt;
        }
    </style>
</head>
<body>
    <!-- Kop Resmi SPPG Kalisapu -->
    <div class="header">
        <h2>Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu</h2>
        <h3>Lembar Rincian Presensi & Perolehan Poin Individu</h3>
        <p>Jl. Raya Kalisapu, Kec. Slawi, Kab. Tegal &bull; ARAP Attendance Management System v2.0</p>
    </div>

    <!-- Identitas Relawan / Pegawai -->
    <div class="meta-box">
        <table class="meta-table">
            <tr>
                <td style="width: 18%;"><strong>Nama Lengkap:</strong></td>
                <td style="width: 32%; font-weight: bold; color: #1e3a8a;">{{ $peserta->name }}</td>
                <td style="width: 18%;"><strong>Periode Presensi:</strong></td>
                <td style="width: 32%;">{{ $recap['period']['label'] }} ({{ ($mode ?? 'bulanan') === 'mingguan' ? 'Mingguan' : 'Cut-off 20 s.d. 19' }})</td>
            </tr>
            <tr>
                <td><strong>NIK / KTP:</strong></td>
                <td>{{ $peserta->nik ?? '-' }}</td>
                <td><strong>Divisi / Posisi:</strong></td>
                <td><strong>{{ $peserta->jabatan ?? '-' }}</strong></td>
            </tr>
            <tr>
                <td><strong>UID Mesin:</strong></td>
                <td>{{ $peserta->uid ?? '-' }}</td>
                <td><strong>Waktu Dicetak:</strong></td>
                <td>{{ $printedAt->translatedFormat('d F Y, H:i') }} WIB</td>
            </tr>
        </table>
    </div>

    <!-- Kotak Ringkasan Metrik Presensi -->
    <table class="metrics-table">
        <tr>
            <td>
                <span class="metric-label">Tepat Waktu (1.00)</span>
                <span class="metric-val" style="color: #16a34a;">{{ $record['hadir_tepat_waktu'] }} <span style="font-size: 8pt; font-weight: normal;">Hari</span></span>
            </td>
            <td>
                <span class="metric-label">Terlambat/Awal (0.80)</span>
                <span class="metric-val" style="color: #d97706;">{{ $record['hadir_terlambat_early'] }} <span style="font-size: 8pt; font-weight: normal;">Hari</span></span>
            </td>
            <td>
                <span class="metric-label">Izin & Sakit</span>
                <span class="metric-val" style="color: #0284c7;">{{ $record['izin'] + $record['sakit'] }} <span style="font-size: 8pt; font-weight: normal;">Hari</span></span>
            </td>
            <td>
                <span class="metric-label">Alpha (0.00)</span>
                <span class="metric-val" style="color: #dc2626;">{{ $record['alpha'] }} <span style="font-size: 8pt; font-weight: normal;">Hari</span></span>
            </td>
        </tr>
        <tr>
            <td>
                <span class="metric-label">Presensi Mobile PWA</span>
                <span class="metric-val">{{ $record['sources']['mobile'] }} <span style="font-size: 8pt; font-weight: normal;">Log</span></span>
            </td>
            <td>
                <span class="metric-label">Mesin Fisik (ZKTeco)</span>
                <span class="metric-val">{{ $record['sources']['fingerprint'] }} <span style="font-size: 8pt; font-weight: normal;">Log</span></span>
            </td>
            <td>
                <span class="metric-label">Rincian Izin / Sakit</span>
                <span class="metric-val">{{ $record['izin'] }} I / {{ $record['sakit'] }} S</span>
            </td>
            <td class="highlight-box">
                <span class="metric-label" style="color: #1d4ed8;">Total Poin Akumulasi</span>
                <span class="metric-val">{{ number_format($record['total_points'], 2) }}</span>
            </td>
        </tr>
    </table>

    <!-- Tabel Rincian Harian Presensi -->
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 20px;">#</th>
                <th style="width: 110px;">Tanggal & Hari</th>
                <th style="width: 85px;">Status</th>
                <th style="width: 55px;">Masuk (IN)</th>
                <th style="width: 55px;">Pulang (OUT)</th>
                <th style="width: 70px;">Sumber</th>
                <th style="width: 45px;">Skor</th>
                <th>Keterangan / Catatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recap['dates'] as $index => $pDate)
                @php
                    $dStr = $pDate['date'];
                    $dayDetail = $record['daily'][$dStr] ?? null;
                    $status = $dayDetail['status'] ?? 'alpha';
                    $score = $dayDetail['score'] ?? 0.0;
                    $source = $dayDetail['source'] ?? '-';
                    $checkIn = $dayDetail['check_in'] ?? '-';
                    $checkOut = $dayDetail['check_out'] ?? '-';
                    $isHoliday = $pDate['is_libur'];
                    $holidayDesc = $pDate['libur_ket'];
                    $parsedCarbon = \Carbon\Carbon::parse($dStr)->locale('id')->settings(['formatFunction' => 'translatedFormat']);
                @endphp
                <tr class="{{ $isHoliday ? 'holiday-row' : '' }}">
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>
                        <strong>{{ $parsedCarbon->translatedFormat('d/m/Y (D)') }}</strong>
                    </td>
                    <td class="text-center">
                        @if($status === 'tepat_waktu' || $status === 'hadir')
                            <span class="badge badge-success">Tepat Waktu</span>
                        @elseif($status === 'terlambat')
                            <span class="badge badge-warning">Terlambat</span>
                        @elseif($status === 'pulang_awal')
                            <span class="badge badge-warning">Pulang Cepat</span>
                        @elseif($status === 'terlambat_pulang_awal')
                            <span class="badge badge-warning">Terlambat & Awal</span>
                        @elseif($status === 'izin')
                            <span class="badge badge-info">Izin Resmi</span>
                        @elseif($status === 'sakit')
                            <span class="badge badge-danger">Sakit</span>
                        @elseif($status === 'libur')
                            <span class="badge badge-secondary">Hari Libur</span>
                        @else
                            <span class="badge badge-danger">Alpha</span>
                        @endif
                    </td>
                    <td class="text-center font-mono">{{ $checkIn !== '-' ? $checkIn : '-' }}</td>
                    <td class="text-center font-mono">{{ $checkOut !== '-' ? $checkOut : '-' }}</td>
                    <td class="text-center">
                        @if($source === 'Mobile')
                            Mobile PWA
                        @elseif($source === 'Fingerprint')
                            Mesin Fisik
                        @elseif($source === 'Izin')
                            Surat Izin
                        @elseif($source === 'Libur')
                            Hari Libur
                        @else
                            -
                        @endif
                    </td>
                    <td class="text-center fw-bold" style="color: {{ $score >= 1.0 ? '#16a34a' : ($score > 0 ? '#d97706' : '#64748b') }};">
                        {{ number_format($score, 2) }}
                    </td>
                    <td>
                        {{ $dayDetail['notes'] ?? ($isHoliday ? $holidayDesc : '-') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tanda Tangan Klarifikasi -->
    <div class="signature-section">
        <table class="signature-table">
            <tr>
                <td>
                    Relawan / Pegawai Bersangkutan,<br><br><br><br>
                    <strong>( {{ $peserta->name }} )</strong><br>
                    NIK: {{ $peserta->nik ?? '....................................' }}
                </td>
                <td>
                    Petugas Tata Usaha / Admin,<br><br><br><br>
                    <strong>( .................................................... )</strong><br>
                    SPPG Kalisapu
                </td>
                <td>
                    Mengetahui,<br>
                    Pengelola SPPG Kalisapu,<br><br><br><br>
                    <strong>( Pak Aslap )</strong><br>
                    Penanggung Jawab Operasional
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
