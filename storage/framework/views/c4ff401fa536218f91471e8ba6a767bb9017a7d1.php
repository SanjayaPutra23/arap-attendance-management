
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" > Edit Mesin </h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <div class="col-md-12">
            <form method="POST" action="<?php echo e(route('admin.peserta.update', $edit->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="form-group row">
                                        <label>Nama Pegawai</label>
                                        <input class="form-control" type="text" name="name" value="<?php echo e($edit->name); ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label>NIK</label>
                                        <input class="form-control" type="text" name="nik" value="<?php echo e($edit->nik); ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label>Uniq Id</label>
                                        <input class="form-control" type="text" name="uid" value="<?php echo e($edit->uid); ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label>Nomor Whatsapp</label>
                                        <input class="form-control" type="text" name="telp"  value="<?php echo e($edit->telp); ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label>Jenis Absensi</label>
                                        <select class="form-control" name="type">
                                            <option value="Karyawan" <?php if($edit->type != null && $edit->type != "Satpam" && $edit->type != "cs" ): ?> selected <?php endif; ?> >Karyawan</option>
                                            <option value="Satpam" <?php if($edit->type == "Satpam"): ?> selected <?php endif; ?> >Satpam</option>
                                            <option value="cs" <?php if($edit->type == "cs"): ?> selected <?php endif; ?>>Cleaning Service</option>
                                            <option value= '0' <?php if($edit->type == null ): ?> selected <?php endif; ?>>Tidak Masuk Absen</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="jabatan">
                                            <option value="Dosen" <?php if($edit->jabatan == "Dosen"): ?> selected <?php endif; ?>>Dosen</option>
                                            <option value="Tendik" <?php if($edit->jabatan == "Tendik"): ?> selected <?php endif; ?>>Tendik</option>
                                            <option value="Lainnya" <?php if($edit->jabatan == "Lainnya"): ?> selected <?php endif; ?>>Lainnya</option>
                                        </select>
                                    </div>
         
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary pull-right" type="submit">Edit Pegawai</button>
            </form>
        </div>
    </div>

    <div class="modal-footer">


    </div><?php /**PATH /var/www/html/arp/resources/views/modal/pesertaedit.blade.php ENDPATH**/ ?>