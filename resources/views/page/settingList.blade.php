@extends('layouts.app')

@section('css')

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Setting Absen</li>
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
                      <h3 class="float-left">Setting ARAP</h3>
                        @can('ultraman')
                        <a href="{{ route('setting.create') }}" class="btn btn-md btn-success float-right">create</a>
                            @endcan
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Setting</th>
                            <th>Value</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($seting as $data)
                            <tr>
                              <td>{{ $data->name }}</td>
                              <td>{{ $data->value }}</td>
                              
                              
                              <td>
                                  @can('umum')
                                  <a href="{{ route('setting.edit', $data->id) }}" class="btn btn-block btn-primary">Ubah Setting</a>
                               @endcan
                                      @can('ultraman')
                                      <button class="btn btn-block btn-danger"
                                              onclick="event.preventDefault();
                                              document.getElementById('delete-user-form-{{$data->id}}').submit()">
                                              Delete</button>
                                <form id="delete-user-form-{{$data->id}}" action="{{ route('setting.destroy', $data->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endcan
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                        {{$seting->links()}}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

