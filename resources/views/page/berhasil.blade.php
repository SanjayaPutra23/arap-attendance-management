@extends('auth.aBase')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hadir</div>

                <div class="card-body">
                   <H3> Terima Kasih Telah Menghadiri Rapat</H3> <br>
                    @if($note)
                        <a class="btn btn-outline-info" href="{{ Route('note.unduh', $slg) }}"> Unduh Notulensi Rapat</a>
                        @else
                    <h5> Notulensi rapat dalam proses Validasi, anda bisa kembali kehalaman ini untuk mengunduh notulensi rapat</h5>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
