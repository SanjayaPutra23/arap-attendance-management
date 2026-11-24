<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';

    protected $fillable = [
        'type',
        'tgl_mulai',
        'tgl_selesai',
        'thn',
        'bln',
        'maker',
        'peg',
    ];

    protected function casts(): array
    {
        return [
            'tgl_mulai' => 'datetime',
            'tgl_selesai' => 'datetime',
            'thn' => 'integer',
            'bln' => 'integer',
            'maker' => 'integer',
            'peg' => 'integer',
        ];
    }

    /**
     * Rincian presensi peserta dalam periode absensi ini.
     */
    public function detailAbsens(): HasMany
    {
        return $this->hasMany(DetailAbsen::class, 'id_absen');
    }
}
