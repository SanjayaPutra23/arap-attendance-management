<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttendanceAuditLog extends Model
{
    use HasFactory;

    protected $table = 'attendance_audit_logs';

    /**
     * Tabel audit log hanya mencatat created_at.
     */
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'peserta_id',
        'action',
        'result',
        'reason',
        'latitude',
        'longitude',
        'distance_meters',
        'accuracy_meters',
        'ip_address',
        'user_agent',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'distance_meters' => 'decimal:2',
            'accuracy_meters' => 'decimal:2',
            'created_at' => 'datetime',
            'user_id' => 'integer',
            'peserta_id' => 'integer',
        ];
    }

    /**
     * User pemohon presensi yang dicatat pada log.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Peserta yang terkait log aktivitas.
     */
    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }
}
