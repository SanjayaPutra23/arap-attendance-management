

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('satpam.index')); ?>">Presensi</a></li>
            <li class="breadcrumb-item">Data Presensi</li>
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
                              <h3 class="float-left">Absensi  Satpam <?php echo e($absen->type); ?> <?php echo e(namabulan($absen->bln)); ?> <?php echo e($absen->thn); ?></h3>
                              <a class="btn btn-outline-primary float-right" href="<?php echo e(route('exel.absen', $absen->id)); ?>">Download Absensi</a>
                          </div>
                          <div class="card-body">


                              <div id="sample2">
                              <table class="table table-bordered">
                                  <thead>
                                  <tr>
                                  <tr>
                                      <td rowspan="2">No</td>
                                      <td rowspan="2">Nama</td>

                                          <?php $data = $list[0]; $data1 = explode("&",$data->presensi); array_pop($data1); ?>
                                          <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php $idnx = explode("_",$pres); //dd($data1) ?>
                                      <td <?php if($idnx[1] == 1): ?> class="table-warning" <?php endif; ?> colspan="2"><?php echo e($idnx[0]); ?></td>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                  </tr>
                                  <tr>
                                      <?php $data = $list[0]; $data1 = explode("&",$data->presensi); array_pop($data1); ?>
                                      <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php $idnx = explode("_",$pres); //dd($data1) ?>
                                      <td <?php if($idnx[1] == 1): ?> class="table-warning" <?php endif; ?> >Dtg</td>
                                      <td <?php if($idnx[1] == 1): ?> class="table-warning" <?php endif; ?> >Plg</td>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tr>

                                  </thead>
                                  <tbody>
                                  <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php $idn = explode("-",$data->data_peserta); ?>
                                      <tr>
                                          <td><?php echo e($loop->iteration); ?></td>
                                          <td class="table-info" ><a href="<?php echo e(route('satpam.user', $data->id)); ?>" ><?php echo e($idn[0]); ?> <br> (<?php echo e($idn[1]); ?>)</a></td>
                                          <?php $data1 = explode("&",$data->presensi); array_pop($data1) ?>

                                          <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php $idnx = explode("_",$pres); //dd($data1) ?>
                                              <td <?php if($idnx[1] == 1): ?> class="table-warning" <?php endif; ?> ><?php if($idnx[2] <> 0): ?><?php echo e($idnx[2]); ?> <?php endif; ?></td>
                                              <td <?php if($idnx[1] == 1): ?> class="table-warning" <?php endif; ?> ><?php if($idnx[3] <> 0): ?><?php echo e($idnx[3]); ?> <?php endif; ?></td>
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

<?php echo $__env->make('dashboard.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/detailAbsenS.blade.php ENDPATH**/ ?>