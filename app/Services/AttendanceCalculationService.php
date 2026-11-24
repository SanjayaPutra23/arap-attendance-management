<?php

namespace App\Services;

use App\Models\Peserta;
use App\Models\Setting;
use Carbon\Carbon;
use Carbon\CarbonInterface;

class AttendanceCalculationService
{
    /**
     * Default jam kerja standar jika jabatan belum memiliki setting khusus.
     */
    public const DEFAULT_JAM_DATANG = '08:00:00';

    public const DEFAULT_JAM_PULANG = '17:00:00';

    /**
     * Poin presensi SPPG Kalisapu.
     */
    public const SCORE_TEPAT_WAKTU = 1.00;

    public const SCORE_TERLAMBAT_PULANG_AWAL = 0.80;

    public const SCORE_ALPHA = 0.00;

    /**
     * Menentukan jam kerja (datang & pulang) per jabatan/divisi dari tabel settings.
     *
     * @param  Peserta  $peserta  Data profil peserta
     * @return array{jam_datang: string, jam_pulang: string, key_used: string}
     */
    public function resolveWorkingHours(Peserta $peserta): array
    {
        $rawJabatan = strtolower(trim((string) $peserta->jabatan));

        // Normalisasi alias penamaan (contoh: 'scurity' di tabel pesertas -> 'security' di tabel settings)
        $normalizedKey = match ($rawJabatan) {
            'scurity' => 'security',
            default => str_replace([' ', '-'], '_', $rawJabatan),
        };

        // 1. Coba baca setting berdasarkan key jabatan ternormalisasi
        $jamDatang = Setting::getValue("jam_datang_{$normalizedKey}");
        $jamPulang = Setting::getValue("jam_pulang_{$normalizedKey}");

        // 2. Jika tidak ditemukan dan peserta adalah officer, coba key officer
        if (($jamDatang === null || $jamPulang === null) && $peserta->isOfficer()) {
            $jamDatang = Setting::getValue('jam_datang_officer') ?? $jamDatang;
            $jamPulang = Setting::getValue('jam_pulang_officer') ?? $jamPulang;
            $normalizedKey = 'officer';
        }

        // 3. Fallback jika masih belum ditemukan
        return [
            'jam_datang' => $jamDatang ?? self::DEFAULT_JAM_DATANG,
            'jam_pulang' => $jamPulang ?? self::DEFAULT_JAM_PULANG,
            'key_used' => $normalizedKey,
        ];
    }

    /**
     * Evaluasi status kehadiran dan skor poin harian sesuai aturan bisnis SPPG Kalisapu.
     *
     * @param  Peserta  $peserta  Data peserta
     * @param  CarbonInterface|string  $checkInAt  Waktu check-in
     * @param  CarbonInterface|string|null  $checkOutAt  Waktu check-out (null jika baru check-in)
     * @param  array{jam_datang: string, jam_pulang: string}|null  $workingHours  Jam kerja yang telah di-resolve (opsional)
     * @return array{
     *     status: string,
     *     score: float,
     *     jam_datang: string,
     *     jam_pulang: string,
     *     is_late: bool,
     *     is_early_leave: bool
     * }
     */
    public function evaluateAttendance(
        Peserta $peserta,
        CarbonInterface|string $checkInAt,
        CarbonInterface|string|null $checkOutAt = null,
        ?array $workingHours = null
    ): array {
        $hours = $workingHours ?? $this->resolveWorkingHours($peserta);
        $jamDatangStr = $hours['jam_datang'];
        $jamPulangStr = $hours['jam_pulang'];

        $checkIn = $checkInAt instanceof CarbonInterface
            ? $checkInAt->copy()->setTimezone('Asia/Jakarta')
            : Carbon::parse($checkInAt, 'Asia/Jakarta');

        $checkOut = $checkOutAt !== null
            ? ($checkOutAt instanceof CarbonInterface
                ? $checkOutAt->copy()->setTimezone('Asia/Jakarta')
                : Carbon::parse($checkOutAt, 'Asia/Jakarta'))
            : null;

        $dateStr = $checkIn->format('Y-m-d');

        // Susun threshold waktu referensi
        $thresholdDatang = Carbon::parse("{$dateStr} {$jamDatangStr}", 'Asia/Jakarta');

        // Deteksi apakah jam kerja shift melintasi tengah malam (misal 19:00 s.d 03:00 atau 23:00 s.d 07:00)
        $crossesMidnight = strtotime($jamPulangStr) < strtotime($jamDatangStr);
        $thresholdPulang = Carbon::parse("{$dateStr} {$jamPulangStr}", 'Asia/Jakarta');
        if ($crossesMidnight) {
            $thresholdPulang->addDay();
        }

        // Cek keterlambatan datang
        $isLate = $checkIn->gt($thresholdDatang);

        // Jika baru Check-in saja (belum Check-out):
        if ($checkOut === null) {
            $status = $isLate ? 'terlambat' : 'hadir';
            // Nilai sementara check-in baru tap 1x adalah 0.80
            $score = self::SCORE_TERLAMBAT_PULANG_AWAL;

            return [
                'status' => $status,
                'score' => $score,
                'jam_datang' => $jamDatangStr,
                'jam_pulang' => $jamPulangStr,
                'is_late' => $isLate,
                'is_early_leave' => false,
            ];
        }

        // Jika sudah Check-out (in + out lengkap):
        $isEarlyLeave = $checkOut->lt($thresholdPulang);

        if ($isLate) {
            $status = 'terlambat';
            $score = self::SCORE_TERLAMBAT_PULANG_AWAL;
        } elseif ($isEarlyLeave) {
            $status = 'pulang_awal';
            $score = self::SCORE_TERLAMBAT_PULANG_AWAL;
        } else {
            // Check-in <= jam_datang DAN Check-out >= jam_pulang -> Hadir Tepat Waktu (1.00)
            $status = 'hadir';
            $score = self::SCORE_TEPAT_WAKTU;
        }

        return [
            'status' => $status,
            'score' => $score,
            'jam_datang' => $jamDatangStr,
            'jam_pulang' => $jamPulangStr,
            'is_late' => $isLate,
            'is_early_leave' => $isEarlyLeave,
        ];
    }

    /**
     * Mengambil rentang tanggal periode bulanan operasional SPPG:
     * Tanggal 20 bulan sebelumnya (M-1) s.d. tanggal 19 bulan berjalan (M).
     *
     * @param  int  $year  Tahun periode (misal 2026)
     * @param  int  $month  Bulan periode (1 - 12)
     * @return array{start: Carbon, end: Carbon}
     */
    public function getMonthlyPeriodRange(int $year, int $month): array
    {
        $currentMonthBase = Carbon::create($year, $month, 1, 0, 0, 0, 'Asia/Jakarta');

        $start = $currentMonthBase->copy()->subMonth()->setDay(20)->startOfDay();
        $end = $currentMonthBase->copy()->setDay(19)->endOfDay();

        return [
            'start' => $start,
            'end' => $end,
        ];
    }

    /**
     * Mengambil rentang tanggal periode mingguan operasional SPPG:
     * Hari Senin s.d. hari Minggu (WIB).
     *
     * @param  string|null  $referenceDate  Tanggal acuan (Y-m-d), default hari ini
     * @return array{start: Carbon, end: Carbon, label: string}
     */
    public function getWeeklyPeriodRange(?string $referenceDate = null): array
    {
        $date = $referenceDate
            ? Carbon::parse($referenceDate, 'Asia/Jakarta')
            : Carbon::now('Asia/Jakarta');

        $start = $date->copy()->startOfWeek(CarbonInterface::MONDAY)->startOfDay();
        $end = $date->copy()->endOfWeek(CarbonInterface::SUNDAY)->endOfDay();
        $label = $start->translatedFormat('d M Y').' - '.$end->translatedFormat('d M Y');

        return [
            'start' => $start,
            'end' => $end,
            'label' => $label,
        ];
    }
}
