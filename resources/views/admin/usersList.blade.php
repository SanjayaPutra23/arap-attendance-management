@extends('layouts.app')

@section('css')

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Users</li>
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
                      <h3 class="float-left">Users</h3>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-md btn-success float-right">create</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th>Email verified at</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ implode(',',$user->roles->pluck('name')->toArray()) }}</td>
                              <td>{{ $user->email_verified_at }}</td>
                              <td>
                                <a href="{{ route('admin.power', $user->id) }}" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                @if( Auth::user()->id !== $user->id )
                                      <button class="btn btn-block btn-danger"
                                              onclick="event.preventDefault();
                                              document.getElementById('delete-user-form-{{$user->id}}').submit()">
                                              Delete</button>
                                <form id="delete-user-form-{{$user->id}}" action="{{ route('admin.users.destroy', $user->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                        {{$users->links()}}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

