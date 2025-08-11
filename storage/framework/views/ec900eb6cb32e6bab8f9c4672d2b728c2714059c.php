<div class="c-sidebar-brand">
    <h7 class="c-sidebar-brand-full">Aplikasi Rapat dan Administrasi Presensi</h7>
    <h4 class="c-sidebar-brand-minimized">ARAP</h4>
</div>

<ul class="c-sidebar-nav">
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="<?php echo e(url('/home')); ?>">
            <i class="cil-speedometer c-sidebar-nav-icon"></i>
            Dashboard</a>
    </li>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('ultraman')): ?>
    <li class="c-sidebar-nav-title">Administrator</li>
     <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="<?php echo e(route('admin.users.index')); ?>">
            <i class="cil-user c-sidebar-nav-icon"></i>
           Manage User</a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="<?php echo e(route('admin.peserta.index')); ?>">
            <i class="cil-user c-sidebar-nav-icon"></i>
            Manage Pegawai</a>
    </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="<?php echo e(route('mesin.index')); ?>">
                <i class="cil-lan c-sidebar-nav-icon"></i>
                Manage  Mesin Absen</a>
        </li>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('umum')): ?>
    <li class="c-sidebar-nav-title">Tata Usaha</li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-settings c-sidebar-nav-icon"></i>Settings</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="<?php echo e(route('setting.index')); ?>">
                    <span class="cil-clock c-sidebar-nav-icon"> </span>Setting Jam kerja</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="<?php echo e(route('libur.index')); ?>">
                    <span class="cil-calendar c-sidebar-nav-icon"> </span>Setting Libur</a>
            </li>
            
        </ul>
    </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="<?php echo e(route('pool.index')); ?>">
                <i class="cil-devices c-sidebar-nav-icon"></i>
                Mesin Absen</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="<?php echo e(route('absensi.index')); ?>">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
               Absensi Karyawan</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="<?php echo e(route('satpam.index')); ?>">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
                Absensi Satpam</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="<?php echo e(route('cs.index')); ?>">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
                Absensi CS</a>
        </li>

    <?php endif; ?>
     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('akademik')): ?>
    <li class="c-sidebar-nav-title">Akademik</li>
        <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
            <i class="cil-settings c-sidebar-nav-icon"></i>Settings</a>
        <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="<?php echo e(route('setting.index')); ?>">
                    <span class="cil-clock c-sidebar-nav-icon"> </span>Setting Jam kerja</a>
            </li>
            <li class="c-sidebar-nav-item">
                <a class="c-sidebar-nav-link" href="<?php echo e(route('libur.index')); ?>">
                    <span class="cil-calendar c-sidebar-nav-icon"> </span>Setting Libur</a>
            </li>
            
        </ul>
    </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="<?php echo e(route('akademik.index')); ?>">
                <i class="cil-devices c-sidebar-nav-icon"></i>
                Mesin Absen</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="<?php echo e(route('absensi.index')); ?>">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
               Absensi Karyawan</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="<?php echo e(route('satpam.index')); ?>">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
                Absensi Satpam</a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="<?php echo e(route('cs.index')); ?>">
                <i class="cil-fingerprint c-sidebar-nav-icon"></i>
                Absensi CS</a>
        </li>

    <?php endif; ?>
      
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
<?php /**PATH /var/www/html/arp/resources/views/shared/nav-builder.blade.php ENDPATH**/ ?>