<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('satpam.index')); ?>">Presensi</a></li>
            <li class="breadcrumb-item">Rekap Presensi</li>
        </ol>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
            <div class="fade-in">
              <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="float-left">Rekap Presensi Satpam <?php echo e($rekap->type); ?> <?php echo e(namabulan($rekap->bln)); ?> <?php echo e($rekap->thn); ?></h3>
                              <a class="btn btn-outline-primary float-right" href="<?php echo e(route('exel.rekap_satpam', $rekap->id)); ?>" >Download  Rekap</a>
                              <a class="btn btn-outline-success float-right" href="<?php echo e(route('exel.rekaphit_satpam', $rekap->id)); ?>" >Download  Perhitungan Rekap</a>
                          </div>
                          <div class="card-body">


                              <div id="sample2">
                              <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <tr>
                                      <td >No</td>
                                      <td >Nama</td>
                                      <?php $__currentLoopData = $tgls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tgl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <td ><?php echo e($tgl); ?></td>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tr>

                                  </thead>
                                  <tbody>
                                  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php $idn = explode("-",$key) ?>
                                      <tr>
                                          <td><?php echo e($loop->iteration); ?></td>

                                          <td class="table-info" ><?php echo e($idn[0]); ?> <br> (<?php echo e($idn[1]); ?>)</td>
                                          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wkt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <td ><?php echo e($wkt); ?></td>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tbody>
                              </table>
                              </div>
                          </div>
                      </div>
                  </div>





              </div>
              <!-- /.row-->
            </div>
          </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script type="text/javascript" src="<?php echo e(asset('srcblog/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jquery.doubleScroll.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#sample2').doubleScroll();
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/detailRekapS.blade.php ENDPATH**/ ?>