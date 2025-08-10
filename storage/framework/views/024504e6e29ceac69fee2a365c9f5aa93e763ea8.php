<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/dtable/dataTables.bootstrap4.css')); ?>"  />
    <link rel="stylesheet" href="<?php echo e(asset('assets/sel2/css/select2.css')); ?>"  />


<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item">Daftar pegawai</li>
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
                      <h3 class="float-left">Daftar peserta rapat</h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Tambah peserta baru</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="<?php echo e(route('peserta.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label>Nama Pegawai Baru</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                    <div class="form-group row">
                                        <label>NIK</label>
                                        <input class="form-control" type="text" name="nik">
                                    </div>
                                    <div class="form-group row">
                                        <label>Nomor Whatsapp (tanpa angka '0' atau '+62')</label>
                                        <input class="form-control" type="text" name="telp">
                                    </div>
                                    <div class="form-group row">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="jabatan">
                                            <option value="Dosen">Dosen</option>
                                            <option value="Tandik">Tendik</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-success float-left" type="submit">Tambah peserta Baru</button>
                                </form>
                            </div>
                        </div>

                        <table class="table table-responsive-sm table-striped datatable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>No WA</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $peserta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datahadir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($datahadir->name); ?><br>
                                        <?php echo e($datahadir->nik); ?></td>
                                    <td><?php echo e($datahadir->jabatan); ?></td>
                                    <td><?php echo e($datahadir->telp); ?></td>
                                    <td>
                                      <a class="badge badge-warning" href="<?php echo e(route('peserta.edit', $datahadir->id)); ?>" data-toggle="modal" data-target="#myModalx">Edit</a>
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
    <div class="modal fade" id="myModalx" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" >Modal title</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Save changes</button>
                </div>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/dtable/jquery.dataTables.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/dtable/dataTables.bootstrap4.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('assets/dtable/datatables.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('srcblog/RemotModal.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/ulistPeserta.blade.php ENDPATH**/ ?>