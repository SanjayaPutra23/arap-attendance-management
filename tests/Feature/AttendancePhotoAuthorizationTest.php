<?php

namespace Tests\Feature;

use App\Models\AttendanceLocation;
use App\Models\AttendancePhoto;
use App\Models\MobileAttendance;
use App\Models\Peserta;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AttendancePhotoAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    protected User $ownerUser;

    protected User $otherUser;

    protected User $adminUser;

    protected AttendancePhoto $photo;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('attendance_photos');

        $roleUser = Role::create(['name' => 'User']);
        $roleAdmin = Role::create(['name' => 'Ultraman']);

        // 1. Peserta Pemilik Foto (Relawan A)
        $pesertaA = Peserta::create(['uid' => 1051, 'name' => 'Relawan A', 'jabatan' => 'Officer']);
        $this->ownerUser = User::factory()->create(['peserta_id' => $pesertaA->id, 'name' => 'Relawan A']);
        $this->ownerUser->roles()->attach($roleUser);

        // 2. Peserta Lain (Relawan B)
        $pesertaB = Peserta::create(['uid' => 1052, 'name' => 'Relawan B', 'jabatan' => 'Security']);
        $this->otherUser = User::factory()->create(['peserta_id' => $pesertaB->id, 'name' => 'Relawan B']);
        $this->otherUser->roles()->attach($roleUser);

        // 3. User Admin (Ultraman / Staff)
        $this->adminUser = User::factory()->create(['name' => 'Super Admin']);
        $this->adminUser->roles()->attach($roleAdmin);

        // Buat rekaman kehadiran dan file fisik foto
        $location = AttendanceLocation::create([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885,
            'longitude' => 109.1378,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        $attendance = MobileAttendance::create([
            'peserta_id' => $pesertaA->id,
            'user_id' => $this->ownerUser->id,
            'attendance_location_id' => $location->id,
            'attendance_date' => now()->toDateString(),
            'check_in_at' => now(),
            'status' => 'hadir',
            'score' => 1.00,
        ]);

        $path = '2026/11/24/test_selfie.jpg';
        Storage::disk('attendance_photos')->put($path, 'dummy_photo_binary_content');

        $this->photo = AttendancePhoto::create([
            'mobile_attendance_id' => $attendance->id,
            'type' => 'check_in',
            'disk' => 'attendance_photos',
            'path' => $path,
            'mime_type' => 'image/jpeg',
            'file_size_bytes' => 26,
            'captured_at' => now(),
            'sha256_hash' => hash('sha256', 'dummy_photo_binary_content'),
        ]);
    }

    /**
     * Test 1: Pemilik foto dapat mengakses fotonya (HTTP 200).
     */
    public function test_photo_owner_can_access_own_photo(): void
    {
        $response = $this->actingAs($this->ownerUser)->get(route('attendance-photos.show', $this->photo->id));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'image/jpeg');
        $this->assertStringContainsString('private', (string) $response->headers->get('Cache-Control'));
        $this->assertStringContainsString('max-age=3600', (string) $response->headers->get('Cache-Control'));
    }

    /**
     * Test 2: Admin / Petugas Tata Usaha (Gate 'staff-access') dapat mengakses foto relawan (HTTP 200).
     */
    public function test_staff_admin_can_access_any_attendance_photo(): void
    {
        $response = $this->actingAs($this->adminUser)->get(route('attendance-photos.show', $this->photo->id));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'image/jpeg');
    }

    /**
     * Test 3: Relawan lain yang BUKAN pemilik foto DITOLAK dengan HTTP 403 Forbidden (Anti-IDOR).
     */
    public function test_other_user_cannot_access_photo_forbidden(): void
    {
        $response = $this->actingAs($this->otherUser)->get(route('attendance-photos.show', $this->photo->id));

        $response->assertStatus(403);
    }

    /**
     * Test 4: Pengunjung tanpa login diarahkan ke login.
     */
    public function test_guest_cannot_access_photo_redirects_to_login(): void
    {
        $response = $this->get(route('attendance-photos.show', $this->photo->id));

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * Test 5: File fisik tidak ditemukan di private disk mengembalikan HTTP 404.
     */
    public function test_missing_physical_photo_returns_404(): void
    {
        // Hapus file fisik dari disk
        Storage::disk('attendance_photos')->delete($this->photo->path);

        $response = $this->actingAs($this->ownerUser)->get(route('attendance-photos.show', $this->photo->id));

        $response->assertStatus(404);
    }
}
