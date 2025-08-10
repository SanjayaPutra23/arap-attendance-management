@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/dtable/dataTables.bootstrap4.css') }}"  />
    <link rel="stylesheet" href="{{ asset('assets/sel2/css/select2.css') }}"  />


@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Daftar POL</li>
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
                      <h3 class="float-left">Daftar Pegawai On Libur/Lembur </h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tambah POL</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="{{ route('pol.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label>Nama</label>
                                        <select class="form-control" name="user_id">
                                            @foreach ($peg as $data)
                                            <option value="{{$data->id}}">{{ $data->name}} </option>                                                
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label>Tanggal</label>
                                        <input class="form-control" type="date" name="tanggal">
                                    </div>
                                    <div class="form-group row">
                                        <label>Untuk (optional)</label>
                                        <input class="form-control" type="text" name="for">
                                    </div>
                                    
                                    <button class="btn btn-success float-left" type="submit">Tambah POL Baru</button>
                                </form>
                            </div>
                        </div>

                        <table class="table table-responsive-sm table-striped datatable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>tanggal</th>
                                <th>untuk</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->user_id}}</td>
                                    <td>{{$data->tanggal}}</td>
                                    <td>{{$data->for}}</td>
                                    <td>
                                      <a class="badge badge-warning" href="{{ route('pol.edit', $data) }}" data-toggle="modal" data-target="#myModalx">Edit</a>
                                            <button class="badge badge-danger"
                                                    onclick=" if( confirm('chin ca?')) { event.preventDefault();
                                                            document.getElementById('delete-option-form-{{$data->id}}').submit()} else{  event.preventDefault(); }">
                                                Hapus</button>
                                            <form id="delete-option-form-{{$data->id}}" action="{{ route('pol.destroy', $data->id ) }}" method="POST">
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
    <div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" >Modal title</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Save changes</button>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/dtable/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/dtable/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/dtable/datatables.js') }}"></script>

    <script type="text/javascript" src="{{ asset('srcblog/RemotModal.js') }}"></script>
@endsection

