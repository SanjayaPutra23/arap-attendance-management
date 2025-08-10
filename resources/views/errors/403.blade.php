@extends('errors.base')

@section('css')

@endsection

@section('content')

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="clearfix">
            <h1 class="float-left display-3 mr-4">403</h1>
            <h4 class="pt-3">What Are You Doing ?!.</h4>
            <p class="text-muted">You Dont Have Access To This Page.</p>
              <a href="{{ route('home') }}" class="btn btn-md btn-primary">Return Home</a>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('javascript')

@endsection
