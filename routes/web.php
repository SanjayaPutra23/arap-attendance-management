<?php

use App\Http\Controllers\Admin\AdminIzinController;
use App\Http\Controllers\Admin\ArsipFingerprintController;
use App\Http\Controllers\Admin\AttendanceLocationController;
use App\Http\Controllers\Admin\LiburController;
use App\Http\Controllers\Admin\MesinController;
use App\Http\Controllers\Admin\MonitoringController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\RekapController;
use App\Http\Controllers\Admin\WorkingHoursSettingController;
use App\Http\Controllers\AttendancePhotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IzinAttachmentController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\MobileAttendanceController;
use App\Http\Controllers\ProfilePasswordController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Mobile Attendance (PWA)
    Route::get('/mobile-attendance', [MobileAttendanceController::class, 'index'])->name('mobile-attendance.index');
    Route::post('/mobile-attendance/submit', [MobileAttendanceController::class, 'store'])
        ->middleware('throttle:20,1')
        ->name('mobile-attendance.store');
    Route::get('/mobile-attendance/history', [MobileAttendanceController::class, 'history'])->name('mobile-attendance.history');
    Route::get('/mobile-attendance/history/pdf', [MobileAttendanceController::class, 'exportMyRecapPdf'])->name('mobile-attendance.history.pdf');

    // Permohonan Izin & Sakit (Relawan)
    Route::get('/izin', [IzinController::class, 'index'])->name('izin.index');
    Route::post('/izin', [IzinController::class, 'store'])->name('izin.store');
    Route::delete('/izin/{permohonanIzin}', [IzinController::class, 'destroy'])->name('izin.destroy');

    // Ganti Kata Sandi Mandiri (Profil)
    Route::get('/profile/password', [ProfilePasswordController::class, 'edit'])->name('profile.password.edit');
    Route::put('/profile/password', [ProfilePasswordController::class, 'update'])->name('profile.password.update');

    // Private Attendance Photos & Izin Attachments (Authorized Streams Anti-IDOR)
    Route::get('/attendance-photos/{attendancePhoto}', [AttendancePhotoController::class, 'show'])->name('attendance-photos.show');
    Route::get('/izin-attachments/{permohonanIzin}', [IzinAttachmentController::class, 'show'])->name('izin-attachments.show');

    // Admin & Staff Operations
    Route::prefix('admin')->name('admin.')->group(function () {
        // Daily Monitoring & Leaflet Map (Staff Access: Ultraman, Umum, Officer, Tata Usaha, Akademik)
        Route::get('/monitoring', [MonitoringController::class, 'index'])
            ->middleware('can:staff-access')
            ->name('monitoring.index');

        // Staff Access: Verifikasi Izin, Arsip Fingerprint, dan Rekapitulasi Periode 20-19
        Route::middleware('can:staff-access')->group(function () {
            // Verifikasi Izin & Sakit (View)
            Route::get('/izin', [AdminIzinController::class, 'index'])->name('izin.index');

            // Arsip Fingerprint Pools Mesin FPDAPUR1 (Read-Only)
            Route::get('/arsip-fingerprint', [ArsipFingerprintController::class, 'index'])->name('arsip-fingerprint.index');

            // Rekapitulasi Periode 20-19 & Ekspor
            Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index');
            Route::get('/rekap/export/excel', [RekapController::class, 'exportExcel'])->name('rekap.export-excel');
            Route::get('/rekap/export/pdf', [RekapController::class, 'exportPdf'])->name('rekap.export-pdf');
            Route::get('/rekap/{peserta}/pdf', [RekapController::class, 'exportIndividualPdf'])->name('rekap.individual-pdf');
            Route::get('/rekap/{peserta}', [RekapController::class, 'show'])->name('rekap.show');
        });

        // Restricted to Admin Utama (Ultraman, can:umum): Kelola Pegawai, Review Izin, Settings, Mode Rekap
        Route::middleware('can:umum')->group(function () {
            // Setting Mode Rekap Relawan (Bulanan vs Mingguan)
            Route::post('/rekap/period-setting', [RekapController::class, 'savePeriodSetting'])->name('rekap.period-setting');

            // Manage Pegawai / Relawan & Officer CRUD
            Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
            Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
            Route::patch('/pegawai/{pegawai}/toggle-status', [PegawaiController::class, 'toggleStatus'])->name('pegawai.toggle-status');
            Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
            Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

            // Approval / Review Izin
            Route::post('/izin/{permohonanIzin}/review', [AdminIzinController::class, 'review'])->name('izin.review');

            // Kelola Hari Libur Nasional
            Route::prefix('libur')->name('libur.')->group(function () {
                Route::get('/', [LiburController::class, 'index'])->name('index');
                Route::post('/', [LiburController::class, 'store'])->name('store');
                Route::post('/sync-api', [LiburController::class, 'syncApi'])->name('sync-api');
                Route::put('/{libur}', [LiburController::class, 'update'])->name('update');
                Route::delete('/{libur}', [LiburController::class, 'destroy'])->name('destroy');
            });

            // Kelola Mesin Fingerprint & Tarik Data ZKTeco
            Route::prefix('mesin')->name('mesin.')->group(function () {
                Route::get('/', [MesinController::class, 'index'])->name('index');
                Route::post('/', [MesinController::class, 'store'])->name('store');
                Route::post('/sync-all', [MesinController::class, 'syncAll'])->name('sync-all');
                Route::put('/{mesin}', [MesinController::class, 'update'])->name('update');
                Route::delete('/{mesin}', [MesinController::class, 'destroy'])->name('destroy');
                Route::post('/{mesin}/check-connection', [MesinController::class, 'checkConnection'])->name('check-connection');
                Route::post('/{mesin}/sync', [MesinController::class, 'sync'])->name('sync');
                Route::post('/{mesin}/upload-usb', [MesinController::class, 'uploadUsb'])->name('upload-usb');
            });

            // Settings: Geofence Locations & Working Hours
            Route::prefix('settings')->name('settings.')->group(function () {
                Route::get('/locations', [AttendanceLocationController::class, 'index'])->name('locations.index');
                Route::post('/locations', [AttendanceLocationController::class, 'store'])->name('locations.store');
                Route::put('/locations/{location}', [AttendanceLocationController::class, 'update'])->name('locations.update');
                Route::patch('/locations/{location}/toggle', [AttendanceLocationController::class, 'toggleActive'])->name('locations.toggle');

                Route::get('/working-hours', [WorkingHoursSettingController::class, 'index'])->name('working-hours.index');
                Route::post('/working-hours', [WorkingHoursSettingController::class, 'update'])->name('working-hours.update');
            });
        });
    });
});
