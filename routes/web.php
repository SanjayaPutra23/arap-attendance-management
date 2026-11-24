<?php

use App\Http\Controllers\Admin\AdminIzinController;
use App\Http\Controllers\Admin\ArsipFingerprintController;
use App\Http\Controllers\Admin\AttendanceLocationController;
use App\Http\Controllers\Admin\MonitoringController;
use App\Http\Controllers\Admin\PegawaiController;
use App\Http\Controllers\Admin\RekapController;
use App\Http\Controllers\Admin\WorkingHoursSettingController;
use App\Http\Controllers\AttendancePhotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IzinAttachmentController;
use App\Http\Controllers\IzinController;
use App\Http\Controllers\MobileAttendanceController;
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

    // Permohonan Izin & Sakit (Relawan)
    Route::get('/izin', [IzinController::class, 'index'])->name('izin.index');
    Route::post('/izin', [IzinController::class, 'store'])->name('izin.store');
    Route::delete('/izin/{permohonanIzin}', [IzinController::class, 'destroy'])->name('izin.destroy');

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
            Route::get('/rekap/{peserta}', [RekapController::class, 'show'])->name('rekap.show');
        });

        // Restricted to Admin Umum (Ultraman, Umum): Kelola Pegawai, Review Izin, Settings
        Route::middleware('can:umum')->group(function () {
            // Manage Pegawai / Relawan & Officer CRUD
            Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
            Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
            Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update');
            Route::delete('/pegawai/{pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

            // Approval / Review Izin
            Route::post('/izin/{permohonanIzin}/review', [AdminIzinController::class, 'review'])->name('izin.review');

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
