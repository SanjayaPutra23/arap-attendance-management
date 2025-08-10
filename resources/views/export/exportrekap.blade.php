<table >
    <thead>
    <tr>
    <tr>
        <td >No</td>
        <td >Nama</td>
        <td >Nik</td>
        @foreach($tgls as $tgl)
            <td >{{$tgl}}</td>
        @endforeach
    </tr>

    </thead>
    <tbody>
    @foreach($list as $key=>$data)
        @php $idn = explode("-",$key) @endphp
        <tr>
            <td>{{$loop->iteration}}</td>

            <td class="table-info" >{{ $idn[0] }} </td>
            <td class="table-info" >{{$idn[1] }}</td>
            @foreach($data as $wkt)
                <td >{{ $wkt }}</td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>