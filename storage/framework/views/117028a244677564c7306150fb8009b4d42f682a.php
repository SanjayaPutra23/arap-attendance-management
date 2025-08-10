

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item">Setting Libur</li>
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
                      <h3 class="float-left">Setting Libur ARAP</h3>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('umum')): ?>
                        <div class="btn-group float-right" role="group" aria-label="Button group with nested dropdown">
                        <a href="<?php echo e(route('libur.create')); ?>" class="btn btn-md btn-info">Tambah Libur</a>
                         <button type="button" class="btn btn-secondary mr-0 ml-0 pr-0 pl-0" disabled></button>  
                        <a href="<?php echo e(route('libur.add')); ?>" class="btn btn-md btn-success ">Tarik Data Libur Nasional</a>
                        </div>
                            <?php endif; ?>   

                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Tanggal</th>
                            <th>Libur</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($data->tanggal); ?></td>
                              <td><?php echo e($data->ket); ?></td>
                              
                              
                              <td>
                                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('umum')): ?>
                                  <a href="<?php echo e(route('libur.edit', $data->id)); ?>" class="badge badge-primary">Ubah libur</a>
                               <?php endif; ?>
                                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ultraman')): ?>
                                      <button class="badge badge-danger"
                                              onclick="event.preventDefault();
                                              document.getElementById('delete-user-form-<?php echo e($data->id); ?>').submit()">
                                              Hapus</button>
                                <form id="delete-user-form-<?php echo e($data->id); ?>" action="<?php echo e(route('libur.destroy', $data->id )); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                                <?php endif; ?>
                              </td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                        <?php echo e($list->links()); ?>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('javascript'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/liburList.blade.php ENDPATH**/ ?>