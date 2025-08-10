@extends('layouts.app')

@section('css')


@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('satpam.index') }}">Daftar Absen</a></li>
            <li class="breadcrumb-item"><a href="{{ route('satpam.show', $absen->id) }}">Absen {{ $absen->type." ".namabulan($absen->bln)." ".$absen->thn }}</a></li>
            <li class="breadcrumb-item">Detail Absen satpam</li>
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
                      <h3 class="float-left">Absensi satpam {{ $absen->type." ".namabulan($absen->bln)." ".$absen->thn }}</h3><a href="{{ route('absensi.pdf.satpam', $list->id) }}" class="btn btn-outline-success float-right" > download rincian</a>
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

