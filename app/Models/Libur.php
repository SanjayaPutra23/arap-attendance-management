<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libur extends Model
{
    use HasFactory;

    protected $table = 'liburs';

    protected $fillable = [
        'tanggal',
        'ket',
    ];

    /**
     * Cek apakah tanggal tertentu terdaftar sebagai hari libur nasional.
     */
    public static function isLibur(string|DateTimeInterface $date): bool
    {
        $dates = static::formatDateVariants($date);

        return static::whereIn('tanggal', $dates)->exists();
    }

    /**
     * Ambil keterangan hari libur jika tanggal tersebut libur.
     */
    public static function getKeterangan(string|DateTimeInterface $date): ?string
    {
        $dates = static::formatDateVariants($date);
        $record = static::whereIn('tanggal', $dates)->first();

        return $record?->ket;
    }

    /**
     * Format varian tanggal (zero-padded dan non-padded) untuk kompatibilitas data legacy.
     *
     * @return array<int, string>
     */
    protected static function formatDateVariants(string|DateTimeInterface $date): array
    {
        if ($date instanceof DateTimeInterface) {
            return array_unique([
                $date->format('Y-m-d'),
                $date->format('Y-n-j'),
            ]);
        }

        $timestamp = strtotime($date);
        if ($timestamp !== false) {
            return array_unique([
                date('Y-m-d', $timestamp),
                date('Y-n-j', $timestamp),
                $date,
            ]);
        }

        return [$date];
    }
}
