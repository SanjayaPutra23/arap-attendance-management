<?php

namespace Tests\Feature;

use App\Models\AttendanceAuditLog;
use App\Models\AttendanceLocation;
use App\Models\AttendancePhoto;
use App\Models\MobileAttendance;
use App\Models\Peserta;
use App\Models\User;
use Database\Seeders\AttendanceLocationSeeder;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MobileAttendanceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Uji relasi lengkap antar model Mobile Attendance v2.
     */
    public function test_mobile_attendance_models_and_relations(): void
    {
        $location = AttendanceLocation::create([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        $peserta = Peserta::create([
            'uid' => 1051,
            'name' => 'Riski',
            'jabatan' => 'Officer',
        ]);

        $user = User::factory()->create([
            'peserta_id' => $peserta->id,
            'name' => 'Riski',
        ]);

        $attendance = MobileAttendance::create([
            'peserta_id' => $peserta->id,
            'user_id' => $user->id,
            'attendance_location_id' => $location->id,
            'attendance_date' => '2026-11-24',
            'check_in_at' => '2026-11-24 07:55:00',
            'check_in_lat' => -6.9885100,
            'check_in_lng' => 109.1378100,
            'check_in_distance_meters' => 12.50,
            'check_in_accuracy_meters' => 8.20,
            'status' => 'hadir',
            'score' => 1.00,
            'source' => 'mobile',
        ]);

        $checkInPhoto = AttendancePhoto::create([
            'mobile_attendance_id' => $attendance->id,
            'type' => 'check_in',
            'disk' => 'attendance_photos',
            'path' => 'photos/2026/11/24/checkin_1.jpg',
            'mime_type' => 'image/jpeg',
            'file_size_bytes' => 154200,
            'captured_at' => '2026-11-24 07:55:00',
            'sha256_hash' => hash('sha256', 'dummy_check_in_content'),
        ]);

        $auditLog = AttendanceAuditLog::create([
            'user_id' => $user->id,
            'peserta_id' => $peserta->id,
            'action' => 'check_in_attempt',
            'result' => 'accepted',
            'reason' => 'Dalam radius geofence (12.5m)',
            'latitude' => -6.9885100,
            'longitude' => 109.1378100,
            'distance_meters' => 12.50,
            'accuracy_meters' => 8.20,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'ARAP PWA Mobile Client',
            'created_at' => now(),
        ]);

        // Verifikasi relasi MobileAttendance
        $this->assertSame($peserta->id, $attendance->peserta->id);
        $this->assertSame($user->id, $attendance->user->id);
        $this->assertSame('SPPG Kalisapu', $attendance->location->name);
        $this->assertCount(1, $attendance->photos);
        $this->assertNotNull($attendance->checkInPhoto);
        $this->assertSame($checkInPhoto->id, $attendance->checkInPhoto->id);
        $this->assertNull($attendance->checkOutPhoto);

        // Verifikasi relasi balikan
        $this->assertCount(1, $peserta->mobileAttendances);
        $this->assertCount(1, $user->mobileAttendances);
        $this->assertCount(1, $location->mobileAttendances);
        $this->assertSame($attendance->id, $checkInPhoto->mobileAttendance->id);

        // Verifikasi Audit Log
        $this->assertSame($user->id, $auditLog->user->id);
        $this->assertSame($peserta->id, $auditLog->peserta->id);
        $this->assertCount(1, $user->attendanceAuditLogs);
    }

    /**
     * Uji constraint UNIQUE(peserta_id, attendance_date):
     * Memastikan presensi ganda pada tanggal yang sama ditolak database.
     */
    public function test_unique_constraint_prevents_duplicate_daily_attendance(): void
    {
        $peserta1 = Peserta::create(['uid' => 1051, 'name' => 'Riski', 'jabatan' => 'Officer']);
        $peserta2 = Peserta::create(['uid' => 1052, 'name' => 'Wahyudin', 'jabatan' => 'Security']);

        // Presensi pertama untuk peserta 1 pada 2026-11-24: Berhasil
        MobileAttendance::create([
            'peserta_id' => $peserta1->id,
            'attendance_date' => '2026-11-24',
            'status' => 'hadir',
            'score' => 1.00,
        ]);

        // Presensi untuk peserta 2 pada tanggal yang sama: Berhasil
        MobileAttendance::create([
            'peserta_id' => $peserta2->id,
            'attendance_date' => '2026-11-24',
            'status' => 'hadir',
            'score' => 1.00,
        ]);

        // Presensi untuk peserta 1 pada tanggal berbeda: Berhasil
        MobileAttendance::create([
            'peserta_id' => $peserta1->id,
            'attendance_date' => '2026-11-25',
            'status' => 'hadir',
            'score' => 1.00,
        ]);

        // Duplikasi presensi untuk peserta 1 pada tanggal yang sama (2026-11-24): WAJIB melempar QueryException
        $this->expectException(QueryException::class);

        MobileAttendance::create([
            'peserta_id' => $peserta1->id,
            'attendance_date' => '2026-11-24',
            'status' => 'terlambat',
            'score' => 0.80,
        ]);
    }

    /**
     * Uji AttendanceLocationSeeder berjalan idempotent.
     */
    public function test_attendance_location_seeder_is_idempotent(): void
    {
        $this->seed(AttendanceLocationSeeder::class);
        $this->assertSame(1, AttendanceLocation::count());

        // Jalankan seeder kedua kali, tidak boleh menduplikasi lokasi
        $this->seed(AttendanceLocationSeeder::class);
        $this->assertSame(1, AttendanceLocation::count());

        $location = AttendanceLocation::first();
        $this->assertSame('SPPG Kalisapu', $location->name);
        $this->assertTrue($location->is_active);
        $this->assertSame(100, $location->radius_meters);
        $this->assertSame(50, $location->max_gps_accuracy_meters);
    }
}
