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
    <tbody>s
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
            <td>{{ $datax[2] }}</td>
            <td>{{ $datax[3] }}</td>
            <td>{{ $pres }} </td>

        </tr>
    @endforeach
    </tbody>
</table>