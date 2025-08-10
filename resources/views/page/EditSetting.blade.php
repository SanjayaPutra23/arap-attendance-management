@extends('layouts.app')

@section('css')

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('setting.index') }}">Setting</a></li>
            <li class="breadcrumb-item">Ubah</li>
        </ol>
    </div>
@endsection

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Ubah Setting</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" action="{{ route('setting.update', $setting->id) }}">
                            @csrf
                            @method('put')

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{ $setting->name }}</span>
                                </div>
                                <input class="form-control" type="text" placeholder="{{ __('Nilai Setting') }}" name="value" value="{{ $setting->value }}" required>
                            </div>
                           

                          
                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="{{ route('setting.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection
