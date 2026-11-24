<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Rekap Presensi SPPG Kalisapu - {{ $recap['period']['label'] }}</title>
    <style>
        @page {
            size: a4 landscape;
            margin: 10mm 12mm 12mm 12mm;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 8.5pt;
            color: #1e293b;
            line-height: 1.3;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #1e3a8a;
            padding-bottom: 6px;
            margin-bottom: 12px;
        }
        .header h2 {
            font-size: 13pt;
            margin: 0;
            color: #1e3a8a;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .header h3 {
            font-size: 10.5pt;
            margin: 2px 0 0 0;
            color: #334155;
            font-weight: 600;
        }
        .header p {
            margin: 2px 0 0 0;
            font-size: 7.5pt;
            color: #64748b;
        }
        .meta-info {
            margin-bottom: 10px;
        }
        .meta-table {
            width: 100%;
            border-collapse: collapse;
        }
        .meta-table td {
            font-size: 8.5pt;
            padding: 2px 0;
        }
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table.data-table th, table.data-table td {
            border: 0.5pt solid #94a3b8;
            padding: 4.5pt 4pt;
        }
        table.data-table th {
            background-color: #1e3a8a;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
            font-size: 8pt;
        }
        table.data-table tr:nth-child(even) td {
            background-color: #f8fafc;
        }
        table.data-table tr.total-row td {
            background-color: #e2e8f0;
            font-weight: bold;
        }
        .text-center { text-align: center; }
        .text-end { text-align: right; }
        .text-start { text-align: left; }
        .fw-bold { font-weight: bold; }
        .badge-officer {
            background-color: #dbeafe;
            color: #1e40af;
            font-weight: bold;
            padding: 1px 4px;
            border-radius: 3px;
        }
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
            width: 50%;
            font-size: 8.5pt;
        }
    </style>
</head>
<body>
    <!-- Kop Resmi SPPG Kalisapu -->
    <div class="header">
        <h2>Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu</h2>
        <h3>Laporan Rekapitulasi Presensi & Perolehan Poin Relawan / Officer</h3>
        <p>Jl. Raya Kalisapu, Kec. Slawi, Kab. Tegal &bull; ARAP Attendance Management System v2.0</p>
    </div>

    <!-- Metadata Laporan -->
    <div class="meta-info">
        <table class="meta-table">
            <tr>
                <td style="width: 15%;"><strong>Periode Kerja:</strong></td>
                <td style="width: 35%;">{{ $recap['period']['label'] }} (Cut-off 20 s.d. 19)</td>
                <td style="width: 15%;"><strong>Divisi / Filter:</strong></td>
                <td style="width: 35%;">{{ $divisi ? ucfirst($divisi) : 'Semua Divisi SPPG' }}</td>
            </tr>
            <tr>
                <td><strong>Total Peserta:</strong></td>
                <td>{{ $recap['summary']['total_peserta'] }} Relawan / Staf Aktif</td>
                <td><strong>Waktu Cetak:</strong></td>
                <td>{{ (isset($printedAt) && $printedAt) ? $printedAt->translatedFormat('d F Y, H:i') : date('d/m/Y H:i') }} WIB</td>
            </tr>
        </table>
    </div>

    <!-- Tabel Rekapitulasi Data -->
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 25px;">No</th>
                <th style="width: 170px;">Nama Relawan / Pegawai</th>
                <th style="width: 80px;">NIK</th>
                <th style="width: 90px;">Divisi</th>
                <th style="width: 45px;">Tepat (1.0)</th>
                <th style="width: 45px;">Late (0.8)</th>
                <th style="width: 50px;">Hadir</th>
                <th style="width: 40px;">Izin</th>
                <th style="width: 40px;">Sakit</th>
                <th style="width: 40px;">Alpha</th>
                <th style="width: 60px;">Total Poin</th>
                <th style="width: 45px;">Mobile</th>
                <th style="width: 45px;">Mesin</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recap['records'] as $index => $row)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="fw-bold">
                        {{ $row['peserta']->name }}
                        @if(strtolower((string)$row['peserta']->jabatan) === 'officer')
                            <span class="badge-officer">Officer</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $row['peserta']->nik ?? '-' }}</td>
                    <td class="text-center">{{ $row['peserta']->jabatan }}</td>
                    <td class="text-center">{{ $row['hadir_tepat_waktu'] }}</td>
                    <td class="text-center">{{ $row['hadir_terlambat_early'] }}</td>
                    <td class="text-center fw-bold">{{ $row['total_hadir'] }}</td>
                    <td class="text-center">{{ $row['izin'] }}</td>
                    <td class="text-center">{{ $row['sakit'] }}</td>
                    <td class="text-center">{{ $row['alpha'] }}</td>
                    <td class="text-center fw-bold">{{ number_format($row['total_points'], 2) }}</td>
                    <td class="text-center">{{ $row['sources']['mobile'] }}</td>
                    <td class="text-center">{{ $row['sources']['fingerprint'] }}</td>
                </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="4" class="text-center">TOTAL KESELURUHAN ({{ $recap['summary']['total_peserta'] }} PESERTA)</td>
                <td class="text-center">{{ $recap['summary']['total_hadir_tepat_waktu'] }}</td>
                <td class="text-center">{{ $recap['summary']['total_terlambat_early'] }}</td>
                <td class="text-center">{{ $recap['summary']['total_hadir'] }}</td>
                <td class="text-center">{{ $recap['summary']['total_izin'] }}</td>
                <td class="text-center">{{ $recap['summary']['total_sakit'] }}</td>
                <td class="text-center">{{ $recap['summary']['total_alpha'] }}</td>
                <td class="text-center">{{ number_format($recap['summary']['total_points'], 2) }}</td>
                <td class="text-center">{{ $recap['summary']['source_mobile'] }}</td>
                <td class="text-center">{{ $recap['summary']['source_fingerprint'] }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Tanda Tangan Pengesahan -->
    <div class="signature-section">
        <table class="signature-table">
            <tr>
                <td>
                    Mengetahui,<br>
                    <strong>Pengelola / Penanggung Jawab SPPG</strong>
                    <br><br><br><br><br>
                    <strong>( Pak Aslap / Koordinator )</strong><br>
                    <small>Satuan Pelayanan Pemenuhan Gizi</small>
                </td>
                <td>
                    Slawi, {{ (isset($printedAt) && $printedAt) ? $printedAt->translatedFormat('d F Y') : date('d F Y') }}<br>
                    <strong>Petugas Tata Usaha / Rekapitulasi</strong>
                    <br><br><br><br><br>
                    <strong>( Staf Administrasi SPPG )</strong><br>
                    <small>ARAP Modernization v2.0</small>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
