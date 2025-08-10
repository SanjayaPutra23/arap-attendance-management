

<?php $__env->startSection('content'); ?>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
              <div class="card-body">
                <h1>ARAP Login</h1>
                <p class="text-muted">Sign In ke akun anda</p>
                  <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                  <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                        </svg>
                      </span>
                    </div>
                    <input class="form-control" type="text" placeholder="<?php echo e(__('E-Mail Address')); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                    </div>
                    <div class="input-group mb-4">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <svg class="c-icon">
                          <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                        </svg>
                      </span>
                    </div>
                    <input class="form-control" type="password" placeholder="<?php echo e(__('Password')); ?>" name="password" required>
                    </div>
                    <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary px-4" type="submit"><?php echo e(__('Login')); ?></button>
                    </div>
                    </form>
                    <div class="col-6 text-right">
                        <a href="<?php echo e(route('password.request')); ?>" class="btn btn-link px-0"><?php echo e(__('Lupa Password')); ?></a>
                    </div>
                    </div>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>ARAP</h2>
                  <p>Selamat datang di Aplikasi Rapat dan Administrasi Presensi</p>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.aBase', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/auth/login.blade.php ENDPATH**/ ?>