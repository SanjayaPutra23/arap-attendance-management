
    <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel" > Edit Mesin </h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
    <div class="modal-body">
        <div>
            <form method="POST" action="<?php echo e(route('mesin.update', $edit->id)); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="form-group">
                    <label>Nama Mesin</label>
                    <input class="form-control" type="text" placeholder="Nama Mesin" name="name" value="<?php echo e($edit->name); ?>" >
                </div>
                <div class="form-group row">
                    <label>Jenis Mesin</label>
                    <select class="form-control" name="tipe">
                        <option value="ip" <?php if($edit->tipe == "ip"): ?> selected <?php endif; ?>>IP based</option>
                        <option value="usb" <?php if($edit->tipe == "usb"): ?> selected <?php endif; ?>>USB</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label>IP Address</label>
                    <input class="form-control" type="text" placeholder="Alamat Internet protokol mesin" name="ip" value="<?php echo e($edit->ip); ?>" >
                </div>
                <div class="form-group ">
                    <label>Port Mesin</label>
                    <input class="form-control" type="text" placeholder="IP Port" name="port" value="<?php echo e($edit->port); ?>" >
                </div>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary pull-right" type="submit">Edit Mesin</button>
            </form>
        </div>
    </div>

    <div class="modal-footer">


    </div><?php /**PATH /var/www/html/arp/resources/views/modal/mesinedit.blade.php ENDPATH**/ ?>