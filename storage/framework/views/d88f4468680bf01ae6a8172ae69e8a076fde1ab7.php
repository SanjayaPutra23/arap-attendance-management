

<?php $__env->startSection('css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('absensi.index')); ?>">Daftar Absen</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('absensi.show', $absen->id)); ?>">Absen <?php echo e($absen->type." ".namabulan($absen->bln)." ".$absen->thn); ?></a></li>
            <li class="breadcrumb-item">Detail Absen Karyawan</li>
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
                      <h3 class="float-left">Absensi Karyawan <?php echo e($absen->type." ".namabulan($absen->bln)." ".$absen->thn); ?></h3><a href="<?php echo e(route('absensi.pdf.user', $list->id)); ?>" class="btn btn-outline-success float-right" > download rincian</a>
                         </div>
                    <div class="card-body">
                        <?php  $kary = explode("-",$list->data_peserta); ?>
                        <h3>Nama : <?php echo e($kary[0]); ?> </h3>
                        <h4>NIK : <?php echo e($kary[1]); ?> </h4>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Datang</th>
                                <th>Pulang</th>
                                <th>Ket</th>
                            </tr>
                            </thead>
                            <tbody><?php $datum = explode("&", $list->presensi); array_pop($datum);
                //dd($datum);
                            ?>
                            <?php $__currentLoopData = $datum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $datax =explode("_", $data);
                                if($datax[1]==0) {
                        if (($datax[2] == 0) && ($datax[3] == 0)) {
                            $pres = "Tidak hadir";
                        } else if (($datax[2] <> 0) && ($datax[3] <> 0)) {
                            $dtg = strtotime($datax[2]);
                            $plg = strtotime($datax[3]);
                            $limd = strtotime("09:00:00");
                            $limp = strtotime("16:59:00");
                            if ($dtg < $limd && $plg > $limp) {
                            $pres = "Tepat waktu";
                            } else {
                                $pres = " Hadir";
                            }
                        } else {
                            $pres = "Hadir";
                        }
                    }else{
                         $pres = "libur";
                    }
 ?>
                                <tr>
                                    <td><?php echo e(tgl($datax[0], true)); ?></td>
                                    <td><?php echo e($datax[2]); ?></td>
                                    <td><?php echo e($datax[3]); ?></td>
                                    <td><?php echo e($pres); ?> </td>

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


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/detailUser.blade.php ENDPATH**/ ?>