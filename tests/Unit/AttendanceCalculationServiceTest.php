<?php

namespace Tests\Unit;

use App\Models\Peserta;
use App\Models\Setting;
use App\Services\AttendanceCalculationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendanceCalculationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected AttendanceCalculationService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new AttendanceCalculationService;
    }

    /**
     * Uji mapping jam kerja dinamis dari tabel settings untuk berbagai jabatan.
     */
    public function test_resolve_working_hours_from_settings(): void
    {
        Setting::create(['name' => 'jam_datang_officer', 'value' => '08:00:00']);
        Setting::create(['name' => 'jam_pulang_officer', 'value' => '17:00:00']);
        Setting::create(['name' => 'jam_datang_security', 'value' => '07:00:00']);
        Setting::create(['name' => 'jam_pulang_security', 'value' => '19:00:00']);

        // 1. Kasus Officer
        $officer = new Peserta(['name' => 'Lukman', 'jabatan' => 'Officer']);
        $hoursOfficer = $this->service->resolveWorkingHours($officer);
        $this->assertSame('08:00:00', $hoursOfficer['jam_datang']);
        $this->assertSame('17:00:00', $hoursOfficer['jam_pulang']);

        // 2. Kasus Security dengan typo legacy 'scurity'
        $security = new Peserta(['name' => 'Wahyudin', 'jabatan' => 'scurity']);
        $hoursSecurity = $this->service->resolveWorkingHours($security);
        $this->assertSame('07:00:00', $hoursSecurity['jam_datang']);
        $this->assertSame('19:00:00', $hoursSecurity['jam_pulang']);

        // 3. Kasus jabatan tanpa setting khusus -> Fallback default (08:00 - 17:00)
        $unknown = new Peserta(['name' => 'Tamu', 'jabatan' => 'magang']);
        $hoursUnknown = $this->service->resolveWorkingHours($unknown);
        $this->assertSame('08:00:00', $hoursUnknown['jam_datang']);
        $this->assertSame('17:00:00', $hoursUnknown['jam_pulang']);
    }

    /**
     * Uji evaluasi saat baru Check-in saja (belum check-out):
     * Skor sementara selalu 0.80 (karena baru tap 1x).
     */
    public function test_evaluate_attendance_check_in_only(): void
    {
        $peserta = new Peserta(['jabatan' => 'officer']);
        $hours = ['jam_datang' => '08:00:00', 'jam_pulang' => '17:00:00'];

        // Check-in tepat waktu (07:55:00 <= 08:00:00) -> status hadir, skor 0.80
        $onTime = $this->service->evaluateAttendance($peserta, '2026-11-24 07:55:00', null, $hours);
        $this->assertSame('hadir', $onTime['status']);
        $this->assertSame(0.80, $onTime['score']);
        $this->assertFalse($onTime['is_late']);

        // Check-in terlambat (08:15:00 > 08:00:00) -> status terlambat, skor 0.80
        $late = $this->service->evaluateAttendance($peserta, '2026-11-24 08:15:00', null, $hours);
        $this->assertSame('terlambat', $late['status']);
        $this->assertSame(0.80, $late['score']);
        $this->assertTrue($late['is_late']);
    }

    /**
     * Uji evaluasi saat Check-out lengkap (in + out):
     * - Tepat waktu (in <= datang DAN out >= pulang): hadir, skor 1.00.
     * - Terlambat datang: terlambat, skor 0.80.
     * - Pulang awal (in tepat waktu tapi out < pulang): pulang_awal, skor 0.80.
     */
    public function test_evaluate_attendance_complete_in_and_out(): void
    {
        $peserta = new Peserta(['jabatan' => 'officer']);
        $hours = ['jam_datang' => '08:00:00', 'jam_pulang' => '17:00:00'];

        // 1. Tepat Waktu (Hadir 1.00)
        $fullPresent = $this->service->evaluateAttendance(
            $peserta,
            '2026-11-24 07:50:00',
            '2026-11-24 17:05:00',
            $hours
        );
        $this->assertSame('hadir', $fullPresent['status']);
        $this->assertSame(1.00, $fullPresent['score']);
        $this->assertFalse($fullPresent['is_late']);
        $this->assertFalse($fullPresent['is_early_leave']);

        // 2. Terlambat Datang (Terlambat 0.80)
        $lateArrival = $this->service->evaluateAttendance(
            $peserta,
            '2026-11-24 08:05:00',
            '2026-11-24 17:15:00',
            $hours
        );
        $this->assertSame('terlambat', $lateArrival['status']);
        $this->assertSame(0.80, $lateArrival['score']);
        $this->assertTrue($lateArrival['is_late']);

        // 3. Pulang Awal (Pulang Awal 0.80)
        $earlyLeave = $this->service->evaluateAttendance(
            $peserta,
            '2026-11-24 07:55:00',
            '2026-11-24 16:45:00',
            $hours
        );
        $this->assertSame('pulang_awal', $earlyLeave['status']);
        $this->assertSame(0.80, $earlyLeave['score']);
        $this->assertFalse($earlyLeave['is_late']);
        $this->assertTrue($earlyLeave['is_early_leave']);
    }

    /**
     * Uji kalkulasi rentang periode bulanan operasional SPPG:
     * Tanggal 20 bulan sebelumnya s.d. tanggal 19 bulan berjalan.
     */
    public function test_get_monthly_period_range(): void
    {
        // 1. Periode November 2026 (2026-10-20 s.d 2026-11-19)
        $rangeNov = $this->service->getMonthlyPeriodRange(2026, 11);
        $this->assertSame('2026-10-20 00:00:00', $rangeNov['start']->format('Y-m-d H:i:s'));
        $this->assertSame('2026-11-19 23:59:59', $rangeNov['end']->format('Y-m-d H:i:s'));

        // 2. Periode Pergantian Tahun: Januari 2027 (2026-12-20 s.d 2027-01-19)
        $rangeJan = $this->service->getMonthlyPeriodRange(2027, 1);
        $this->assertSame('2026-12-20 00:00:00', $rangeJan['start']->format('Y-m-d H:i:s'));
        $this->assertSame('2027-01-19 23:59:59', $rangeJan['end']->format('Y-m-d H:i:s'));
    }
}
