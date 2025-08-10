<!DOCTYPE html>
<html>
<head>
    <title> Presensi {{$presensi->name}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>


        table {
            width: 100%;
        }

        table.collapse {
            border-spacing: 0;
            border-collapse: collapse;
            border: 1pt solid black;
        }
        th {
            text-align: center;
        }
        table.collapse td {
            border: 1pt solid black;
        }
        table.collapse th {
            border: 1pt solid black;
        }


    </style>
</head>
<body>

    <img src="{{ public_path('srcblog/kop.jpg') }}" width="705" >

<table class='collapse'>
    <thead>
    <tr>
        <th colspan="6"><strong>{{ $presensi->name }}</strong></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td ><strong>Hari</strong></td>
        <td >{{ tgl($presensi->tanggal, True) }}</td>
        <td ><strong>Tanggal</strong></td>
        <td >{{ tgl($presensi->tanggal, False) }}</td>
        <td ><strong>Ruang</strong></td>
        <td >{{ $presensi->tempat }}</td>
    </tr>
    <tr>
        <td colspan="6">Jenis Rapat : {{ $presensi->agenda }}</th>
    </tr>
    </tbody>
</table>
<table class='collapse'>
    <thead>
    <tr>
        <th width="5%" >No</th>
        <th width="15%">NIK</th>
        <th width="40%">Nama</th>
        <th width="20%">Jabatan</th>
        <th width="20%">Tanda Tangan</th>
    </tr>
    </thead>
    <tbody>

    @foreach($peserta as $data)
        <tr>

            <td >{{ $loop->iteration }}.</td>
            <td style="text-align:center">{{$data->pesertas()->first()->nik}}</td>
            <td >{{$data->pesertas()->first()->name}}</td>
            <td >{{$data->pesertas()->first()->jabatan}}</td>
            <td style="text-align:center"> @if(! is_null($data->sign)) <img src="{{ public_path('storage/'.$data->sign) }}"  height="40"> @endif </td>

        </tr>
    @endforeach

    </tbody>
</table>
<br />

<table>

    <tr>
        <td width="50%"></td>
        <td width="50%" style="text-align:center" >Pimpinan Rapat <br/> <br/> <br/> <br/> {{$presensi->pesertas()->first()->name}}</td>
    </tr>

</table>

</body>
</html>