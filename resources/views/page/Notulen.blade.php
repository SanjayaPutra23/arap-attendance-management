@extends('layouts.app')

@section('css')
    <link rel="stylesheet"  href="{{ asset('assets/quill/css/quill.coreui.css') }}" type="text/css" media="all">

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
                                <form method="POST" action="{{ route('notulensi.update', $notulensi) }}">
                                    @csrf
                                    @method('put')
                                    <input type="hidden" name="pid" value="{{$rapat->id}}">
                                    <div class="form-group row">
                                        <label>Nama Kegiatan</label>
                                        <input class="form-control" type="text" value="{{ $rapat->name }}" readonly>
                                    </div>
                                    <div class="form-group row">
                                        <label>Tanggal Kegiatan</label>
                                        <input class="form-control" type="date" value="{{ $rapat->tanggal }}" readonly>
                                    </div>
                                    <div class="form-group row">
                                        <label>Tempat Kegiatan</label>
                                        <input class="form-control" type="text" value="{{$rapat->tempat}}" readonly>
                                    </div>
                                    <div class="form-group row">
                                        <label>Agenda Kegiatan</label>
                                        <input class="form-control" type="text" value="{{ $rapat->agenda }}" readonly>
                                    </div>
                                    <div class="form-group row">
                                        <label>Kesimpulan Rapat</label>
                                        <div id="editor" class="form-control" >{!! $notulensi->kesimpulan !!}</div>
                                        <input type="hidden" id="quill_data" name="kesimpulan" value="{!! $notulensi->kesimpulan !!}"></input>
                                    </div>
                                    <div class="form-group row">
                                        <label>Rencana Tindak Lanjut</label>
                                        <div id="editor2" class="form-control" >{!! $notulensi->tindaklanjut !!}</div>
                                        <input type="hidden" id="quill2_data" name="tindaklanjut" value="{!! $notulensi->tindaklanjut !!}"></input>

                                    </div>
                                    <div class="form-group row">
                                        <label>Nama Notulen</label>
                                        <select class="form-control sel2" style="width: 100%" name="notulen_id">
                                            <option selected disabled> nama notulen</option>
                                            <optgroup label="Dosen">
                                                @foreach($dosen as $datao)
                                                    <option value="{{ $datao->id }}" @if($datao->id == ($notulensi->notulis_id ?? '') ) selected @endif>
                                                        {{ $datao->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Tendik">
                                                @foreach($tendik as $datat)
                                                    <option value="{{ $datat->id }}" @if($datat->id == ($notulensi->notulis_id ?? '') ) selected @endif>
                                                        {{ $datat->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                            <optgroup label="Lainnya">
                                                @foreach($lainnya as $datax)
                                                    <option value="{{ $datax->id }}" @if($datax->id == ($notulensi->notulis_id ?? '') ) selected @endif>
                                                        {{ $datax->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <button class="btn btn-success float-left" type="submit">Simpan Notulensi</button>
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
    <script type="text/javascript" src="{{ asset('assets/quill/js/quill.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/quill/js/text-editor.js') }}"></script>
@endsection

