
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" > Edit Mesin </h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <div class="col-md-12">
            <form method="POST" action="{{ route('admin.peserta.update', $edit->id) }}">
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
                                        <label>Uniq Id</label>
                                        <input class="form-control" type="text" name="uid" value="{{$edit->uid}}">
                                    </div>
                                    <div class="form-group row">
                                        <label>Nomor Whatsapp</label>
                                        <input class="form-control" type="text" name="telp"  value="{{$edit->telp}}">
                                    </div>
                                    <div class="form-group row">
                                        <label>Jenis Absensi</label>
                                        <select class="form-control" name="type">
                                            <option value="Karyawan" @if($edit->type != null && $edit->type != "Satpam" && $edit->type != "cs" ) selected @endif >Karyawan</option>
                                            <option value="Satpam" @if($edit->type == "Satpam") selected @endif >Satpam</option>
                                            <option value="cs" @if($edit->type == "cs") selected @endif>Cleaning Service</option>
                                            <option value= '0' @if($edit->type == null ) selected @endif>Tidak Masuk Absen</option>
                                        </select>
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