<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Libur;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AdminLiburTest extends TestCase
{
    use RefreshDatabase;

    protected Role $roleUltraman;

    protected Role $roleOfficer;

    protected Role $roleUser;

    protected User $adminUser;

    protected User $officerUser;

    protected User $relawanUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roleUltraman = Role::create(['name' => 'Ultraman']);
        $this->roleOfficer = Role::create(['name' => 'Officer']);
        $this->roleUser = Role::create(['name' => 'User']);

        $this->adminUser = User::factory()->create(['email' => 'admin.libur@arap.local']);
        $this->adminUser->roles()->attach($this->roleUltraman);

        $this->officerUser = User::factory()->create(['email' => 'officer.libur@arap.local']);
        $this->officerUser->roles()->attach($this->roleOfficer);

        $this->relawanUser = User::factory()->create(['email' => 'relawan.libur@arap.local']);
        $this->relawanUser->roles()->attach($this->roleUser);
    }

    public function test_guest_cannot_access_libur_index(): void
    {
        $response = $this->get('/admin/libur');

        $response->assertRedirect('/login');
    }

    public function test_regular_user_cannot_access_libur_index(): void
    {
        $response = $this->actingAs($this->relawanUser)->get('/admin/libur');

        $response->assertForbidden();
    }

    public function test_officer_cannot_access_libur_index(): void
    {
        $response = $this->actingAs($this->officerUser)->get('/admin/libur');

        $response->assertForbidden();
    }

    public function test_admin_can_view_libur_index_and_filter_by_year(): void
    {
        Libur::create(['tanggal' => '2025-12-25', 'ket' => 'Hari Raya Natal 2025']);
        Libur::create(['tanggal' => '2026-08-17', 'ket' => 'HUT RI ke-81']);

        $response = $this->actingAs($this->adminUser)->get('/admin/libur?year=2026');

        $response->assertOk();
        $response->assertSee('HUT RI ke-81');
        $response->assertDontSee('Hari Raya Natal 2025');
    }

    public function test_admin_can_search_libur_by_keterangan(): void
    {
        Libur::create(['tanggal' => '2026-05-01', 'ket' => 'Hari Buruh Internasional']);
        Libur::create(['tanggal' => '2026-06-01', 'ket' => 'Hari Lahir Pancasila']);

        $response = $this->actingAs($this->adminUser)->get('/admin/libur?search=Buruh');

        $response->assertOk();
        $response->assertSee('Hari Buruh Internasional');
        $response->assertDontSee('Hari Lahir Pancasila');
    }

    public function test_admin_can_create_new_holiday(): void
    {
        $response = $this->actingAs($this->adminUser)->post('/admin/libur', [
            'tanggal' => '2026-12-25',
            'ket' => 'Hari Raya Natal 2026',
        ]);

        $response->assertRedirect('/admin/libur?year=2026');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('liburs', [
            'tanggal' => '2026-12-25',
            'ket' => 'Hari Raya Natal 2026',
        ]);
        $this->assertTrue(Libur::isLibur('2026-12-25'));
    }

    public function test_create_holiday_rejects_duplicate_date(): void
    {
        Libur::create(['tanggal' => '2026-01-01', 'ket' => 'Tahun Baru 2026']);

        $response = $this->actingAs($this->adminUser)->post('/admin/libur', [
            'tanggal' => '2026-01-01',
            'ket' => 'Tahun Baru Masehi Duplikat',
        ]);

        $response->assertSessionHasErrors('tanggal');
        $this->assertDatabaseCount('liburs', 1);
    }

    public function test_admin_can_update_holiday(): void
    {
        $libur = Libur::create(['tanggal' => '2026-03-30', 'ket' => 'Hari Raya Nyepi']);

        $response = $this->actingAs($this->adminUser)->put("/admin/libur/{$libur->id}", [
            'tanggal' => '2026-03-30',
            'ket' => 'Hari Suci Nyepi Tahun Baru Saka 1948',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('liburs', [
            'id' => $libur->id,
            'ket' => 'Hari Suci Nyepi Tahun Baru Saka 1948',
        ]);
    }

    public function test_admin_can_delete_holiday(): void
    {
        $libur = Libur::create(['tanggal' => '2026-10-10', 'ket' => 'Libur Khusus']);

        $response = $this->actingAs($this->adminUser)->delete("/admin/libur/{$libur->id}");

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseMissing('liburs', ['id' => $libur->id]);
        $this->assertFalse(Libur::isLibur('2026-10-10'));
    }

    public function test_sync_api_imports_holidays_successfully_using_fake_http(): void
    {
        Http::fake([
            'dayoffapi.vercel.app/*' => Http::response([
                [
                    'tanggal' => '2027-01-01',
                    'keterangan' => 'Tahun Baru 2027 Masehi',
                    'is_cuti' => false,
                ],
                [
                    'tanggal' => '2027-08-17',
                    'keterangan' => 'Hari Kemerdekaan RI',
                    'is_cuti' => false,
                ],
            ], 200),
        ]);

        $response = $this->actingAs($this->adminUser)->post('/admin/libur/sync-api', [
            'target_year' => 2027,
        ]);

        $response->assertRedirect('/admin/libur?year=2027');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('liburs', [
            'tanggal' => '2027-01-01',
            'ket' => 'Tahun Baru 2027 Masehi',
        ]);
        $this->assertDatabaseHas('liburs', [
            'tanggal' => '2027-08-17',
            'ket' => 'Hari Kemerdekaan RI',
        ]);
    }

    public function test_sync_api_skips_existing_duplicates_without_error(): void
    {
        Libur::create(['tanggal' => '2027-01-01', 'ket' => 'Tahun Baru 2027 Sudah Ada']);

        Http::fake([
            'dayoffapi.vercel.app/*' => Http::response([
                [
                    'tanggal' => '2027-01-01',
                    'keterangan' => 'Tahun Baru 2027 Baru',
                    'is_cuti' => false,
                ],
            ], 200),
        ]);

        $response = $this->actingAs($this->adminUser)->post('/admin/libur/sync-api', [
            'target_year' => 2027,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        // Harus tetap ada 1 dan tidak berubah
        $this->assertEquals(1, Libur::where('tanggal', '2027-01-01')->count());
        $this->assertEquals('Tahun Baru 2027 Sudah Ada', Libur::where('tanggal', '2027-01-01')->first()->ket);
    }

    public function test_sync_api_handles_connection_failure_gracefully(): void
    {
        Http::fake([
            '*' => Http::response('Gateway Timeout', 504),
        ]);

        $response = $this->actingAs($this->adminUser)->post('/admin/libur/sync-api', [
            'target_year' => 2027,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('error');
    }
}
