@extends('layouts.app')

@section('css')


@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Menage Mesin</li>
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
                      <h3 class="float-left">Daftar Mesin Presensi Akademik</h3>
                      @if($pur > 50000) 
                        <a class="btn btn-outline-danger float-right" href="{{ route('pur.pool') }}" >Purifikasi Pool Data</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Mesin Absensi</th>
                                <th>grup mesin</th>
                                <th>Sinkronisasi Terakhir</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{ optional($data->groupOption)->text ?? '-' }}</td>
                                    <td>{{ tsp($data->last_sync)}}</td>
                                    <td>
                                        @if($data->tipe     == "ip")
                                        <a href="{{ route('pool.show', $data->id) }}" class="badge badge-info">Check Koneksi</a>
                                        <a href="{{ route('pull.pool', $data->id) }}" class="badge badge-warning">Sinkronkan Data</a>
                                        @else
                                            <a href="{{ route('pool.usb', $data->id) }}" class="badge badge-success">upload dari USB</a>
                                        @endif
                                    </td>
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

@endsection

