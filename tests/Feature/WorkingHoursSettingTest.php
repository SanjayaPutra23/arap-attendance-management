<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WorkingHoursSettingTest extends TestCase
{
    use RefreshDatabase;

    protected User $relawanUser;

    protected User $officerUser;

    protected User $umumUser;

    protected function setUp(): void
    {
        parent::setUp();

        $roleUser = Role::create(['name' => 'User']);
        $roleOfficer = Role::create(['name' => 'Officer']);
        $roleUltraman = Role::create(['name' => 'Ultraman']);

        $this->relawanUser = User::factory()->create(['email' => 'relawan@arap.local']);
        $this->relawanUser->roles()->attach($roleUser);

        $this->officerUser = User::factory()->create(['email' => 'officer@arap.local']);
        $this->officerUser->roles()->attach($roleOfficer);

        $this->umumUser = User::factory()->create(['email' => 'admin@arap.local']);
        $this->umumUser->roles()->attach($roleUltraman);

        // Pre-seed some settings
        Setting::create(['name' => 'nama_instansi', 'value' => 'SPPG Kalisapu']);
        Setting::create(['name' => 'jam_datang_officer', 'value' => '08:00:00']);
        Setting::create(['name' => 'jam_pulang_officer', 'value' => '17:00:00']);
    }

    public function test_unauthenticated_user_cannot_access_working_hours(): void
    {
        $response = $this->get('/admin/settings/working-hours');
        $response->assertRedirect('/login');
    }

    public function test_regular_user_and_officer_without_umum_role_get_403_forbidden(): void
    {
        $this->actingAs($this->relawanUser)->get('/admin/settings/working-hours')->assertForbidden();
        $this->actingAs($this->officerUser)->get('/admin/settings/working-hours')->assertForbidden();
    }

    public function test_umum_admin_can_view_working_hours_page(): void
    {
        $response = $this->actingAs($this->umumUser)->get('/admin/settings/working-hours');

        $response->assertOk();
        $response->assertViewIs('admin.settings.working-hours');
        $response->assertSee('Pengaturan Jam Kerja Divisi & Officer SPPG', false);
        $response->assertSee('Officer SPPG');
        $response->assertSee('Divisi Persiapan');
        $response->assertSee('Divisi Pengolahan');
    }

    public function test_umum_admin_can_update_working_hours_for_divisions(): void
    {
        $payload = [
            'hours' => [
                'officer' => [
                    'jam_datang' => '07:30',
                    'jam_pulang' => '16:30',
                ],
                'persiapan' => [
                    'jam_datang' => '18:45',
                    'jam_pulang' => '02:45',
                ],
                'pengolahan' => [
                    'jam_datang' => '22:30:00',
                    'jam_pulang' => '06:30:00',
                ],
            ],
        ];

        $response = $this->actingAs($this->umumUser)->post('/admin/settings/working-hours', $payload);

        $response->assertRedirect('/admin/settings/working-hours');
        $response->assertSessionHas('success');

        // Pastikan setting diperbarui dengan format normalized HH:MM:SS
        $this->assertDatabaseHas('settings', [
            'name' => 'jam_datang_officer',
            'value' => '07:30:00',
        ]);
        $this->assertDatabaseHas('settings', [
            'name' => 'jam_pulang_officer',
            'value' => '16:30:00',
        ]);
        $this->assertDatabaseHas('settings', [
            'name' => 'jam_datang_persiapan',
            'value' => '18:45:00',
        ]);
        $this->assertDatabaseHas('settings', [
            'name' => 'jam_datang_pengolahan',
            'value' => '22:30:00',
        ]);
    }

    public function test_updating_working_hours_preserves_unrelated_settings(): void
    {
        $payload = [
            'hours' => [
                'officer' => [
                    'jam_datang' => '08:15',
                    'jam_pulang' => '17:15',
                ],
            ],
        ];

        $this->actingAs($this->umumUser)->post('/admin/settings/working-hours', $payload);

        // Setting nama_instansi tetap utuh
        $this->assertDatabaseHas('settings', [
            'name' => 'nama_instansi',
            'value' => 'SPPG Kalisapu',
        ]);
    }

    public function test_validation_rejects_invalid_time_format(): void
    {
        $invalidPayload = [
            'hours' => [
                'officer' => [
                    'jam_datang' => '25:99', // Jam tidak valid
                    'jam_pulang' => 'bukan_jam', // Format tidak valid
                ],
            ],
        ];

        $response = $this->actingAs($this->umumUser)->post('/admin/settings/working-hours', $invalidPayload);

        $response->assertSessionHasErrors([
            'hours.officer.jam_datang',
            'hours.officer.jam_pulang',
        ]);
    }
}
