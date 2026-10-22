@extends('layouts.app')

@section('css')
@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            @if(!empty($divisi))
                <li class="breadcrumb-item"><a href="{{ route('absensi.divisi', $divisi) }}">Presensi {{ ucfirst($divisi) }}</a></li>
            @else
                <li class="breadcrumb-item"><a href="{{ route('absensi.index') }}">Presensi Relawan</a></li>
            @endif
            <li class="breadcrumb-item active">Data Presensi</li>
        </ol>
    </div>
@endsection

@section('content')

<div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="float-left">Absensi {{ $absen->type }} {{namabulan($absen->bln)}} {{ $absen->thn }} @if(!empty($divisi)) - Divisi {{ ucfirst($divisi) }} @endif</h3>
                              <a class="btn btn-outline-primary float-right" href="{{ route('exel.absen', $absen->id) }}">Download Absensi</a>
                          </div>
                          <div class="card-body">

                              @if($list->isEmpty())
                                  <div class="alert alert-info">Belum ada data presensi untuk divisi / periode ini.</div>
                              @else
                              <div id="sample2">
                              <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <tr>
                                      <td rowspan="2">No</td>
                                      <td rowspan="2">Nama</td>
                                      <td rowspan="2">NIK</td>
                                      <td rowspan="2">Divisi</td>

                                          @php $data = $list[0]; $data1 = explode("&",$data->presensi); array_pop($data1); @endphp
                                          @foreach($data1 as $pres)
                                              @php $idnx = explode("_",$pres); //dd($data1) @endphp
                                      <td @if($idnx[1] == 1) class="table-warning" @endif colspan="2">{{$idnx[0]}}</td>
                                            @endforeach

                                  </tr>
                                  <tr>
                                      @php $data = $list[0]; $data1 = explode("&",$data->presensi); array_pop($data1); @endphp
                                      @foreach($data1 as $pres)
                                              @php $idnx = explode("_",$pres); //dd($data1) @endphp
                                      <td @if($idnx[1] == 1) class="table-warning" @endif >Dtg</td>
                                      <td @if($idnx[1] == 1) class="table-warning" @endif >Plg</td>
                                     @endforeach
                                  </tr>

                                  </thead>
                                  <tbody>
                                  @foreach($list as $data)
                                      @php 
                                          $idn = explode("-",$data->data_peserta); 
                                          $divisiNama = formatDivisi($data->peserta->jabatan ?? ($pesertaMap[$data->id_peserta] ?? null));
                                      @endphp
                                      <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td class="table-info" ><a href="{{ route('absensi.user', $data->id) }}" >{{ $idn[0] }} </a></td>
                                          <td class="table-info" >{{$idn[1] }}</td>
                                          <td class="table-info" >{{ $divisiNama }}</td>
                                          @php $data1 = explode("&",$data->presensi); array_pop($data1) @endphp

                                          @foreach($data1 as $pres)
                                              @php $idnx = explode("_",$pres); //dd($data1) @endphp
                                              <td @if($idnx[1] == 1) class="table-warning" @endif >@if($idnx[2] <> 0){{ $idnx[2] }} @endif</td>
                                              <td @if($idnx[1] == 1) class="table-warning" @endif >@if($idnx[3] <> 0){{ $idnx[3] }} @endif</td>
                                              @endforeach
                                      </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                              </div>
                              @endif
                          </div>
                      </div>
                  </div>





              </div>
              <!-- /.row-->
            </div>
          </div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('srcblog/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.doubleScroll.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#sample2').doubleScroll();
        });
    </script>

@endsection
