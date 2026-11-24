<?php

namespace Tests\Feature;

use App\Models\AttendanceLocation;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendanceLocationManagementTest extends TestCase
{
    use RefreshDatabase;

    protected User $relawanUser;

    protected User $officerUser;

    protected User $umumUser;

    protected AttendanceLocation $location;

    protected function setUp(): void
    {
        parent::setUp();

        $this->location = AttendanceLocation::create([
            'name' => 'SPPG Kalisapu Sentral',
            'address' => 'Jl. Kalisapu No. 1, Slawi',
            'latitude' => -6.9048386,
            'longitude' => 109.1177696,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        $roleUser = Role::create(['name' => 'User']);
        $roleOfficer = Role::create(['name' => 'Officer']);
        $roleUmum = Role::create(['name' => 'Umum']);

        $this->relawanUser = User::factory()->create(['email' => 'relawan@arap.local']);
        $this->relawanUser->roles()->attach($roleUser);

        $this->officerUser = User::factory()->create(['email' => 'officer@arap.local']);
        $this->officerUser->roles()->attach($roleOfficer);

        $this->umumUser = User::factory()->create(['email' => 'umum@arap.local']);
        $this->umumUser->roles()->attach($roleUmum);
    }

    public function test_unauthenticated_user_cannot_access_locations_setting(): void
    {
        $response = $this->get('/admin/settings/locations');
        $response->assertRedirect('/login');
    }

    public function test_regular_user_and_officer_without_umum_role_get_403_forbidden(): void
    {
        $this->actingAs($this->relawanUser)->get('/admin/settings/locations')->assertForbidden();
        $this->actingAs($this->officerUser)->get('/admin/settings/locations')->assertForbidden();
    }

    public function test_umum_admin_can_view_locations_list(): void
    {
        $response = $this->actingAs($this->umumUser)->get('/admin/settings/locations');

        $response->assertOk();
        $response->assertViewIs('admin.settings.locations');
        $response->assertSee('SPPG Kalisapu Sentral');
        $response->assertSee('Master Lokasi Sentral & Radius Geofence', false);
    }

    public function test_umum_admin_can_create_new_location(): void
    {
        $payload = [
            'name' => 'Pos Distribusi Dapur 2',
            'address' => 'Jl. Slawi Barat No. 5',
            'latitude' => -6.9100000,
            'longitude' => 109.1200000,
            'radius_meters' => 150,
            'max_gps_accuracy_meters' => 60,
            'is_active' => false,
        ];

        $response = $this->actingAs($this->umumUser)->post('/admin/settings/locations', $payload);

        $response->assertRedirect('/admin/settings/locations');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('attendance_locations', [
            'name' => 'Pos Distribusi Dapur 2',
            'radius_meters' => 150,
            'is_active' => false,
        ]);
    }

    public function test_creating_new_location_with_is_active_true_deactivates_other_locations(): void
    {
        $payload = [
            'name' => 'Titik Sentral Baru SPPG',
            'address' => 'Jl. Raya Baru',
            'latitude' => -6.9200000,
            'longitude' => 109.1300000,
            'radius_meters' => 120,
            'max_gps_accuracy_meters' => 40,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->umumUser)->post('/admin/settings/locations', $payload);

        $response->assertRedirect('/admin/settings/locations');

        // Location lama harus menjadi nonaktif
        $this->assertDatabaseHas('attendance_locations', [
            'id' => $this->location->id,
            'is_active' => false,
        ]);

        // Location baru harus aktif
        $this->assertDatabaseHas('attendance_locations', [
            'name' => 'Titik Sentral Baru SPPG',
            'is_active' => true,
        ]);
    }

    public function test_validation_rejects_out_of_range_coordinates_and_radius(): void
    {
        $invalidPayload = [
            'name' => '',
            'latitude' => 120.0, // Invalid latitude (> 90)
            'longitude' => 200.0, // Invalid longitude (> 180)
            'radius_meters' => 5, // Invalid min radius (< 10)
            'max_gps_accuracy_meters' => 5000, // Invalid max accuracy (> 1000)
        ];

        $response = $this->actingAs($this->umumUser)->post('/admin/settings/locations', $invalidPayload);

        $response->assertSessionHasErrors([
            'name',
            'latitude',
            'longitude',
            'radius_meters',
            'max_gps_accuracy_meters',
        ]);
    }

    public function test_umum_admin_can_update_existing_location(): void
    {
        $payload = [
            'name' => 'SPPG Kalisapu Sentral Updated',
            'address' => 'Alamat baru terverifikasi',
            'latitude' => -6.9050000,
            'longitude' => 109.1180000,
            'radius_meters' => 200,
            'max_gps_accuracy_meters' => 45,
            'is_active' => true,
        ];

        $response = $this->actingAs($this->umumUser)->put("/admin/settings/locations/{$this->location->id}", $payload);

        $response->assertRedirect('/admin/settings/locations');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('attendance_locations', [
            'id' => $this->location->id,
            'name' => 'SPPG Kalisapu Sentral Updated',
            'radius_meters' => 200,
        ]);
    }

    public function test_cannot_deactivate_location_if_it_is_the_only_active_location(): void
    {
        // Mencoba update location satu-satunya dengan is_active = false
        $payload = [
            'name' => $this->location->name,
            'address' => $this->location->address,
            'latitude' => $this->location->latitude,
            'longitude' => $this->location->longitude,
            'radius_meters' => $this->location->radius_meters,
            'max_gps_accuracy_meters' => $this->location->max_gps_accuracy_meters,
            'is_active' => false,
        ];

        $response = $this->actingAs($this->umumUser)->put("/admin/settings/locations/{$this->location->id}", $payload);

        $response->assertSessionHas('error');
        $this->assertDatabaseHas('attendance_locations', [
            'id' => $this->location->id,
            'is_active' => true,
        ]);

        // Begitu juga jika memanggil endpoint toggle
        $toggleResponse = $this->actingAs($this->umumUser)->patch("/admin/settings/locations/{$this->location->id}/toggle");
        $toggleResponse->assertSessionHas('error');
        $this->assertDatabaseHas('attendance_locations', [
            'id' => $this->location->id,
            'is_active' => true,
        ]);
    }

    public function test_toggle_active_status_switches_active_location(): void
    {
        // Buat lokasi kedua yang nonaktif
        $secondLocation = AttendanceLocation::create([
            'name' => 'Gudang Kalisapu',
            'latitude' => -6.9060000,
            'longitude' => 109.1190000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => false,
        ]);

        // Toggle aktifkan lokasi kedua
        $response = $this->actingAs($this->umumUser)->patch("/admin/settings/locations/{$secondLocation->id}/toggle");
        $response->assertRedirect('/admin/settings/locations');
        $response->assertSessionHas('success');

        $this->assertTrue($secondLocation->fresh()->is_active);
        $this->assertFalse($this->location->fresh()->is_active);
    }
}
