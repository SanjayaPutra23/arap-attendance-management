<!DOCTYPE html>
<html>
<head>
    <title>Detail Absensi User</title>
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
        <th colspan="6"><strong>Detail Kehadiran Karyawan</strong></th>
    </tr>
    </thead>
    <tbody>
    <tr>
     @php  $kary = explode("-",$list->data_peserta); @endphp
        <td ><strong>Nama</strong></td>
        <td >{{ $kary[0] }}</td>
        <td ><strong>NIK</strong></td>
        <td >{{ $kary[1] }}</td>
        <td ><strong> Jenis</strong></td>
        <td >{{$absen->type}}</td>
    </tr>
    <tr>
        <td colspan="6"> Periode {{ namabulan($absen->bln)}} - {{$absen->thn }}</th>
    </tr>
    </tbody>
</table>
<table class='collapse'>
    <thead>
    <tr>
        <th width="20%" >Tanggal</th>
        <th style="text-align:center" width="15%">Jam Datang</th>
        <th style="text-align:center" width="15%">Jam Pulang</th>
        <th style="text-align:center" width="15%">Ket</th>
    </tr>
    </thead>
    <tbody>
    @php $datum = explode("&", $list->presensi); array_pop($datum);
                //dd($datum);
    @endphp
    @foreach($datum as $data)
          @php $datax =explode("_", $data);
                                if($datax[1]==0) {
                        if (($datax[2] == 0) && ($datax[3] == 0)) {
                            $pres = "Tidak hadir";
                        } else if (($datax[2] <> 0) && ($datax[3] <> 0)) {
                            $dtg = strtotime($datax[2]);
                            $plg = strtotime($datax[3]);
                            $limd = strtotime("09:00:00");
                            $limp = strtotime("16:59:00");
                            if ($dtg < $limd && $plg > $limp) {
                            $pres = "Tepat waktu";
                            } else {
                                $pres = " Hadir";
                            }
                        } else {
                            $pres = "Hadir";
                        }
                    }else{
                         $pres = "libur";
                    }
        @endphp
        <tr>
            <td>{{ tgl($datax[0], true) }}</td>
            <td style="text-align:center">{{ $datax[2] }}</td>
            <td style="text-align:center">{{ $datax[3] }}</td>
            <td style="text-align:center">{{ $pres }} </td>

        </tr>
    @endforeach

    </tbody>
</table>

</body>
</html>