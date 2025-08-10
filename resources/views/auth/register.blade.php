@extends('auth.aBase')

@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
                    <h1>{{ __('Register') }}</h1>
                    <p class="text-muted">Buat Akun anda</p>
 @include('layouts.alert')
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                    </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-phone"></use>
                            </svg>
                          </span>
                            </div>
                            <input class="form-control" type="text" placeholder="no telp aktif" name="telp" value="{{ old('telp') }}" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-bank"></use>
                            </svg>
                          </span>
                            </div>
                            <input class="form-control" type="text" placeholder="Afiliasi" name="afiliasi" value="{{ old('afiliasi') }}" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-school"></use>
                            </svg>
                          </span>
                            </div>
                            <select name="type" placeholder="jenis" class="form-control" requires>
                                <option hidden disabled selected value> -- select an option -- </option>
                                @foreach($type as $data)
                                <option value="{{$data->id}}">{{$data->text}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                    </div>
                    <button class="btn btn-block btn-success" type="submit">{{ __('Daftar') }}</button>
                </form>
            </div>
            <div class="card-footer p-4">
              <div class="row">
                <div class="col-8">
                    <h5>Sudah punya akun?  <a href="{{route('login')}}"> Login disini </a></h5>
                </div>
                  <div class="col-4">
                      <a href="https://fkunswagati.ac.id">MEU FK UGJ</a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('javascript')

@endsection
