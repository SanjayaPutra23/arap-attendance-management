<!doctype html>
<html>
<head><meta charset="UTF-8"></head>
<body>
<table>
    <thead>
        <tr>
            <th colspan="4">Tanggal : <strong>  {{ tgl($persepsi->tanggal) }} </strong></th>
            
        </tr>
        <tr>
            <th style="width:60px;">No</th>
            <th>Nama</th>
            <th>NIK</th>
            <th>Jam</th>
        </tr>
    </thead>
    <tbody>
    @forelse($grouped as $mesinId => $sessions)
        {{-- Header Mesin --}}
        <tr>
            <td colspan="4"><strong>{{ $mesinNames[$mesinId] ?? 'Mesin '.$mesinId }}</strong></td>
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
                <td colspan="4"><em>{{ $label }}</em></td>
            </tr>

            @php $no = 1; @endphp
            @foreach($rows as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->nik }}</td>
                    <td  @if($limit && $row->jam > $limit) 
                style="background-color: #f8d7da; color: #842029;" 
            @endif>{{ $row->jam }}</td> {{-- Hapus </badge> yang nyasar --}}
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
