@extends('layouts.app')

@section('css')

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
            <li class="breadcrumb-item">{{ $user->name }}</li>
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
                      <i class="fa fa-align-justify"></i> User</div>
                    <div class="card-body">
                        <h5>Name: {{ $user->name }}</h5>
                        <h6>E-mail: {{ $user->email }}</h6>
                        Peran:
                        <ul>
                            @foreach($user->roles->pluck('name')->toArray() as $role)
                                <li>
                                {{ $role }}
                                </li>
                                @endforeach
                        </ul>

                        <a href="{{ route('admin.users.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection
