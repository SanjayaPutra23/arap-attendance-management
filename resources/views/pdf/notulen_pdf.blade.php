<!DOCTYPE html>
<html>
<head>
    <title> Notulensi {{$rapat->name}}</title>
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
<table class='collapse'>
    <tr>
        <td rowspan="2" style="width:60px"><img src="{{ public_path('srcblog/logox.png') }}" width="60"></td>
        <td colspan="2" style="text-align:center"><strong>FK UGJ CIREBON</strong></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center"><strong>NOTULEN</strong></td>
    </tr>
</table>
<br>
<table class='collapse'>
    <tr>
        <td colspan="2" >Tanggal : {{ tsp($rapat->tanggal) }}</td>
    </tr>
    <tr>
        <td colspan="2" style="background-color:#9b9b9b">Agenda Rapat :</td>
    </tr>
    <tr>
        <td  colspan="2">1. {{ $rapat->agenda }}</td>
    </tr>
    <tr>
        <td colspan="2" style="background-color:#9b9b9b" >Kesimpulan Rapat</td>
    </tr>
</table>
        <div style="text-align: justify; text-justify: inter-word;">
            {!! $notulensi->kesimpulan !!}
        </div>
<br>
<table class='collapse'>
    <tr>
        <td colspan="2" style="background-color:#9b9b9b" >Rencana Tindak Lanjut</td>
    </tr>
</table>

        <div style="text-align: justify; text-justify: inter-word;">
            {!! $notulensi->tindaklanjut !!}
        </div>

<br>
<table class='collapse'>
    <tr>
        <td colspan="3" style="text-align: center;" > Cirebon,  {{ tsp($rapat->tanggal) }} </td>
    </tr>
    <tr>
        <td>Notulen Rapat</td>
        <td>Pimpinan Rapat</td>
        <td>Dekan FK UGJ</td>
    </tr>
    <tr>
        <td style="height:50px">
        </td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>{{ $notulis->name }}</td>
        <td>{{ $rapat->pesertas()->first()->name }}</td>
        <td> dr. Catur Setiya Sulistiyana, M.Med.Ed</td>
    </tr>
</table>


</body>
</html>