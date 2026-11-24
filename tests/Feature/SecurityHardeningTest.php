<?php

namespace Tests\Feature;

use App\Models\AttendanceLocation;
use App\Models\Peserta;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SecurityHardeningTest extends TestCase
{
    use RefreshDatabase;

    protected User $normalUser;

    protected User $officerUser;

    protected User $umumUser;

    protected Peserta $peserta;

    protected function setUp(): void
    {
        parent::setUp();

        $roleUser = Role::create(['name' => 'User']);
        $roleOfficer = Role::create(['name' => 'Officer']);
        $roleUltraman = Role::create(['name' => 'Ultraman']);

        $this->peserta = Peserta::create([
            'name' => 'Budi Santoso',
            'nik' => '3328010101900001',
            'uid' => 101,
            'jabatan' => 'Persiapan',
            'type' => 'relawan',
        ]);

        $this->normalUser = User::factory()->create([
            'peserta_id' => $this->peserta->id,
            'email' => 'user@arap.local',
        ]);
        $this->normalUser->roles()->attach($roleUser);

        $this->officerUser = User::factory()->create([
            'email' => 'officer@arap.local',
        ]);
        $this->officerUser->roles()->attach($roleOfficer);

        $this->umumUser = User::factory()->create([
            'email' => 'umum@arap.local',
        ]);
        $this->umumUser->roles()->attach($roleUltraman);

        AttendanceLocation::create([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);
    }

    /**
     * Verifikasi Security Headers terpasang pada response web.
     */
    public function test_security_headers_are_present_on_web_responses(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->assertHeader('Permissions-Policy', 'camera=(self), geolocation=(self), microphone=()');
    }

    /**
     * Verifikasi bahwa halaman presensi mobile PWA tidak memiliki input file galeri.
     */
    public function test_mobile_attendance_view_strictly_omits_file_input(): void
    {
        $response = $this->actingAs($this->normalUser)->get('/mobile-attendance');

        $response->assertStatus(200);
        $response->assertDontSee('type="file"', false);
        $response->assertDontSee("type='file'", false);
    }

    /**
     * Verifikasi matriks RBAC: role User biasa mendapat HTTP 403 Forbidden di seluruh endpoint admin.
     */
    public function test_rbac_user_role_is_forbidden_on_all_admin_endpoints(): void
    {
        $adminRoutes = [
            '/admin/monitoring',
            '/admin/pegawai',
            '/admin/izin',
            '/admin/arsip-fingerprint',
            '/admin/rekap',
            '/admin/rekap/export/excel',
            '/admin/rekap/export/pdf',
            '/admin/settings/locations',
            '/admin/settings/working-hours',
        ];

        foreach ($adminRoutes as $route) {
            $response = $this->actingAs($this->normalUser)->get($route);
            $this->assertEquals(403, $response->status(), "Route {$route} should return 403 for User role.");
        }
    }

    /**
     * Verifikasi matriks RBAC: role Officer dapat mengakses monitoring & rekap tapi 403 di pegawai & settings.
     */
    public function test_rbac_officer_role_can_access_monitoring_and_rekap_but_forbidden_on_pegawai_and_settings(): void
    {
        // Allowed for staff-access (Officer):
        $this->actingAs($this->officerUser)->get('/admin/monitoring')->assertOk();
        $this->actingAs($this->officerUser)->get('/admin/rekap')->assertOk();
        $this->actingAs($this->officerUser)->get('/admin/izin')->assertOk();
        $this->actingAs($this->officerUser)->get('/admin/arsip-fingerprint')->assertOk();

        // Forbidden for Officer (restricted to can:umum):
        $this->actingAs($this->officerUser)->get('/admin/pegawai')->assertForbidden();
        $this->actingAs($this->officerUser)->get('/admin/settings/locations')->assertForbidden();
        $this->actingAs($this->officerUser)->get('/admin/settings/working-hours')->assertForbidden();
    }

    /**
     * Verifikasi file palsu (skrip text/PHP yang dinamai .jpg) ditolak saat submit presensi mobile.
     */
    public function test_fake_image_payload_is_rejected_on_mobile_attendance(): void
    {
        $fakeJpg = UploadedFile::fake()->createWithContent(
            'fake_selfie.jpg',
            "<?php echo 'malicious_script'; ",
            'text/x-php'
        );

        $response = $this->actingAs($this->normalUser)->post('/mobile-attendance/submit', [
            'type' => 'check_in',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'accuracy' => 10,
            'photo' => $fakeJpg,
        ], ['Accept' => 'application/json']);

        $response->assertStatus(422);
        $response->assertJson(['success' => false]);
        $this->assertStringContainsString('bukan format gambar valid', (string) $response->json('message'));
    }

    /**
     * Verifikasi file script berbahaya yang dinamai .pdf atau .jpg ditolak pada permohonan izin.
     */
    public function test_disguised_script_file_is_rejected_on_permohonan_izin(): void
    {
        Storage::fake('izin_attachments');

        // Berkas teks/script PHP yang diberi nama .pdf
        $fakePdf = UploadedFile::fake()->createWithContent(
            'malicious.pdf',
            "<?php echo 'shell_exec'; ",
            'text/x-php'
        );

        $response = $this->actingAs($this->normalUser)->post('/izin', [
            'jenis' => 'sakit',
            'tgl_mulai' => now()->toDateString(),
            'tgl_selesai' => now()->addDays(2)->toDateString(),
            'alasan' => 'Demam tinggi butuh istirahat',
            'surat_dokter' => $fakePdf,
        ]);

        $response->assertSessionHasErrors(['surat_dokter']);
    }
}
