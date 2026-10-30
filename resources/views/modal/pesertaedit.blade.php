<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Edit Pegawai</h4>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
    <div class="col-md-12">
        <form method="POST" action="{{ route('admin.peserta.update', $edit->id) }}">
            @csrf
            @method('put')
            <div class="form-group row">
                <label>Nama Pegawai</label>
                <input class="form-control" type="text" name="name" value="{{ $edit->name }}">
            </div>
            <div class="form-group row">
                <label>NIK</label>
                <input class="form-control" type="text" name="nik" value="{{ $edit->nik }}">
            </div>
            <div class="form-group row">
                <label>Uniq Id</label>
                <input class="form-control" type="text" name="uid" value="{{ $edit->uid }}">
            </div>
            <div class="form-group row">
                <label>Nomor Whatsapp</label>
                <input class="form-control" type="text" name="telp" value="{{ $edit->telp }}">
            </div>
            <div class="form-group row">
                <label>Jenis Absensi</label>
                <select class="form-control" name="type">
                    <option value="Relawan" @if(strtolower($edit->type) == 'relawan') selected @endif>Relawan</option>
                </select>
            </div>
            <div class="form-group row">
                <label>Jabatan</label>
                <select class="form-control" name="jabatan">
                    <option value="Ompreng" @if(strtolower($edit->jabatan) == "ompreng") selected @endif>Ompreng</option>
                    <option value="Persiapan" @if(strtolower($edit->jabatan) == "persiapan") selected @endif>Persiapan</option>
                    <option value="Pengolahan" @if(strtolower($edit->jabatan) == "pengolahan") selected @endif>Pengolahan</option>
                    <option value="Pemorsian" @if(strtolower($edit->jabatan) == "pemorsian") selected @endif>Pemorsian</option>
                    <option value="Distribusi" @if(strtolower($edit->jabatan) == "distribusi") selected @endif>Distribusi</option>
                    <option value="Keamanan" @if(strtolower($edit->jabatan) == "keamanan" || strtolower($edit->jabatan) == "scurity") selected @endif>Keamanan</option>
                    <option value="Officer" @if(strtolower($edit->jabatan) == "officer") selected @endif>Officer</option>
                </select>
            </div>

            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary pull-right" type="submit">Edit Pegawai</button>
        </form>
    </div>
</div>
<div class="modal-footer"></div>
