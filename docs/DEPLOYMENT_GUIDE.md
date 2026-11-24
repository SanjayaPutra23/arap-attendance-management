# PANDUAN DEPLOYMENT PRODUKSI & ROLLBACK (ARAP v2)
## Sentra Pelayanan Pemenuhan Gizi (SPPG) Kalisapu

Dokumen ini merupakan panduan teknis resmi langkah demi langkah (*step-by-step production deployment guide*) untuk menerapkan **ARAP v2** pada server produksi Linux (Ubuntu/Debian/Rocky) dengan basis data MySQL lama (`arap`) secara **100% non-destruktif**, aman, serta mendukung HTTPS wajib untuk kamera dan GPS PWA.

---

## 1. Spesifikasi Minimum Server Produksi

| Komponen | Spesifikasi Minimum / Rekomendasi |
| :--- | :--- |
| **Sistem Operasi** | Linux Server (Ubuntu 22.04 / 24.04 LTS direkomendasikan) |
| **Web Server & Proxy**| Nginx 1.20+ (dengan modul HTTP/2 & SSL) |
| **PHP Runtime** | **PHP 8.5.x** (FPM) |
| **Ekstensi PHP Wajib** | `pdo_mysql`, `gd`, `zip`, `sockets`, `mbstring`, `openssl`, `fileinfo`, `intl`, `bcmath`, `curl`, `xml` |
| **Database Server** | MySQL 8.0+ / MariaDB 10.6+ |
| **Node.js & NPM** | Node.js v18+ & NPM v9+ (hanya untuk build asset frontend Vite) |
| **Sertifikat Keamanan**| SSL/TLS Valid (**Let's Encrypt Certbot** atau Commercial SSL) |
| **Hardware** | Minimum 2 Core vCPU, 2 GB RAM (disarankan 4 GB), 20 GB SSD Storage |

> [!IMPORTANT]
> **Persyaratan Secure Context (HTTPS):**
> Fitur kamera langsung WebRTC (`getUserMedia`) dan sensor geolokasi GPS browser **diwajibkan oleh standar keamanan peramban modern** berjalan di atas protokol **`https://` dengan sertifikat SSL valid**. Jika diakses via HTTP biasa (non-localhost), browser smartphone akan memblokir akses kamera dan lokasi!

---

## 2. Prosedur Deployment Langkah Demi Langkah

### Langkah 1: Cadangkan Database & Berkas Operasional Lama (Wajib!)
Sebelum menyentuh server, lakukan backup penuh terhadap database operasional lama:

```bash
# 1. Buat folder cadangan
mkdir -p /var/backups/arap_pre_v2

# 2. Dump database eksisting lama
mysqldump -u root -p --single-transaction --routines --triggers --quick arap > /var/backups/arap_pre_v2/arap_legacy_backup_$(date +%Y%m%d_%H%M%S).sql

# 3. Arsip source code v1 lama sebagai cadangan rollback
cp -r /var/www/Absensi /var/backups/arap_pre_v2/Absensi_v1_backup
```

---

### Langkah 2: Ambil Kode ARAP v2 dari Repositori
Deploy kode ARAP v2 pada direktori server (misal `/var/www/arap-v2`):

```bash
cd /var/www
git clone https://github.com/SanjayaPutra23/arap-attendance-management.git arap-v2
cd arap-v2

# Pastikan berada pada branch rilis v2
git checkout v2/laravel-13-modernization
```

---

### Langkah 3: Instalasi Dependensi Composer & Build Asset Frontend
Jalankan instalasi dependensi tanpa dependensi pengujian lokal (*no-dev*):

```bash
# Instalasi Composer teroptimasi
composer install --no-dev --optimize-autoloader

# Instalasi dan kompilasi asset frontend (Vite 8 + Bootstrap 5.3 + Leaflet)
npm ci
npm run build
```

---

### Langkah 4: Konfigurasi Environment Produksi (`.env`)
Salin template konfigurasi produksi yang telah disediakan:

```bash
cp .env.production.example .env
nano .env
```

Pastikan variabel-variabel kunci berikut diisi dengan benar:
```ini
APP_NAME="ARAP SPPG Kalisapu"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://presensi.sppgkalisapu.id

FORCE_HTTPS=true
TRUSTED_PROXIES=127.0.0.1

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=arap
DB_USERNAME=arap_db_user
DB_PASSWORD=PasswordKuatMySQLAnda

SESSION_SECURE_COOKIE=true
```

Generate application key jika belum ada:
```bash
php artisan key:generate
```

---

### Langkah 5: Pengaturan Hak Akses Direktori (Permissions)
Beri izin baca-tulis kepada web server user (`www-data`):

```bash
chown -R www-data:www-data /var/www/arap-v2
chmod -R 775 /var/www/arap-v2/storage /var/www/arap-v2/bootstrap/cache
```

Pastikan direktori private storage tersedia dan berizin aman:
```bash
mkdir -p storage/app/private/attendance_photos
mkdir -p storage/app/private/izin_attachments
chmod -R 770 storage/app/private
```

---

### Langkah 6: Eksekusi Migrasi Database Non-Destruktif & Seeding Lokasi

> [!CAUTION]
> **DILARANG KERAS MENJALANKAN `php artisan migrate:fresh` ATAU `migrate:reset`!**  
> Perintah tersebut akan menghapus 9.838 baris riwayat presensi `pools` dan master pegawai `pesertas`.

Jalankan perintah migrasi standar dengan flag `--force`:
```bash
# 1. Menambahkan 4 tabel baru Mobile Attendance tanpa mengubah tabel lama
php artisan migrate --force

# 2. Seeding titik koordinat awal SPPG Kalisapu
php artisan db:seed --class=AttendanceLocationSeeder --force
```

---

### Langkah 7: Optimasi Cache Produksi Laravel
Kompilasi konfigurasi, route, dan view ke dalam cache memori agar respon aplikasi instan:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

*(Catatan: Jika ada pembaruan kode di masa mendatang, jalankan `php artisan optimize:clear` terlebih dahulu sebelum melakukan caching ulang).*

---

### Langkah 8: Konfigurasi Nginx & Penerbitan Sertifikat SSL Let's Encrypt
1. Salin template Nginx:
   ```bash
   cp deploy/nginx.conf.example /etc/nginx/sites-available/arap
   nano /etc/nginx/sites-available/arap
   ```
   *(Sesuaikan domain `server_name` dan path root).*

2. Aktifkan virtual host:
   ```bash
   ln -s /etc/nginx/sites-available/arap /etc/nginx/sites-enabled/
   nginx -t
   systemctl reload nginx
   ```

3. Dapatkan sertifikat SSL otomatis menggunakan Certbot:
   ```bash
   certbot --nginx -d presensi.sppgkalisapu.id
   ```

---

### Langkah 9: Penjadwalan Backup Otomatis (Cron Job)
Daftarkan script backup otomatis `deploy/backup.sh` pada crontab sistem:

```bash
chmod +x /var/www/arap-v2/deploy/backup.sh
crontab -e
```

Tambahkan baris berikut agar pencadangan berjalan otomatis setiap pukul 02:00 malam:
```cron
0 2 * * * /var/www/arap-v2/deploy/backup.sh >> /var/log/arap_backup.log 2>&1
```

---

## 3. Checklist Verifikasi Pasca-Deploy & UAT Smartphone Fisik

Setelah instalasi selesai, Project Owner dan tim operasional SPPG Kalisapu wajib melakukan pengujian langsung di lokasi menggunakan smartphone fisik:

- [ ] **1. Pemeriksaan Healthcheck:** Akses `https://presensi.sppgkalisapu.id/up` dari browser, pastikan merespons status `200 OK`.
- [ ] **2. Uji Login NIK & Email:** Buka halaman login, masukkan NIK relawan (misal NIK Pak Aslap / relawan terdaftar), pastikan berhasil login tanpa error.
- [ ] **3. Pasang Ikon PWA (Add to Home Screen):** Buka peramban Chrome di Android atau Safari di iOS, ketuk menu *Tambahkan ke Layar Utama* (*Install App / Add to Home Screen*), pastikan ikon ARAP muncul di layar ponsel.
- [ ] **4. Kalibrasi Titik Koordinat SPPG:**
  - Login sebagai Admin TU / Umum, buka menu **Lokasi Geofence** (`/admin/settings/locations`).
  - Amati pin koordinat di peta Leaflet. Jika posisi sentral perlu disesuaikan dengan posisi riil dapur SPPG Kalisapu, klik titik lokasi baru di peta atau masukkan latitude/longitude akurat dan klik **Simpan & Aktifkan**.
- [ ] **5. Uji Kamera Live & Geofencing GPS (Check-in Masuk):**
  - Berdiri di dalam area dapur SPPG Kalisapu.
  - Buka menu **Presensi Mobile**, izinkan akses kamera dan lokasi perangkat.
  - Pastikan kamera live menyala (bukan pop-up galeri berkas), ambil foto selfie, dan ketuk **Kirim Presensi Masuk**.
  - Pastikan presensi berhasil tercatat dengan skor 1.00 atau 0.80 sesuai jam kedatangan.
- [ ] **6. Uji Monitoring Realtime Staf:**
  - Dari laptop/PC Tata Usaha, buka menu **Monitoring Presensi** (`/admin/monitoring`).
  - Verifikasi bahwa foto selfie relawan yang baru check-in muncul di tabel dan titik GPS muncul pada peta sebaran.
- [ ] **7. Uji Permohonan Izin / Sakit:**
  - Dari smartphone relawan, buka menu **Izin & Sakit**, ajukan sakit dengan mengunggah foto surat keterangan dokter.
  - Dari dashboard Admin TU, buka menu **Verifikasi Izin** dan setujui permohonan tersebut.
- [ ] **8. Uji Cetak Rekapitulasi (PDF & Excel):**
  - Buka menu **Rekapitulasi (20–19)** (`/admin/rekap`).
  - Unduh format Excel (`.xlsx`) dan PDF Landscape A4. Pastikan kop resmi mencantumkan **Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu** dan tabel tercetak rapi.

---

## 4. Prosedur Rollback Aman ke ARAP v1 (Jika Diperlukan)

Karena pengembangan ARAP v2 dirancang dengan prinsip **Dual-Repository Safety & Non-Destructive Migrations**, jika terjadi kendala kritis pada server produksi, sistem lama (ARAP v1) dapat diaktifkan kembali dalam hitungan menit tanpa kehilangan data historis:

```bash
# 1. Arahkan kembali Nginx root ke direktori aplikasi v1
sed -i 's|/var/www/arap-v2/public|/var/www/Absensi/public|g' /etc/nginx/sites-available/arap
nginx -t && systemctl reload nginx

# 2. Jika database memerlukan pemulihan ke kondisi sebelum deploy:
mysql -u root -p arap < /var/backups/arap_pre_v2/arap_legacy_backup_*.sql

# 3. Layanan ARAP v1 kembali aktif normal.
```
