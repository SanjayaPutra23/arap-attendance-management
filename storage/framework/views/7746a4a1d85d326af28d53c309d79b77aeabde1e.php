

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.users.index')); ?>">Users</a></li>
            <li class="breadcrumb-item"><?php echo e($user->name); ?></li>
        </ol>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-header">
                      <i class="fa fa-align-justify"></i> <?php echo e(__('Edit')); ?> <?php echo e($user->name); ?></div>
                    <div class="card-body">
                        <br>
                        <form method="POST" action="<?php echo e(route('admin.users.update',$user->id)); ?>">
                           <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <svg class="c-icon c-icon-sm">
                                          <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                      </svg>
                                    </span>
                                </div>
                                <input class="form-control" type="text" placeholder="<?php echo e(__('Name')); ?>" name="name" value="<?php echo e($user->name); ?>" required autofocus>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input class="form-control" type="text" placeholder="<?php echo e(__('E-Mail Address')); ?>" name="email" value="<?php echo e($user->email); ?>" required>
                            </div>
                            <div class="input-group mb-3">
                                <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check">
                                        <input type="checkbox" name = "roles[]" value="<?php echo e($role->id); ?>"
                                         <?php if($user->roles->pluck('id')->contains($role->id)): ?> checked <?php endif; ?>
                                        >
                                        <lable> <?php echo e($role->name); ?> </lable>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <button class="btn btn-block btn-success" type="submit"><?php echo e(__('Save')); ?></button>
                            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-block btn-primary"><?php echo e(__('Return')); ?></a>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/admin/userEditForm.blade.php ENDPATH**/ ?>