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
                      <h3 class="float-left">Options</h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Buat Baru</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form id="createoption" action="{{ route('admin.option.create') }}" method="POST">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <svg class="c-icon c-icon-sm">
                                          <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-barcode"></use>
                                      </svg>
                                    </span>
                                        </div>
                                        <input class="form-control" type="text" placeholder="jenis List" name="list" value="{{ old('list') }}" required autofocus>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">TEXT</span>
                                        </div>
                                        <input class="form-control" type="text" placeholder="Isi Text" name="text" value="{{ old('text') }}" required>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <svg class="c-icon">
                                      <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-find-in-page"></use>
                                    </svg>
                                  </span>
                                        </div>
                                        <input class="form-control" type="text" placeholder="Keterangan" name="ket" >
                                    </div>
                                    <button class="btn btn-outline-success" type="submit" >Simpan</button>

                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>List Type</th>
                            <th>Text</th>
                            <th>Keterangan</th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($options as $data)
                            <tr>
                              <td>{{ $data->id }}</td>
                              <td>{{ $data->list }}</td>
                              <td>{{ $data->text }}</td>
                              <td>{{ $data->ket }}</td>
                              <td>
                                <a href="{{ route('admin.option.edit', $data->id) }}" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>

                                      <button class="btn btn-block btn-danger"
                                              onclick="event.preventDefault();
                                              document.getElementById('delete-option-form-{{$data->id}}').submit()">
                                              Delete</button>
                                <form id="delete-option-form-{{$data->id}}" action="{{ route('admin.option.destroy', $data->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                        {{$options->links()}}
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection

