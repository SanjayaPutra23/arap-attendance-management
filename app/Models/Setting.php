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

    protected function casts(): array
    {
        return [
            'grup' => 'integer',
        ];
    }

    /**
     * Membaca nilai setting berdasarkan nama secara aman.
     */
    public static function getValue(string $name, mixed $default = null): mixed
    {
        $setting = static::where('name', $name)->first();

        return $setting !== null ? $setting->value : $default;
    }
}
