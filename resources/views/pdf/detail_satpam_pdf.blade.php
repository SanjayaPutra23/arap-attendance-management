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
                                if (($datax[2] <> 0) && ($datax[3] <> 0)) {
                        $in=  new \DateTime($datax[2]);
                        $out=  new \DateTime($datax[3]);
                        $dif = $in->diff($out);
                        if ($dif->invert == 1) {
                            if($dif->h < 1){
                                 $mil = 300 / 60;

                                 $pres = "salah absen-".$mil;
                            } else {
                            $mid = new \DateTime("00:00:01");
                            $beda1 = $mid->diff($out);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;

                            $mid2 = new \DateTime("23:59:59");
                            $beda2 = $mid2->diff($in);
                            $menit2 = ($beda2->h * 60);
                            $menit2 += $beda2->i;

                            $men = $menit + $menit2;
                            if( $men > 720) {
                                $mil = 720/60;

                            } else {
                                $mil = $men/60;

                            }
                            $pres = "malam x malam-".$mil;
                            }
                        } else {
                            $menit = ($dif->h * 60);
                            $menit += $dif->i;
                            $men = $menit;
                            if( $men > 720) {
                                $mil =720/60;

                            } else {
                                $mil = $men/60;

                            }
                            $pres = "Siang-".$mil;
                        }

                    } else if (($datax[2] == 0) && ($datax[3] <> 0)) {
                        $mid = new \DateTime("00:00:01");
                        $out=  new \DateTime($datax[3]);
                        $mid2 = new \DateTime("12:00:01");
                        $bedax = $mid2->diff($out);
                        if($bedax->invert == 1) {
                            $beda1 = $mid->diff($out);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if( $men > 420) {
                                $mil = 420/60;

                            } else {
                                $mil = $men/60;

                            }
                            $pres = "Malam x Libur-".$mil;
                        } else {
                            $beda1 = $mid2->diff($out);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if( $men > 420) {
                                $mil = 420/60;

                            } else {
                                $mil = $men/60;

                            }
                            $pres = "tidak absen pagi-".$mil;
                        }

                    } else if (($datax[2] <> 0) && ($datax[3] == 0)) {
                        $mid = new \DateTime("23:59:59");
                        $in=  new \DateTime($datax[2]);
                        $mid2 = new \DateTime("12:00:01");
                        $bedax = $mid2->diff($in);
                        if($bedax->invert == 0) {
                            $beda1 = $mid->diff($in);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if ($men > 300) {
                                $mil = 300 / 60;

                            } else {
                                $mil = $men / 60;

                            }
                            $pres = "libur x malam-" . $mil;
                        }else{
                            $beda1 = $mid2->diff($in);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if ($men > 300) {
                                $mil = 300 / 60;

                            } else {
                                $mil = $men / 60;

                            }
                            $pres = "tidak absen sore-" . $mil;
                        }
                    }else {
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