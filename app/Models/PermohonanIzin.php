<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PermohonanIzin extends Model
{
    use HasFactory;

    public const STATUS_MENUNGGU = 'menunggu';

    public const STATUS_PENDING = 'menunggu';

    public const STATUS_DISETUJUI = 'disetujui';

    public const STATUS_APPROVED = 'disetujui';

    public const STATUS_DITOLAK = 'ditolak';

    public const STATUS_REJECTED = 'ditolak';

    public const JENIS_IZIN = 'izin';

    public const JENIS_SAKIT = 'sakit';

    /**
     * Cek apakah permohonan disetujui.
     */
    public function isApproved(): bool
    {
        return in_array($this->status, [self::STATUS_DISETUJUI, self::STATUS_APPROVED], true);
    }

    /**
     * Cek apakah permohonan masih menunggu verifikasi.
     */
    public function isPending(): bool
    {
        return in_array($this->status, [self::STATUS_MENUNGGU, self::STATUS_PENDING], true);
    }

    /**
     * Cek apakah permohonan ditolak.
     */
    public function isRejected(): bool
    {
        return in_array($this->status, [self::STATUS_DITOLAK, self::STATUS_REJECTED], true);
    }

    protected $table = 'permohonan_izins';

    protected $fillable = [
        'user_id',
        'peserta_id',
        'jenis',
        'tgl_mulai',
        'tgl_selesai',
        'alasan',
        'surat_dokter',
        'status',
        'catatan_admin',
        'approved_by',
        'approved_at',
    ];

    protected function casts(): array
    {
        return [
            'tgl_mulai' => 'date',
            'tgl_selesai' => 'date',
            'approved_at' => 'datetime',
            'user_id' => 'integer',
            'peserta_id' => 'integer',
            'approved_by' => 'integer',
        ];
    }

    /**
     * User yang mengajukan izin.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Peserta (relawan/pegawai) yang terkait permohonan.
     */
    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }

    /**
     * Pejabat / Admin yang menyetujui permohonan.
     */
    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
