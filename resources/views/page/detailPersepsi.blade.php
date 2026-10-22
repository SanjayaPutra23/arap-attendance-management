@extends('layouts.app')

@section('css')
@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('akademik.persepsi')}}">Daftar kehadiran</a></li>
            <li class="breadcrumb-item">Data Kehadiran Persamaan Persepsi</li>
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
                              <h3 class="float-left">Kehadiran Persamaan Persepsi tanggal {{ tgl($persepsi->tanggal) }}</h3>
                              <a class="btn btn-outline-primary float-right" href="{{ route('exel.detailpersepsi', $persepsi->id) }}">Download Absensi</a>
                          </div>
                          <div class="card-body">


                              <div id="sample2">
                              <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th style="width:60px;">No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($grouped as $mesinId => $sessions)
                                    {{-- Header Mesin --}}
                                    <tr>
                                    <td colspan="4" class="bg-info">
                                        {{ $mesinNames[$mesinId] ?? 'Mesin '.$mesinId }}
                                    </td>
                                    </tr>

                                    @foreach($sessions as $sesi => $rows)
                                    {{-- Header Sesi --}}
                                    <tr>
                                        <td colspan="4" >
                                            
                                        @switch($sesi)
                                            @case(1)
                                                Sesi 1 (08.00 - 09.40) @php $limit = $settings['sesi1_batas']; @endphp
                                                @break
                                            @case(2)
                                                Sesi 2 (10.00 - 11.40) @php $limit = $settings['sesi2_batas']; @endphp
                                                @break
                                            @case(3)
                                               Sesi 3 (13.00 - 14.40) @php $limit = $settings['sesi3_batas']; @endphp
                                                @break
                                            @case(4)
                                               Sesi 4 (15.00 - 16.40) @php $limit = $settings['sesi4_batas']; @endphp
                                                @break
                                            @default
                                                Hubungi Admin
                                        @endswitch
                                        </td>
                                    </tr>

                                    @php $no = 1; @endphp
                                    @foreach($rows as $row)
                                        <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->nik }}</td>
                                        <td @if($row->jam >= $limit) style="color: white; background-color:#FF0000;" @endif>{{ $row->jam }}</badge></td>
                                        </tr>
                                    @endforeach
                                    @endforeach

                                @empty
                                    <tr>
                                    <td colspan="4" class="text-center text-muted">Tidak ada data.</td>
                                    </tr>
                                @endforelse
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
