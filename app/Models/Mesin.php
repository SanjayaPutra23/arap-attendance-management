<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mesin extends Model
{
    use HasFactory;

    protected $table = 'mesins';

    /**
     * Primary key model.
     * Catatan: Secara DDL legacy MySQL memiliki composite PK (id, grup),
     * namun untuk pembacaan aman Eloquent menggunakan id.
     */
    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $fillable = [
        'name',
        'tipe',
        'ip',
        'port',
        'maker_id',
        'last_sync',
        'grup',
    ];

    protected function casts(): array
    {
        return [
            'last_sync' => 'datetime',
            'grup' => 'integer',
            'maker_id' => 'integer',
        ];
    }

    /**
     * Log fingerprint yang tercatat dari mesin ini.
     */
    public function pools(): HasMany
    {
        return $this->hasMany(Pool::class, 'mesin_id', 'id');
    }
}
