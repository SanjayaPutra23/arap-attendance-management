@extends('layouts.app')

@section('css')


@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Daftar Rapat</li>
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
                      <h3 class="float-left">Buat Rapat</h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Buat Rapat Baru</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="{{ route('presensi.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label>Nama Kegiatan</label>
                                        <input class="form-control" type="text" placeholder="Nama Kegiatan" name="name" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Tanggal Kegiatan</label>
                                        <input class="form-control" type="date" placeholder=" Tanggal " name="tanggal" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Tempat Kegiatan</label>
                                        <input class="form-control" type="text" placeholder="Tempat" name="tempat" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Agenda Kegiatan</label>
                                        <input class="form-control" type="text" placeholder="Agenda utama" name="agenda" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Nama Pimpinan Rapat</label>
                                        <select class="form-control sel2" style="width: 100%" name="peserta_id">
                                            <option></option>
                                            <optgroup label="Dekanat">

                                                @foreach($dekanat as $datad)
                                                    <option value="{{ $datad->id }}">
                                                        {{ $datad->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Dosen">
                                                @foreach($dosen as $datao)
                                                    <option value="{{ $datao->id }}">
                                                        {{ $datao->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Tendik">
                                                @foreach($tendik as $datat)
                                                    <option value="{{ $datat->id }}">
                                                        {{ $datat->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Lainnya">
                                                @foreach($lainnya as $datax)
                                                    <option value="{{ $datax->id }}">
                                                        {{ $datax->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <button class="btn btn-success float-left" type="submit">Buat Rapat</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Rapat</th>
                                <th>Tanggal</th>
                                <th>Pemimpin Rapat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{ tgl($data->tanggal, false) }}</td>
                                    <td>{{$data->pesertas()->first()->name}}</td>
                                    <td>

                                        <a href="{{ route('presensi.isi', $data->id) }}" class="btn btn-info">Isi Presensi</a>
                                        @if(is_null($data->note))
                                        <a href="{{ route('notulensi.buat', $data->id) }}" class="btn btn-outline-success">buat notulensi</a>
                                        @endif
                                        <a href="{{ route('presensi.prints', $data->id) }}" class="btn btn-success">Print</a>
                                        <a class="badge badge-warning"  href="{{ route('presensi.edit', $data->id) }}" data-toggle="modal" data-target="#myModal">Edit</a>
                                        <button class="badge badge-danger"
                                                onclick=" if( confirm('anda Yakin?')) { event.preventDefault();
                                                        document.getElementById('delete-option-form-{{$data->id}}').submit()} else{  event.preventDefault(); }">
                                            Delete</button>
                                        <form id="delete-option-form-{{$data->id}}" action="{{ route('presensi.destroy', $data->id ) }}" method="POST">
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

