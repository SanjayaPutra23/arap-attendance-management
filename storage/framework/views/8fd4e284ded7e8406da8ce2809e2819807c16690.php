<?php if(session('msg')): ?>
<?php $satu = session('msg'); $msg= explode("-",$satu); ?>
<div class="alert alert-<?php echo e($msg[0]); ?> alert-dismissible fade show" role="alert"><?php echo $msg[1]; ?>

    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">close</span></button>
</div>
<?php endif; ?>


<?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert"> <?php echo e($error); ?>

                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(session('status')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert"><?php echo e(session('status')); ?>

        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">close</span></button>
    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/arp/resources/views/layouts/alert.blade.php ENDPATH**/ ?>