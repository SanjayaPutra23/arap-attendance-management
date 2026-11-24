<?php

namespace Tests\Feature;

use App\Models\Absensi;
use App\Models\DetailAbsen;
use App\Models\Mesin;
use App\Models\PermohonanIzin;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseRelationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Uji relasi User, Role, dan Peserta.
     */
    public function test_user_peserta_and_role_relations(): void
    {
        $role = Role::create(['name' => 'Ultraman']);

        $peserta = Peserta::create([
            'uid' => 1051,
            'name' => 'Riski',
            'nik' => '1051',
            'type' => 'Relawan',
            'jabatan' => 'Officer',
            'telp' => '08123456789',
        ]);

        $user = User::factory()->create([
            'peserta_id' => $peserta->id,
            'name' => 'Riski',
            'nik' => '1051',
        ]);

        $user->roles()->attach($role);

        // Assert User -> Role
        $this->assertTrue($user->hasRole('Ultraman'));
        $this->assertTrue($role->users->contains($user));

        // Assert User -> Peserta & Peserta -> User
        $this->assertNotNull($user->peserta);
        $this->assertSame($peserta->id, $user->peserta->id);
        $this->assertSame('Riski', $user->peserta->name);

        $this->assertNotNull($peserta->user);
        $this->assertSame($user->id, $peserta->user->id);

        // Helper & scope test
        $this->assertTrue($peserta->isOfficer());
        $this->assertSame(1, Peserta::officers()->count());
        $this->assertSame(1, Peserta::relawan()->count());
        $this->assertSame(1, Peserta::ofJabatan('Officer')->count());
    }

    /**
     * Uji relasi Peserta, Mesin, dan Pool (Fingerprint).
     */
    public function test_peserta_mesin_and_pool_relations(): void
    {
        $mesin = Mesin::create([
            'name' => 'FPDAPUR1',
            'tipe' => 'ip',
            'ip' => '192.168.1.8',
            'port' => '4370',
            'maker_id' => 1,
            'grup' => 6,
        ]);

        $peserta = Peserta::create([
            'uid' => 1052,
            'name' => 'Wahyudin',
            'jabatan' => 'Security',
        ]);

        $pool = Pool::create([
            'uid' => 1,
            'iduser' => 1052,
            'state' => 15,
            'date' => '2026-10-12',
            'time' => '07:33:28',
            'timestamp' => '2026-10-12 07:33:28',
            'type' => 0,
            'mesin_id' => $mesin->id,
        ]);

        // Assert Peserta -> Pools (via iduser -> uid)
        $this->assertCount(1, $peserta->pools);
        $this->assertSame($pool->id, $peserta->pools->first()->id);

        // Assert Pool -> Peserta
        $this->assertNotNull($pool->peserta);
        $this->assertSame('Wahyudin', $pool->peserta->name);

        // Assert Pool -> Mesin & Mesin -> Pools
        $this->assertSame('FPDAPUR1', $pool->mesin->name);
        $this->assertCount(1, $mesin->pools);
    }

    /**
     * Uji relasi Absensi, DetailAbsen, dan Peserta.
     */
    public function test_absensi_detail_absen_and_peserta_relations(): void
    {
        $peserta = Peserta::create([
            'uid' => 1052,
            'name' => 'Wahyudin',
            'jabatan' => 'Security',
        ]);

        $absensi = Absensi::create([
            'type' => 'minggu ke 2',
            'tgl_mulai' => '2026-10-12 00:00:00',
            'tgl_selesai' => '2026-10-18 23:59:59',
            'maker' => 1,
            'peg' => 0,
        ]);

        $detail = DetailAbsen::create([
            'id_absen' => $absensi->id,
            'id_peserta' => 1052,
            'data_peserta' => 'WAHYUDIN-1052',
            'presensi' => '2026-10-12_0_07:33:28_18:46:29&',
        ]);

        // Assert Absensi -> DetailAbsen
        $this->assertCount(1, $absensi->detailAbsens);

        // Assert DetailAbsen -> Absensi
        $this->assertSame($absensi->id, $detail->absensi->id);

        // Assert DetailAbsen -> Peserta
        $this->assertNotNull($detail->peserta);
        $this->assertSame('Wahyudin', $detail->peserta->name);
    }

    /**
     * Uji relasi PermohonanIzin dengan User, Peserta, dan Approver.
     */
    public function test_permohonan_izin_relations(): void
    {
        $admin = User::factory()->create(['name' => 'Admin TU']);
        $relawanUser = User::factory()->create(['name' => 'Relawan User']);

        $peserta = Peserta::create([
            'uid' => 1009,
            'name' => 'Desi Fitriyanti',
            'jabatan' => 'Persiapan',
        ]);

        $izin = PermohonanIzin::create([
            'user_id' => $relawanUser->id,
            'peserta_id' => $peserta->id,
            'jenis' => 'izin',
            'tgl_mulai' => '2026-11-25',
            'tgl_selesai' => '2026-11-26',
            'alasan' => 'Keperluan keluarga',
            'status' => 'disetujui',
            'approved_by' => $admin->id,
            'approved_at' => now(),
        ]);

        $this->assertSame('Relawan User', $izin->user->name);
        $this->assertSame('Desi Fitriyanti', $izin->peserta->name);
        $this->assertSame('Admin TU', $izin->approver->name);
        $this->assertCount(1, $peserta->permohonanIzins);
        $this->assertCount(1, $relawanUser->permohonanIzins);
    }
}
