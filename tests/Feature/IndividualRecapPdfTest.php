<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Peserta;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndividualRecapPdfTest extends TestCase
{
    use RefreshDatabase;

    protected Role $roleUltraman;

    protected Role $roleOfficer;

    protected Role $roleUser;

    protected User $adminUser;

    protected User $officerUser;

    protected User $relawanUser;

    protected Peserta $peserta;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roleUltraman = Role::create(['name' => 'Ultraman']);
        $this->roleOfficer = Role::create(['name' => 'Officer']);
        $this->roleUser = Role::create(['name' => 'User']);

        $this->adminUser = User::factory()->create(['email' => 'admin.pdf@arap.local']);
        $this->adminUser->roles()->attach($this->roleUltraman);

        $this->officerUser = User::factory()->create(['email' => 'officer.pdf@arap.local']);
        $this->officerUser->roles()->attach($this->roleOfficer);

        $this->relawanUser = User::factory()->create(['email' => 'relawan.pdf@arap.local']);
        $this->relawanUser->roles()->attach($this->roleUser);

        $this->peserta = Peserta::create([
            'name' => 'Ahmad Santoso',
            'nik' => '3328010101900001',
            'jabatan' => 'Pengolahan',
            'uid' => '101',
            'telp' => '081234567890',
        ]);
        $this->relawanUser->update(['peserta_id' => $this->peserta->id, 'nik' => $this->peserta->nik]);
    }

    public function test_guest_cannot_download_individual_pdf(): void
    {
        $response = $this->get("/admin/rekap/{$this->peserta->id}/pdf");

        $response->assertRedirect('/login');
    }

    public function test_regular_user_cannot_download_individual_pdf(): void
    {
        $response = $this->actingAs($this->relawanUser)->get("/admin/rekap/{$this->peserta->id}/pdf");

        $response->assertForbidden();
    }

    public function test_admin_can_download_individual_pdf_bulanan(): void
    {
        $response = $this->actingAs($this->adminUser)->get("/admin/rekap/{$this->peserta->id}/pdf?mode=bulanan&year=2026&month=11");

        $response->assertOk();
        $response->assertHeader('content-type', 'application/pdf');

        $content = $response->getContent();
        $this->assertNotEmpty($content);
        $this->assertStringStartsWith('%PDF', $content);
    }

    public function test_officer_can_download_individual_pdf_mingguan(): void
    {
        $response = $this->actingAs($this->officerUser)->get("/admin/rekap/{$this->peserta->id}/pdf?mode=mingguan&date=2026-11-24");

        $response->assertOk();
        $response->assertHeader('content-type', 'application/pdf');

        $content = $response->getContent();
        $this->assertNotEmpty($content);
        $this->assertStringStartsWith('%PDF', $content);
    }

    public function test_returns_404_for_invalid_peserta(): void
    {
        $response = $this->actingAs($this->adminUser)->get('/admin/rekap/99999/pdf');

        $response->assertNotFound();
    }
}
