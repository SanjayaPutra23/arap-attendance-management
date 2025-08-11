
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" > Edit Mesin </h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <div>
            <form method="POST" action="{{ route('mesin.update', $edit->id) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Nama Mesin</label>
                    <input class="form-control" type="text" placeholder="Nama Mesin" name="name" value="{{$edit->name}}" >
                </div>
                <div class="form-group">
                    <label>Jenis Mesin</label>
                    <select class="form-control" name="tipe">
                        <option value="ip" @if($edit->tipe == "ip") selected @endif>IP based</option>
                        <option value="usb" @if($edit->tipe == "usb") selected @endif>USB</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jenis Absen</label>
                    <select class="form-control" name="grup">
                        @foreach($grup as $data)
                        <option value="{{$data->id}}" @if($edit->grup == $data->id) selected @endif>{{ $data->text }}</option>
                        <@endforeach
                    </select>
                </div>
                <div class="form-group ">
                    <label>IP Address</label>
                    <input class="form-control" type="text" placeholder="Alamat Internet protokol mesin" name="ip" value="{{$edit->ip}}" >
                </div>
                <div class="form-group ">
                    <label>Port Mesin</label>
                    <input class="form-control" type="text" placeholder="IP Port" name="port" value="{{$edit->port}}" >
                </div>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary pull-right" type="submit">Edit Mesin</button>
            </form>
        </div>
    </div>

    <div class="modal-footer">


    </div>