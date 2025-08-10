<!DOCTYPE html>

<html lang="en">
  <head>
     <meta charset="utf-8">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
      <meta name="description" content="FK UGJ">
      <meta name="author" content="mds">
      <meta name="keyword" content="pmb,fk,UGJ,meu,kepk">
      <title><?php echo e(config('app.name', 'Arap')); ?></title>
      <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(asset('assets/favicon/apple-icon-57x57.png')); ?>">
      <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(asset('assets/favicon/apple-icon-60x60.png')); ?>">
      <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('assets/favicon/apple-icon-72x72.png')); ?>">
      <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets/favicon/apple-icon-76x76.png')); ?>">
      <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('assets/favicon/apple-icon-114x114.png')); ?>">
      <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(asset('assets/favicon/apple-icon-120x120.png')); ?>">
      <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(asset('assets/favicon/apple-icon-144x144.png')); ?>">
      <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(asset('assets/favicon/apple-icon-152x152.png')); ?>">
      <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('assets/favicon/apple-icon-180x180.png')); ?>">
      <link rel="icon" type="image/png" sizes="192x192" href="<?php echo e(asset('assets/favicon/android-icon-192x192.png')); ?>">
      <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('assets/favicon/favicon-32x32.png')); ?>">
      <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(asset('assets/favicon/favicon-96x96.png')); ?>">
      <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/favicon/favicon-16x16.png')); ?>">
      <link rel="manifest" href="<?php echo e(asset('assets/favicon/manifest.json')); ?>">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="<?php echo e(asset('assets/favicon/ms-icon-144x144.png')); ?>">
      <meta name="theme-color" content="#ffffff">

    <!-- Icons-->
    <link href="<?php echo e(asset('css/free.min.css')); ?>" rel="stylesheet"> <!-- icons -->
    <link href="<?php echo e(asset('css/flag.min.css')); ?>" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <?php echo $__env->yieldContent('css'); ?>

  </head>



  <body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

      <?php echo $__env->make('shared.nav-builder', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="c-wrapper">
            <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
            <?php echo $__env->make('shared.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('remah'); ?>
            </header>

      <div class="c-body">
          <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main class="c-main">

          <?php echo $__env->yieldContent('content'); ?>

            <?php echo $__env->yieldContent('modal'); ?>
        </main>
        <?php echo $__env->make('shared.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>



    <!-- CoreUI and necessary plugins-->
    <script src="<?php echo e(asset('js/coreui.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/coreui-utils.js')); ?>"></script>
    <?php echo $__env->yieldContent('javascript'); ?>




  </body>
</html>
<?php /**PATH /var/www/html/arp/resources/views/layouts/app.blade.php ENDPATH**/ ?>