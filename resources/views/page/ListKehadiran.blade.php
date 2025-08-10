@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/sel2/css/select2.css') }}"  />

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/presensi') }}">Daftar Rapat</a></li>
            <li class="breadcrumb-item">Kehadiran Rapat</li>
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
                      <h3 class="float-left">Presensi rapat {{$pres->name}}</h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tambah Peserta Rapat</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="{{ route('kehadiran.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label>Nama Peserta Rapat</label>
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

                                        <input type="hidden" name="presensi_id" value="{{$pid}}" >
                                <button class="btn btn-success float-left" type="submit">Tambah Peserta</button> <a class="btn btn-info float-right" href="{{route('peserta.index')}}">Tambah Peserta Baru</a>
                                </form>
                            </div>
                        </div>

                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>tanda tangan</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($peserta as $datahadir)
                                @if($datahadir->pesertas()->first())
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$datahadir->pesertas()->first()->name}}<br>
                                    {{$datahadir->pesertas()->first()->nik}}</td>
                                    <td>{{$datahadir->pesertas()->first()->type}}</td>
                                    <td>
                                        @if(is_null($datahadir->sign))
                                        @php $msg = "Assalamualaikum, ijin melampirkan link untuk ttd Rapat".$pres->name."hari ini. Terimakasih banyak.". route('hadir', $datahadir->slug);  @endphp
                                        <a class="btn btn-warning"  href="{{ route('kehadiran.edit', $datahadir->id) }}" >add ttd</a>
                                            <button class="btn btn-success" id="copy_{{ $datahadir->id }}" onclick="copyToClipboard('copy_{{ $datahadir->id }}')" data-text="Assalamualaikum, ijin melampirkan link untuk ttd Rapat {{$pres->name}} hari ini. Terimakasih banyak. {{ route('hadir', $datahadir->slug) }}">link</button>
                                           @if(!is_null($datahadir->pesertas()->first()->telp))
                                            <a class="btn btn-info" href="{{ route('peserta.notif',['slug'=>$datahadir->slug, 'pid'=>$pid ] ) }}" > kirim wa </a> 
                                           @endif
                                            <button class="badge badge-danger"
                                                    onclick=" if( confirm('anda Yakin?')) { event.preventDefault();
                                                            document.getElementById('delete-option-form-{{$datahadir->id}}').submit()} else{  event.preventDefault(); }">
                                                Hapus</button>
                                            <form id="delete-option-form-{{$datahadir->id}}" action="{{ route('kehadiran.destroy', $datahadir->id ) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @else
                                            <img src="{{ asset('storage/'.$datahadir->sign) }}" width="100" height="50" alt="Telah ditandatangani">
                                        @endif
                                    </td>
                                    
                                </tr>
                                    @endif
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

    <script type="text/javascript" src="{{ asset('srcblog/RemotModal.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/sel2/js/select2.full.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.sel2').select2({
                placeholder: " Siliahkan Pilih Peserta Rapat",
                width: 'resolve' // need to override the changed default
            }); });

    </script>
    <script>

        function copyToClipboard(id) {

            const input = document.createElement('input');
            input.value = document.getElementById(id).dataset.text;
            document.body.appendChild(input);
            input.select();
            if(document.execCommand('copy')) {
                alert('link tandatangan dicopy ke klipbord');
                document.body.removeChild(input);
            }
        }
    </script>

@endsection

