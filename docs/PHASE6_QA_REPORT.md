# LAPORAN QUALITY ASSURANCE (QA) & SECURITY AUDIT — PHASE 6
## Sistem Presensi Relawan & Pegawai: ARAP v2 (SPPG Kalisapu)

**Tanggal Audit:** 24 November 2026  
**Environment Audit:** PHP 8.5.12 (NTS Win32 VS17 x64) / Laravel 13.43.0  
**Target Repository:** `C:\laragon\www\arap-v2`  
**Target Branch:** `v2/laravel-13-modernization`  
**Basis Data Pengujian:** SQLite in-memory (`:memory:`) untuk automated tests & MySQL 8.0.30 (`arap_v2_dev`) untuk read-only performance benchmark.  
**Status Keseluruhan:** **PASSED / PRODUCTION READY (100% LULUS)**

---

## 1. Executive Summary & QA Sign-off

Pengujian Phase 6 difokuskan pada penjaminan mutu menyeluruh tingkat produksi (*production-grade validation*), penguatan keamanan (*security hardening*), audit performa database nyata bebas N+1 query, penyelarasan identitas resmi institusi, verifikasi responsive/PWA, serta pengujian regresi penuh terhadap seluruh modul yang telah dibangun dari Phase 2 hingga Phase 5B.

Seluruh 114 automated test suite (540 assertions) berhasil dieksekusi dengan status **100% LULUS**. Seluruh celah N+1 query berhasil dieliminasi (rekap bulanan 47 peserta kini hanya membutuhkan **5 hingga 6 query SQL** dengan waktu eksekusi ~840 ms). Keamanan aplikasi diperkuat dengan *Security Headers*, *Rate Limiting*, proteksi *Anti-IDOR*, serta *Magic Bytes Inspection* untuk berkas lampiran.

---

## 2. Koreksi Identitas Resmi & Konsistensi Divisi SPPG Kalisapu

### 2.1. Penyelarasan Nomenklatur Lembaga
Seluruh teks lembaga lama (*"Sentra Pelayanan Pertanian Terpadu"*) pada kop laporan PDF, template Excel, view Blade, dan dokumentasi telah diperbarui secara konsisten menjadi:
> **Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu**

### 2.2. Standardisasi Daftar Divisi Resmi
Daftar divisi di seluruh controller (`PegawaiController`, `MonitoringController`, `RekapController`, `DashboardController`, `WorkingHoursSettingController`) serta antarmuka visual (button group filter dan modal dropdown) telah diselaraskan 100% ke 8 divisi operasional aktual SPPG Kalisapu dengan perlakuan khusus untuk peran **Officer**:
1. **Officer** *(Penanggung Jawab / Pengawas Lapangan — disorot dengan styling khusus)*
2. **Persiapan** *(Logistik & bahan baku dapur)*
3. **Pengolahan** *(Produksi makanan utama)*
4. **Pemorsian** *(Penimbangan & pemorsian menu)*
5. **Distribusi** *(Pengantaran & serah terima makanan)*
6. **Kebersihan** *(Sanitasi & kebersihan dapur/lingkungan)*
7. **Security** *(Pengamanan & pos jaga)*
8. **Ompreng** *(Pencucian & sterilisasi wadah makanan)*

---

## 3. Hasil Pengujian Integrasi End-to-End (`EndToEndAttendanceIntegrationTest`)

Pengujian integrasi mensimulasikan siklus hidup operasional presensi harian secara utuh lintas modul:

| Langkah Alur Kerja | Tindakan Pengujian | Hasil yang Diharapkan | Status |
| :--- | :--- | :--- | :---: |
| **1. Autentikasi** | Login relawan via nomor identitas (NIK: `3328010101900001`) | Redirect ke `/dashboard` dan terautentikasi sebagai relawan | **PASSED** |
| **2. Presensi Masuk** | Check-in mobile dengan GPS (-6.9885100, 109.1378100) dan live selfie | Data tercatat di `mobile_attendances` & foto tersimpan di private disk `attendance_photos` | **PASSED** |
| **3. Monitoring** | Admin TU membuka `/dashboard` dan `/admin/monitoring` | Presensi masuk relawan muncul di KPI dan tabel monitoring harian secara real-time | **PASSED** |
| **4. Presensi Pulang** | Check-out mobile dengan live selfie sesuai jam kerja | Record diperbarui, `check_out_at` tercatat, skor naik menjadi 1.00 | **PASSED** |
| **5. Pengajuan Izin** | Relawan 2 mengajukan sakit mandiri via `/izin` dengan berkas surat dokter | Record `permohonan_izins` tersimpan berstatus `menunggu` dan berkas masuk ke private disk `izin_attachments` | **PASSED** |
| **6. Verifikasi TU** | Admin TU menyetujui pengajuan sakit via `/admin/izin/{id}/review` | Status berubah menjadi `disetujui`, mencatat `approved_by` dan `approved_at` | **PASSED** |
| **7. Multi-Sumber** | Simulasi log fingerprint mesin `pools` (Peserta 3) dan hari libur `liburs` | Sistem siap memproses multi-layer data (Mobile + Pools + Izin + Libur) | **PASSED** |
| **8. Rekapitulasi** | Akses `/admin/rekap` periode 20–19 | Evaluasi tepat waktu, izin sakit, dan fingerprint mesin terintegrasi akurat | **PASSED** |
| **9. Ekspor Laporan** | Unduh laporan format Microsoft Excel dan Dokumen PDF | Excel terunduh (`.xlsx`), PDF berheader `%PDF` memuat kop resmi **Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu** | **PASSED** |

---

## 4. Security Hardening & Automated Security Testing

### 4.1. Security Headers Middleware (`App\Http\Middleware\SecurityHeaders`)
Telah diimplementasikan dan didaftarkan pada web stack `bootstrap/app.php`:
- `X-Frame-Options: SAMEORIGIN` *(Mencegah serangan Clickjacking)*
- `X-Content-Type-Options: nosniff` *(Mencegah MIME-type sniffing)*
- `Referrer-Policy: strict-origin-when-cross-origin` *(Melindungi kebocoran data URL rujukan)*
- `Permissions-Policy: camera=(self), geolocation=(self), microphone=()` *(Mengizinkan kamera dan GPS secara aman hanya untuk origin aplikasi ARAP v2 PWA)*

### 4.2. Matriks Otorisasi Role-Based Access Control (RBAC)
| Route Endpoint | Role `User` (Relawan) | Role `Officer` | Role `Tata Usaha` / `Umum` |
| :--- | :---: | :---: | :---: |
| `GET /dashboard` | **200 OK** *(Ringkasan Pribadi)* | **200 OK** *(KPI Admin)* | **200 OK** *(KPI Admin)* |
| `GET /mobile-attendance` | **200 OK** | **200 OK** | **200 OK** |
| `GET /izin` | **200 OK** | **200 OK** | **200 OK** |
| `GET /admin/monitoring` | **403 Forbidden** | **200 OK** | **200 OK** |
| `GET /admin/rekap` | **403 Forbidden** | **200 OK** | **200 OK** |
| `GET /admin/rekap/export/*` | **403 Forbidden** | **200 OK** | **200 OK** |
| `GET /admin/izin` | **403 Forbidden** | **200 OK** | **200 OK** |
| `GET /admin/arsip-fingerprint` | **403 Forbidden** | **200 OK** | **200 OK** |
| `GET /admin/pegawai` | **403 Forbidden** | **403 Forbidden** | **200 OK** |
| `GET /admin/settings/locations` | **403 Forbidden** | **403 Forbidden** | **200 OK** |
| `GET /admin/settings/working-hours`| **403 Forbidden** | **403 Forbidden** | **200 OK** |

### 4.3. Anti-Gallery & Validasi Berkas Nyata (Anti-Malicious Upload)
- **Halaman Presensi Mobile:** Dikonfirmasi bersih dari `<input type="file">`. Pengambilan foto wajib melalui WebRTC `getUserMedia` live camera canvas.
- **Validasi GD Image:** Berkas skrip teks/PHP palsu yang dinamai `.jpg` ditolak oleh `SelfieMediaService` dengan error `Data berkas yang dikirim bukan format gambar valid`.
- **Magic Bytes Inspection pada Lampiran Izin:** Form request `StorePermohonanIzinRequest` menerapkan inspeksi header binary:
  - Berkas `.pdf` wajib diawali signature `%PDF` (magic bytes `0x25 0x50 0x44 0x46`).
  - Berkas gambar `.jpg`/`.png` wajib lolos validasi `getimagesize()`.
  - Berkas berbahaya atau skrip yang disamarkan otomatis ditolak dengan pesan error validasi.

### 4.4. Rate Limiting Presensi Mobile
Endpoint `POST /mobile-attendance/submit` diproteksi middleware `throttle:20,1` (maksimal 20 percobaan per menit per user/IP) untuk mencegah bot flooding dan abuse.

### 4.5. Proteksi Anti-IDOR (Insecure Direct Object Reference)
Endpoint stream berkas privat `/attendance-photos/{id}` dan `/izin-attachments/{id}` memverifikasi kepemilikan berkas atau otorisasi staf (`can:staff-access`). Percobaan akses oleh pengguna yang tidak berhak langsung diblokir dengan HTTP 403 Forbidden.

---

## 5. Audit Performa & Benchmark Live Database MySQL (`arap_v2_dev`)

### 5.1. Benchmark Read-Only Engine Rekapitulasi (`AttendanceRecapService`)
Uji performa dijalankan langsung terhadap 9.838 log riwayat `pools` dan 47 master `pesertas` pada database operasional MySQL Laragon (`arap_v2_dev`):

| Periode Rekap | Log Pools Terproses | Peserta | Total Query SQL | Durasi Eksekusi | Status N+1 Query |
| :---: | :---: | :---: | :---: | :---: | :---: |
| **November 2026** | 231 baris log | 47 orang | **6 queries** | **840.98 ms** | **ZERO N+1 (Optimal)** |
| **Oktober 2026** | 1.009 baris log | 47 orang | **5 queries** | **1.260.17 ms** | **ZERO N+1 (Optimal)** |

*Catatan Optimasi:* Penambahan runtime in-memory cache pada model `Setting` (`Setting::$runtimeCache`) memangkas lebih dari 2.000 panggilan query SQL per siklus evaluasi rekapitulasi menjadi tepat 1 query saja untuk membaca konfigurasi jam kerja.

### 5.2. Audit Query Halaman-Halaman Utama
| Halaman / Controller | Total Query SQL | Waktu Respon | Catatan Eager Loading |
| :--- | :---: | :---: | :--- |
| `/dashboard` (`DashboardController`) | **7 queries** | ~170 ms | Menggunakan `with(['peserta', 'photos'])` dan agregasi in-memory |
| `/admin/monitoring` (`MonitoringController`) | **7 queries** | ~66 ms | Menggunakan `with(['peserta', 'location', 'photos', 'user'])` |
| `/admin/pegawai` (`PegawaiController`) | **10 queries** | ~267 ms | Menggunakan `with(['user.roles'])` dan `withCount(...)` |
| `/admin/arsip-fingerprint` (`ArsipFingerprintController`) | **8 queries** | ~56 ms | Menggunakan `with(['peserta', 'mesin'])` |
| `/admin/rekap` (`RekapController`) | **6 queries** | ~354 ms | Batch eager loading `pools`, `mobile_attendances`, `permohonan_izins` |

### 5.3. Audit Indexing Database
Tabel baru hasil migrasi Phase 3 telah memiliki index komposit yang optimal:
- `mobile_attendances`: Index unik `(peserta_id, attendance_date)` dan index filter `(attendance_date, status)`.
- `attendance_photos`: Index relasi `(mobile_attendance_id, type)`.
- `attendance_audit_logs`: Kolom index dan foreign key `peserta_id`, `user_id`.

---

## 6. Verifikasi Responsive Layout, PWA & Navigasi

1. **Bootstrap 5 Responsive Layout:**
   - Seluruh tabel utama dilengkapi pembungkus `.table-responsive` sehingga tidak terjadi layout break pada viewport mobile (< 576px).
   - Sidebar navigasi desktop tersembunyi secara otomatis pada layar kecil dan dapat diakses melalui drawer *Offcanvas* (`#mobileSidebar`) via tombol hamburger topbar.
   - Tombol-tombol filter divisi tersusun fleksibel (`d-flex flex-wrap gap-1`) dan nyaman ditekan di layar sentuh (*touch-friendly*).
2. **Integritas Navigasi:**
   - Audit tautan mengonfirmasi **0 tautan mati / 0 placeholder `#`** pada `sidebar-menu.blade.php` maupun `dashboard.blade.php`. Seluruh menu terhubung ke route Laravel yang valid dengan pengecekan Gate yang ketat.
3. **PWA Manifest & Service Worker:**
   - Berkas `public/manifest.json` telah diverifikasi valid JSON dengan metadata:
     - Name: `ARAP - Presensi SPPG Kalisapu`
     - Short Name: `ARAP`
     - Start URL: `/dashboard`
     - Display: `standalone`
     - Orientation: `portrait-primary`
   - Berkas `public/sw.js` siap melayani caching asset statis.
4. **Kompilasi Frontend (Vite 8):**
   - Perintah `npm run build` selesai dalam 4.8 detik menghasilkan bundle terkompresi bersih (gzip: CSS 47.8 kB, JS 67.2 kB) tanpa error.

---

## 7. Rekapitulasi Automated Test Suite

| No | File Test Suite | Kategori | Jumlah Test | Status |
| :---: | :--- | :--- | :---: | :---: |
| 1 | `tests/Feature/EndToEndAttendanceIntegrationTest.php` | Integration / E2E | 1 | **PASSED** |
| 2 | `tests/Feature/SecurityHardeningTest.php` | Security / RBAC / Headers | 6 | **PASSED** |
| 3 | `tests/Feature/PerformanceQueryCountTest.php` | Performance / N+1 | 6 | **PASSED** |
| 4 | `tests/Feature/AdminPegawaiTest.php` | Regression / Master Data | 10 | **PASSED** |
| 5 | `tests/Feature/PermohonanIzinTest.php` | Regression / Workflow Izin | 10 | **PASSED** |
| 6 | `tests/Feature/ArsipFingerprintTest.php` | Regression / Arsip Data | 4 | **PASSED** |
| 7 | `tests/Feature/AttendanceRecapAndExportTest.php` | Regression / Rekap & Export | 6 | **PASSED** |
| 8 | `tests/Feature/AdminMonitoringTest.php` | Regression / Monitoring | 7 | **PASSED** |
| 9 | `tests/Feature/AdminSettingsTest.php` | Regression / Settings | 8 | **PASSED** |
| 10 | `tests/Feature/DashboardStatisticsTest.php` | Regression / KPI Dashboard | 9 | **PASSED** |
| 11 | `tests/Feature/AttendanceCalculationServiceTest.php`| Regression / Service Presensi | 9 | **PASSED** |
| 12 | `tests/Feature/GeofencingServiceTest.php` | Regression / Geofence | 9 | **PASSED** |
| 13 | `tests/Feature/SelfieMediaServiceTest.php` | Regression / Media & Storage | 6 | **PASSED** |
| 14 | `tests/Feature/MobileAttendanceTest.php` | Regression / Presensi Mobile | 7 | **PASSED** |
| 15 | `tests/Feature/AttendancePhotoAuthorizationTest.php`| Regression / Proteksi Berkas | 6 | **PASSED** |
| 16 | `tests/Feature/AuthenticationTest.php` | Regression / Auth Fortify | 5 | **PASSED** |
| 17 | `tests/Feature/IdentityLoginTest.php` | Regression / Login NIK & UID | 4 | **PASSED** |
| 18 | `tests/Feature/RolePermissionTest.php` | Regression / Gate RBAC | 1 | **PASSED** |
| **TOTAL** | **18 Test Suites** | **Seluruh Modul ARAP v2** | **114 Tests** | **100% LULUS (540 Assertions)** |

---

## 8. Kesimpulan & Kesiapan Phase 7

Seluruh sasaran pengujian, hardening keamanan, benchmark performa, dan koreksi identitas SPPG Kalisapu pada **Phase 6** telah terpenuhi secara sempurna. Sistem presensi **ARAP v2** kini berada dalam kondisi stabil, aman, bebas bottleneck performa, dan siap melangkah ke tahap akhir:
👉 **PHASE 7 — DEPLOYMENT & DOCUMENTATION**.
