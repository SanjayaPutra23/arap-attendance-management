<?php

namespace Tests\Feature;

use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Role;
use App\Models\User;
use App\Services\AttendanceRecapService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminPegawaiActiveAndDefaultPasswordTest extends TestCase
{
    use RefreshDatabase;

    protected User $relawanUser;

    protected User $adminUser;

    protected Role $roleUser;

    protected Role $roleUltraman;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roleUser = Role::create(['name' => 'User']);
        $this->roleUltraman = Role::create(['name' => 'Ultraman']);

        $this->relawanUser = User::factory()->create(['email' => 'relawan@arap.local']);
        $this->relawanUser->roles()->attach($this->roleUser);

        $this->adminUser = User::factory()->create(['email' => 'admin@arap.local']);
        $this->adminUser->roles()->attach($this->roleUltraman);
    }

    public function test_admin_can_toggle_pegawai_active_status(): void
    {
        $peserta = Peserta::create([
            'name' => 'Riski Ompreng',
            'nik' => '1051',
            'uid' => 1051,
            'jabatan' => 'Ompreng',
            'is_active' => true,
        ]);

        // Nonaktifkan
        $response = $this->actingAs($this->adminUser)
            ->from('/admin/pegawai')
            ->patch("/admin/pegawai/{$peserta->id}/toggle-status");

        $response->assertRedirect('/admin/pegawai');
        $response->assertSessionHas('success');

        $peserta->refresh();
        $this->assertFalse($peserta->is_active);

        // Aktifkan kembali
        $response2 = $this->actingAs($this->adminUser)
            ->from('/admin/pegawai')
            ->patch("/admin/pegawai/{$peserta->id}/toggle-status");

        $response2->assertRedirect('/admin/pegawai');
        $response2->assertSessionHas('success');

        $peserta->refresh();
        $this->assertTrue($peserta->is_active);
    }

    public function test_unauthorized_user_cannot_toggle_pegawai_status(): void
    {
        $peserta = Peserta::create([
            'name' => 'Pegawai Uji',
            'nik' => '1099',
            'uid' => 1099,
            'jabatan' => 'Persiapan',
            'is_active' => true,
        ]);

        $this->actingAs($this->relawanUser)
            ->patch("/admin/pegawai/{$peserta->id}/toggle-status")
            ->assertForbidden();

        $peserta->refresh();
        $this->assertTrue($peserta->is_active);
    }

    public function test_inactive_pegawai_cannot_login_and_gets_clear_error_message(): void
    {
        $peserta = Peserta::create([
            'name' => 'Relawan Nonaktif',
            'nik' => '1088',
            'uid' => 1088,
            'jabatan' => 'Kebersihan',
            'is_active' => false,
        ]);

        $user = User::create([
            'name' => 'Relawan Nonaktif',
            'email' => 'nonaktif@arap.local',
            'password' => Hash::make('password123'),
            'peserta_id' => $peserta->id,
        ]);
        $user->roles()->attach($this->roleUser);

        // Percobaan login
        $response = $this->post('/login', [
            'email' => 'nonaktif@arap.local',
            'password' => 'password123',
        ]);

        $response->assertSessionHasErrors([
            'email' => 'Akun Anda berstatus nonaktif. Silakan hubungi Admin/Tata Usaha SPPG Kalisapu.',
        ]);
        $this->assertGuest();

        // Aktifkan kembali peserta
        $peserta->update(['is_active' => true]);

        // Login ulang harus berhasil
        $response2 = $this->post('/login', [
            'email' => 'nonaktif@arap.local',
            'password' => 'password123',
        ]);

        $response2->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_creates_pegawai_with_empty_password_defaults_to_nik_or_uid(): void
    {
        $payload = [
            'name' => 'Riski Baru',
            'nik' => '1051',
            'uid' => 1051,
            'jabatan' => 'Ompreng',
            'type' => 'relawan',
            'create_account' => '1',
            'email' => 'riski.ompreng@arap.local',
            'password' => '', // Dikosongkan agar otomatis default = NIK
            'role' => 'User',
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/pegawai', $payload);

        $response->assertRedirect('/admin/pegawai');
        $response->assertSessionHas('success');

        $peserta = Peserta::where('nik', '1051')->first();
        $this->assertNotNull($peserta);
        $this->assertTrue($peserta->is_active);

        $user = $peserta->user;
        $this->assertNotNull($user);
        $this->assertEquals('riski.ompreng@arap.local', $user->email);

        // Verifikasi login menggunakan NIK '1051' sebagai password
        $this->post('/logout');
        $loginResponse = $this->post('/login', [
            'email' => 'riski.ompreng@arap.local',
            'password' => '1051',
        ]);

        $loginResponse->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_admin_creates_pegawai_with_short_custom_password_succeeds(): void
    {
        $payload = [
            'name' => 'Budi Pendek',
            'nik' => '1052',
            'uid' => 1052,
            'jabatan' => 'Persiapan',
            'type' => 'relawan',
            'create_account' => '1',
            'email' => 'budi.pendek@arap.local',
            'password' => '1234', // Kurang dari 6 karakter diizinkan untuk kemudahan admin
            'role' => 'User',
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/pegawai', $payload);

        $response->assertRedirect('/admin/pegawai');
        $response->assertSessionHas('success');

        $user = User::where('email', 'budi.pendek@arap.local')->first();
        $this->assertNotNull($user);

        // Verifikasi login dengan password 4 karakter
        $this->post('/logout');
        $loginResponse = $this->post('/login', [
            'email' => 'budi.pendek@arap.local',
            'password' => '1234',
        ]);

        $loginResponse->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_inactive_pegawai_excluded_from_active_scope_and_recap(): void
    {
        $aktif = Peserta::create([
            'name' => 'Pegawai Aktif',
            'nik' => '2001',
            'uid' => 2001,
            'jabatan' => 'Persiapan',
            'is_active' => true,
        ]);

        $nonaktif = Peserta::create([
            'name' => 'Pegawai Resign',
            'nik' => '2002',
            'uid' => 2002,
            'jabatan' => 'Persiapan',
            'is_active' => false,
        ]);

        // Scope Peserta::active()
        $activeList = Peserta::active()->get();
        $this->assertTrue($activeList->contains('id', $aktif->id));
        $this->assertFalse($activeList->contains('id', $nonaktif->id));

        // Recap Service
        $recapService = app(AttendanceRecapService::class);
        $recap = $recapService->generateRecap(2026, 11);

        $recapPesertaIds = collect($recap['records'])->pluck('peserta.id')->toArray();
        $this->assertContains($aktif->id, $recapPesertaIds);
        $this->assertNotContains($nonaktif->id, $recapPesertaIds);
    }

    public function test_arsip_fingerprint_detects_orphan_uids(): void
    {
        // Peserta terdaftar
        Peserta::create([
            'name' => 'Terdaftar',
            'nik' => '1051',
            'uid' => 1051,
            'jabatan' => 'Ompreng',
            'is_active' => true,
        ]);

        // Pool untuk peserta terdaftar
        Pool::create([
            'iduser' => 1051,
            'date' => '2026-11-20',
            'time' => '07:00:00',
        ]);

        // Pool untuk UID orphan (misal 1059 di mesin fisik tapi belum diupdate di pesertas)
        Pool::create([
            'iduser' => 1059,
            'date' => '2026-11-25',
            'time' => '12:45:00',
        ]);

        $response = $this->actingAs($this->adminUser)->get('/admin/arsip-fingerprint');
        $response->assertOk();
        $response->assertSee('UID Mesin Belum Terdaftar di Master Pegawai');
        $response->assertSee('1059');
    }

    public function test_attendance_recap_evaluates_checkout_when_multiple_scans_have_gap(): void
    {
        $peserta = Peserta::create([
            'name' => 'Riski Ompreng Test',
            'nik' => '1051',
            'uid' => 1051,
            'jabatan' => 'Ompreng',
            'is_active' => true,
        ]);

        // Scan 1: Masuk jam 12:45:00
        Pool::create([
            'iduser' => 1051,
            'date' => '2026-11-15',
            'time' => '12:45:00',
            'type' => 0,
        ]);

        // Scan 2: Pulang jam 21:05:00 (selisih > 300 detik)
        Pool::create([
            'iduser' => 1051,
            'date' => '2026-11-15',
            'time' => '21:05:00',
            'type' => 0,
        ]);

        $recapService = app(AttendanceRecapService::class);
        $recap = $recapService->generateRecap(2026, 11);

        $record = collect($recap['records'])->firstWhere('peserta.id', $peserta->id);
        $this->assertNotNull($record);

        $daily = $record['daily']['2026-11-15'] ?? null;
        $this->assertNotNull($daily);
        $this->assertEquals('12:45:00', $daily['check_in']);
        $this->assertEquals('21:05:00', $daily['check_out']);
        $this->assertEquals('Fingerprint', $daily['source']);
    }
}
