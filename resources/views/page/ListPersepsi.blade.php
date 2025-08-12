@extends('layouts.app')

@section('css')


@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Daftar Kehadiran</li>
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
                      <h3 class="float-left">Rekap Kehadiran Persamaan Persepsi</h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Buat Rekap Presensi Baru</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="{{ route('akademik.persepsi.make') }}">
                                    @csrf

                                    
                                    <div class="form-group row ye">
                                        <label>tanggal</label>
                                        
                                        <select id="ye" class="form-control" name="tanggal">
                                            <option selected disabled>== Silahkan pilih tanggal tersedia ==</option>
                                            @foreach($listtgl as $key => $i)
                                                <option value="{{ $i }}">{{tgl($i)}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    

                                    
                                    <button class="btn btn-success float-left" type="submit">Rekap Presensi</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                                               
                                <th>Tanggal </th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                   
                                    <td> {{ tgl($data->tanggal) }}</td>
                                    <td>
                                        <a class="badge badge-info" href="{{ route('akademik.persepsi.detail', $data->id) }}" >Lihat kehadiran </a>
                                        <a class="badge badge-success" href="{{ route('absensi.rekap', $data->id) }}" >Lihat Rekap Absen</a>
                                        <button class="badge badge-danger"
                                                onclick=" if( confirm('anda Yakin?')) { event.preventDefault();
                                                        document.getElementById('delete-option-form-{{$data->id}}').submit()} else{  event.preventDefault(); }">
                                            Hapus</button>
                                        <form id="delete-option-form-{{$data->id}}" action="{{ route('absensi.destroy', $data->id ) }}" method="POST">
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
    <script type="text/javascript" src="{{ asset('srcblog/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('srcblog/RemotModal.js') }}"></script>
    

@endsection

