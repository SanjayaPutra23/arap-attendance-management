<?php

namespace Tests\Feature;

use App\Models\AttendanceLocation;
use App\Models\Peserta;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UiAndRoleCleanupTest extends TestCase
{
    use RefreshDatabase;

    protected Role $roleUltraman;

    protected Role $roleOfficer;

    protected Role $roleUser;

    protected User $adminUser;

    protected User $relawanUser;

    protected Peserta $pesertaRelawan;

    protected function setUp(): void
    {
        parent::setUp();

        $this->roleUltraman = Role::create(['name' => 'Ultraman']);
        $this->roleOfficer = Role::create(['name' => 'Officer']);
        $this->roleUser = Role::create(['name' => 'User']);

        $this->adminUser = User::factory()->create([
            'email' => 'superadmin@arap.local',
        ]);
        $this->adminUser->roles()->attach($this->roleUltraman);

        $this->pesertaRelawan = Peserta::create([
            'name' => 'Ahmad Fauzi',
            'nik' => '3328010101900088',
            'uid' => 9988,
            'jabatan' => 'Persiapan',
            'type' => 'relawan',
        ]);

        $this->relawanUser = User::factory()->create([
            'email' => 'ahmad@arap.local',
            'peserta_id' => $this->pesertaRelawan->id,
        ]);
        $this->relawanUser->roles()->attach($this->roleUser);

        // Pre-seed required settings & location
        Setting::create(['name' => 'nama_instansi', 'value' => 'SPPG Kalisapu']);
        Setting::create(['name' => 'jam_datang_persiapan', 'value' => '08:00:00']);
        Setting::create(['name' => 'jam_pulang_persiapan', 'value' => '17:00:00']);
        Setting::create(['name' => 'jam_datang_officer', 'value' => '08:00:00']);
        Setting::create(['name' => 'jam_pulang_officer', 'value' => '17:00:00']);

        AttendanceLocation::create([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);
    }

    /**
     * Test 1: Global Pagination Bootstrap 5 (tidak merender ikon SVG Tailwind abnormal).
     */
    public function test_bootstrap_5_pagination_markup_rendered_without_tailwind_svg(): void
    {
        // Buat 20 data peserta agar menghasilkan link paginasi (> 15 per halaman)
        for ($i = 1; $i <= 20; $i++) {
            Peserta::create([
                'name' => "Pegawai Dummy {$i}",
                'nik' => sprintf('332801010199%04d', $i),
                'uid' => 3000 + $i,
                'jabatan' => 'Persiapan',
                'type' => 'relawan',
            ]);
        }

        $response = $this->actingAs($this->adminUser)->get('/admin/pegawai');

        $response->assertStatus(200);
        $content = $response->getContent();

        // Harus menggunakan struktur Bootstrap 5
        $this->assertStringContainsString('pagination', $content);
        $this->assertStringContainsString('page-item', $content);
        $this->assertStringContainsString('page-link', $content);

        // Tidak boleh memuat kelas SVG default Tailwind pagination (w-5 h-5)
        $this->assertStringNotContainsString('w-5 h-5', $content);
    }

    /**
     * Test 2: Role cleanup memastikan role Tamu, Umum, Akademik terhapus dan tersisa Ultraman, Officer, User.
     */
    public function test_role_cleanup_leaves_only_valid_roles(): void
    {
        // Buat role tidak terpakai
        Role::create(['name' => 'Tamu']);
        $roleUmum = Role::create(['name' => 'Umum']);
        Role::create(['name' => 'Akademik']);

        $dummyUser = User::factory()->create();
        $dummyUser->roles()->attach($roleUmum);

        // Jalankan migration cleanup
        $migration = require database_path('migrations/2026_11_24_200001_cleanup_unused_roles.php');
        $migration->up();

        // Pastikan Tamu, Umum, Akademik sudah terhapus
        $this->assertDatabaseMissing('roles', ['name' => 'Tamu']);
        $this->assertDatabaseMissing('roles', ['name' => 'Umum']);
        $this->assertDatabaseMissing('roles', ['name' => 'Akademik']);

        // Pastikan Ultraman, Officer, User tetap ada
        $this->assertDatabaseHas('roles', ['name' => 'Ultraman']);
        $this->assertDatabaseHas('roles', ['name' => 'Officer']);
        $this->assertDatabaseHas('roles', ['name' => 'User']);

        // User yang tadinya memiliki role Umum dialihkan ke Ultraman
        $dummyUser->refresh();
        $this->assertTrue($dummyUser->roles()->where('name', 'Ultraman')->exists());
    }

    /**
     * Test 3: Admin Rekapitulasi dapat berpindah antara Mode Bulanan (20-19) dan Mode Mingguan.
     */
    public function test_admin_can_toggle_recap_between_bulanan_and_mingguan(): void
    {
        // 1. Mode Bulanan
        $responseBulanan = $this->actingAs($this->adminUser)->get('/admin/rekap?mode=bulanan');
        $responseBulanan->assertStatus(200);
        $responseBulanan->assertSee('Mode Bulanan (Cut-off 20');
        $responseBulanan->assertSee('Bulan Periode Berjalan');

        // 2. Mode Mingguan
        $responseMingguan = $this->actingAs($this->adminUser)->get('/admin/rekap?mode=mingguan&date=2026-11-24');
        $responseMingguan->assertStatus(200);
        $responseMingguan->assertSee('Mode Mingguan (Senin');
        $responseMingguan->assertSee('Pilih Tanggal Acuan Minggu');
    }

    /**
     * Test 4: Endpoint penyimpanan setting mode riwayat relawan terlindungi RBAC.
     */
    public function test_admin_can_save_relawan_recap_period_setting(): void
    {
        // 1. Admin Ultraman berhasil menyimpan setting
        $response = $this->actingAs($this->adminUser)
            ->post('/admin/rekap/period-setting', [
                'mode' => 'mingguan',
            ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertEquals('mingguan', Setting::getValue('relawan_recap_period_mode'));

        // Ubah kembali ke bulanan
        $response2 = $this->actingAs($this->adminUser)
            ->post('/admin/rekap/period-setting', [
                'mode' => 'bulanan',
            ]);

        $response2->assertRedirect();
        $this->assertEquals('bulanan', Setting::getValue('relawan_recap_period_mode'));

        // 2. Relawan biasa dilarang (403 Forbidden)
        $responseForbidden = $this->actingAs($this->relawanUser)
            ->post('/admin/rekap/period-setting', [
                'mode' => 'mingguan',
            ]);

        $responseForbidden->assertStatus(403);
    }

    /**
     * Test 5: Halaman Riwayat Relawan sinkron dengan setting mode yang diatur Admin.
     */
    public function test_volunteer_history_reflects_admin_period_setting(): void
    {
        // 1. Setting diset ke Mingguan
        Setting::updateOrCreate(
            ['name' => 'relawan_recap_period_mode'],
            ['value' => 'mingguan', 'grup' => 1]
        );
        Setting::clearRuntimeCache();

        $responseWeekly = $this->actingAs($this->relawanUser)->get('/mobile-attendance/history');
        $responseWeekly->assertStatus(200);
        $responseWeekly->assertSee('Mingguan (Senin - Minggu)');
        $responseWeekly->assertSee('Rentang Minggu:');

        // 2. Setting diset ke Bulanan
        Setting::updateOrCreate(
            ['name' => 'relawan_recap_period_mode'],
            ['value' => 'bulanan', 'grup' => 1]
        );
        Setting::clearRuntimeCache();

        $responseMonthly = $this->actingAs($this->relawanUser)->get('/mobile-attendance/history');
        $responseMonthly->assertStatus(200);
        $responseMonthly->assertSee('Bulanan (Cut-off 20 - 19)');
        $responseMonthly->assertSee('Pilih Bulan Periode');
    }

    /**
     * Test 6: Ekspor Rekapitulasi Excel & PDF berjalan sukses untuk mode bulanan dan mingguan.
     */
    public function test_recap_exports_excel_and_pdf_in_weekly_and_monthly_modes(): void
    {
        // 1. Ekspor Excel & PDF Bulanan
        $excelBulanan = $this->actingAs($this->adminUser)->get('/admin/rekap/export/excel?mode=bulanan');
        $excelBulanan->assertStatus(200);
        $this->assertStringContainsString('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', (string) $excelBulanan->headers->get('content-type'));

        $pdfBulanan = $this->actingAs($this->adminUser)->get('/admin/rekap/export/pdf?mode=bulanan');
        $pdfBulanan->assertStatus(200);
        $this->assertStringContainsString('application/pdf', (string) $pdfBulanan->headers->get('content-type'));

        // 2. Ekspor Excel & PDF Mingguan
        $excelMingguan = $this->actingAs($this->adminUser)->get('/admin/rekap/export/excel?mode=mingguan&date=2026-11-24');
        $excelMingguan->assertStatus(200);
        $this->assertStringContainsString('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', (string) $excelMingguan->headers->get('content-type'));

        $pdfMingguan = $this->actingAs($this->adminUser)->get('/admin/rekap/export/pdf?mode=mingguan&date=2026-11-24');
        $pdfMingguan->assertStatus(200);
        $this->assertStringContainsString('application/pdf', (string) $pdfMingguan->headers->get('content-type'));
    }
}
