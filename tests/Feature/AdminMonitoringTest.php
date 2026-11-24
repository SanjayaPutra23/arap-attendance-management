<?php

namespace Tests\Feature;

use App\Models\AttendanceAuditLog;
use App\Models\AttendanceLocation;
use App\Models\AttendancePhoto;
use App\Models\MobileAttendance;
use App\Models\Peserta;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminMonitoringTest extends TestCase
{
    use RefreshDatabase;

    protected User $relawanUser;

    protected User $officerUser;

    protected User $umumUser;

    protected Peserta $pesertaOfficer;

    protected Peserta $pesertaDapur;

    protected AttendanceLocation $location;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('attendance_photos');

        $this->location = AttendanceLocation::create([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9048386,
            'longitude' => 109.1177696,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        $roleUser = Role::create(['name' => 'User']);
        $roleOfficer = Role::create(['name' => 'Officer']);
        $roleUmum = Role::create(['name' => 'Umum']);

        // Relawan biasa
        $this->pesertaDapur = Peserta::create([
            'uid' => 101,
            'name' => 'Budi Santoso',
            'nik' => '101',
            'jabatan' => 'Persiapan',
        ]);
        $this->relawanUser = User::factory()->create([
            'peserta_id' => $this->pesertaDapur->id,
            'name' => 'Budi Santoso',
            'email' => '101@arap.local',
        ]);
        $this->relawanUser->roles()->attach($roleUser);

        // Officer SPPG
        $this->pesertaOfficer = Peserta::create([
            'uid' => 102,
            'name' => 'Siti Aminah',
            'nik' => '102',
            'jabatan' => 'Officer',
        ]);
        $this->officerUser = User::factory()->create([
            'peserta_id' => $this->pesertaOfficer->id,
            'name' => 'Siti Aminah',
            'email' => '102@arap.local',
        ]);
        $this->officerUser->roles()->attach($roleOfficer);

        // Admin Umum
        $this->umumUser = User::factory()->create([
            'name' => 'Admin Umum SPPG',
            'email' => 'umum@arap.local',
        ]);
        $this->umumUser->roles()->attach($roleUmum);
    }

    public function test_unauthenticated_user_cannot_access_monitoring(): void
    {
        $response = $this->get('/admin/monitoring');

        $response->assertRedirect('/login');
    }

    public function test_regular_relawan_without_staff_access_gets_403_forbidden(): void
    {
        $response = $this->actingAs($this->relawanUser)->get('/admin/monitoring');

        $response->assertForbidden();
    }

    public function test_officer_can_access_monitoring(): void
    {
        $response = $this->actingAs($this->officerUser)->get('/admin/monitoring');

        $response->assertOk();
        $response->assertViewIs('admin.monitoring.index');
        $response->assertSee('Monitoring Presensi Harian & Peta Real-Time', false);
    }

    public function test_umum_admin_can_access_monitoring(): void
    {
        $response = $this->actingAs($this->umumUser)->get('/admin/monitoring');

        $response->assertOk();
        $response->assertViewIs('admin.monitoring.index');
    }

    public function test_monitoring_filters_by_date(): void
    {
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $yesterday = Carbon::now('Asia/Jakarta')->subDay()->toDateString();

        MobileAttendance::create([
            'peserta_id' => $this->pesertaOfficer->id,
            'user_id' => $this->officerUser->id,
            'attendance_location_id' => $this->location->id,
            'attendance_date' => $today,
            'check_in_at' => Carbon::now('Asia/Jakarta'),
            'check_in_lat' => -6.9048386,
            'check_in_lng' => 109.1177696,
            'check_in_distance_meters' => 5.0,
            'check_in_accuracy_meters' => 12.0,
            'status' => 'tepat_waktu',
            'score' => 1.0,
        ]);

        MobileAttendance::create([
            'peserta_id' => $this->pesertaDapur->id,
            'user_id' => $this->relawanUser->id,
            'attendance_location_id' => $this->location->id,
            'attendance_date' => $yesterday,
            'check_in_at' => Carbon::yesterday('Asia/Jakarta'),
            'check_in_lat' => -6.9048386,
            'check_in_lng' => 109.1177696,
            'check_in_distance_meters' => 10.0,
            'check_in_accuracy_meters' => 15.0,
            'status' => 'terlambat',
            'score' => 0.8,
        ]);

        // Login as Admin Umum: can see Officer today, but not Dapur
        $responseToday = $this->actingAs($this->umumUser)->get("/admin/monitoring?date={$today}");
        $responseToday->assertOk();
        $responseToday->assertSee('Siti Aminah');
        $responseToday->assertDontSee('Budi Santoso');

        // Login as Admin Umum: can see Dapur yesterday, but not Officer
        $responseYesterday = $this->actingAs($this->umumUser)->get("/admin/monitoring?date={$yesterday}");
        $responseYesterday->assertOk();
        $responseYesterday->assertSee('Budi Santoso');
        $responseYesterday->assertDontSee('Siti Aminah');
    }

    public function test_monitoring_filters_by_division_including_officer(): void
    {
        $today = Carbon::now('Asia/Jakarta')->toDateString();

        MobileAttendance::create([
            'peserta_id' => $this->pesertaOfficer->id,
            'user_id' => $this->officerUser->id,
            'attendance_location_id' => $this->location->id,
            'attendance_date' => $today,
            'check_in_at' => Carbon::now('Asia/Jakarta'),
            'check_in_lat' => -6.9048386,
            'check_in_lng' => 109.1177696,
            'check_in_distance_meters' => 5.0,
            'check_in_accuracy_meters' => 10.0,
            'status' => 'tepat_waktu',
            'score' => 1.0,
        ]);

        MobileAttendance::create([
            'peserta_id' => $this->pesertaDapur->id,
            'user_id' => $this->relawanUser->id,
            'attendance_location_id' => $this->location->id,
            'attendance_date' => $today,
            'check_in_at' => Carbon::now('Asia/Jakarta'),
            'check_in_lat' => -6.9048386,
            'check_in_lng' => 109.1177696,
            'check_in_distance_meters' => 15.0,
            'check_in_accuracy_meters' => 15.0,
            'status' => 'tepat_waktu',
            'score' => 1.0,
        ]);

        // Filter divisi=officer (login as Admin Umum)
        $responseOfficer = $this->actingAs($this->umumUser)->get("/admin/monitoring?date={$today}&divisi=officer");
        $responseOfficer->assertOk();
        $responseOfficer->assertSee('Siti Aminah');
        $responseOfficer->assertDontSee('Budi Santoso');

        // Filter divisi=persiapan (login as Admin Umum)
        $responsePersiapan = $this->actingAs($this->umumUser)->get("/admin/monitoring?date={$today}&divisi=persiapan");
        $responsePersiapan->assertOk();
        $responsePersiapan->assertSee('Budi Santoso');
        $responsePersiapan->assertDontSee('Siti Aminah');
    }

    public function test_monitoring_searches_by_name_and_nik(): void
    {
        $today = Carbon::now('Asia/Jakarta')->toDateString();

        MobileAttendance::create([
            'peserta_id' => $this->pesertaOfficer->id,
            'user_id' => $this->officerUser->id,
            'attendance_location_id' => $this->location->id,
            'attendance_date' => $today,
            'check_in_at' => Carbon::now('Asia/Jakarta'),
            'check_in_lat' => -6.9048386,
            'check_in_lng' => 109.1177696,
            'check_in_distance_meters' => 5.0,
            'check_in_accuracy_meters' => 10.0,
            'status' => 'tepat_waktu',
            'score' => 1.0,
        ]);

        MobileAttendance::create([
            'peserta_id' => $this->pesertaDapur->id,
            'user_id' => $this->relawanUser->id,
            'attendance_location_id' => $this->location->id,
            'attendance_date' => $today,
            'check_in_at' => Carbon::now('Asia/Jakarta'),
            'check_in_lat' => -6.9048386,
            'check_in_lng' => 109.1177696,
            'check_in_distance_meters' => 15.0,
            'check_in_accuracy_meters' => 15.0,
            'status' => 'tepat_waktu',
            'score' => 1.0,
        ]);

        // Search by name "Siti" (login as Admin Umum)
        $response = $this->actingAs($this->umumUser)->get("/admin/monitoring?date={$today}&search=Siti");
        $response->assertOk();
        $response->assertSee('Siti Aminah');
        $response->assertDontSee('Budi Santoso');

        // Search by NIK "101" (login as Admin Umum)
        $responseNik = $this->actingAs($this->umumUser)->get("/admin/monitoring?date={$today}&search=101");
        $responseNik->assertOk();
        $responseNik->assertSee('Budi Santoso');
        $responseNik->assertDontSee('Siti Aminah');
    }

    public function test_monitoring_displays_rejected_audit_logs(): void
    {
        $today = Carbon::now('Asia/Jakarta')->toDateString();

        AttendanceAuditLog::create([
            'user_id' => $this->relawanUser->id,
            'peserta_id' => $this->pesertaDapur->id,
            'action' => 'check_in',
            'result' => 'rejected',
            'reason' => 'outside_geofence_radius',
            'latitude' => -6.9500000,
            'longitude' => 109.2000000,
            'distance_meters' => 5400.0,
            'accuracy_meters' => 20.0,
            'ip_address' => '127.0.0.1',
            'user_agent' => 'PHPUnit Test Browser',
            'created_at' => Carbon::now('Asia/Jakarta'),
        ]);

        $response = $this->actingAs($this->officerUser)->get("/admin/monitoring?date={$today}");
        $response->assertOk();
        $response->assertSee('Di Luar Radius Geofence SPPG');
        $response->assertSee('5400 m');
    }

    public function test_staff_dashboard_displays_today_kpi_and_recent_activities(): void
    {
        $today = Carbon::now('Asia/Jakarta')->toDateString();

        $att = MobileAttendance::create([
            'peserta_id' => $this->pesertaOfficer->id,
            'user_id' => $this->officerUser->id,
            'attendance_location_id' => $this->location->id,
            'attendance_date' => $today,
            'check_in_at' => Carbon::now('Asia/Jakarta'),
            'check_in_lat' => -6.9048386,
            'check_in_lng' => 109.1177696,
            'check_in_distance_meters' => 5.0,
            'check_in_accuracy_meters' => 10.0,
            'status' => 'tepat_waktu',
            'score' => 1.0,
        ]);

        AttendancePhoto::create([
            'mobile_attendance_id' => $att->id,
            'type' => 'check_in',
            'disk' => 'attendance_photos',
            'path' => 'photos/test_checkin.webp',
            'sha256_hash' => hash('sha256', 'test_photo'),
            'file_size_bytes' => 1024,
            'mime_type' => 'image/webp',
            'captured_at' => Carbon::now('Asia/Jakarta'),
        ]);

        $response = $this->actingAs($this->officerUser)->get('/dashboard');
        $response->assertOk();
        $response->assertSee('Monitoring Presensi Hari Ini');
        $response->assertSee('Tepat Waktu');
        $response->assertSee('10 Presensi Terkini');
        $response->assertSee('Siti Aminah');
    }
}
