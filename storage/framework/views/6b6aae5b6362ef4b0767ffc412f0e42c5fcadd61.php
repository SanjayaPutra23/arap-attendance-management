<table >
    <thead>
    <tr>
    <tr>
        <td >No</td>
        <td >Nama</td>
        <td >Nik</td>
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

            <td class="table-info" ><?php echo e($idn[0]); ?> </td>
            <td class="table-info" ><?php echo e($idn[1]); ?></td>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wkt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <td ><?php echo e($wkt); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH /var/www/html/arp/resources/views/export/exportrekap.blade.php ENDPATH**/ ?>