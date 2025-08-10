<!DOCTYPE html>
<html>
<head>
    <title>Detail Absensi User</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style>


        table {
            width: 100%;
        }

        table.collapse {
            border-spacing: 0;
            border-collapse: collapse;
            border: 1pt solid black;
        }
        th {
            text-align: center;
        }
        table.collapse td {
            border: 1pt solid black;
        }
        table.collapse th {
            border: 1pt solid black;
        }


    </style>
</head>
<body>

    <img src="<?php echo e(public_path('srcblog/kop.jpg')); ?>" width="705" >

<table class='collapse'>
    <thead>
    <tr>
        <th colspan="6"><strong>Detail Kehadiran Karyawan</strong></th>
    </tr>
    </thead>
    <tbody>
    <tr>
     <?php  $kary = explode("-",$list->data_peserta); ?>
        <td ><strong>Nama</strong></td>
        <td ><?php echo e($kary[0]); ?></td>
        <td ><strong>NIK</strong></td>
        <td ><?php echo e($kary[1]); ?></td>
        <td ><strong> Jenis</strong></td>
        <td ><?php echo e($absen->type); ?></td>
    </tr>
    <tr>
        <td colspan="6"> Periode <?php echo e(namabulan($absen->bln)); ?> - <?php echo e($absen->thn); ?></th>
    </tr>
    </tbody>
</table>
<table class='collapse'>
    <thead>
    <tr>
        <th width="20%" >Tanggal</th>
        <th style="text-align:center" width="15%">Jam Datang</th>
        <th style="text-align:center" width="15%">Jam Pulang</th>
        <th style="text-align:center" width="15%">Ket</th>
    </tr>
    </thead>
    <tbody>
    <?php $datum = explode("&", $list->presensi); array_pop($datum);
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
            <td style="text-align:center"><?php echo e($datax[2]); ?></td>
            <td style="text-align:center"><?php echo e($datax[3]); ?></td>
            <td style="text-align:center"><?php echo e($pres); ?> </td>

        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>

</body>
</html><?php /**PATH /var/www/html/arp/resources/views/pdf/detail_user_pdf.blade.php ENDPATH**/ ?>