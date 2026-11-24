<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Mesin;
use App\Models\Pool;
use App\Models\Role;
use App\Models\User;
use App\Services\ZKTeco\ZKTecoClientInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Mockery;
use Tests\TestCase;

class AdminMesinAndSyncTest extends TestCase
{
    use RefreshDatabase;

    protected Role $roleUltraman;

    protected Role $roleOfficer;

    protected Role $roleUser;

    protected User $adminUser;

    protected User $officerUser;

    protected User $relawanUser;

    protected Mesin $mesinIp;

    protected Mesin $mesinUsb;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roleUltraman = Role::create(['name' => 'Ultraman']);
        $this->roleOfficer = Role::create(['name' => 'Officer']);
        $this->roleUser = Role::create(['name' => 'User']);

        $this->adminUser = User::factory()->create([
            'email' => 'admin.mesin@arap.local',
        ]);
        $this->adminUser->roles()->attach($this->roleUltraman);

        $this->officerUser = User::factory()->create([
            'email' => 'officer.mesin@arap.local',
        ]);
        $this->officerUser->roles()->attach($this->roleOfficer);

        $this->relawanUser = User::factory()->create([
            'email' => 'relawan.mesin@arap.local',
        ]);
        $this->relawanUser->roles()->attach($this->roleUser);

        $this->mesinIp = Mesin::create([
            'name' => 'FPDAPUR1',
            'tipe' => 'ip',
            'ip' => '192.168.1.8',
            'port' => '4370',
            'grup' => 6,
            'maker_id' => $this->adminUser->id,
        ]);

        $this->mesinUsb = Mesin::create([
            'name' => 'FP_OFFLINE',
            'tipe' => 'usb',
            'ip' => null,
            'port' => null,
            'grup' => 6,
            'maker_id' => $this->adminUser->id,
        ]);
    }

    /**
     * Test 1: Tamu unauthenticated dialihkan ke halaman login.
     */
    public function test_unauthenticated_user_cannot_access_mesin_endpoints(): void
    {
        $this->get('/admin/mesin')->assertRedirect('/login');
        $this->post('/admin/mesin', [])->assertRedirect('/login');
        $this->post("/admin/mesin/{$this->mesinIp->id}/check-connection")->assertRedirect('/login');
    }

    /**
     * Test 2: Role User dan Officer dilarang mengakses modul mesin (403 Forbidden).
     */
    public function test_user_and_officer_cannot_access_mesin_endpoints(): void
    {
        // 1. Relawan User biasa
        $this->actingAs($this->relawanUser)->get('/admin/mesin')->assertStatus(403);
        $this->actingAs($this->relawanUser)->post('/admin/mesin', [
            'name' => 'Mesin Ilegal',
            'tipe' => 'ip',
            'ip' => '10.0.0.1',
            'port' => 4370,
        ])->assertStatus(403);
        $this->actingAs($this->relawanUser)->post("/admin/mesin/{$this->mesinIp->id}/check-connection")->assertStatus(403);
        $this->actingAs($this->relawanUser)->post("/admin/mesin/{$this->mesinIp->id}/sync")->assertStatus(403);
        $this->actingAs($this->relawanUser)->post('/admin/mesin/sync-all')->assertStatus(403);

        // 2. Officer
        $this->actingAs($this->officerUser)->get('/admin/mesin')->assertStatus(403);
        $this->actingAs($this->officerUser)->post('/admin/mesin', [
            'name' => 'Mesin Officer',
            'tipe' => 'ip',
            'ip' => '10.0.0.2',
            'port' => 4370,
        ])->assertStatus(403);
    }

    /**
     * Test 3: Admin Ultraman dapat membuka halaman kelola mesin & tarik data.
     */
    public function test_ultraman_can_view_mesin_index(): void
    {
        $response = $this->actingAs($this->adminUser)->get('/admin/mesin');

        $response->assertStatus(200);
        $response->assertSee('Kelola Mesin Fingerprint &amp; Tarik Data ZKTeco', false);
        $response->assertSee('FPDAPUR1');
        $response->assertSee('192.168.1.8');
        $response->assertSee('FP_OFFLINE');
    }

    /**
     * Test 4: Admin Ultraman dapat menambah mesin baru (IP & USB).
     */
    public function test_ultraman_can_store_ip_and_usb_machine(): void
    {
        // 1. Mesin IP
        $responseIp = $this->actingAs($this->adminUser)->post('/admin/mesin', [
            'name' => 'Mesin Gedung B',
            'tipe' => 'ip',
            'ip' => '192.168.1.20',
            'port' => 4370,
            'grup' => 6,
        ]);

        $responseIp->assertRedirect('/admin/mesin');
        $responseIp->assertSessionHas('success');
        $this->assertDatabaseHas('mesins', [
            'name' => 'Mesin Gedung B',
            'tipe' => 'ip',
            'ip' => '192.168.1.20',
            'port' => '4370',
        ]);

        // 2. Mesin USB
        $responseUsb = $this->actingAs($this->adminUser)->post('/admin/mesin', [
            'name' => 'Mesin Gudang Standalone',
            'tipe' => 'usb',
            'grup' => 6,
        ]);

        $responseUsb->assertRedirect('/admin/mesin');
        $this->assertDatabaseHas('mesins', [
            'name' => 'Mesin Gudang Standalone',
            'tipe' => 'usb',
        ]);
    }

    /**
     * Test 5: Validasi wajib IP address untuk mesin bertipe IP.
     */
    public function test_store_validates_required_ip_for_ip_machine(): void
    {
        $response = $this->actingAs($this->adminUser)->post('/admin/mesin', [
            'name' => 'Mesin Tanpa IP',
            'tipe' => 'ip',
            'ip' => '',
            'port' => 4370,
        ]);

        $response->assertSessionHasErrors(['ip']);
    }

    /**
     * Test 6: Admin Ultraman dapat memperbarui konfigurasi mesin.
     */
    public function test_ultraman_can_update_machine(): void
    {
        $response = $this->actingAs($this->adminUser)->put("/admin/mesin/{$this->mesinIp->id}", [
            'name' => 'FPDAPUR1_UPDATED',
            'tipe' => 'ip',
            'ip' => '192.168.1.99',
            'port' => 4371,
            'grup' => 6,
        ]);

        $response->assertRedirect('/admin/mesin');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('mesins', [
            'id' => $this->mesinIp->id,
            'name' => 'FPDAPUR1_UPDATED',
            'ip' => '192.168.1.99',
            'port' => '4371',
        ]);
    }

    /**
     * Test 7: Admin dapat menghapus mesin yang belum memiliki rekaman di tabel pools.
     */
    public function test_ultraman_can_delete_machine_without_pools(): void
    {
        $newMachine = Mesin::create([
            'name' => 'Mesin Kosong',
            'tipe' => 'ip',
            'ip' => '192.168.1.100',
            'port' => '4370',
            'grup' => 6,
        ]);

        $response = $this->actingAs($this->adminUser)->delete("/admin/mesin/{$newMachine->id}");

        $response->assertRedirect('/admin/mesin');
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('mesins', ['id' => $newMachine->id]);
    }

    /**
     * Test 8: Proteksi Non-Destruktif menolak penghapusan mesin yang sudah memiliki riwayat log di pools.
     */
    public function test_system_refuses_to_delete_machine_with_pools_logs(): void
    {
        // Buat log pool untuk mesin FPDAPUR1
        Pool::create([
            'uid' => 101,
            'iduser' => 101,
            'state' => 1,
            'date' => '2026-11-24',
            'time' => '07:55:00',
            'timestamp' => '2026-11-24 07:55:00',
            'type' => 0,
            'mesin_id' => $this->mesinIp->id,
        ]);

        $response = $this->actingAs($this->adminUser)->delete("/admin/mesin/{$this->mesinIp->id}");

        $response->assertRedirect('/admin/mesin');
        $response->assertSessionHas('error');
        $this->assertDatabaseHas('mesins', ['id' => $this->mesinIp->id]);
    }

    /**
     * Test 9: Check Koneksi UDP sukses menggunakan Mock Client.
     */
    public function test_check_connection_success(): void
    {
        $mockClient = Mockery::mock(ZKTecoClientInterface::class);
        $mockClient->shouldReceive('connect')
            ->once()
            ->with('192.168.1.8', 4370, 4)
            ->andReturn(true);
        $mockClient->shouldReceive('getDeviceName')
            ->once()
            ->andReturn('FPDAPUR1_HARDWARE');
        $mockClient->shouldReceive('disconnect')
            ->once();

        $this->app->instance(ZKTecoClientInterface::class, $mockClient);

        $response = $this->actingAs($this->adminUser)
            ->postJson("/admin/mesin/{$this->mesinIp->id}/check-connection");

        $response->assertStatus(200);
        $response->assertJson([
            'connected' => true,
            'device_name' => 'FPDAPUR1_HARDWARE',
        ]);
    }

    /**
     * Test 10: Check Koneksi UDP gagal (offline) ditangani dengan ramah.
     */
    public function test_check_connection_failure(): void
    {
        $mockClientFail = Mockery::mock(ZKTecoClientInterface::class);
        $mockClientFail->shouldReceive('connect')
            ->once()
            ->with('192.168.1.8', 4370, 4)
            ->andReturn(false);

        $this->app->instance(ZKTecoClientInterface::class, $mockClientFail);

        $responseFail = $this->actingAs($this->adminUser)
            ->postJson("/admin/mesin/{$this->mesinIp->id}/check-connection");

        $responseFail->assertStatus(200);
        $responseFail->assertJson([
            'connected' => false,
        ]);
    }

    /**
     * Test 11: Sinkronkan Data pertama kali menyimpan seluruh log baru ke tabel pools.
     */
    public function test_sync_machine_inserts_new_records(): void
    {
        $mockLogs = [
            [
                'uid' => 101,
                'iduser' => 101,
                'state' => 1,
                'timestamp' => '2026-11-24 07:45:00',
                'type' => 0,
            ],
            [
                'uid' => 102,
                'iduser' => 102,
                'state' => 1,
                'timestamp' => '2026-11-24 07:50:00',
                'type' => 0,
            ],
            [
                'uid' => 101,
                'iduser' => 101,
                'state' => 1,
                'timestamp' => '2026-11-24 16:30:00',
                'type' => 1,
            ],
        ];

        $mockClient = Mockery::mock(ZKTecoClientInterface::class);
        $mockClient->shouldReceive('connect')->once()->andReturn(true);
        $mockClient->shouldReceive('getAttendanceLogs')->once()->andReturn($mockLogs);
        $mockClient->shouldReceive('disconnect')->once();

        $this->app->instance(ZKTecoClientInterface::class, $mockClient);

        $response = $this->actingAs($this->adminUser)
            ->postJson("/admin/mesin/{$this->mesinIp->id}/sync");

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'fetched' => 3,
            'inserted' => 3,
            'skipped' => 0,
        ]);

        $this->assertEquals(3, Pool::where('mesin_id', $this->mesinIp->id)->count());
    }

    /**
     * Test 12: Pembuktian Anti-Duplikasi: data yang sudah pernah ditarik akan dilewati (skipped).
     */
    public function test_sync_machine_skips_duplicate_records(): void
    {
        // Pre-seed 3 data yang sudah ada di database
        Pool::create([
            'uid' => 101,
            'iduser' => 101,
            'state' => 1,
            'date' => '2026-11-24',
            'time' => '07:45:00',
            'timestamp' => '2026-11-24 07:45:00',
            'type' => 0,
            'year' => 2026,
            'month' => 11,
            'mesin_id' => $this->mesinIp->id,
        ]);
        Pool::create([
            'uid' => 102,
            'iduser' => 102,
            'state' => 1,
            'date' => '2026-11-24',
            'time' => '07:50:00',
            'timestamp' => '2026-11-24 07:50:00',
            'type' => 0,
            'year' => 2026,
            'month' => 11,
            'mesin_id' => $this->mesinIp->id,
        ]);
        Pool::create([
            'uid' => 101,
            'iduser' => 101,
            'state' => 1,
            'date' => '2026-11-24',
            'time' => '16:30:00',
            'timestamp' => '2026-11-24 16:30:00',
            'type' => 1,
            'year' => 2026,
            'month' => 11,
            'mesin_id' => $this->mesinIp->id,
        ]);

        $this->mesinIp->last_sync = '2026-11-24 16:30:00';
        $this->mesinIp->save();

        // 4 logs ditarik dari mesin: 3 lama + 1 baru (uid=103 pada 16:45:00)
        $mockLogs = [
            [
                'uid' => 101,
                'iduser' => 101,
                'state' => 1,
                'timestamp' => '2026-11-24 07:45:00',
                'type' => 0,
            ],
            [
                'uid' => 102,
                'iduser' => 102,
                'state' => 1,
                'timestamp' => '2026-11-24 07:50:00',
                'type' => 0,
            ],
            [
                'uid' => 101,
                'iduser' => 101,
                'state' => 1,
                'timestamp' => '2026-11-24 16:30:00',
                'type' => 1,
            ],
            [
                'uid' => 103,
                'iduser' => 103,
                'state' => 1,
                'timestamp' => '2026-11-24 16:45:00',
                'type' => 1,
            ],
        ];

        $mockClient = Mockery::mock(ZKTecoClientInterface::class);
        $mockClient->shouldReceive('connect')->once()->andReturn(true);
        $mockClient->shouldReceive('getAttendanceLogs')->once()->andReturn($mockLogs);
        $mockClient->shouldReceive('disconnect')->once();

        $this->app->instance(ZKTecoClientInterface::class, $mockClient);

        $response = $this->actingAs($this->adminUser)
            ->postJson("/admin/mesin/{$this->mesinIp->id}/sync");

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'fetched' => 4,
            'inserted' => 1,
            'skipped' => 3,
        ]);

        $this->assertEquals(4, Pool::where('mesin_id', $this->mesinIp->id)->count());
    }

    /**
     * Test 11: Sinkronkan seluruh mesin IP sekaligus (syncAll).
     */
    public function test_sync_all_ip_machines(): void
    {
        $mockClient = Mockery::mock(ZKTecoClientInterface::class);
        $mockClient->shouldReceive('connect')->andReturn(true);
        $mockClient->shouldReceive('getAttendanceLogs')->andReturn([]);
        $mockClient->shouldReceive('disconnect');

        $this->app->instance(ZKTecoClientInterface::class, $mockClient);

        $response = $this->actingAs($this->adminUser)
            ->postJson('/admin/mesin/sync-all');

        $response->assertStatus(200);
        $response->assertJson([
            'total_machines' => 1, // Hanya 1 mesin IP terdaftar ($this->mesinIp)
            'success_count' => 1,
            'fail_count' => 0,
        ]);
    }

    /**
     * Test 12: Unggah berkas log presensi USB (.dat) berhasil dan anti-duplikasi.
     */
    public function test_import_usb_dat_file(): void
    {
        $datContent = "101\t2026-11-24\t07:45:00\t1\t0\n"
            ."102\t2026-11-24\t07:50:00\t1\t0\n"
            ."101\t2026-11-24\t16:30:00\t1\t0\n";

        $file = UploadedFile::fake()->createWithContent('attlog.dat', $datContent);

        $response = $this->actingAs($this->adminUser)
            ->post("/admin/mesin/{$this->mesinUsb->id}/upload-usb", [
                'filedata' => $file,
            ]);

        $response->assertRedirect('/admin/mesin');
        $response->assertSessionHas('success');
        $this->assertEquals(3, Pool::where('mesin_id', $this->mesinUsb->id)->count());

        // Unggah ulang file yang sama -> data duplikat dilewati
        $fileSecond = UploadedFile::fake()->createWithContent('attlog_duplicate.dat', $datContent);
        $responseSecond = $this->actingAs($this->adminUser)
            ->post("/admin/mesin/{$this->mesinUsb->id}/upload-usb", [
                'filedata' => $fileSecond,
            ]);

        $responseSecond->assertRedirect('/admin/mesin');
        $this->assertEquals(3, Pool::where('mesin_id', $this->mesinUsb->id)->count());
    }

    /**
     * Test 13: Perintah CLI arap:sync-machine berjalan dengan sukses.
     */
    public function test_artisan_sync_command(): void
    {
        $mockClient = Mockery::mock(ZKTecoClientInterface::class);
        $mockClient->shouldReceive('connect')->once()->andReturn(true);
        $mockClient->shouldReceive('getAttendanceLogs')->once()->andReturn([]);
        $mockClient->shouldReceive('disconnect')->once();

        $this->app->instance(ZKTecoClientInterface::class, $mockClient);

        $exitCode = Artisan::call('arap:sync-machine', [
            '--mesin' => $this->mesinIp->id,
        ]);

        $this->assertEquals(0, $exitCode);
    }
}
