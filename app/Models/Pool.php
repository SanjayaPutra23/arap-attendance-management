<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pool extends Model
{
    use HasFactory;

    protected $table = 'pools';

    protected $fillable = [
        'uid',
        'iduser',
        'state',
        'date',
        'time',
        'timestamp',
        'type',
        'year',
        'month',
        'mesin_id',
    ];

    protected function casts(): array
    {
        return [
            'timestamp' => 'datetime',
            'date' => 'date',
            'state' => 'integer',
            'type' => 'integer',
            'year' => 'integer',
            'month' => 'integer',
            'mesin_id' => 'integer',
        ];
    }

    /**
     * Peserta terkait via pools.iduser -> pesertas.uid.
     */
    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class, 'iduser', 'uid');
    }

    /**
     * Perangkat mesin fingerprint sumber log.
     */
    public function mesin(): BelongsTo
    {
        return $this->belongsTo(Mesin::class, 'mesin_id', 'id');
    }
}
