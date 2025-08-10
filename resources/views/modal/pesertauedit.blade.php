
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" > Edit Mesin </h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <div class="col-md-12">
            <form method="POST" action="{{ route('peserta.update', $edit->id) }}">
                @csrf
                @method('put')
                <div class="form-group row">
                                        <label>Nama Pegawai</label>
                                        <input class="form-control" type="text" name="name" value="{{$edit->name}}">
                                    </div>
                                    <div class="form-group row">
                                        <label>NIK</label>
                                        <input class="form-control" type="text" name="nik" value="{{$edit->nik}}">
                                    </div>
                                    <div class="form-group row">
                                        <label>No.Wa (tanpa angka '0' atau '+62')</label>
                                        <input class="form-control" type="text" name="telp" value="{{$edit->telp}}">
                                    </div>
                                    <div class="form-group row">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="jabatan">
                                            <option value="Dosen" @if($edit->jabatan == "Dosen") selected @endif>Dosen</option>
                                            <option value="Tendik" @if($edit->jabatan == "Tendik") selected @endif>Tendik</option>
                                            <option value="Lainnya" @if($edit->jabatan == "Lainnya") selected @endif>Lainnya</option>
                                        </select>
                                    </div>
         
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary pull-right" type="submit">Edit Pegawai</button>
            </form>
        </div>
    </div>

    <div class="modal-footer">


    </div>