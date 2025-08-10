@extends('layouts.app')

@section('css')


@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('absensi.index') }}">Daftar Absen</a></li>
            <li class="breadcrumb-item"><a href="{{ route('absensi.show', $absen->id) }}">Absen {{ $absen->type." ".namabulan($absen->bln)." ".$absen->thn }}</a></li>
            <li class="breadcrumb-item">Detail Absen Karyawan</li>
        </ol>
    </div>
@endsection

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="float-left">Absensi Karyawan {{ $absen->type." ".namabulan($absen->bln)." ".$absen->thn }}</h3><a href="{{ route('absensi.pdf.user', $list->id) }}" class="btn btn-outline-success float-right" > download rincian</a>
                         </div>
                    <div class="card-body">
                        @php  $kary = explode("-",$list->data_peserta); @endphp
                        <h3>Nama : {{ $kary[0] }} </h3>
                        <h4>NIK : {{ $kary[1] }} </h4>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Datang</th>
                                <th>Pulang</th>
                                <th>Ket</th>
                            </tr>
                            </thead>
                            <tbody>@php $datum = explode("&", $list->presensi); array_pop($datum);
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
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('modal')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" >Edit Mesin</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Edit Mesin</button>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('srcblog/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('srcblog/RemotModal.js') }}"></script>
@endsection

