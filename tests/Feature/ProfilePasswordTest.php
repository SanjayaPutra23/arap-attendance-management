<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfilePasswordTest extends TestCase
{
    use RefreshDatabase;

    protected Role $roleUser;

    protected Role $roleOfficer;

    protected Role $roleUltraman;

    protected User $relawanUser;

    protected User $officerUser;

    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roleUser = Role::create(['name' => 'User']);
        $this->roleOfficer = Role::create(['name' => 'Officer']);
        $this->roleUltraman = Role::create(['name' => 'Ultraman']);

        $this->relawanUser = User::factory()->create([
            'email' => 'relawan.pass@arap.local',
            'password' => Hash::make('password123'),
        ]);
        $this->relawanUser->roles()->attach($this->roleUser);

        $this->officerUser = User::factory()->create([
            'email' => 'officer.pass@arap.local',
            'password' => Hash::make('password123'),
        ]);
        $this->officerUser->roles()->attach($this->roleOfficer);

        $this->adminUser = User::factory()->create([
            'email' => 'admin.pass@arap.local',
            'password' => Hash::make('password123'),
        ]);
        $this->adminUser->roles()->attach($this->roleUltraman);
    }

    public function test_guest_cannot_access_profile_password(): void
    {
        $response = $this->get('/profile/password');

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_profile_password_page(): void
    {
        $response = $this->actingAs($this->relawanUser)->get('/profile/password');

        $response->assertOk();
        $response->assertSee('Ganti Kata Sandi');
        $response->assertSee('Kata Sandi Saat Ini');
        $response->assertSee('Kata Sandi Baru');
    }

    public function test_user_can_update_password_with_valid_current_password(): void
    {
        $response = $this->actingAs($this->relawanUser)->put('/profile/password', [
            'current_password' => 'password123',
            'password' => 'NewSecretPassword88!',
            'password_confirmation' => 'NewSecretPassword88!',
        ]);

        $response->assertRedirect('/profile/password');
        $response->assertSessionHas('success');

        // Verifikasi password baru di-hash dan bisa digunakan login
        $this->relawanUser->refresh();
        $this->assertTrue(Hash::check('NewSecretPassword88!', $this->relawanUser->password));

        $this->post('/logout');
        $loginResponse = $this->post('/login', [
            'email' => $this->relawanUser->email,
            'password' => 'NewSecretPassword88!',
        ]);
        $loginResponse->assertRedirect('/dashboard');
    }

    public function test_officer_and_admin_can_also_update_password(): void
    {
        $response = $this->actingAs($this->adminUser)->put('/profile/password', [
            'current_password' => 'password123',
            'password' => 'AdminSuper2026#',
            'password_confirmation' => 'AdminSuper2026#',
        ]);

        $response->assertRedirect('/profile/password');
        $response->assertSessionHas('success');

        $this->adminUser->refresh();
        $this->assertTrue(Hash::check('AdminSuper2026#', $this->adminUser->password));
    }

    public function test_update_password_fails_if_current_password_incorrect(): void
    {
        $response = $this->actingAs($this->relawanUser)->put('/profile/password', [
            'current_password' => 'wrongpassword',
            'password' => 'NewSecretPassword88!',
            'password_confirmation' => 'NewSecretPassword88!',
        ]);

        $response->assertSessionHasErrors('current_password');
        $this->relawanUser->refresh();
        $this->assertTrue(Hash::check('password123', $this->relawanUser->password));
    }

    public function test_update_password_fails_if_new_password_is_too_short(): void
    {
        $response = $this->actingAs($this->relawanUser)->put('/profile/password', [
            'current_password' => 'password123',
            'password' => 'short',
            'password_confirmation' => 'short',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_update_password_fails_if_confirmation_does_not_match(): void
    {
        $response = $this->actingAs($this->relawanUser)->put('/profile/password', [
            'current_password' => 'password123',
            'password' => 'NewSecretPassword88!',
            'password_confirmation' => 'DifferentPassword88!',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_update_password_fails_if_new_password_is_same_as_current(): void
    {
        $response = $this->actingAs($this->relawanUser)->put('/profile/password', [
            'current_password' => 'password123',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors('password');
    }
}
