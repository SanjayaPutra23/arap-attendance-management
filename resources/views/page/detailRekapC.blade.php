@extends('layouts.app')

@section('css')
@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cs.index') }}">Presensi Kebersihan</a></li>
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
                        <h3 class="float-left">Rekap Presensi Kebersihan {{ $rekap->type }} {{ namabulan($rekap->bln) }} {{ $rekap->thn }}</h3>
                        <a class="btn btn-outline-primary float-right" href="{{ route('exel.rekap', $rekap->id) }}">Download Rekap</a>
                        <a class="btn btn-outline-danger float-right mr-2" href="{{ route('exel.rekaphit', $rekap->id) }}">Download Perhitungan Rekap</a>
                    </div>
                    <div class="card-body">

                        @if(empty($list) || count($list) == 0)
                            <div class="alert alert-info">Belum ada data rekap presensi untuk periode ini.</div>
                        @else
                        <div id="sample2">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                @foreach($tgls as $tgl)
                                <th>{{ $tgl }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $key => $data)
                                @php $idn = explode("-", $key) @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="table-info">{{ $idn[0] ?? '-' }}</td>
                                    <td class="table-info">{{ $idn[1] ?? '-' }}</td>
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
