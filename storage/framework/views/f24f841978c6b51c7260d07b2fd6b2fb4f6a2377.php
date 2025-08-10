

<?php $__env->startSection('css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item">Daftar Rapat</li>
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
                      <h3 class="float-left">Buat Rapat</h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Buat Rapat Baru</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="<?php echo e(route('presensi.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label>Nama Kegiatan</label>
                                        <input class="form-control" type="text" placeholder="Nama Kegiatan" name="name" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Tanggal Kegiatan</label>
                                        <input class="form-control" type="date" placeholder=" Tanggal " name="tanggal" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Tempat Kegiatan</label>
                                        <input class="form-control" type="text" placeholder="Tempat" name="tempat" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Agenda Kegiatan</label>
                                        <input class="form-control" type="text" placeholder="Agenda utama" name="agenda" >
                                    </div>
                                    <div class="form-group row">
                                        <label>Nama Pimpinan Rapat</label>
                                        <select class="form-control sel2" style="width: 100%" name="peserta_id">
                                            <option></option>
                                            <optgroup label="Dekanat">

                                                <?php $__currentLoopData = $dekanat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($datad->id); ?>">
                                                        <?php echo e($datad->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                            <optgroup label="Dosen">
                                                <?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($datao->id); ?>">
                                                        <?php echo e($datao->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                            <optgroup label="Tendik">
                                                <?php $__currentLoopData = $tendik; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($datat->id); ?>">
                                                        <?php echo e($datat->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                            <optgroup label="Lainnya">
                                                <?php $__currentLoopData = $lainnya; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($datax->id); ?>">
                                                        <?php echo e($datax->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <button class="btn btn-success float-left" type="submit">Buat Rapat</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Rapat</th>
                                <th>Tanggal</th>
                                <th>Pemimpin Rapat</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($data->name); ?></td>
                                    <td><?php echo e(tgl($data->tanggal, false)); ?></td>
                                    <td><?php echo e($data->pesertas()->first()->name); ?></td>
                                    <td>

                                        <a href="<?php echo e(route('presensi.isi', $data->id)); ?>" class="btn btn-info">Isi Presensi</a>
                                        <?php if(is_null($data->note)): ?>
                                        <a href="<?php echo e(route('notulensi.buat', $data->id)); ?>" class="btn btn-outline-success">buat notulensi</a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('presensi.prints', $data->id)); ?>" class="btn btn-success">Print</a>
                                        <a class="badge badge-warning"  href="<?php echo e(route('presensi.edit', $data->id)); ?>" data-toggle="modal" data-target="#myModal">Edit</a>
                                        <button class="badge badge-danger"
                                                onclick=" if( confirm('anda Yakin?')) { event.preventDefault();
                                                        document.getElementById('delete-option-form-<?php echo e($data->id); ?>').submit()} else{  event.preventDefault(); }">
                                            Delete</button>
                                        <form id="delete-option-form-<?php echo e($data->id); ?>" action="<?php echo e(route('presensi.destroy', $data->id )); ?>" method="POST">
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
    <script type="text/javascript" src="<?php echo e(asset('srcblog/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('srcblog/RemotModal.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/ListPresensi.blade.php ENDPATH**/ ?>