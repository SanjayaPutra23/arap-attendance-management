<?php

namespace Tests\Feature;

use App\Models\AttendancePhoto;
use App\Models\Libur;
use App\Models\MobileAttendance;
use App\Models\PermohonanIzin;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCombinedRecapTest extends TestCase
{
    use RefreshDatabase;

    protected Role $roleUser;

    protected Role $roleOfficer;

    protected Role $roleUltraman;

    protected User $relawanA;

    protected Peserta $pesertaA;

    protected User $relawanB;

    protected Peserta $pesertaB;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roleUser = Role::create(['name' => 'User']);
        $this->roleOfficer = Role::create(['name' => 'Officer']);
        $this->roleUltraman = Role::create(['name' => 'Ultraman']);

        // Relawan A
        $this->pesertaA = Peserta::create([
            'name' => 'Siti Relawan A',
            'nik' => '3328010101010001',
            'uid' => 1001,
            'jabatan' => 'Persiapan',
            'is_active' => true,
        ]);
        $this->relawanA = User::factory()->create([
            'name' => 'Siti Relawan A',
            'email' => 'siti@arap.local',
            'peserta_id' => $this->pesertaA->id,
        ]);
        $this->relawanA->roles()->attach($this->roleUser);

        // Relawan B
        $this->pesertaB = Peserta::create([
            'name' => 'Budi Relawan B',
            'nik' => '3328010101010002',
            'uid' => 1002,
            'jabatan' => 'Pengolahan',
            'is_active' => true,
        ]);
        $this->relawanB = User::factory()->create([
            'name' => 'Budi Relawan B',
            'email' => 'budi@arap.local',
            'peserta_id' => $this->pesertaB->id,
        ]);
        $this->relawanB->roles()->attach($this->roleUser);
    }

    public function test_unauthenticated_user_redirected_to_login(): void
    {
        $this->get('/mobile-attendance/history')->assertRedirect('/login');
        $this->get('/mobile-attendance/history/pdf')->assertRedirect('/login');
    }

    public function test_relawan_with_fingerprint_only_sees_combined_recap_and_points(): void
    {
        // Berikan log mesin fingerprint pools untuk Relawan A pada tanggal 10 November 2026
        // Masuk: 07:30:00 (tepat waktu <= 08:00), Pulang: 17:15:00 (tepat waktu >= 17:00)
        Pool::create([
            'iduser' => 1001,
            'date' => '2026-11-10',
            'time' => '07:30:00',
            'type' => 0,
        ]);
        Pool::create([
            'iduser' => 1001,
            'date' => '2026-11-10',
            'time' => '17:15:00',
            'type' => 0,
        ]);

        $response = $this->actingAs($this->relawanA)
            ->get('/mobile-attendance/history?year=2026&month=11');

        $response->assertOk();
        $response->assertSee('Rekap &amp; Riwayat Saya', false);
        $response->assertSee('Mesin Fisik');
        $response->assertSee('07:30:00');
        $response->assertSee('17:15:00');
        $response->assertSee('Hadir Tepat Waktu');
        $response->assertSee('1.00');
        $response->assertSee('Unduh PDF Rekap Saya');
    }

    public function test_relawan_with_hybrid_attendance_sees_all_sources_combined(): void
    {
        // 1. Mobile PWA pada 2026-11-05
        $mobileAtt = MobileAttendance::create([
            'peserta_id' => $this->pesertaA->id,
            'user_id' => $this->relawanA->id,
            'attendance_date' => '2026-11-05',
            'check_in_at' => Carbon::parse('2026-11-05 07:00:00'),
            'check_out_at' => Carbon::parse('2026-11-05 15:30:00'),
            'status' => 'hadir',
            'score' => 1.00,
            'source' => 'mobile',
        ]);
        $photo = AttendancePhoto::create([
            'mobile_attendance_id' => $mobileAtt->id,
            'type' => 'check_in',
            'disk' => 'private',
            'path' => 'photos/selfie_checkin_05.jpg',
            'mime_type' => 'image/jpeg',
            'file_size_bytes' => 12345,
            'captured_at' => Carbon::parse('2026-11-05 07:00:00'),
            'sha256_hash' => 'hash123',
        ]);

        // 2. Mesin Fingerprint pada 2026-11-06
        Pool::create([
            'iduser' => 1001,
            'date' => '2026-11-06',
            'time' => '07:05:00',
            'type' => 0,
        ]);
        Pool::create([
            'iduser' => 1001,
            'date' => '2026-11-06',
            'time' => '15:30:00',
            'type' => 0,
        ]);

        // 3. Permohonan Izin Disetujui pada 2026-11-07
        PermohonanIzin::create([
            'peserta_id' => $this->pesertaA->id,
            'user_id' => $this->relawanA->id,
            'tgl_mulai' => '2026-11-07',
            'tgl_selesai' => '2026-11-07',
            'jenis' => 'izin',
            'alasan' => 'Urusan keluarga penting',
            'status' => 'disetujui',
        ]);

        // 4. Hari Libur Nasional pada 2026-11-08
        Libur::create([
            'tanggal' => '2026-11-08',
            'ket' => 'Libur Nasional Uji',
        ]);

        // Uji Mode Bulanan
        $responseBulanan = $this->actingAs($this->relawanA)
            ->get('/mobile-attendance/history?year=2026&month=11');

        $responseBulanan->assertOk();
        $responseBulanan->assertSee('Mobile PWA');
        $responseBulanan->assertSee('Mesin Fisik');
        $responseBulanan->assertSee('Surat Izin');
        $responseBulanan->assertSee('Libur Nasional');
        $responseBulanan->assertSee("showPhotoModal('http://localhost:8000/attendance-photos/{$photo->id}'", false);

        // Uji Mode Mingguan
        Setting::updateOrCreate(
            ['name' => 'relawan_recap_period_mode'],
            ['value' => 'mingguan', 'grup' => 1]
        );
        Setting::clearRuntimeCache();

        $responseMingguan = $this->actingAs($this->relawanA)
            ->get('/mobile-attendance/history?date=2026-11-05');

        $responseMingguan->assertOk();
        $responseMingguan->assertSee('Mingguan (Senin - Minggu)');
        $responseMingguan->assertSee('Mobile PWA');
        $responseMingguan->assertSee('Mesin Fisik');
    }

    public function test_officer_and_ultraman_with_peserta_can_view_personal_recap(): void
    {
        // Officer
        $officerPeserta = Peserta::create([
            'name' => 'Pak Joko Officer',
            'nik' => '3328010101010003',
            'uid' => 1003,
            'jabatan' => 'Officer',
            'is_active' => true,
        ]);
        $officerUser = User::factory()->create([
            'name' => 'Pak Joko Officer',
            'email' => 'officer@arap.local',
            'peserta_id' => $officerPeserta->id,
        ]);
        $officerUser->roles()->attach($this->roleOfficer);

        $this->actingAs($officerUser)
            ->get('/mobile-attendance/history')
            ->assertOk()
            ->assertSee('Pak Joko Officer');

        // Ultraman Admin
        $adminPeserta = Peserta::create([
            'name' => 'Super Admin SPPG',
            'nik' => '3328010101010004',
            'uid' => 1004,
            'jabatan' => 'Officer',
            'is_active' => true,
        ]);
        $adminUser = User::factory()->create([
            'name' => 'Super Admin SPPG',
            'email' => 'admin@arap.local',
            'peserta_id' => $adminPeserta->id,
        ]);
        $adminUser->roles()->attach($this->roleUltraman);

        $this->actingAs($adminUser)
            ->get('/mobile-attendance/history')
            ->assertOk()
            ->assertSee('Super Admin SPPG');
    }

    public function test_user_can_download_personal_pdf(): void
    {
        Pool::create([
            'iduser' => 1001,
            'date' => '2026-11-12',
            'time' => '07:00:00',
            'type' => 0,
        ]);
        Pool::create([
            'iduser' => 1001,
            'date' => '2026-11-12',
            'time' => '15:30:00',
            'type' => 0,
        ]);

        $response = $this->actingAs($this->relawanA)
            ->get('/mobile-attendance/history/pdf?year=2026&month=11');

        $response->assertOk();
        $this->assertEquals('application/pdf', $response->headers->get('Content-Type'));
        $this->assertStringStartsWith('%PDF', $response->getContent());
    }

    public function test_anti_idor_relawan_cannot_view_or_download_other_peserta_recap(): void
    {
        // Relawan A mencoba melihat dan mengunduh data Relawan B dengan inject ?peserta_id=
        $responseHistory = $this->actingAs($this->relawanA)
            ->get("/mobile-attendance/history?peserta_id={$this->pesertaB->id}&year=2026&month=11");

        $responseHistory->assertOk();
        // Hanya data Relawan A yang boleh tampil, bukan Relawan B
        $responseHistory->assertSee($this->pesertaA->name);
        $responseHistory->assertDontSee($this->pesertaB->name);
        $this->assertEquals($this->pesertaA->id, $responseHistory->viewData('peserta')->id);

        $responsePdf = $this->actingAs($this->relawanA)
            ->get("/mobile-attendance/history/pdf?peserta_id={$this->pesertaB->id}&year=2026&month=11");

        $responsePdf->assertOk();
        $this->assertEquals('application/pdf', $responsePdf->headers->get('Content-Type'));
        $contentDisposition = (string) $responsePdf->headers->get('Content-Disposition');
        // File PDF terlampir atas nama dan identitas NIK Relawan A, bukan Relawan B
        $this->assertStringContainsString($this->pesertaA->nik, $contentDisposition);
        $this->assertStringNotContainsString($this->pesertaB->nik, $contentDisposition);
    }

    public function test_account_without_peserta_handled_gracefully(): void
    {
        // Akun user tanpa relasi peserta (misal akun teknis IT)
        $orphanUser = User::factory()->create([
            'name' => 'Akun Teknis IT',
            'email' => 'teknis@arap.local',
            'peserta_id' => null,
        ]);
        $orphanUser->roles()->attach($this->roleUser);

        // Halaman history harus 200 OK dengan empty state ramah tanpa error 500
        $responseHistory = $this->actingAs($orphanUser)->get('/mobile-attendance/history');
        $responseHistory->assertOk();
        $responseHistory->assertSee('Profil Pegawai Belum Ditautkan');

        // Endpoint PDF harus redirect ramah dengan pesan error tanpa crash 500
        $responsePdf = $this->actingAs($orphanUser)->get('/mobile-attendance/history/pdf');
        $responsePdf->assertRedirect('/mobile-attendance/history');
        $responsePdf->assertSessionHas('error', 'Akun Anda belum ditautkan ke data profil Relawan/Pegawai SPPG.');
    }
}
