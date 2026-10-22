@extends('layouts.app')

@section('css')

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">{{ $pageTitle ?? 'Setting Jam Kerja' }}</li>
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
                      <h3 class="float-left">{{ $pageTitle ?? 'Setting Jam Kerja' }}</h3>
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
                                  @canany(['umum', 'akademik'])
                                  <a href="{{ route('setting.edit', $data->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                  @endcanany
                                  @can('ultraman')
                                  <button class="btn btn-sm btn-danger"
                                          onclick="event.preventDefault();
                                          if(confirm('Yakin ingin menghapus setting ini?')) {
                                              document.getElementById('delete-user-form-{{$data->id}}').submit();
                                          }">
                                          Delete</button>
                                  <form id="delete-user-form-{{$data->id}}" action="{{ route('setting.destroy', $data->id ) }}" method="POST" style="display:none;">
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

