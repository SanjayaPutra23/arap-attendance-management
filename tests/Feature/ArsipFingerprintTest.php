<?php

namespace Tests\Feature;

use App\Models\Mesin;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArsipFingerprintTest extends TestCase
{
    use RefreshDatabase;

    protected User $relawanUser;

    protected User $staffUser;

    protected Mesin $mesin;

    protected Peserta $peserta;

    protected function setUp(): void
    {
        parent::setUp();

        $roleUser = Role::create(['name' => 'User']);
        $roleOfficer = Role::create(['name' => 'Officer']);

        $this->relawanUser = User::factory()->create(['name' => 'Relawan User']);
        $this->relawanUser->roles()->attach($roleUser);

        $this->staffUser = User::factory()->create(['name' => 'Staf Officer']);
        $this->staffUser->roles()->attach($roleOfficer);

        $this->mesin = Mesin::create([
            'name' => 'FPDAPUR1',
            'tipe' => 'ZKTeco',
            'ip' => '192.168.1.201',
            'port' => '4370',
        ]);

        $this->peserta = Peserta::create([
            'name' => 'Joni Setiawan',
            'nik' => '3328000000000001',
            'uid' => 1055,
            'jabatan' => 'Persiapan',
        ]);
    }

    public function test_unauthenticated_user_cannot_access_arsip_fingerprint(): void
    {
        $this->get('/admin/arsip-fingerprint')->assertRedirect('/login');
    }

    public function test_non_staff_gets_403_forbidden(): void
    {
        $this->actingAs($this->relawanUser)->get('/admin/arsip-fingerprint')->assertForbidden();
    }

    public function test_staff_can_view_arsip_fingerprint_list_and_stats(): void
    {
        Pool::create([
            'iduser' => 1055,
            'date' => '2026-10-25',
            'time' => '07:15:22',
            'mesin_id' => $this->mesin->id,
            'state' => 1,
            'type' => 0,
        ]);

        $response = $this->actingAs($this->staffUser)->get('/admin/arsip-fingerprint');

        $response->assertOk();
        $response->assertViewIs('admin.arsip-fingerprint.index');
        $response->assertSee('Arsip Log Mesin Fingerprint');
        $response->assertSee('Joni Setiawan');
        $response->assertSee('1055');
        $response->assertSee('FPDAPUR1');
        $response->assertSee('07:15:22');
    }

    public function test_arsip_fingerprint_filters_by_date_range_and_machine(): void
    {
        $mesin2 = Mesin::create([
            'name' => 'FPPINTU2',
            'tipe' => 'ZKTeco',
            'ip' => '192.168.1.202',
        ]);

        Pool::create([
            'iduser' => 1055,
            'date' => '2026-10-25',
            'time' => '07:00:00',
            'mesin_id' => $this->mesin->id,
        ]);

        Pool::create([
            'iduser' => 1055,
            'date' => '2026-11-05',
            'time' => '08:00:00',
            'mesin_id' => $mesin2->id,
        ]);

        // Filter date October
        $responseDate = $this->actingAs($this->staffUser)->get('/admin/arsip-fingerprint?start_date=2026-10-20&end_date=2026-10-31');
        $responseDate->assertOk();
        $responseDate->assertSee('07:00:00');
        $responseDate->assertDontSee('08:00:00');

        // Filter machine mesin2
        $responseMesin = $this->actingAs($this->staffUser)->get("/admin/arsip-fingerprint?mesin_id={$mesin2->id}");
        $responseMesin->assertOk();
        $responseMesin->assertSee('08:00:00');
        $responseMesin->assertDontSee('07:00:00');
    }
}
