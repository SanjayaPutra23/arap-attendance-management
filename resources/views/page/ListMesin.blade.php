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
                      <h3 class="float-left">Daftar Mesin Presensi</h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tambah Mesin Baru</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="{{ route('mesin.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label>Nama Mesin</label>
                                        <input class="form-control" type="text" placeholder="Nama Mesin" name="name" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Jenis Mesin</label>
                                        <select class="form-control" name="tipe">
                                            <option value="ip">IP based</option>
                                            <option value="usb">USB</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label>IP Address</label>
                                        <input class="form-control" type="text" placeholder="Alamat Internet protokol mesin" name="ip" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Port Mesin</label>
                                        <input class="form-control" type="text" placeholder="IP Port" name="port" >
                                    </div>
                                    <button class="btn btn-success float-left" type="submit">Tambahkan Mesin</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Mesin Absensi</th>
                                <th>Alamat IP</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->name}}({{ $data->tipe }})</td>
                                    <td>{{$data->ip}}:{{$data->port}}</td>
                                    <td>
                                        <a href="{{ route('mesin.show', $data->id) }}" class="badge badge-info">Check Koneksi</a>
                                        <a class="badge badge-warning" href="{{ route('mesin.edit', $data->id) }}" data-toggle="modal" data-target="#myModal">Edit</a>
                                        <button class="badge badge-danger"
                                                onclick=" if( confirm('anda Yakin?')) { event.preventDefault();
                                                        document.getElementById('delete-option-form-{{$data->id}}').submit()} else{  event.preventDefault(); }">
                                            Delete</button>
                                        <form id="delete-option-form-{{$data->id}}" action="{{ route('mesin.destroy', $data->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>

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
    <script type="text/javascript" src="{{ asset('srcblog/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('srcblog/RemotModal.js') }}"></script>
@endsection

