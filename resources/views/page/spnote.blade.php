@extends('auth.aBase')

@section('css')
    <link rel="stylesheet"  href="{{ asset('assets/quill/css/quill.coreui.css') }}" type="text/css" media="all">
    <style>
        .ql-container {
            min-height: 10rem;
            height: 100%;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .ql-editor {
            height: 100%;
            flex: 1;
            overflow-y: auto;
            width: 100%;
        }

    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notulensi {{ $rapat->name }}</div>
                @include('layouts.alert')

                <div class="card-body">
                    <form method="POST" action="{{ route('processnote', $notulensi) }}">
                        @csrf
                        @method('put')
                        @php $val= Str::contains(URL::current(), 'validate'); @endphp
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
                            @if($val)
                            <input type="hidden"  name="kesimpulan" value="{!! $notulensi->kesimpulan !!}">
                            @else
                            <input type="hidden" id="quill_data"  name="kesimpulan" value="{!! $notulensi->kesimpulan !!}">
                                @endif

                        </div>
                        <div class="form-group row">
                            <label>Rencana Tindak Lanjut</label>
                            <div id="editor2" class="form-control" >{!! $notulensi->tindaklanjut !!}</div>
                            @if($val)
                            <input type="hidden" name="tindaklanjut" value="{!! $notulensi->tindaklanjut !!}"></input>
                            @else
                            <input type="hidden" id="quill2_data" name="tindaklanjut" value="{!! $notulensi->tindaklanjut !!}"></input>
                                @endif
                        </div>

                        @if ($val)
                            <div class="form-group row">
                                <label>Nama Notulen</label>
                                <select class="form-control sel2" style="width: 100%"  disabled>
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
                            <input type="hidden" name="notulen_id" value="{{ $notulensi->notulis_id }}">
                            <input type="hidden" name="valid" value="2">
                            <button class="btn btn-success float-left" type="submit">Validasi Notulensi</button>
                        @else
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
                            <input type="hidden" name="valid" value="1">
                            <button class="btn btn-info float-left" type="submit">Simpan Notulensi</button>
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('assets/quill/js/quill.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/quill/js/text-editor.js') }}"></script>
@endsection
