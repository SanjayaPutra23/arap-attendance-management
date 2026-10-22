<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermohonanIzin extends Model
{
    use HasFactory;

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

    protected $casts = [
        'tgl_mulai' => 'date',
        'tgl_selesai' => 'date',
        'approved_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function scopeMenunggu($query)
    {
        return $query->where('status', 'menunggu');
    }

    public function scopeDisetujui($query)
    {
        return $query->where('status', 'disetujui');
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', 'ditolak');
    }

    public function getDurasiHariAttribute()
    {
        if (!$this->tgl_mulai || !$this->tgl_selesai) {
            return 1;
        }
        return $this->tgl_mulai->diffInDays($this->tgl_selesai) + 1;
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 'disetujui':
                return 'Disetujui';
            case 'ditolak':
                return 'Ditolak';
            case 'menunggu':
            default:
                return 'Menunggu Persetujuan';
        }
    }

    public function getStatusBadgeClassAttribute()
    {
        switch ($this->status) {
            case 'disetujui':
                return 'badge-success';
            case 'ditolak':
                return 'badge-danger';
            case 'menunggu':
            default:
                return 'badge-warning text-dark';
        }
    }

    public function getJenisLabelAttribute()
    {
        switch ($this->jenis) {
            case 'sakit':
                return 'Sakit';
            case 'izin':
            default:
                return 'Izin';
        }
    }

    public function getJenisBadgeClassAttribute()
    {
        switch ($this->jenis) {
            case 'sakit':
                return 'badge-info';
            case 'izin':
            default:
                return 'badge-primary';
        }
    }
}
