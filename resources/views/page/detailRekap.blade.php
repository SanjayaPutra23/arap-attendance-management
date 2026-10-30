@extends('layouts.app')

@section('css')
@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            @if(!empty($divisi))
                <li class="breadcrumb-item"><a href="{{ route('absensi.divisi', $divisi) }}">Presensi {{ formatDivisi($divisi) }}</a></li>
            @else
                <li class="breadcrumb-item"><a href="{{ route('absensi.index') }}">Presensi Relawan</a></li>
            @endif
            <li class="breadcrumb-item active">Rekap Presensi</li>
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
                              <h3 class="float-left">Rekap Presensi {{ $rekap->type }} {{namabulan($rekap->bln)}} {{ $rekap->thn }} @if(!empty($divisi)) - Divisi {{ formatDivisi($divisi) }} @endif</h3>
                              <a class="btn btn-outline-primary float-right" href="{{ route('exel.rekap', $rekap->id) }}" >Download  Rekap</a>
                              <a class="btn btn-outline-danger float-right mr-2" href="{{ route('exel.rekaphit', $rekap->id) }}" >Download  Perhitungan Rekap</a>
                          </div>
                          <div class="card-body">
                              <div class="mb-3">
                                  <div class="btn-group btn-group-sm flex-wrap" role="group">
                                      <a href="{{ route('absensi.rekap', $rekap->id) }}" class="btn {{ empty($divisi) ? 'btn-primary' : 'btn-outline-primary' }}">Semua Relawan</a>
                                      <a href="{{ route('absensi.divisi.rekap', ['persiapan', $rekap->id]) }}" class="btn {{ ($divisi ?? '') == 'persiapan' ? 'btn-primary' : 'btn-outline-primary' }}">Persiapan</a>
                                      <a href="{{ route('absensi.divisi.rekap', ['pengolahan', $rekap->id]) }}" class="btn {{ ($divisi ?? '') == 'pengolahan' ? 'btn-primary' : 'btn-outline-primary' }}">Pengolahan</a>
                                      <a href="{{ route('absensi.divisi.rekap', ['pemorsian', $rekap->id]) }}" class="btn {{ ($divisi ?? '') == 'pemorsian' ? 'btn-primary' : 'btn-outline-primary' }}">Pemorsian</a>
                                      <a href="{{ route('absensi.divisi.rekap', ['distribusi', $rekap->id]) }}" class="btn {{ ($divisi ?? '') == 'distribusi' ? 'btn-primary' : 'btn-outline-primary' }}">Distribusi</a>
                                      <a href="{{ route('absensi.divisi.rekap', ['ompreng', $rekap->id]) }}" class="btn {{ ($divisi ?? '') == 'ompreng' ? 'btn-primary' : 'btn-outline-primary' }}">Ompreng</a>
                                      <a href="{{ route('absensi.divisi.rekap', ['keamanan', $rekap->id]) }}" class="btn {{ ($divisi ?? '') == 'keamanan' ? 'btn-primary' : 'btn-outline-primary' }}">Keamanan</a>
                                      <a href="{{ route('absensi.divisi.rekap', ['kebersihan', $rekap->id]) }}" class="btn {{ ($divisi ?? '') == 'kebersihan' ? 'btn-primary' : 'btn-outline-primary' }}">Kebersihan</a>
                                      <a href="{{ route('absensi.divisi.rekap', ['officer', $rekap->id]) }}" class="btn {{ ($divisi ?? '') == 'officer' ? 'btn-primary' : 'btn-outline-primary' }}">Officer</a>
                                  </div>
                              </div>

                              @if(empty($list) || count($list) == 0)
                                  <div class="alert alert-info">Belum ada data rekap presensi untuk divisi / periode ini.</div>
                              @else
                              <div id="sample2">
                              <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                      <th>No</th>
                                      <th>Nama</th>
                                      <th>NIK</th>
                                      <th>Divisi</th>
                                      @foreach($tgls as $tgl)
                                      <th>{{$tgl}}</th>
                                      @endforeach
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($list as $key=>$data)
                                      @php
                                          $parts = explode("-", $key);
                                          $nik = trim(end($parts));
                                          $nama = count($parts) > 1 ? implode("-", array_slice($parts, 0, -1)) : $parts[0];
                                          $divisiNama = formatDivisi($pesertaByNik[$nik] ?? ($divisi ?? null));
                                      @endphp
                                      <tr>
                                          <td>{{$loop->iteration}}</td>
                                          <td class="table-info font-weight-bold">{{ $nama }}</td>
                                          <td class="table-info">{{ $nik }}</td>
                                          <td class="table-info"><span class="badge badge-info">{{ $divisiNama }}</span></td>
                                          @foreach($data as $wkt)
                                              <td>{{ $wkt }}</td>
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
