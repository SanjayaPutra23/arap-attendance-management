@if(session('msg'))
<?php $satu = session('msg'); $msg= explode("-",$satu); ?>
<div class="alert alert-{{ $msg[0] }} alert-dismissible fade show" role="alert">{!!  $msg[1] !!}
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">close</span></button>
</div>
@endif


@if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> {{ $error }}
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

            </div>
        @endforeach
@endif

@if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">{{ session('status') }}
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">close</span></button>
    </div>
@endif
