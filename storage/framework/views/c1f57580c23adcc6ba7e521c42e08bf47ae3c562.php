

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
        </ol>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      <!-- ============================================================== -->
                      <!-- campaign tab one -->
                      <!-- ============================================================== -->
                      <div class="influence-profile-content pills-regular">
                          <div class="tab-content" id="pills-tabContent">

                              <div class="row">
                                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                      <div class="section-block">
                                          <h3 class="section-title">Rapat</h3>
                                      </div>
                                  </div>
                                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                      <div class="card">
                                          <div class="card-body">
                                              <h1 class="mb-1"><?php echo e($rapat); ?></h1>
                                              <p>Jumlah Rapat</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                      <div class="card">
                                          <div class="card-body">
                                              <h1 class="mb-1"><?php echo e($peserta); ?></h1>
                                              <p>Jumlah Peserta rapat</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                      <div class="card">
                                          <div class="card-body">
                                              <h1 class="mb-1"><?php echo e($notulen); ?></h1>
                                              <p>Jumlah Notulensi</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                      <div class="card">
                                          <div class="card-body">
                                              <h1 class="mb-1">0</h1>
                                              <p>Draft Submission</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>



                          </div>
                      </div>
                      <!-- ============================================================== -->
                      <!-- end campaign tab one -->
                      <!-- ============================================================== -->
                  </div>





              </div>
              <!-- /.row-->
            </div>
          </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/home.blade.php ENDPATH**/ ?>