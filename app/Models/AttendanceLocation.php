<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttendanceLocation extends Model
{
    use HasFactory;

    protected $table = 'attendance_locations';

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'radius_meters',
        'max_gps_accuracy_meters',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'radius_meters' => 'integer',
            'max_gps_accuracy_meters' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Seluruh presensi mobile yang diverifikasi di lokasi ini.
     */
    public function mobileAttendances(): HasMany
    {
        return $this->hasMany(MobileAttendance::class, 'attendance_location_id');
    }
}
