@extends('layouts.app')

@section('css')

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li class="breadcrumb-item">Baru</li>
        </ol>
    </div>
@endsection

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Buat User</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" action="{{ route('admin.users.store') }}">

                            @csrf
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <svg class="c-icon c-icon-sm">
                                          <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                      </svg>
                                    </span>
                                </div>
                                <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <svg class="c-icon">
                                      <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-lock-unlocked"></use>
                                    </svg>
                                  </span>
                                </div>
                                <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <svg class="c-icon">
                                      <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-lock-unlocked"></use>
                                    </svg>
                                  </span>
                                </div>
                                <input class="form-control" type="password" placeholder="{{ __('Password confirmation') }}" name="password_confirmation" required>
                            </div>

                            <div class="input-group mb-3">
                                @foreach ($role as $role)
                                    <div class="form-check">
                                        <input type="checkbox" name = "roles[]" value="{{ $role->id}}">
                                        <lable> {{$role->name}} </lable>
                                    </div>
                                @endforeach

                            </div>
                            <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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
