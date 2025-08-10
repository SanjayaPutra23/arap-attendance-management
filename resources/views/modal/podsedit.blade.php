
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" > Edit POL </h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <div class="col-md-12">
            <form method="POST" action="{{ route('pol.update', $edit->id) }}">
                @csrf
                @method('put')
                <div class="form-group row">
                                        <label>User Id</label>
                                        <input class="form-control" type="text" name="user_id" value="{{$edit->user_id}}" readonly />
                                    </div>
                                    <div class="form-group row">
                                        <label>Tanggal </label>
                                        <input class="form-control" type="date" name="tanggal" value="{{$edit->tanggal}}">
                                    </div>
                                    <div class="form-group row">
                                        <label>Untuk (optional) </label>
                                        <input class="form-control" type="text" name="for" value="{{$edit->for}}">
                                    </div>
                                    
         
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary pull-right" type="submit">Edit POL</button>
            </form>
        </div>
    </div>

    <div class="modal-footer">


    </div>