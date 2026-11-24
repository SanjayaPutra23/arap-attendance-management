<?php

namespace Tests\Feature;

use App\Models\MobileAttendance;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPegawaiTest extends TestCase
{
    use RefreshDatabase;

    protected User $relawanUser;

    protected User $officerUser;

    protected User $umumUser;

    protected Role $roleUser;

    protected Role $roleOfficer;

    protected Role $roleUltraman;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roleUser = Role::create(['name' => 'User']);
        $this->roleOfficer = Role::create(['name' => 'Officer']);
        $this->roleUltraman = Role::create(['name' => 'Ultraman']);

        $this->relawanUser = User::factory()->create(['email' => 'relawan@arap.local']);
        $this->relawanUser->roles()->attach($this->roleUser);

        $this->officerUser = User::factory()->create(['email' => 'officer@arap.local']);
        $this->officerUser->roles()->attach($this->roleOfficer);

        $this->umumUser = User::factory()->create(['email' => 'admin@arap.local']);
        $this->umumUser->roles()->attach($this->roleUltraman);
    }

    public function test_unauthenticated_user_cannot_access_pegawai(): void
    {
        $response = $this->get('/admin/pegawai');
        $response->assertRedirect('/login');
    }

    public function test_relawan_and_officer_without_umum_role_get_403_forbidden(): void
    {
        $this->actingAs($this->relawanUser)->get('/admin/pegawai')->assertForbidden();
        $this->actingAs($this->officerUser)->get('/admin/pegawai')->assertForbidden();
    }

    public function test_umum_admin_can_view_pegawai_list_with_stats(): void
    {
        Peserta::create([
            'name' => 'Rahmat Hidayat',
            'nik' => '3328010101010001',
            'uid' => 101,
            'jabatan' => 'Officer',
            'type' => 'officer',
        ]);

        Peserta::create([
            'name' => 'Dewi Sartika',
            'nik' => '3328010101010002',
            'uid' => 102,
            'jabatan' => 'Persiapan',
            'type' => 'relawan',
        ]);

        $response = $this->actingAs($this->umumUser)->get('/admin/pegawai');

        $response->assertOk();
        $response->assertViewIs('admin.pegawai.index');
        $response->assertSee('Rahmat Hidayat');
        $response->assertSee('Dewi Sartika');
        $response->assertSee('Officer SPPG');
        $response->assertSee('Persiapan');
    }

    public function test_umum_admin_can_filter_pegawai_by_division_and_search(): void
    {
        Peserta::create([
            'name' => 'Ahmad Dahlan',
            'nik' => '3328010101010003',
            'jabatan' => 'Officer',
        ]);

        Peserta::create([
            'name' => 'Siti Walidah',
            'nik' => '3328010101010004',
            'jabatan' => 'Pengolahan',
        ]);

        // Filter divisi officer
        $responseOfficer = $this->actingAs($this->umumUser)->get('/admin/pegawai?divisi=officer');
        $responseOfficer->assertOk();
        $responseOfficer->assertSee('Ahmad Dahlan');
        $responseOfficer->assertDontSee('Siti Walidah');

        // Search by NIK
        $responseSearch = $this->actingAs($this->umumUser)->get('/admin/pegawai?search=3328010101010004');
        $responseSearch->assertOk();
        $responseSearch->assertSee('Siti Walidah');
        $responseSearch->assertDontSee('Ahmad Dahlan');
    }

    public function test_umum_admin_can_store_pegawai_without_account(): void
    {
        $payload = [
            'name' => 'Bambang Sudarmono',
            'nik' => '3328010101010005',
            'uid' => 205,
            'jabatan' => 'Distribusi',
            'type' => 'relawan',
            'telp' => '081298765432',
            'create_account' => false,
        ];

        $response = $this->actingAs($this->umumUser)->post('/admin/pegawai', $payload);

        $response->assertRedirect('/admin/pegawai');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('pesertas', [
            'name' => 'Bambang Sudarmono',
            'nik' => '3328010101010005',
            'jabatan' => 'Distribusi',
        ]);

        $this->assertDatabaseMissing('users', [
            'nik' => '3328010101010005',
        ]);
    }

    public function test_umum_admin_can_store_pegawai_with_login_account_and_officer_role(): void
    {
        $payload = [
            'name' => 'Kapten Aslap',
            'nik' => '3328010101010006',
            'uid' => 206,
            'jabatan' => 'Officer',
            'type' => 'officer',
            'telp' => '081122334455',
            'create_account' => true,
            'email' => 'aslap@arap.local',
            'password' => 'secret123',
            'role' => 'Officer',
        ];

        $response = $this->actingAs($this->umumUser)->post('/admin/pegawai', $payload);

        $response->assertRedirect('/admin/pegawai');
        $response->assertSessionHas('success');

        $peserta = Peserta::where('nik', '3328010101010006')->first();
        $this->assertNotNull($peserta);

        $user = User::where('email', 'aslap@arap.local')->first();
        $this->assertNotNull($user);
        $this->assertEquals($peserta->id, $user->peserta_id);
        $this->assertTrue($user->hasRole('Officer'));
    }

    public function test_store_pegawai_validates_unique_nik_and_email(): void
    {
        Peserta::create([
            'name' => 'Existing Peserta',
            'nik' => '3328010101010007',
            'jabatan' => 'Kebersihan',
        ]);

        $payload = [
            'name' => 'Duplicate Peserta',
            'nik' => '3328010101010007', // Duplicate
            'jabatan' => 'Kebersihan',
            'create_account' => true,
            'email' => 'relawan@arap.local', // Duplicate email
            'password' => 'secret123',
        ];

        $response = $this->actingAs($this->umumUser)->post('/admin/pegawai', $payload);

        $response->assertSessionHasErrors(['nik', 'email']);
    }

    public function test_umum_admin_can_update_pegawai_and_manage_account(): void
    {
        $peserta = Peserta::create([
            'name' => 'Joko Widodo',
            'nik' => '3328010101010008',
            'jabatan' => 'Ompreng',
            'type' => 'relawan',
        ]);

        $payload = [
            'name' => 'Joko Widodo Updated',
            'nik' => '3328010101010008',
            'uid' => 208,
            'jabatan' => 'Officer', // Promoted to officer
            'type' => 'officer',
            'telp' => '081344556677',
            'manage_account' => true,
            'email' => 'joko.widodo@arap.local',
            'password' => 'newpassword123',
            'role' => 'Officer',
        ];

        $response = $this->actingAs($this->umumUser)->put("/admin/pegawai/{$peserta->id}", $payload);

        $response->assertRedirect('/admin/pegawai');
        $response->assertSessionHas('success');

        $peserta->refresh();
        $this->assertEquals('Joko Widodo Updated', $peserta->name);
        $this->assertEquals('Officer', $peserta->jabatan);

        $user = $peserta->user;
        $this->assertNotNull($user);
        $this->assertEquals('joko.widodo@arap.local', $user->email);
        $this->assertTrue($user->hasRole('Officer'));
    }

    public function test_cannot_delete_pegawai_with_historical_presensi(): void
    {
        $peserta = Peserta::create([
            'name' => 'Relawan Bersejarah',
            'nik' => '3328010101010009',
            'uid' => 999,
            'jabatan' => 'Persiapan',
        ]);

        // Berikan rekaman mobile attendance
        MobileAttendance::create([
            'peserta_id' => $peserta->id,
            'attendance_date' => '2026-11-24',
            'status' => 'hadir',
            'score' => 1.0,
        ]);

        $response = $this->actingAs($this->umumUser)->delete("/admin/pegawai/{$peserta->id}");

        $response->assertSessionHas('error');
        $this->assertDatabaseHas('pesertas', ['id' => $peserta->id]);
    }

    public function test_cannot_delete_pegawai_with_pools_history(): void
    {
        $peserta = Peserta::create([
            'name' => 'Relawan Mesin Pools',
            'nik' => '3328010101010010',
            'uid' => 777,
            'jabatan' => 'Pemorsian',
        ]);

        // Berikan rekaman pools fingerprint
        Pool::create([
            'iduser' => 777,
            'date' => '2026-10-25',
            'time' => '07:00:00',
        ]);

        $response = $this->actingAs($this->umumUser)->delete("/admin/pegawai/{$peserta->id}");

        $response->assertSessionHas('error');
        $this->assertDatabaseHas('pesertas', ['id' => $peserta->id]);
    }

    public function test_can_delete_pegawai_without_history(): void
    {
        $peserta = Peserta::create([
            'name' => 'Pegawai Baru Tanpa Log',
            'nik' => '3328010101010011',
            'jabatan' => 'Kebersihan',
        ]);

        $response = $this->actingAs($this->umumUser)->delete("/admin/pegawai/{$peserta->id}");

        $response->assertRedirect('/admin/pegawai');
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('pesertas', ['id' => $peserta->id]);
    }
}
