

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('libur.index')); ?>">Setting Libur</a></li>
            <li class="breadcrumb-item">Baru</li>
        </ol>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> Buat libur</div>
                    <div class="card-body">
                        <br>
                        <form method="POST" action="<?php echo e(route('libur.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      tanggal
                                    </span>
                                </div>
                                <input class="form-control" type="date" placeholder="format tahun-bulan-tanggal" name="tanggal" value="" required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Nama Libur</span>
                                </div>
                                <input class="form-control" type="text" placeholder="Nama libur" name="ket" value="" required>
                            </div>
                           

                          
                            <button class="btn btn-block btn-success" type="submit"><?php echo e(__('Save')); ?></button>
                            <a href="<?php echo e(route('libur.index')); ?>" class="btn btn-block btn-primary"><?php echo e(__('Return')); ?></a>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/newLibur.blade.php ENDPATH**/ ?>