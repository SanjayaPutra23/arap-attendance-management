<?php

use App\Http\Controllers\Admin\AttendanceLocationController;
use App\Http\Controllers\Admin\MonitoringController;
use App\Http\Controllers\Admin\WorkingHoursSettingController;
use App\Http\Controllers\AttendancePhotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobileAttendanceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Mobile Attendance (PWA)
    Route::get('/mobile-attendance', [MobileAttendanceController::class, 'index'])->name('mobile-attendance.index');
    Route::post('/mobile-attendance/submit', [MobileAttendanceController::class, 'store'])->name('mobile-attendance.store');
    Route::get('/mobile-attendance/history', [MobileAttendanceController::class, 'history'])->name('mobile-attendance.history');

    // Private Attendance Photos (Authorized Stream)
    Route::get('/attendance-photos/{attendancePhoto}', [AttendancePhotoController::class, 'show'])->name('attendance-photos.show');

    // Admin & Staff Operations
    Route::prefix('admin')->name('admin.')->group(function () {
        // Daily Monitoring & Leaflet Map (Staff Access: Ultraman, Umum, Officer, Tata Usaha, Akademik)
        Route::get('/monitoring', [MonitoringController::class, 'index'])
            ->middleware('can:staff-access')
            ->name('monitoring.index');

        // Geofence & Working Hours Settings (Restricted: Ultraman, Umum)
        Route::prefix('settings')->name('settings.')->middleware('can:umum')->group(function () {
            // Geofence Locations
            Route::get('/locations', [AttendanceLocationController::class, 'index'])->name('locations.index');
            Route::post('/locations', [AttendanceLocationController::class, 'store'])->name('locations.store');
            Route::put('/locations/{location}', [AttendanceLocationController::class, 'update'])->name('locations.update');
            Route::patch('/locations/{location}/toggle', [AttendanceLocationController::class, 'toggleActive'])->name('locations.toggle');

            // Working Hours Settings
            Route::get('/working-hours', [WorkingHoursSettingController::class, 'index'])->name('working-hours.index');
            Route::post('/working-hours', [WorkingHoursSettingController::class, 'update'])->name('working-hours.update');
        });
    });
});
