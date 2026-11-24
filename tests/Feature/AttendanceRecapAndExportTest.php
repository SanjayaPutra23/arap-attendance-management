<?php

namespace Tests\Feature;

use App\Models\Libur;
use App\Models\MobileAttendance;
use App\Models\PermohonanIzin;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use App\Services\AttendanceRecapService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendanceRecapAndExportTest extends TestCase
{
    use RefreshDatabase;

    protected User $relawanUser;

    protected User $staffUser;

    protected Peserta $pesertaOfficer;

    protected Peserta $pesertaRelawan;

    protected function setUp(): void
    {
        parent::setUp();

        $roleUser = Role::create(['name' => 'User']);
        $roleOfficer = Role::create(['name' => 'Officer']);

        // Settings jam kerja
        Setting::create(['name' => 'jam_datang_officer', 'value' => '08:00:00']);
        Setting::create(['name' => 'jam_pulang_officer', 'value' => '17:00:00']);
        Setting::create(['name' => 'jam_datang_persiapan', 'value' => '08:00:00']);
        Setting::create(['name' => 'jam_pulang_persiapan', 'value' => '17:00:00']);

        $this->pesertaOfficer = Peserta::create([
            'name' => 'Kapten Aslap',
            'nik' => '9999000000000001',
            'uid' => 8888,
            'jabatan' => 'Officer',
            'type' => 'officer',
        ]);

        $this->pesertaRelawan = Peserta::create([
            'name' => 'Relawan Dapur Soni',
            'nik' => '9999000000000002',
            'uid' => 8889,
            'jabatan' => 'Persiapan',
            'type' => 'relawan',
        ]);

        $this->relawanUser = User::factory()->create([
            'peserta_id' => $this->pesertaRelawan->id,
            'email' => 'soni@arap.local',
        ]);
        $this->relawanUser->roles()->attach($roleUser);

        $this->staffUser = User::factory()->create([
            'peserta_id' => $this->pesertaOfficer->id,
            'email' => 'aslap@arap.local',
        ]);
        $this->staffUser->roles()->attach($roleOfficer);
    }

    public function test_recap_service_accurately_combines_mobile_pools_izin_and_libur_for_period_20_to_19(): void
    {
        // Periode berjalan: Bulan November 2026 (20 Oktober 2026 s.d. 19 November 2026)
        $year = 2026;
        $month = 11;

        // 1. Hari Libur Nasional pada 24 Oktober 2026
        Libur::create([
            'tanggal' => '2026-10-24',
            'ket' => 'Hari Libur Nasional Contoh',
        ]);

        // 2. Presensi Mobile (Prioritas 1) untuk Officer pada 2026-10-21: Tepat Waktu (Skor 1.00)
        MobileAttendance::create([
            'peserta_id' => $this->pesertaOfficer->id,
            'attendance_date' => '2026-10-21',
            'check_in_at' => Carbon::parse('2026-10-21 07:50:00', 'Asia/Jakarta'),
            'check_out_at' => Carbon::parse('2026-10-21 17:05:00', 'Asia/Jakarta'),
            'status' => 'hadir',
            'score' => 1.00,
            'source' => 'mobile',
        ]);

        // 3. Presensi Historis Pools Mesin (Prioritas 2) untuk Officer pada 2026-10-22:
        // Check-in 07:45 (Tepat waktu) & Check-out 17:15 -> Skor 1.00
        Pool::create([
            'iduser' => 8888,
            'date' => '2026-10-22',
            'time' => '07:45:00',
        ]);
        Pool::create([
            'iduser' => 8888,
            'date' => '2026-10-22',
            'time' => '17:15:00',
        ]);

        // 4. Presensi Historis Pools Mesin (Prioritas 2) untuk Officer pada 2026-10-23:
        // Check-in 08:30 (Terlambat) -> Skor 0.80
        Pool::create([
            'iduser' => 8888,
            'date' => '2026-10-23',
            'time' => '08:30:00',
        ]);

        // 5. Permohonan Izin Disetujui (Prioritas 3) untuk Officer pada 2026-10-26 s.d. 2026-10-27 (2 hari)
        PermohonanIzin::create([
            'user_id' => $this->staffUser->id,
            'peserta_id' => $this->pesertaOfficer->id,
            'jenis' => 'izin',
            'tgl_mulai' => '2026-10-26',
            'tgl_selesai' => '2026-10-27',
            'alasan' => 'Pelatihan Dinas',
            'status' => 'disetujui',
        ]);

        // Jalankan Engine Rekapitulasi
        $service = app(AttendanceRecapService::class);
        $recap = $service->generateRecap($year, $month, 'officer');

        $this->assertEquals(2026, $recap['period']['year']);
        $this->assertEquals(11, $recap['period']['month']);
        $this->assertEquals('2026-10-20', $recap['period']['start']->toDateString());
        $this->assertEquals('2026-11-19', $recap['period']['end']->toDateString());

        $officerRecord = collect($recap['records'])->firstWhere('peserta.id', $this->pesertaOfficer->id);
        $this->assertNotNull($officerRecord);

        // Hadir Tepat Waktu = 2 (1x Mobile + 1x Pools)
        $this->assertEquals(2, $officerRecord['hadir_tepat_waktu']);

        // Hadir Terlambat/Early = 1 (Pools 23 Okt)
        $this->assertEquals(1, $officerRecord['hadir_terlambat_early']);

        // Izin = 2 (26 & 27 Okt)
        $this->assertEquals(2, $officerRecord['izin']);

        // Total Poin = (2 * 1.0) + (1 * 0.8) = 2.80
        $this->assertEquals(2.80, $officerRecord['total_points']);

        // Komposisi sumber
        $this->assertEquals(1, $officerRecord['sources']['mobile']);
        $this->assertEquals(2, $officerRecord['sources']['fingerprint']);
    }

    public function test_non_staff_gets_403_on_recap_and_export_routes(): void
    {
        $this->actingAs($this->relawanUser)->get('/admin/rekap')->assertForbidden();
        $this->actingAs($this->relawanUser)->get('/admin/rekap/export/excel')->assertForbidden();
        $this->actingAs($this->relawanUser)->get('/admin/rekap/export/pdf')->assertForbidden();
        $this->actingAs($this->relawanUser)->get("/admin/rekap/{$this->pesertaRelawan->id}")->assertForbidden();
    }

    public function test_staff_can_view_recap_page(): void
    {
        $response = $this->actingAs($this->staffUser)->get('/admin/rekap?year=2026&month=11');

        $response->assertOk();
        $response->assertViewIs('admin.rekap.index');
        $response->assertSee('Rekapitulasi Kehadiran Gabungan');
        $response->assertSee('Kapten Aslap');
        $response->assertSee('Relawan Dapur Soni');
    }

    public function test_staff_can_view_single_peserta_daily_breakdown(): void
    {
        $response = $this->actingAs($this->staffUser)->get("/admin/rekap/{$this->pesertaOfficer->id}?year=2026&month=11");

        $response->assertOk();
        $response->assertViewIs('admin.rekap.show');
        $response->assertSee('Rincian Kehadiran: Kapten Aslap');
        $response->assertSee('Total Poin Terkumpul');
    }

    public function test_staff_can_export_excel(): void
    {
        $response = $this->actingAs($this->staffUser)->get('/admin/rekap/export/excel?year=2026&month=11');

        $response->assertOk();
        // Memastikan header download excel valid
        $this->assertTrue(
            str_contains($response->headers->get('content-type'), 'spreadsheet') ||
            str_contains($response->headers->get('content-type'), 'octet-stream') ||
            str_contains($response->headers->get('content-disposition'), 'Rekap_Presensi_SPPG_2026_11.xlsx')
        );
    }

    public function test_staff_can_export_pdf(): void
    {
        $response = $this->actingAs($this->staffUser)->get('/admin/rekap/export/pdf?year=2026&month=11');

        $response->assertOk();
        $this->assertEquals('application/pdf', $response->headers->get('content-type'));
        // Verifikasi magic byte PDF (%PDF)
        $this->assertStringStartsWith('%PDF', $response->getContent());
    }
}
