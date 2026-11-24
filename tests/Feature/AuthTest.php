<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test 1: Tamu (guest) yang mengakses dashboard diarahkan ke halaman login.
     */
    public function test_guest_is_redirected_to_login(): void
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /**
     * Test 2: Halaman login dapat dirender dengan sukses (status 200).
     */
    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('ARAP v2');
        $response->assertSee('Masuk');
    }

    /**
     * Test 3: Pengguna dapat login menggunakan email dan melakukan logout.
     */
    public function test_user_can_login_with_email_and_logout(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@sppg.id',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@sppg.id',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/dashboard');

        // Logout
        $logoutResponse = $this->post('/logout');
        $this->assertGuest();
        $logoutResponse->assertRedirect('/');
    }

    /**
     * Test 4: Relawan/Pegawai dapat login menggunakan NIK sebagai kredensial login.
     */
    public function test_user_can_login_with_nik(): void
    {
        $user = User::factory()->create([
            'email' => 'relawan@sppg.id',
            'nik' => '1051',
            'password' => Hash::make('secret123'),
        ]);

        $response = $this->post('/login', [
            'email' => '1051',
            'password' => 'secret123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect('/dashboard');
    }

    /**
     * Test 5: Pengujian otorisasi RBAC Gates pasca-cleanup peran (Ultraman, Officer, User).
     */
    public function test_rbac_gates(): void
    {
        $roleUltraman = Role::create(['name' => 'Ultraman']);
        $roleOfficer = Role::create(['name' => 'Officer']);
        $roleRelawan = Role::create(['name' => 'User']);

        // 1. User Ultraman (Super Admin / Admin Utama)
        $superAdmin = User::factory()->create();
        $superAdmin->roles()->attach($roleUltraman);

        $this->assertTrue(Gate::forUser($superAdmin)->allows('ultraman'));
        $this->assertTrue(Gate::forUser($superAdmin)->allows('umum'));
        $this->assertTrue(Gate::forUser($superAdmin)->allows('staff-access'));
        $this->assertTrue(Gate::forUser($superAdmin)->allows('user'));

        // 2. User Officer (Staff Lapangan Terotorisasi)
        $userOfficer = User::factory()->create();
        $userOfficer->roles()->attach($roleOfficer);

        $this->assertFalse(Gate::forUser($userOfficer)->allows('ultraman'));
        $this->assertFalse(Gate::forUser($userOfficer)->allows('umum'));
        $this->assertTrue(Gate::forUser($userOfficer)->allows('staff-access'));
        $this->assertTrue(Gate::forUser($userOfficer)->allows('user'));

        // 3. User Relawan Biasa (Role: User)
        $userRelawan = User::factory()->create();
        $userRelawan->roles()->attach($roleRelawan);

        $this->assertFalse(Gate::forUser($userRelawan)->allows('ultraman'));
        $this->assertFalse(Gate::forUser($userRelawan)->allows('umum'));
        $this->assertFalse(Gate::forUser($userRelawan)->allows('staff-access'));
        $this->assertTrue(Gate::forUser($userRelawan)->allows('user'));
    }
}
