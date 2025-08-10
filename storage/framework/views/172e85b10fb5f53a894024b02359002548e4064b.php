

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item">Setting Absen</li>
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
                      <h3 class="float-left">Setting ARAP</h3>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ultraman')): ?>
                        <a href="<?php echo e(route('setting.create')); ?>" class="btn btn-md btn-success float-right">create</a>
                            <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Setting</th>
                            <th>Value</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $seting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($data->name); ?></td>
                              <td><?php echo e($data->value); ?></td>
                              
                              
                              <td>
                                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('umum')): ?>
                                  <a href="<?php echo e(route('setting.edit', $data->id)); ?>" class="btn btn-block btn-primary">Ubah Setting</a>
                               <?php endif; ?>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ultraman')): ?>
                                      <button class="btn btn-block btn-danger"
                                              onclick="event.preventDefault();
                                              document.getElementById('delete-user-form-<?php echo e($data->id); ?>').submit()">
                                              Delete</button>
                                <form id="delete-user-form-<?php echo e($data->id); ?>" action="<?php echo e(route('setting.destroy', $data->id )); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                                <?php endif; ?>
                              </td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                        <?php echo e($seting->links()); ?>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/settingList.blade.php ENDPATH**/ ?>