@extends('layouts.app')

@section('css')
@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('satpam.index')}}">Presensi</a></li>
            <li class="breadcrumb-item">Rekap Presensi</li>
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
                              <h3 class="float-left">Rekap Presensi Satpam {{ $rekap->type }} {{namabulan($rekap->bln)}} {{ $rekap->thn }}</h3>
                              <a class="btn btn-outline-primary float-right" href="{{ route('exel.rekap_satpam', $rekap->id) }}" >Download  Rekap</a>
                              <a class="btn btn-outline-success float-right" href="{{ route('exel.rekaphit_satpam', $rekap->id) }}" >Download  Perhitungan Rekap</a>
                          </div>
                          <div class="card-body">


                              <div id="sample2">
                              <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <tr>
                                      <td >No</td>
                                      <td >Nama</td>
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

                                          <td class="table-info" >{{ $idn[0] }} <br> ({{$idn[1] }})</td>
                                          @foreach($data as $wkt)
                                              <td >{{ $wkt }}</td>
                                              @endforeach
                                      </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                              </div>
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
