<?php

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
});
