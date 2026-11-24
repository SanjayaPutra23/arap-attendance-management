# ARAP v2 — Aplikasi Presensi Relawan & Pegawai SPPG Kalisapu

ARAP (Aplikasi Relawan & Pegawai) versi 2 merupakan modernisasi menyeluruh sistem presensi untuk **Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu**, dibangun dengan arsitektur modern berbasis **Laravel 13.x**, **PHP 8.5.12**, **Bootstrap 5.3 + SCSS**, **Vite**, dan arsitektur **Progressive Web App (PWA)** dengan Geofencing & Foto Selfie langsung.

---

## 🛠️ Stack Teknologi

- **Backend Framework:** Laravel 13.43.0
- **Runtime Environment:** PHP 8.5.12 (NTS Win32 VS17 x64)
- **Ekstensi PHP Aktif:** `sockets`, `zip`, `pdo_mysql`, `pdo_sqlite`, `sqlite3`, `mbstring`, `fileinfo`, `gd`, `openssl`, `intl`, `bcmath`
- **Autentikasi & RBAC:** Laravel Fortify v1.43 (Mendukung login via Email / NIK & Role Gates: `ultraman`, `umum`, `staff-access`, `user`)
- **Frontend & PWA:** Bootstrap 5.3, Bootstrap Icons, Leaflet.js, Vite 8, Web App Manifest & Service Worker
- **Export & Reporting:** `barryvdh/laravel-dompdf:^3.0`, `maatwebsite/excel:^3.1`
- **Penyimpanan Berkas Privat:** Private disk `attendance_photos` (`storage/app/private/attendance_photos`) & `izin_attachments` (`storage/app/private/izin_attachments`)

---

## 🚀 Panduan Setup & Eksekusi Lokal

Karena sistem memiliki multi-versi PHP pada Laragon, selalu gunakan binary PHP 8.5.12 secara eksplisit:

```powershell
# 1. Masuk ke direktori project
cd C:\laragon\www\arap-v2

# 2. Setup Environment
copy .env.example .env
& "C:\laragon\bin\php\php-8.5.12-nts-Win32-vs17-x64\php.exe" artisan key:generate

# 3. Setup Database arap_v2_dev & Migrasi Non-Destruktif
mysql -u root -e "CREATE DATABASE IF NOT EXISTS arap_v2_dev CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
cmd /c "mysql -u root --default-character-set=utf8mb4 arap_v2_dev < database_sql\arap.sql"
& "C:\laragon\bin\php\php-8.5.12-nts-Win32-vs17-x64\php.exe" artisan migrate
& "C:\laragon\bin\php\php-8.5.12-nts-Win32-vs17-x64\php.exe" artisan db:seed --class=AttendanceLocationSeeder

# 4. Instalasi Dependensi Composer
& "C:\laragon\bin\php\php-8.5.12-nts-Win32-vs17-x64\php.exe" C:\ProgramData\ComposerSetup\bin\composer.phar install

# 5. Instalasi & Build Asset Frontend
npm install
npm run build

# 6. Menjalankan Server Lokal
& "C:\laragon\bin\php\php-8.5.12-nts-Win32-vs17-x64\php.exe" artisan serve

# 7. Menjalankan Automated Test Suite
& "C:\laragon\bin\php\php-8.5.12-nts-Win32-vs17-x64\php.exe" artisan test
```

---

## 🧪 Pengujian Otomatis (Automated Testing)

Pengujian unit dan fitur berjalan otomatis pada database SQLite in-memory (`:memory:`) tanpa menyentuh database operasional MySQL (101 tests, 454 assertions, 100% lulus):

```powershell
& "C:\laragon\bin\php\php-8.5.12-nts-Win32-vs17-x64\php.exe" artisan test
```

Cakupan pengujian meliputi:
- Redirect pengunjung (guest) ke form login
- Rendering tampilan halaman login Bootstrap 5
- Autentikasi email dan logout pengguna
- Autentikasi menggunakan nomor identitas (NIK / UID relawan)
- Otorisasi hak akses Role-Based Access Control (RBAC) Gates (`ultraman`, `umum`, `staff-access`, `user`)
- Formula Geofencing Haversine, radius, dan validasi akurasi GPS
- Kompresi foto selfie via `ext-gd` dan hashing SHA-256 ke private disk `attendance_photos`
- Aturan perhitungan jam kerja per divisi/jabatan dan sistem poin (1.00 / 0.80 / 0.00)
- Alur lengkap Check-in, Check-out, Anti-duplikasi, dan Audit Log
- Proteksi otorisasi foto privat (Anti-IDOR)
- Monitoring kehadiran admin harian, peta sebaran Leaflet, modal selfie, dan review audit log
- Pengaturan master lokasi geofence SPPG dan pengaturan jam kerja divisi/Officer
- CRUD Master Pegawai / Relawan & Officer (`pesertas` + sinkronisasi akun `users` & role) serta proteksi non-destruktif
- Modul Permohonan Izin/Sakit mandiri relawan, upload berkas privat, pembatalan izin, serta review/approval Tata Usaha
- Penelusuran arsip log fingerprint historis mesin `FPDAPUR1` (9.838 baris data)
- Engine Rekapitulasi Kehadiran Gabungan periode 20 s.d. 19 (Mobile Attendance + Fingerprint + Izin Disetujui + Libur Nasional vs Alpha)
- Ekspor laporan bulanan ke format Microsoft Excel (.xlsx) dan Dokumen PDF (Landscape A4)

---

## 🖥️ Fitur Operasional & Modul Sistem

1. **Presensi Mobile PWA:**
   - Geofencing cerdas dengan validasi GPS & akurasi radius dinamis.
   - Kamera selfie langsung (WebRTC `getUserMedia`) anti-manipulasi galeri.
   - Perhitungan otomatis status datang tepat waktu, terlambat, dan pulang awal.
2. **Dashboard & Monitoring Admin:**
   - Ringkasan KPI kehadiran harian dan breakdown divisi (termasuk filter khusus **Officer**).
   - Peta sebaran kehadiran real-time berbasis Leaflet OpenStreetMap.
   - Modal preview foto selfie privat dan log percobaan presensi ditolak.
3. **Master Pegawai & Akun (`/admin/pegawai`):**
   - Pengelolaan data relawan & Officer SPPG dengan filter divisi lengkap.
   - Pembuatan dan sinkronisasi akun login (`users` & `role_user`) langsung dari form pegawai.
   - Proteksi anti-hapus (non-destructive) bagi pegawai yang memiliki riwayat log absensi.
4. **Permohonan Izin & Sakit (`/izin` & `/admin/izin`):**
   - Pengajuan mandiri oleh relawan dengan unggah surat keterangan dokter/bukti (disk privat).
   - Verifikasi dan persetujuan bertingkat oleh staf Tata Usaha.
   - Proteksi Anti-IDOR pada endpoint unduh berkas lampiran.
5. **Arsip Log Fingerprint (`/admin/arsip-fingerprint`):**
   - Penelusuran arsip read-only untuk 9.838 baris log mesin fingerprint lama (`FPDAPUR1`).
6. **Rekapitulasi Bulanan Gabungan 20–19 (`/admin/rekap`):**
   - Engine kalkulasi gabungan: Presensi Mobile (Prioritas 1) + Fingerprint Mesin (Prioritas 2) + Izin Disetujui (Prioritas 3) + Libur Nasional (Prioritas 4).
   - Perhitungan poin kehadiran akurat (1.00 tepat waktu, 0.80 terlambat/pulang cepat, 0.00 izin/sakit/alpha).
   - Ekspor satu-klik ke format Excel (.xlsx via `maatwebsite/excel`) dan PDF Landscape resmi (`barryvdh/laravel-dompdf`).
7. **Pengaturan Lokasi & Jam Kerja (`/admin/settings`):**
   - Visual map picker koordinat latitude/longitude dan radius geofence.
   - Konfigurasi batas jam datang dan pulang per divisi & Officer.

---

## 📱 Fitur Mobile Attendance (PWA)

Sistem Mobile Attendance ARAP v2 mendukung check-in dan check-out mandiri untuk Relawan & Officer SPPG Kalisapu:
1. **Validasi Geofence & GPS:** Menghitung jarak presisi ke titik sentral SPPG Kalisapu (default radius 100m, akurasi GPS maksimal 50m).
2. **Kamera Selfie Langsung (Anti-Galeri):** Mewajibkan pengambilan foto dari WebRTC live camera (`getUserMedia`) tanpa akses input galeri file.
3. **Persyaratan Secure Context:** Fitur kamera dan sensor geolokasi GPS browser memerlukan koneksi aman (**`http://localhost`** untuk development lokal, atau **`https://` dengan sertifikat SSL valid** pada lingkungan server staging/produksi).
4. **Keamanan Foto Privat:** Foto presensi tersimpan di private disk `attendance_photos` dan hanya dapat diakses oleh pemilik presensi serta staf/admin yang terotorisasi.

---

## 🔒 Kebijakan Integritas & Data

1. **Non-Destructive Database:** Database operasional `arap` serta file DDL `database_sql/arap.sql` dipertahankan 100% utuh tanpa penghapusan riwayat absensi mesin (`pools`: 9.838 baris) dan master pengguna (`pesertas`: 47 baris, `users`: 49 baris).
2. **Dual-Repository Safety:** Source code legacy Laravel 8 tetap tersimpan di branch `main` pada `C:\laragon\www\Absensi` sebagai cadangan operasional. Seluruh modernisasi v2 dikembangkan pada branch `v2/laravel-13-modernization`.
