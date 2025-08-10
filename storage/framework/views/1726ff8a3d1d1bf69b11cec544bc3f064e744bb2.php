

<?php $__env->startSection('css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item">Menage Mesin</li>
        </ol>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="float-left">Daftar Mesin Presensi</h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tambah Mesin Baru</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="<?php echo e(route('mesin.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label>Nama Mesin</label>
                                        <input class="form-control" type="text" placeholder="Nama Mesin" name="name" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Jenis Mesin</label>
                                        <select class="form-control" name="tipe">
                                            <option value="ip">IP based</option>
                                            <option value="usb">USB</option>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label>IP Address</label>
                                        <input class="form-control" type="text" placeholder="Alamat Internet protokol mesin" name="ip" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Port Mesin</label>
                                        <input class="form-control" type="text" placeholder="IP Port" name="port" >
                                    </div>
                                    <button class="btn btn-success float-left" type="submit">Tambahkan Mesin</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Mesin Absensi</th>
                                <th>Alamat IP</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($data->name); ?>(<?php echo e($data->tipe); ?>)</td>
                                    <td><?php echo e($data->ip); ?>:<?php echo e($data->port); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('mesin.show', $data->id)); ?>" class="badge badge-info">Check Koneksi</a>
                                        <a class="badge badge-warning" href="<?php echo e(route('mesin.edit', $data->id)); ?>" data-toggle="modal" data-target="#myModal">Edit</a>
                                        <button class="badge badge-danger"
                                                onclick=" if( confirm('anda Yakin?')) { event.preventDefault();
                                                        document.getElementById('delete-option-form-<?php echo e($data->id); ?>').submit()} else{  event.preventDefault(); }">
                                            Delete</button>
                                        <form id="delete-option-form-<?php echo e($data->id); ?>" action="<?php echo e(route('mesin.destroy', $data->id )); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" >Edit Mesin</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Edit Mesin</button>
                </div>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript" src="<?php echo e(asset('srcblog/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('srcblog/RemotModal.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/ListMesin.blade.php ENDPATH**/ ?>