<table>
    <thead>

    <tr>
        <td  rowspan="2">No</td>
        <td rowspan="2">Nama</td>
        <td rowspan="2">Nik</td>
        <?php $__currentLoopData = $tgls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tgl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td colspan="2"><?php echo e($tgl); ?></td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>
    <tr>
        <?php $__currentLoopData = $tgls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tgl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <td  >Dtg</td>
            <td  >Plg</td>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tr>

    </thead>
    <tbody>
    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $idn = explode("-",$data->data_peserta); ?>
        <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td  ><?php echo e($idn[0]); ?> </td>
            <td  ><?php echo e($idn[1]); ?></td>
            <?php $data1 = explode("&",$data->presensi); array_pop($data1) ?>

            <?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $idnx = explode("_",$pres); //dd($data1) ?>
                <td ><?php if($idnx[2] <> 0): ?><?php echo e($idnx[2]); ?> <?php endif; ?></td>
                <td  ><?php if($idnx[3] <> 0): ?><?php echo e($idnx[3]); ?> <?php endif; ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /var/www/html/arp/resources/views/export/exportabsen.blade.php ENDPATH**/ ?>