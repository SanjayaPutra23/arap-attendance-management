@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/sel2/css/select2.css') }}"  />

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Daftar Notulensi</li>
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
                      <h3 class="float-left">Notulensi rapat</h3>

                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Rapat</th>
                                <th>Notulen</th>
                                <th>Aksi</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notulensi as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$data->presensi()->first()->name}}</td>
                                    <td></td>
                                    <td>
                                        @if($data->presensi()->first()->note == 1)
                                        <a href="{{ route('notulensi.edit', $data->id) }}" class="btn btn-outline-success">isi notulensi</a>
                                        <button class="btn btn-success" id="copy_{{ $data->id }}" onclick="copyToClipboard('copy_{{ $data->id }}')" data-text="{{ route('notulen', $data->slug) }}">link Notulen</button>
                                        <button class="btn btn-warning" id="copy_2{{ $data->id }}" onclick="copyToClipboard('copy_2{{ $data->id }}')" data-text="{{ route('notulen.validate', $data->slug) }}">link Validasi</button>
                                        @else
                                            <a href="{{ route('notulensi.show', $data->id) }}" class="btn btn-outline-info">Lihat notulensi</a>
                                            <a href="{{ route('notulensi.prints', $data->id) }}" class="btn btn-outline-success">Download notulensi</a>
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

    <script type="text/javascript" src="{{ asset('srcblog/RemotModal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/sel2/js/select2.full.js') }}"></script>
    <script>

        function copyToClipboard(id) {

            const input = document.createElement('input');
            input.value = document.getElementById(id).dataset.text;
            document.body.appendChild(input);
            input.select();
            if(document.execCommand('copy')) {
                alert('link dicopy ke klipbord');
                document.body.removeChild(input);
            }
        }
    </script>

@endsection

