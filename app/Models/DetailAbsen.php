<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailAbsen extends Model
{
    use HasFactory;

    protected $table = 'detail_absens';

    protected $fillable = [
        'id_absen',
        'id_peserta',
        'data_peserta',
        'presensi',
    ];

    protected function casts(): array
    {
        return [
            'id_absen' => 'integer',
            'id_peserta' => 'integer',
        ];
    }

    /**
     * Header induk periode absensi.
     */
    public function absensi(): BelongsTo
    {
        return $this->belongsTo(Absensi::class, 'id_absen');
    }

    /**
     * Peserta terkait via detail_absens.id_peserta -> pesertas.uid.
     */
    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class, 'id_peserta', 'uid');
    }

    /**
     * Mengurai string presensi format legacy:
     * "{tanggal}_{libur}_{jam_masuk}_{jam_pulang}&"
     * secara aman ke array terstruktur.
     *
     * @param  string|null  $rawPresensi  Opsional jika ingin mengurai string khusus
     * @return array<int, array{tanggal: string, libur: int, is_libur: bool, jam_masuk: string|null, jam_pulang: string|null}>
     */
    public function parsePresensiEntries(?string $rawPresensi = null): array
    {
        $raw = $rawPresensi ?? $this->presensi ?? '';
        if (trim($raw) === '') {
            return [];
        }

        $entries = [];
        $chunks = array_filter(explode('&', $raw), fn ($chunk) => trim($chunk) !== '');

        foreach ($chunks as $chunk) {
            $parts = explode('_', trim($chunk));
            if (count($parts) < 2) {
                continue;
            }

            $tanggal = $parts[0] ?? '';
            $liburVal = isset($parts[1]) ? (int) $parts[1] : 0;
            $jamMasuk = isset($parts[2]) && $parts[2] !== '0' && trim($parts[2]) !== '' ? trim($parts[2]) : null;
            $jamPulang = isset($parts[3]) && $parts[3] !== '0' && trim($parts[3]) !== '' ? trim($parts[3]) : null;

            $entries[] = [
                'tanggal' => $tanggal,
                'libur' => $liburVal,
                'is_libur' => $liburVal === 1,
                'jam_masuk' => $jamMasuk,
                'jam_pulang' => $jamPulang,
            ];
        }

        return $entries;
    }
}
