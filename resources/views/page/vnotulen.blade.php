@extends('layouts.app')

@section('css')
    <style>


        table {
            width: 100%;
        }

        table.borderes {
            border-spacing: 0;
            border-collapse: collapse;
            border: 1pt solid black;
        }
        th {
            text-align: center;
        }
        table.borderes td {
            border: 1pt solid black;
        }
        table.borderes th {
            border: 1pt solid black;
        }


    </style>

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/notulensi') }}">Daftar Notulensi</a></li>
            <li class="breadcrumb-item">Notulen Rapat</li>
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
                      <h3 class="float-left">Notulensi Rapat {{ $rapat->name }}</h3>
                    </div>
                    <div class="card-body">
                        <table class='borderes'>
                            <tr>
                                <td style="background-color:#9b9b9b"><strong>Nama Kegiatan</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $rapat->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal Kegiatan</strong></td>
                            </tr>
                            <tr>
                                <td>{{ tsp($rapat->tanggal) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tempat Kegiatan</strong></td>
                            </tr>
                            <tr>
                                <td>{{$rapat->tempat}}</td>
                            </tr>
                            <tr>
                                <td><strong>Agenda Kegiatan</strong></td>
                            </tr>
                            <tr>
                                <td>{{$rapat->agenda}}</td>
                            </tr>
                            <tr>
                                <td  style="background-color:#9b9b9b"><strong>Kesimpulan Rapat</strong></td>
                            </tr>
                            <tr>
                                <td>{!! $notulensi->kesimpulan!!}</td>
                            </tr>
                            <tr>
                                <td  style="background-color:#9b9b9b"><strong>Rencana Tindak Lanjut</strong></td>
                            </tr>
                            <tr>
                                <td>{!! $notulensi->tindaklanjut !!}</td>
                            </tr>
                            <tr>
                                <td><strong>Nama Notulen</strong></td>
                            </tr>
                            <tr>
                                <td>{{ $notulis->name }}</td>
                            </tr>

                        </table>
                        <br>
                        <form method="POST" action="{{ route('validatenote', $notulensi) }}">
                        @csrf
                        @method('put')
                        @php $val= Str::contains(URL::current(), 'validate'); @endphp
                            @if ($val)
                                <input type="hidden" name="valid" value="2">
                                <button class="btn btn-success float-left" type="submit">Validasi Notulensi</button>
                        @endif
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('modal')

@endsection

@section('javascript')

@endsection

