<?php

namespace Tests\Feature;

use App\Models\PermohonanIzin;
use App\Models\Peserta;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PermohonanIzinTest extends TestCase
{
    use RefreshDatabase;

    protected User $relawan1;

    protected User $relawan2;

    protected User $staffUser;

    protected User $umumAdmin;

    protected Peserta $peserta1;

    protected Peserta $peserta2;

    protected function setUp(): void
    {
        parent::setUp();
        Storage::fake('izin_attachments');

        $roleUser = Role::create(['name' => 'User']);
        $roleOfficer = Role::create(['name' => 'Officer']);
        $roleUmum = Role::create(['name' => 'Umum']);

        $this->peserta1 = Peserta::create([
            'name' => 'Relawan Pertama',
            'nik' => '1111111111111111',
            'jabatan' => 'Persiapan',
        ]);
        $this->relawan1 = User::factory()->create(['peserta_id' => $this->peserta1->id]);
        $this->relawan1->roles()->attach($roleUser);

        $this->peserta2 = Peserta::create([
            'name' => 'Relawan Kedua',
            'nik' => '2222222222222222',
            'jabatan' => 'Pengolahan',
        ]);
        $this->relawan2 = User::factory()->create(['peserta_id' => $this->peserta2->id]);
        $this->relawan2->roles()->attach($roleUser);

        $this->staffUser = User::factory()->create(['name' => 'Staf Officer']);
        $this->staffUser->roles()->attach($roleOfficer);

        $this->umumAdmin = User::factory()->create(['name' => 'Admin Umum TU']);
        $this->umumAdmin->roles()->attach($roleUmum);
    }

    public function test_unauthenticated_user_cannot_access_izin(): void
    {
        $this->get('/izin')->assertRedirect('/login');
        $this->get('/admin/izin')->assertRedirect('/login');
    }

    public function test_relawan_can_view_personal_izin_page(): void
    {
        $response = $this->actingAs($this->relawan1)->get('/izin');

        $response->assertOk();
        $response->assertViewIs('izin.index');
        $response->assertSee('Permohonan Izin & Sakit Relawan', false);
    }

    public function test_relawan_can_submit_izin_with_file_attachment(): void
    {
        $file = UploadedFile::fake()->createWithContent(
            'surat_dokter.pdf',
            "%PDF-1.4\n1 0 obj\n<<>>\nendobj\ntrailer\n<<>>\n%%EOF"
        );

        $payload = [
            'jenis' => 'sakit',
            'tgl_mulai' => '2026-11-25',
            'tgl_selesai' => '2026-11-26',
            'alasan' => 'Demam tinggi dan istirahat dokter',
            'surat_dokter' => $file,
        ];

        $response = $this->actingAs($this->relawan1)->post('/izin', $payload);

        $response->assertRedirect('/izin');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('permohonan_izins', [
            'user_id' => $this->relawan1->id,
            'peserta_id' => $this->peserta1->id,
            'jenis' => 'sakit',
            'status' => 'menunggu',
            'alasan' => 'Demam tinggi dan istirahat dokter',
        ]);

        $izin = PermohonanIzin::first();
        $this->assertNotNull($izin->surat_dokter);
        Storage::disk('izin_attachments')->assertExists($izin->surat_dokter);
    }

    public function test_submit_izin_validates_dates_and_file(): void
    {
        $invalidPayload = [
            'jenis' => 'izin',
            'tgl_mulai' => '2026-11-26',
            'tgl_selesai' => '2026-11-24', // Selesai sebelum mulai
            'alasan' => '',
            'surat_dokter' => UploadedFile::fake()->create('script.exe', 100),
        ];

        $response = $this->actingAs($this->relawan1)->post('/izin', $invalidPayload);

        $response->assertSessionHasErrors(['tgl_selesai', 'alasan', 'surat_dokter']);
    }

    public function test_relawan_can_cancel_own_pending_izin(): void
    {
        $izin = PermohonanIzin::create([
            'user_id' => $this->relawan1->id,
            'peserta_id' => $this->peserta1->id,
            'jenis' => 'izin',
            'tgl_mulai' => '2026-11-27',
            'tgl_selesai' => '2026-11-27',
            'alasan' => 'Keperluan keluarga',
            'status' => 'menunggu',
        ]);

        $response = $this->actingAs($this->relawan1)->delete("/izin/{$izin->id}");

        $response->assertRedirect('/izin');
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('permohonan_izins', ['id' => $izin->id]);
    }

    public function test_relawan_cannot_cancel_already_approved_izin(): void
    {
        $izin = PermohonanIzin::create([
            'user_id' => $this->relawan1->id,
            'peserta_id' => $this->peserta1->id,
            'jenis' => 'izin',
            'tgl_mulai' => '2026-11-27',
            'tgl_selesai' => '2026-11-27',
            'alasan' => 'Keperluan keluarga',
            'status' => 'disetujui',
        ]);

        $response = $this->actingAs($this->relawan1)->delete("/izin/{$izin->id}");

        $response->assertSessionHas('error');
        $this->assertDatabaseHas('permohonan_izins', ['id' => $izin->id]);
    }

    public function test_anti_idor_protects_private_attachment(): void
    {
        $file = UploadedFile::fake()->create('surat.pdf', 200, 'application/pdf');
        $path = $file->storeAs('', 'surat_relawan1.pdf', 'izin_attachments');

        $izin = PermohonanIzin::create([
            'user_id' => $this->relawan1->id,
            'peserta_id' => $this->peserta1->id,
            'jenis' => 'sakit',
            'tgl_mulai' => '2026-11-25',
            'tgl_selesai' => '2026-11-25',
            'alasan' => 'Sakit',
            'surat_dokter' => $path,
            'status' => 'menunggu',
        ]);

        // Relawan 2 mencoba mengakses surat Relawan 1: WAJIB 403 Forbidden!
        $this->actingAs($this->relawan2)->get("/izin-attachments/{$izin->id}")->assertForbidden();

        // Relawan 1 (pemilik): Berhasil 200
        $this->actingAs($this->relawan1)->get("/izin-attachments/{$izin->id}")->assertOk();

        // Staf / Admin TU: Berhasil 200
        $this->actingAs($this->staffUser)->get("/izin-attachments/{$izin->id}")->assertOk();
    }

    public function test_non_staff_gets_403_on_admin_izin(): void
    {
        $this->actingAs($this->relawan1)->get('/admin/izin')->assertForbidden();
    }

    public function test_staff_can_view_admin_izin_list_with_filters(): void
    {
        PermohonanIzin::create([
            'user_id' => $this->relawan1->id,
            'peserta_id' => $this->peserta1->id,
            'jenis' => 'izin',
            'tgl_mulai' => '2026-11-25',
            'tgl_selesai' => '2026-11-25',
            'alasan' => 'Urusan Bank',
            'status' => 'menunggu',
        ]);

        $response = $this->actingAs($this->staffUser)->get('/admin/izin');

        $response->assertOk();
        $response->assertViewIs('admin.izin.index');
        $response->assertSee('Relawan Pertama');
        $response->assertSee('Urusan Bank');
    }

    public function test_admin_umum_can_approve_and_reject_izin(): void
    {
        $izin = PermohonanIzin::create([
            'user_id' => $this->relawan1->id,
            'peserta_id' => $this->peserta1->id,
            'jenis' => 'sakit',
            'tgl_mulai' => '2026-11-25',
            'tgl_selesai' => '2026-11-26',
            'alasan' => 'Rawat inap',
            'status' => 'menunggu',
        ]);

        // Approve
        $approvePayload = [
            'status' => 'disetujui',
            'catatan_admin' => 'Surat dokter valid, disetujui.',
        ];

        $response = $this->actingAs($this->umumAdmin)->post("/admin/izin/{$izin->id}/review", $approvePayload);

        $response->assertRedirect('/admin/izin');
        $response->assertSessionHas('success');

        $izin->refresh();
        $this->assertEquals('disetujui', $izin->status);
        $this->assertEquals('Surat dokter valid, disetujui.', $izin->catatan_admin);
        $this->assertEquals($this->umumAdmin->id, $izin->approved_by);
        $this->assertNotNull($izin->approved_at);

        // Reject
        $rejectPayload = [
            'status' => 'ditolak',
            'catatan_admin' => 'Dokumen tidak lengkap.',
        ];

        $this->actingAs($this->umumAdmin)->post("/admin/izin/{$izin->id}/review", $rejectPayload);

        $izin->refresh();
        $this->assertEquals('ditolak', $izin->status);
    }
}
