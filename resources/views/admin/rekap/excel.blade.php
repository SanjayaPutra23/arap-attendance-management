<table>
    <thead>
        <tr>
            <th colspan="14" style="font-size: 14pt; font-weight: bold; text-align: center;">
                SATUAN PELAYANAN PEMENUHAN GIZI (SPPG) KALISAPU
            </th>
        </tr>
        <tr>
            <th colspan="14" style="font-size: 12pt; font-weight: bold; text-align: center;">
                LAPORAN REKAPITULASI PRESENSI &amp; POIN KEHADIRAN (PERIODE 20 - 19)
            </th>
        </tr>
        <tr>
            <th colspan="14" style="text-align: center;">
                Periode: {{ $recap['period']['label'] }} | Divisi: {{ $divisi ? ucfirst($divisi) : 'Semua Divisi' }}
            </th>
        </tr>
        <tr>
            <th colspan="14"></th>
        </tr>
        <tr style="background-color: #1e3a8a; color: #ffffff; font-weight: bold; text-align: center;">
            <th style="border: 1px solid #000000; text-align: center;">No</th>
            <th style="border: 1px solid #000000; text-align: left;">Nama Relawan / Officer</th>
            <th style="border: 1px solid #000000; text-align: center;">NIK</th>
            <th style="border: 1px solid #000000; text-align: center;">Divisi / Jabatan</th>
            <th style="border: 1px solid #000000; text-align: center;">Tipe</th>
            <th style="border: 1px solid #000000; text-align: center;">Tepat Waktu (1.00)</th>
            <th style="border: 1px solid #000000; text-align: center;">Terlambat/Awal (0.80)</th>
            <th style="border: 1px solid #000000; text-align: center;">Total Hadir</th>
            <th style="border: 1px solid #000000; text-align: center;">Izin</th>
            <th style="border: 1px solid #000000; text-align: center;">Sakit</th>
            <th style="border: 1px solid #000000; text-align: center;">Alpha</th>
            <th style="border: 1px solid #000000; text-align: center;">Total Poin</th>
            <th style="border: 1px solid #000000; text-align: center;">Mobile</th>
            <th style="border: 1px solid #000000; text-align: center;">Fingerprint</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recap['records'] as $index => $row)
            <tr>
                <td style="border: 1px solid #000000; text-align: center;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #000000; font-weight: bold;">{{ $row['peserta']->name }}</td>
                <td style="border: 1px solid #000000; text-align: center;">'{{ $row['peserta']->nik ?? '-' }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $row['peserta']->jabatan }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ ucfirst($row['peserta']->type ?? 'relawan') }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $row['hadir_tepat_waktu'] }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $row['hadir_terlambat_early'] }}</td>
                <td style="border: 1px solid #000000; text-align: center; font-weight: bold;">{{ $row['total_hadir'] }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $row['izin'] }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $row['sakit'] }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $row['alpha'] }}</td>
                <td style="border: 1px solid #000000; text-align: center; font-weight: bold;">{{ number_format($row['total_points'], 2) }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $row['sources']['mobile'] }}</td>
                <td style="border: 1px solid #000000; text-align: center;">{{ $row['sources']['fingerprint'] }}</td>
            </tr>
        @endforeach
        <tr style="background-color: #f1f5f9; font-weight: bold;">
            <td colspan="5" style="border: 1px solid #000000; text-align: center;">TOTAL KESELURUHAN</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $recap['summary']['total_hadir_tepat_waktu'] }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $recap['summary']['total_terlambat_early'] }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $recap['summary']['total_hadir'] }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $recap['summary']['total_izin'] }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $recap['summary']['total_sakit'] }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $recap['summary']['total_alpha'] }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ number_format($recap['summary']['total_points'], 2) }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $recap['summary']['source_mobile'] }}</td>
            <td style="border: 1px solid #000000; text-align: center;">{{ $recap['summary']['source_fingerprint'] }}</td>
        </tr>
    </tbody>
</table>
