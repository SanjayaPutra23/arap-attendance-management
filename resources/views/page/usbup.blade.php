@extends('layouts.app')

@section('css')


@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Upload data USB</li>
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
                            <h3 class="float-left">Upload Absensi dari USB {{$upl->name}}</h3>

                        </div>
                        <div class="card-body">
                                    <form method="POST" action="{{ route('pool.upload') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label>File .dat</label>
                                            <input class="form-control" name="filedata" type="file">
                                            <input type="hidden" name="id" value="{{ $upl->id }}">
                                        </div>
                                        <button class="btn btn-success float-left" type="submit">Import Data</button>
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

