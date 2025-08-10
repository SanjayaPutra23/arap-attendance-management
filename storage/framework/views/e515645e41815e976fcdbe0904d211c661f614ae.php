

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('remah'); ?>
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/home')); ?>">Home</a></li>
            <li class="breadcrumb-item">Profil</li>
        </ol>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar text-center d-block">
                                        <img src="<?php echo e(url('/assets/img/avatars/'.Auth::User()->avatar)); ?>" alt="User Avatar" style='height: 100%; width: 100%; object-fit: contain' class="rounded-circle user-avatar-xxl">
                                    </div>
                                    <div class="text-center">
                                        <h2 class="font-24 mb-0"><?php echo e(Auth::user()->name); ?></h2>
                                        <p><?php echo e(implode(',', Auth::user()->roles()->get()->pluck('name')->toArray())); ?></p>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16">Informasi Pengguna</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-2"><i class="fas fa-fw fa-envelope mr-2"></i><?php echo e(Auth::user()->email); ?></li>

                                    </ul>
                                    </div>
                                </div>


                                <div class="card-body border-top">
                                    <div>
                                        <a href="<?php echo e(route('profil.edit','1')); ?>" class="btn btn-primary mr-1">Edit Profil</a>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end profile -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- campaign data -->
                        <!-- ============================================================== -->
                        <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            <div class="influence-profile-content pills-regular">
                                <div class="tab-content" id="pills-tabContent">

                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="section-block">
                                                    <h3 class="section-title">My Submission State</h3>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">1</h1>
                                                        <p>Submission Revision</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">2</h1>
                                                        <p>Finished Submission</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">1</h1>
                                                        <p>Accepted Submission</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h1 class="mb-1">0</h1>
                                                        <p>Declined Submission</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section-block">
                                            <h3 class="section-title">Submission archive</h3>
                                        </div>


                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end campaign tab one -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- end campaign data -->
                        <!-- ============================================================== -->
                    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/arp/resources/views/page/dash.blade.php ENDPATH**/ ?>