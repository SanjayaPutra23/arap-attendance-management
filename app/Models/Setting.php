<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'name',
        'value',
        'grup',
    ];

    /**
     * Cache in-memory untuk mencegah N+1 query saat evaluasi presensi massal.
     *
     * @var array<string, mixed>|null
     */
    protected static ?array $runtimeCache = null;

    protected static function booted(): void
    {
        static::saved(function () {
            static::clearRuntimeCache();
        });

        static::deleted(function () {
            static::clearRuntimeCache();
        });
    }

    protected function casts(): array
    {
        return [
            'grup' => 'integer',
        ];
    }

    /**
     * Membaca nilai setting berdasarkan nama secara aman dengan runtime memory cache.
     */
    public static function getValue(string $name, mixed $default = null): mixed
    {
        if (static::$runtimeCache === null) {
            static::$runtimeCache = static::pluck('value', 'name')->toArray();
        }

        return static::$runtimeCache[$name] ?? $default;
    }

    /**
     * Bersihkan cache in-memory.
     */
    public static function clearRuntimeCache(): void
    {
        static::$runtimeCache = null;
    }
}
