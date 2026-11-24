<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttendancePhoto extends Model
{
    use HasFactory;

    protected $table = 'attendance_photos';

    protected $fillable = [
        'mobile_attendance_id',
        'type',
        'disk',
        'path',
        'mime_type',
        'file_size_bytes',
        'captured_at',
        'sha256_hash',
    ];

    protected function casts(): array
    {
        return [
            'captured_at' => 'datetime',
            'file_size_bytes' => 'integer',
            'mobile_attendance_id' => 'integer',
        ];
    }

    /**
     * Rekaman presensi mobile induk dari berkas foto ini.
     */
    public function mobileAttendance(): BelongsTo
    {
        return $this->belongsTo(MobileAttendance::class, 'mobile_attendance_id');
    }
}
