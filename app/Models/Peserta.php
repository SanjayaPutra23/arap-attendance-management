<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'pesertas';

    protected $fillable = [
        'uid',
        'name',
        'nik',
        'type',
        'jabatan',
        'telp',
    ];

    protected function casts(): array
    {
        return [
            'uid' => 'integer',
        ];
    }

    /**
     * Akun login user terkait (1 peserta max 1 akun).
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'peserta_id');
    }

    /**
     * Log fingerprint mesin legacy (pools.iduser -> pesertas.uid).
     */
    public function pools(): HasMany
    {
        return $this->hasMany(Pool::class, 'iduser', 'uid');
    }

    /**
     * Rekaman presensi mobile v2.
     */
    public function mobileAttendances(): HasMany
    {
        return $this->hasMany(MobileAttendance::class, 'peserta_id');
    }

    /**
     * Riwayat permohonan izin / sakit.
     */
    public function permohonanIzins(): HasMany
    {
        return $this->hasMany(PermohonanIzin::class, 'peserta_id');
    }

    /**
     * Scope untuk filter jabatan (case-insensitive).
     */
    public function scopeOfJabatan(Builder $query, string $jabatan): Builder
    {
        return $query->whereRaw('LOWER(jabatan) = ?', [strtolower(trim($jabatan))]);
    }

    /**
     * Scope khusus staf Officer.
     */
    public function scopeOfficers(Builder $query): Builder
    {
        return $query->whereRaw('LOWER(jabatan) = ?', ['officer']);
    }

    /**
     * Scope relawan dapur.
     */
    public function scopeRelawan(Builder $query): Builder
    {
        return $query->whereRaw('LOWER(type) = ?', ['relawan']);
    }

    /**
     * Scope untuk filter divisi kerja.
     */
    public function scopeOfDivisi(Builder $query, string $divisi): Builder
    {
        return $this->scopeOfJabatan($query, $divisi);
    }

    /**
     * Cek apakah peserta berjabatan Officer.
     */
    public function isOfficer(): bool
    {
        return strcasecmp($this->jabatan ?? '', 'officer') === 0;
    }
}
