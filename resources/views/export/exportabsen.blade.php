<table>
    <thead>

    <tr>
        <td  rowspan="2">No</td>
        <td rowspan="2">Nama</td>
        <td rowspan="2">Nik</td>
        @foreach($tgls as $tgl)
            <td colspan="2">{{$tgl}}</td>
        @endforeach
    </tr>
    <tr>
        @foreach($tgls as $tgl)
            <td  >Dtg</td>
            <td  >Plg</td>
        @endforeach
    </tr>

    </thead>
    <tbody>
    @foreach($list as $data)
        @php $idn = explode("-",$data->data_peserta); @endphp
        <tr>
            <td>{{$loop->iteration}}</td>
            <td  >{{ $idn[0] }} </td>
            <td  >{{$idn[1] }}</td>
            @php $data1 = explode("&",$data->presensi); array_pop($data1) @endphp

            @foreach($data1 as $pres)
                @php $idnx = explode("_",$pres); //dd($data1) @endphp
                <td >@if($idnx[2] <> 0){{ $idnx[2] }} @endif</td>
                <td  >@if($idnx[3] <> 0){{ $idnx[3] }} @endif</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>