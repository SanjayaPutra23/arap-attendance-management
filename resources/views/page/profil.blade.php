@extends('layouts.app')

@section('css')

@endsection
@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Profil</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Main profil</h4>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" id="profilform" method="POST" action="{{ route('profil.update',"1") }}">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="name" value="{{ $user->name }}" placeholder="Username" required="">
                                        <div class="invalid-feedback" style="width: 100%;">
                                            Your username is required.
                                        </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email </label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="you@example.com">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address
                                    </div>
                                </div>

                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" form="profilform" type="submit">Update Profil</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="d-flex justify-content-between align-items-center mb-0">
                                <span class="text-muted">Avatar</span>

                            </h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                    <a onclick="chooseFile();" ><div class="user-avatar text-center d-block">
                                            <img src="{{ url('/assets/img/avatars/'.$user->avatar) }}" alt="User Avatar" style='height: 100%; width: 100%; object-fit: contain' class="rounded-circle user-avatar-xxl">
                                        </div></a>
                                </li>
                            </ul>
                            <form  action="{{ route('avatar') }}" method='post' id="form_avatar" enctype="multipart/form-data">
                                @csrf
                                <div style="height:0px;overflow:hidden">
                                    <input type="file" id="avatar" name="avatar" />
                                </div>
                                <div class="input-group">
                                        click to change
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="d-flex justify-content-between align-items-center mb-0">
                                <span class="text-muted">Password</span>

                            </h4>
                        </div>
                        <div class="card-body">
                            <form  action="{{ route('password') }}" method='post' id="passwordform" >
                                @csrf
                            <ul class="list-group mb-3">
                                <li class="list-group-item d-flex justify-content-between">
                                        <input type="password" class="form-control" name="old_password" id="afil" value="" placeholder="password lama">
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <input type="password" class="form-control" name="new_password" id="afil" value="" placeholder="password baru">
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <input type="password" class="form-control" name="c_password" id="afil" value="" placeholder="confirmasi password">
                                </li>
                            </ul>
                                <div class="input-group">
                                    <button type="submit" form="passwordform" class="btn btn-secondary" >Ganti password </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

    <script>
        function chooseFile() {
            document.getElementById("avatar").click();
        };
        document.getElementById("avatar").onchange = function() {
            document.getElementById("form_avatar").submit();
        };

    </script>

@endsection
