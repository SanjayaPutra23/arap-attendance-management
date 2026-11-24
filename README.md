# ARAP v2 — Aplikasi Presensi Relawan & Pegawai SPPG Kalisapu

ARAP (Aplikasi Relawan & Pegawai) versi 2 merupakan modernisasi menyeluruh sistem presensi untuk **Sentra Pelayanan Pertanian Terpadu (SPPG) Kalisapu**, dibangun dengan arsitektur modern berbasis **Laravel 13.x**, **PHP 8.5.12**, **Bootstrap 5.3 + SCSS**, **Vite**, dan arsitektur **Progressive Web App (PWA)** dengan Geofencing & Foto Selfie langsung.

---

## 🛠️ Stack Teknologi

- **Backend Framework:** Laravel 13.43.0
- **Runtime Environment:** PHP 8.5.12 (NTS Win32 VS17 x64)
- **Ekstensi PHP Aktif:** `sockets`, `zip`, `pdo_mysql`, `pdo_sqlite`, `sqlite3`, `mbstring`, `fileinfo`, `gd`, `openssl`, `intl`, `bcmath`
- **Autentikasi & RBAC:** Laravel Fortify v1.43 (Mendukung login via Email / NIK & Role Gates: `ultraman`, `umum`, `staff-access`, `user`)
- **Frontend & PWA:** Bootstrap 5.3, Bootstrap Icons, Leaflet.js, Vite 8, Web App Manifest & Service Worker
- **Export & Reporting:** `barryvdh/laravel-dompdf:^3.0`, `maatwebsite/excel:^3.1`
- **Penyimpanan Foto Presensi:** Private disk `attendance_photos` (`storage/app/private/attendance_photos`)

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

Pengujian unit dan fitur berjalan otomatis pada database SQLite in-memory (`:memory:`) tanpa menyentuh database operasional MySQL:

```powershell
& "C:\laragon\bin\php\php-8.5.12-nts-Win32-vs17-x64\php.exe" artisan test --testsuite=Feature
```

Cakupan pengujian meliputi:
- Redirect pengunjung (guest) ke form login
- Rendering tampilan halaman login Bootstrap 5
- Autentikasi email dan logout pengguna
- Autentikasi menggunakan nomor identitas (NIK / UID relawan)
- Otorisasi hak akses Role-Based Access Control (RBAC) Gates (`ultraman`, `umum`, `staff-access`, `user`)

---

## 🔒 Kebijakan Integritas & Data

1. **Non-Destructive Database:** Database operasional `arap` serta file DDL `database_sql/arap.sql` dipertahankan 100% utuh tanpa penghapusan riwayat absensi mesin (`pools`: 9.838 baris) dan master pengguna (`pesertas`: 47 baris, `users`: 49 baris).
2. **Dual-Repository Safety:** Source code legacy Laravel 8 tetap tersimpan di branch `main` pada `C:\laragon\www\Absensi` sebagai cadangan operasional. Seluruh modernisasi v2 dikembangkan pada branch `v2/laravel-13-modernization`.
