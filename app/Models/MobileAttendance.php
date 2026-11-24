<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MobileAttendance extends Model
{
    use HasFactory;

    protected $table = 'mobile_attendances';

    protected $fillable = [
        'peserta_id',
        'user_id',
        'attendance_location_id',
        'attendance_date',
        'check_in_at',
        'check_out_at',
        'check_in_lat',
        'check_in_lng',
        'check_in_distance_meters',
        'check_in_accuracy_meters',
        'check_out_lat',
        'check_out_lng',
        'check_out_distance_meters',
        'check_out_accuracy_meters',
        'status',
        'score',
        'source',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'attendance_date' => 'date',
            'check_in_at' => 'datetime',
            'check_out_at' => 'datetime',
            'check_in_lat' => 'decimal:7',
            'check_in_lng' => 'decimal:7',
            'check_in_distance_meters' => 'decimal:2',
            'check_in_accuracy_meters' => 'decimal:2',
            'check_out_lat' => 'decimal:7',
            'check_out_lng' => 'decimal:7',
            'check_out_distance_meters' => 'decimal:2',
            'check_out_accuracy_meters' => 'decimal:2',
            'score' => 'decimal:2',
            'peserta_id' => 'integer',
            'user_id' => 'integer',
            'attendance_location_id' => 'integer',
        ];
    }

    /**
     * Peserta (relawan) pemilik rekaman presensi.
     */
    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }

    /**
     * Akun user yang melakukan submit presensi.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Titik lokasi sentral geofence yang menjadi acuan validasi.
     */
    public function location(): BelongsTo
    {
        return $this->belongsTo(AttendanceLocation::class, 'attendance_location_id');
    }

    /**
     * Seluruh foto bukti presensi (check-in & check-out).
     */
    public function photos(): HasMany
    {
        return $this->hasMany(AttendancePhoto::class, 'mobile_attendance_id');
    }

    /**
     * Foto selfie saat check-in.
     */
    public function checkInPhoto(): HasOne
    {
        return $this->hasOne(AttendancePhoto::class, 'mobile_attendance_id')->where('type', 'check_in');
    }

    /**
     * Foto selfie saat check-out.
     */
    public function checkOutPhoto(): HasOne
    {
        return $this->hasOne(AttendancePhoto::class, 'mobile_attendance_id')->where('type', 'check_out');
    }
}
