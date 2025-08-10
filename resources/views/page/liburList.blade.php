@extends('layouts.app')

@section('css')

@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Setting Libur</li>
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
                      <h3 class="float-left">Setting Libur ARAP</h3>
                        @can('umum')
                        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
                        <a href="{{ route('libur.create') }}" class="btn btn-md btn-info">Tambah Libur</a>
                         <button type="button" class="btn btn-secondary mr-0 ml-0 pr-0 pl-0" disabled></button>  
                        <a href="{{ route('libur.add') }}" class="btn btn-md btn-success ">Tarik Data Libur Nasional</a>
                        </div>
                            @endcan   

                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Tanggal</th>
                            <th>Libur</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($list as $data)
                            <tr>
                              <td>{{ $data->tanggal }}</td>
                              <td>{{ $data->ket }}</td>
                              
                              
                              <td>
                                  @can('umum')
                                  <a href="{{ route('libur.edit', $data->id) }}" class="badge badge-primary">Ubah libur</a>
                               @endcan
                                      @can('ultraman')
                                      <button class="badge badge-danger"
                                              onclick="event.preventDefault();
                                              document.getElementById('delete-user-form-{{$data->id}}').submit()">
                                              Hapus</button>
                                <form id="delete-user-form-{{$data->id}}" action="{{ route('libur.destroy', $data->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @endcan
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                        {{$list->links()}}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

