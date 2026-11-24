<?php

namespace Tests\Feature;

use App\Models\AttendanceLocation;
use App\Models\AttendancePhoto;
use App\Models\MobileAttendance;
use App\Models\Peserta;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MobileAttendanceFlowTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected Peserta $peserta;

    protected AttendanceLocation $location;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('attendance_photos');

        $this->location = AttendanceLocation::create([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        Setting::create(['name' => 'jam_datang_officer', 'value' => '08:00:00']);
        Setting::create(['name' => 'jam_pulang_officer', 'value' => '17:00:00']);

        $role = Role::create(['name' => 'User']);

        $this->peserta = Peserta::create([
            'uid' => 1051,
            'name' => 'Riski',
            'nik' => '1051',
            'jabatan' => 'Officer',
        ]);

        $this->user = User::factory()->create([
            'peserta_id' => $this->peserta->id,
            'name' => 'Riski',
            'email' => '1051@arap.local',
        ]);
        $this->user->roles()->attach($role);
    }

    /**
     * Buat dummy file JPEG gambar biner valid via GD.
     */
    protected function createValidSelfieUpload(): UploadedFile
    {
        $img = imagecreatetruecolor(400, 300);
        $color = imagecolorallocate($img, 5, 150, 105);
        imagefill($img, 0, 0, $color);

        ob_start();
        imagejpeg($img, null, 80);
        $bytes = (string) ob_get_clean();
        imagedestroy($img);

        return UploadedFile::fake()->createWithContent('live_selfie.jpg', $bytes);
    }

    /**
     * Test 1: Halaman presensi mobile dapat diakses oleh user yang login.
     */
    public function test_mobile_attendance_index_rendered_successfully(): void
    {
        $response = $this->actingAs($this->user)->get('/mobile-attendance');

        $response->assertStatus(200);
        $response->assertSee('Presensi Mobile SPPG Kalisapu');
        $response->assertSee('Riski');
        $response->assertSee('SPPG Kalisapu');
        $response->assertSee('08:00:00');
    }

    /**
     * Test 2: Halaman presensi menampilkan peringatan jika akun tidak terhubung ke Peserta.
     */
    public function test_mobile_attendance_index_warns_when_peserta_is_not_linked(): void
    {
        $unlinkedUser = User::factory()->create(['peserta_id' => null, 'name' => 'Unlinked User']);

        $response = $this->actingAs($unlinkedUser)->get('/mobile-attendance');

        $response->assertStatus(200);
        $response->assertSee('Akun Belum Ditautkan');
    }

    /**
     * Test 3: Check-in berhasil saat lokasi valid, GPS akurat, dan foto selfie valid.
     */
    public function test_check_in_successful_inside_geofence(): void
    {
        $photo = $this->createValidSelfieUpload();

        $response = $this->actingAs($this->user)->postJson('/mobile-attendance/submit', [
            'type' => 'check_in',
            'latitude' => -6.9885100, // ~10m dari pusat
            'longitude' => 109.1378100,
            'accuracy' => 15.0,
            'photo' => $photo,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        // Verifikasi database record mobile_attendances
        $this->assertDatabaseHas('mobile_attendances', [
            'peserta_id' => $this->peserta->id,
            'user_id' => $this->user->id,
            'attendance_location_id' => $this->location->id,
            'source' => 'mobile',
        ]);

        // Verifikasi foto tersimpan di DB & disk
        $this->assertDatabaseHas('attendance_photos', [
            'type' => 'check_in',
            'disk' => 'attendance_photos',
        ]);

        $photoRecord = AttendancePhoto::first();
        $this->assertNotNull($photoRecord);
        Storage::disk('attendance_photos')->assertExists($photoRecord->path);

        // Verifikasi audit log tercatat accepted
        $this->assertDatabaseHas('attendance_audit_logs', [
            'user_id' => $this->user->id,
            'peserta_id' => $this->peserta->id,
            'action' => 'check_in_attempt',
            'result' => 'accepted',
        ]);
    }

    /**
     * Test 4: Check-in di luar radius geofence ditolak (HTTP 422) dan dicatat di audit log.
     */
    public function test_check_in_outside_radius_is_rejected(): void
    {
        $photo = $this->createValidSelfieUpload();

        $response = $this->actingAs($this->user)->postJson('/mobile-attendance/submit', [
            'type' => 'check_in',
            'latitude' => -6.9750000, // ~1.5 km di luar radius
            'longitude' => 109.1378000,
            'accuracy' => 10.0,
            'photo' => $photo,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
        ]);
        $this->assertStringContainsString('di luar radius', (string) $response->json('message'));

        // Tidak boleh ada rekaman attendance
        $this->assertDatabaseCount('mobile_attendances', 0);

        // Audit log wajib mencatat percobaan ditolak
        $this->assertDatabaseHas('attendance_audit_logs', [
            'user_id' => $this->user->id,
            'peserta_id' => $this->peserta->id,
            'action' => 'check_in_attempt',
            'result' => 'rejected',
        ]);
    }

    /**
     * Test 5: Check-in dengan akurasi GPS buruk (> 50m) ditolak (HTTP 422).
     */
    public function test_check_in_with_poor_gps_accuracy_is_rejected(): void
    {
        $photo = $this->createValidSelfieUpload();

        $response = $this->actingAs($this->user)->postJson('/mobile-attendance/submit', [
            'type' => 'check_in',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'accuracy' => 85.0, // Melebihi max 50m
            'photo' => $photo,
        ]);

        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
        ]);

        $this->assertDatabaseHas('attendance_audit_logs', [
            'user_id' => $this->user->id,
            'result' => 'rejected',
        ]);
    }

    /**
     * Test 6: Check-in dua kali pada hari yang sama ditolak (HTTP 422).
     */
    public function test_double_check_in_on_same_day_is_rejected(): void
    {
        $photo1 = $this->createValidSelfieUpload();
        $photo2 = $this->createValidSelfieUpload();

        // Check-in 1: Sukses
        $res1 = $this->actingAs($this->user)->postJson('/mobile-attendance/submit', [
            'type' => 'check_in',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'accuracy' => 10.0,
            'photo' => $photo1,
        ]);
        $res1->assertStatus(200);

        // Check-in 2: Ditolak
        $res2 = $this->actingAs($this->user)->postJson('/mobile-attendance/submit', [
            'type' => 'check_in',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'accuracy' => 10.0,
            'photo' => $photo2,
        ]);

        $res2->assertStatus(422);
        $res2->assertJson([
            'success' => false,
        ]);
        $this->assertStringContainsString('Anda sudah melakukan presensi masuk', $res2->json('message'));
    }

    /**
     * Test 7: Check-out tanpa check-in terlebih dahulu ditolak (HTTP 422).
     */
    public function test_check_out_without_check_in_is_rejected(): void
    {
        $photo = $this->createValidSelfieUpload();

        $response = $this->actingAs($this->user)->postJson('/mobile-attendance/submit', [
            'type' => 'check_out',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'accuracy' => 10.0,
            'photo' => $photo,
        ]);

        $response->assertStatus(422);
        $this->assertStringContainsString('belum melakukan check-in', $response->json('message'));
    }

    /**
     * Test 8: Alur lengkap Check-in diikuti Check-out berhasil memperbarui data.
     */
    public function test_complete_check_in_and_check_out_flow(): void
    {
        $photoIn = $this->createValidSelfieUpload();
        $photoOut = $this->createValidSelfieUpload();

        // 1. Check-in
        $resIn = $this->actingAs($this->user)->postJson('/mobile-attendance/submit', [
            'type' => 'check_in',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'accuracy' => 10.0,
            'photo' => $photoIn,
        ]);
        $resIn->assertStatus(200);

        // 2. Check-out
        $resOut = $this->actingAs($this->user)->postJson('/mobile-attendance/submit', [
            'type' => 'check_out',
            'latitude' => -6.9885100,
            'longitude' => 109.1378100,
            'accuracy' => 12.0,
            'photo' => $photoOut,
        ]);
        $resOut->assertStatus(200);

        $attendance = MobileAttendance::where('peserta_id', $this->peserta->id)->first();
        $this->assertNotNull($attendance->check_in_at);
        $this->assertNotNull($attendance->check_out_at);
        $this->assertCount(2, $attendance->photos);

        // 3. Double Check-out ditolak
        $photoOut2 = $this->createValidSelfieUpload();
        $resOut2 = $this->actingAs($this->user)->postJson('/mobile-attendance/submit', [
            'type' => 'check_out',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'accuracy' => 10.0,
            'photo' => $photoOut2,
        ]);
        $resOut2->assertStatus(422);
        $this->assertStringContainsString('sudah melakukan check-out', $resOut2->json('message'));
    }

    /**
     * Test 9: Halaman riwayat presensi dapat diakses dan menampilkan data user.
     */
    public function test_history_page_rendered_successfully(): void
    {
        $response = $this->actingAs($this->user)->get('/mobile-attendance/history');

        $response->assertStatus(200);
        $response->assertSee('Riwayat Presensi Pribadi');
        $response->assertSee('Hadir Tepat Waktu');
        $response->assertSee('Total Akumulasi Poin');
    }
}
