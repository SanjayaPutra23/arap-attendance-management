

<?php $__env->startSection('css'); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item">Presensi</li>
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
                      <h3 class="float-left">Rekap Presensi CS</h3>
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Buat Rekap Presensi Baru</button>
                    </div>
                    <div class="card-body">

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="<?php echo e(route('cs.store')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label>Tipe Absensi</label>
                                        <select class="form-control type" name="type" >
                                            <option value="bulanan">Bulanan</option>
                                            <option value="mingguan">Mingguan</option>
                                        </select>
                                    </div>
                                    <div class="form-group row ye">
                                        <label>Tahun</label>
                                        <?php
                                            $earliest_year = 2022;
                                            $latest_year = date('Y');
                                        ?>
                                        <select id="ye" class="form-control" name="thn">
                                            <option selected disabled>== Silahkan pilih Tahun ==</option>
                                            <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($i->year); ?>"><?php echo e($i->year); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        </select>
                                    </div>
                                    <div class="form-group row mon">
                                        <label>Bulan </label>
                                        <select id="mon" class="form-control" name="bln">

                                            <option selected disabled>== Silahkan Pilih Bulan==</option>
                                            <?php $__currentLoopData = $month; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <option value="<?php echo e($data->month); ?>"><?php echo e(namabulan($data->month)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div id="demo" class="form-group row box">
                                        <label> Tanggal </label>
                                        <select class="form-control" >
                                            <option selected disabled>==Pilih Tahun dan Bulan dulu ==</option>
                                        </select>
                                        <input type="hidden" name="tgl_m" value="1">
                                    </div>
                                    <div class="form-group row  nobox">
                                        <label> tanggal : </label>
                                        <label  id="reno">  </label>
                                    </div>

                                    <button class="btn btn-success float-left" type="submit">Rekap Presensi</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis</th>
                                <th>Bulan </th>
                                <th>Tanggal </th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td> <?php echo e($data->type); ?></td>
                                    <td> <?php echo e(namabulan($data->bln)); ?> <?php echo e($data->thn); ?></td>
                                    <td> <?php echo e($data->tgl_mulai); ?> sampai <?php echo e($data->tgl_selesai); ?></td>
                                    <td>
                                        <a class="badge badge-info" href="<?php echo e(route('cs.show', $data->id)); ?>" >Lihat Absen</a>
                                        <button class="badge badge-danger"
                                                onclick=" if( confirm('anda Yakin?')) { event.preventDefault();
                                                        document.getElementById('delete-option-form-<?php echo e($data->id); ?>').submit()} else{  event.preventDefault(); }">
                                            Hapus</button>
                                        <form id="delete-option-form-<?php echo e($data->id); ?>" action="<?php echo e(route('cs.destroy', $data->id )); ?>" method="POST">
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
    <script>
        $(document).ready(function(){
            var Tgl = {};
            $('#ye').change(function () {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    Tgl.thn = optionValue;
                });
            });
            $('#mon').change(function () {

                var val = $(this).val();
                Tgl.bln = val;
                //console.log ('ini tahun '+ Tgl.thn +' pada bulan '+ Tgl.bln ); // ini cuma terbaca kalo bulan nya sudah di pilih karena triger nya perubahan bulan. kalo belum tidak ada isi nya
                var days = new Date(Tgl.thn,Tgl.bln,0).getDate();
                var mondays =  new Date(Tgl.bln +'/01/'+ Tgl.thn).getDay();

                if(mondays != 1){
                    mondays = 9 - mondays;
                }
                mondays = [mondays];
                for (var i = mondays[0] + 7; i <= days; i += 7) {
                    mondays.push(i);
                }
                //console.log(mondays);
                let text = "";
                //mondays.forEach(myFunction);
                text = '<label> Tanggal </label>';
                text += '<select class="form-control" name="tgl_m">';
                for (i = 0; i < mondays.length; i++) {
                    var mgu = i + parseInt(1);
                    text += '<option value='+Tgl.thn+'-'+Tgl.bln+'-'+mondays[i]+'&'+[i]+'> Minggu ke '+mgu+' Senin , '+mondays[i]+'/'+Tgl.bln+'/'+Tgl.thn+'</option>';
                }
                text +='</select>';
                document.getElementById("demo").innerHTML = text;

                if(Tgl.bln === "01") {
                    var altmon = "12"
                } else {
                    var altmon = Tgl.bln - 1;
                }
                var altdate = 25;

                let altext = 'tgl '+altdate+'/'+altmon+'/'+Tgl.thn+' sampai '+altdate+'/'+Tgl.bln+'/'+Tgl.thn+'';
                document.getElementById("reno").innerHTML = altext;
            });

        });
    </script>

    <script>
        $(document).ready(function(){
            $(".type    ").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue == "mingguan"){
                        $(".box").show();
                        $(".nobox").hide();
                    } else{
                        $(".box").hide();
                        $(".nobox").show();
                    }
                });
            }).change();
        });
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/ListcsAbsensi.blade.php ENDPATH**/ ?>