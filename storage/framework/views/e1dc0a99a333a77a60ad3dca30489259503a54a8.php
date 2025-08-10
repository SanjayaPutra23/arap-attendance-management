<?php $__env->startSection('css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item">Upload data USB</li>
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
                            <h3 class="float-left">Upload Absensi dari USB <?php echo e($upl->name); ?></h3>

                        </div>
                        <div class="card-body">
                                    <form method="POST" action="<?php echo e(route('pool.upload')); ?>" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>

                                        <div class="form-group row">
                                            <label>File .dat</label>
                                            <input class="form-control" name="filedata" type="file">
                                            <input type="hidden" name="id" value="<?php echo e($upl->id); ?>">
                                        </div>
                                        <button class="btn btn-success float-left" type="submit">Import Data</button>
                                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/usbup.blade.php ENDPATH**/ ?>