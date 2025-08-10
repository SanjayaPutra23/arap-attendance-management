

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item">Users</li>
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
                      <h3 class="float-left">Users</h3>
                        <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-md btn-success float-right">create</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th>Email verified at</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($user->name); ?></td>
                              <td><?php echo e($user->email); ?></td>
                              <td><?php echo e(implode(',',$user->roles->pluck('name')->toArray())); ?></td>
                              <td><?php echo e($user->email_verified_at); ?></td>
                              <td>
                                <a href="<?php echo e(route('admin.power', $user->id)); ?>" class="btn btn-block btn-primary">View</a>
                              </td>
                              <td>
                                <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>" class="btn btn-block btn-primary">Edit</a>
                              </td>
                              <td>
                                <?php if( Auth::user()->id !== $user->id ): ?>
                                      <button class="btn btn-block btn-danger"
                                              onclick="event.preventDefault();
                                              document.getElementById('delete-user-form-<?php echo e($user->id); ?>').submit()">
                                              Delete</button>
                                <form id="delete-user-form-<?php echo e($user->id); ?>" action="<?php echo e(route('admin.users.destroy', $user->id )); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                                <?php endif; ?>
                              </td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                        <?php echo e($users->links()); ?>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/admin/usersList.blade.php ENDPATH**/ ?>