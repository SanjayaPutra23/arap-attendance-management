@extends('auth.aBase')

@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mx-4">
            <div class="card-body p-4">
                    <h1>{{ __('Reset Password') }}</h1>
                    <p class="text-muted">Reset Password anda</p>
 @include('layouts.alert')
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $request->token }}">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-envelope-open"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control @error('email') is-invalid @enderror " type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ $request->email ?? old('email')  }}" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <svg class="c-icon">
                              <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                            </svg>
                          </span>
                        </div>
                        <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="{{ __('Password') }}" name="password" required>
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
                    <button class="btn btn-block btn-info" type="submit">{{ __('Reset Password') }}</button>
                </form>
            </div>
            <div class="card-footer p-4">
              <div class="row">
                <div class="col-8">

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
