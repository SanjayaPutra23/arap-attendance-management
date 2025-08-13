<!doctype html>
<html>
<head><meta charset="UTF-8"></head>
<body>
<table border="1" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th colspan="4" style="text-align: center; font-size: 14px; border: 1px solid black;">Kehadiran Persamaam Persepsi Tanggal :&nbsp; <strong>  {{ tgl($persepsi->tanggal) }} </strong></th>
            
        </tr>
        <tr>
            <th style="width:60px; border: 1px solid black;">No</th>
            <th style="border: 1px solid black;">Nama</th>
            <th style="border: 1px solid black;">NIK</th>
            <th style="border: 1px solid black;">Jam</th>
        </tr>
    </thead>
    <tbody>
    @forelse($grouped as $mesinId => $sessions)
        {{-- Header Mesin --}}
        <tr>
            <td colspan="4" style="border: 1px solid black;"><strong>{{ $mesinNames[$mesinId] ?? 'Mesin '.$mesinId }}</strong></td>
        </tr>

        @foreach($sessions as $sesi => $rows)
            @php
                // Siapkan label sesi & limit (jika dipakai)
                $labels = [
                    1 => ['label' => 'Sesi 1 (08.00 - 09.40)', 'limit' => $settings['sesi1_batas'] ?? null],
                    2 => ['label' => 'Sesi 2 (10.00 - 11.40)', 'limit' => $settings['sesi2_batas'] ?? null],
                    3 => ['label' => 'Sesi 3 (13.00 - 14.40)', 'limit' => $settings['sesi3_batas'] ?? null],
                    4 => ['label' => 'Sesi 4 (15.00 - 16.40)', 'limit' => $settings['sesi4_batas'] ?? null],
                ];
                $label = $labels[$sesi]['label'] ?? 'Hubungi Admin';
                $limit = $labels[$sesi]['limit'] ?? null;
            @endphp

            {{-- Header Sesi --}}
            <tr>
                <td colspan="4" style="border: 1px solid black;"><em>{{ $label }}</em></td>
            </tr>

            @php $no = 1; @endphp
            @foreach($rows as $row)
                <tr>
                    <td style="border: 1px solid black;">{{ $no++ }}</td>
                    <td style="border: 1px solid black;">{{ $row->name }}</td>
                    <td style="border: 1px solid black;">{{ $row->nik }}</td>
                    <td style="border: 1px solid black; @if($limit && $row->jam > $limit) 
               background-color: #f8d7da; color: #842029;
            @endif" >{{ $row->jam }}</td> {{-- Hapus </badge> yang nyasar --}}
                </tr>
            @endforeach
        @endforeach

    @empty
        <tr>
            <td colspan="4">Tidak ada data.</td>
        </tr>
    @endforelse
    </tbody>
</table>
</body>
</html>
