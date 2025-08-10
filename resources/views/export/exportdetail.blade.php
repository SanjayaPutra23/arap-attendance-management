<table>
    <thead>
    <tr>
        @php  $kary = explode("-",$list->data_peserta); @endphp
        <th colspan="2"><h3>Nama : {{ $kary[0] }} </h3></th>
        <th colspan="2">  <h4>NIK : {{ $kary[1] }} </h4></th>

    </tr>
    <tr>
        <th>Tanggal</th>
        <th>Datang</th>
        <th>Pulang</th>
        <th>Ket</th>
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
            <td>{{ $datax[2] }}</td>
            <td>{{ $datax[3] }}</td>
            <td>{{ $pres }} </td>

        </tr>
    @endforeach
    </tbody>
</table>