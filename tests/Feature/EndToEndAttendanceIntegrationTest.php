<?php

namespace Tests\Feature;

use App\Models\AttendanceLocation;
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
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EndToEndAttendanceIntegrationTest extends TestCase
{
    use RefreshDatabase;

    protected Peserta $peserta1;

    protected Peserta $peserta2;

    protected Peserta $peserta3;

    protected User $user1;

    protected User $user2;

    protected User $adminTU;

    protected AttendanceLocation $location;

    protected function setUp(): void
    {
        parent::setUp();

        // 1. Roles
        $roleUser = Role::create(['name' => 'User']);
        $roleOfficer = Role::create(['name' => 'Officer']);
        $roleUltraman = Role::create(['name' => 'Ultraman']);

        // 2. Settings Jam Kerja
        Setting::create(['name' => 'jam_datang_persiapan', 'value' => '08:00:00']);
        Setting::create(['name' => 'jam_pulang_persiapan', 'value' => '17:00:00']);
        Setting::create(['name' => 'jam_datang_officer', 'value' => '08:00:00']);
        Setting::create(['name' => 'jam_pulang_officer', 'value' => '17:00:00']);

        // 3. Lokasi Geofence Aktif
        $this->location = AttendanceLocation::create([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        // 4. Data Peserta
        $this->peserta1 = Peserta::create([
            'name' => 'Soni Setiawan',
            'nik' => '3328010101900001',
            'uid' => 1001,
            'jabatan' => 'Persiapan',
            'type' => 'relawan',
            'telp' => '081234567891',
        ]);

        $this->peserta2 = Peserta::create([
            'name' => 'Dewi Lestari',
            'nik' => '3328010101900002',
            'uid' => 1002,
            'jabatan' => 'Persiapan',
            'type' => 'relawan',
            'telp' => '081234567892',
        ]);

        $this->peserta3 = Peserta::create([
            'name' => 'Kapten Aslap',
            'nik' => '3328010101900003',
            'uid' => 1003,
            'jabatan' => 'Officer',
            'type' => 'officer',
            'telp' => '081234567893',
        ]);

        // 5. Akun Pengguna
        $this->user1 = User::create([
            'name' => 'Soni Setiawan',
            'email' => 'soni@arap.local',
            'password' => Hash::make('password123'),
            'peserta_id' => $this->peserta1->id,
        ]);
        $this->user1->roles()->attach($roleUser);

        $this->user2 = User::create([
            'name' => 'Dewi Lestari',
            'email' => 'dewi@arap.local',
            'password' => Hash::make('password123'),
            'peserta_id' => $this->peserta2->id,
        ]);
        $this->user2->roles()->attach($roleUser);

        $this->adminTU = User::create([
            'name' => 'Staf Tata Usaha',
            'email' => 'tu@arap.local',
            'password' => Hash::make('password123'),
        ]);
        $this->adminTU->roles()->attach([$roleUltraman->id]);
    }

    /**
     * Skenario Lengkap Integrasi End-to-End:
     * 1. Login Relawan via NIK
     * 2. Presensi Masuk (Check-in) GPS & Live Selfie
     * 3. Verifikasi Kehadiran di Monitoring & Dashboard Admin
     * 4. Presensi Pulang (Check-out) GPS & Live Selfie
     * 5. Relawan 2 Pengajuan Izin/Sakit Mandiri dengan Lampiran Surat
     * 6. Admin TU Menyetujui Izin
     * 7. Catat Log Fingerprint Mesin Historis (Pools) untuk Peserta 3 & Hari Libur
     * 8. Rekapitulasi Kehadiran Gabungan 20-19 & Ekspor Excel / PDF Resmi SPPG Kalisapu.
     */
    public function test_full_attendance_lifecycle_end_to_end(): void
    {
        Storage::fake('attendance_photos');
        Storage::fake('izin_attachments');

        // --- TAHAP 1: Login Relawan via NIK ---
        $loginResponse = $this->post('/login', [
            'email' => '3328010101900001', // Identitas NIK Soni
            'password' => 'password123',
        ]);
        $loginResponse->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($this->user1);

        // --- TAHAP 2: Presensi Check-in Mobile dengan Live Selfie ---
        $checkInPhoto = UploadedFile::fake()->image('selfie_in.jpg', 640, 480);
        $checkInResponse = $this->actingAs($this->user1)->post('/mobile-attendance/submit', [
            'type' => 'check_in',
            'latitude' => -6.9885100, // Dalam radius 100m SPPG Kalisapu
            'longitude' => 109.1378100,
            'accuracy' => 12.0,
            'photo' => $checkInPhoto,
        ]);

        $checkInResponse->assertStatus(200);
        $checkInResponse->assertJson(['success' => true]);

        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $attendance = MobileAttendance::where('peserta_id', $this->peserta1->id)->first();
        $this->assertNotNull($attendance);
        $this->assertEquals($today, $attendance->attendance_date->format('Y-m-d'));
        $this->assertDatabaseHas('attendance_photos', [
            'type' => 'check_in',
        ]);

        // --- TAHAP 3: Verifikasi Muncul di Monitoring & Dashboard Admin ---
        $dashResponse = $this->actingAs($this->adminTU)->get('/dashboard');
        $dashResponse->assertOk();
        $dashResponse->assertSee('Soni Setiawan');

        $monResponse = $this->actingAs($this->adminTU)->get('/admin/monitoring');
        $monResponse->assertOk();
        $monResponse->assertSee('Soni Setiawan');
        $monResponse->assertSee('Persiapan');

        // --- TAHAP 4: Presensi Check-out Mobile ---
        $checkOutPhoto = UploadedFile::fake()->image('selfie_out.jpg', 640, 480);
        $checkOutResponse = $this->actingAs($this->user1)->post('/mobile-attendance/submit', [
            'type' => 'check_out',
            'latitude' => -6.9885100,
            'longitude' => 109.1378100,
            'accuracy' => 15.0,
            'photo' => $checkOutPhoto,
        ]);

        $checkOutResponse->assertStatus(200);
        $checkOutResponse->assertJson(['success' => true]);

        $attendanceSoni = MobileAttendance::where('peserta_id', $this->peserta1->id)
            ->whereDate('attendance_date', $today)
            ->first();
        $this->assertNotNull($attendanceSoni->check_out_at);

        // --- TAHAP 5: Relawan 2 (Dewi) Mengajukan Sakit Mandiri ---
        $suratDokter = UploadedFile::fake()->createWithContent(
            'surat_dokter.pdf',
            "%PDF-1.4\n1 0 obj\n<<>>\nendobj\ntrailer\n<<>>\n%%EOF"
        );
        $izinResponse = $this->actingAs($this->user2)->post('/izin', [
            'jenis' => 'sakit',
            'tgl_mulai' => $today,
            'tgl_selesai' => $today,
            'alasan' => 'Sakit demam dan flu berat',
            'surat_dokter' => $suratDokter,
        ]);

        $izinResponse->assertRedirect('/izin');
        $this->assertDatabaseHas('permohonan_izins', [
            'peserta_id' => $this->peserta2->id,
            'jenis' => 'sakit',
            'status' => 'menunggu',
        ]);

        $izinDewi = PermohonanIzin::where('peserta_id', $this->peserta2->id)->first();
        $this->assertNotNull($izinDewi->surat_dokter);

        // --- TAHAP 6: Admin TU Menyetujui Permohonan Sakit ---
        $adminReviewResponse = $this->actingAs($this->adminTU)->post("/admin/izin/{$izinDewi->id}/review", [
            'status' => 'disetujui',
            'catatan_admin' => 'Disetujui. Istirahat yang cukup.',
        ]);

        $adminReviewResponse->assertRedirect();
        $izinDewi->refresh();
        $this->assertTrue($izinDewi->isApproved());
        $this->assertEquals($this->adminTU->id, $izinDewi->approved_by);

        // --- TAHAP 7: Integrasi Log Fingerprint Mesin Pools (Peserta 3) & Hari Libur ---
        // Catat log fingerprint untuk Kapten Aslap (UID 1003) pada 2 hari lalu
        $twoDaysAgo = Carbon::now('Asia/Jakarta')->subDays(2)->toDateString();
        Pool::create([
            'mesin_id' => 1,
            'iduser' => $this->peserta3->uid,
            'date' => $twoDaysAgo,
            'time' => '07:55:00',
        ]);
        Pool::create([
            'mesin_id' => 1,
            'iduser' => $this->peserta3->uid,
            'date' => $twoDaysAgo,
            'time' => '17:05:00',
        ]);

        // Catat hari libur nasional
        $threeDaysAgo = Carbon::now('Asia/Jakarta')->subDays(3)->toDateString();
        Libur::create([
            'tanggal' => $threeDaysAgo,
            'ket' => 'Libur Nasional Bersama',
        ]);

        // --- TAHAP 8: Rekapitulasi Gabungan Periode 20-19 & Ekspor Excel/PDF ---
        $now = Carbon::now('Asia/Jakarta');
        $rekapResponse = $this->actingAs($this->adminTU)->get("/admin/rekap?year={$now->year}&month={$now->month}");
        $rekapResponse->assertOk();
        $rekapResponse->assertSee('Soni Setiawan');
        $rekapResponse->assertSee('Dewi Lestari');
        $rekapResponse->assertSee('Kapten Aslap');

        // Ekspor Excel
        $excelResponse = $this->actingAs($this->adminTU)->get("/admin/rekap/export/excel?year={$now->year}&month={$now->month}");
        $excelResponse->assertOk();
        $this->assertStringContainsString('.xlsx', (string) $excelResponse->headers->get('content-disposition'));

        // Ekspor PDF
        $pdfResponse = $this->actingAs($this->adminTU)->get("/admin/rekap/export/pdf?year={$now->year}&month={$now->month}");
        $pdfResponse->assertOk();
        $this->assertStringStartsWith('%PDF', (string) $pdfResponse->getContent());

        // Verifikasi view PDF memuat kop resmi Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu
        $recapService = app(AttendanceRecapService::class);
        $recapData = $recapService->generateRecap($now->year, $now->month);
        $renderedPdfView = view('admin.rekap.pdf', [
            'recap' => $recapData,
            'year' => $now->year,
            'month' => $now->month,
            'divisi' => null,
            'search' => null,
            'printedAt' => $now,
        ])->render();

        $this->assertStringContainsString('Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu', $renderedPdfView);
        $this->assertStringNotContainsString('Pertanian', $renderedPdfView);
    }
}
