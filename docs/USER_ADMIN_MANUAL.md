# BUKU PANDUAN PENGGUNA & ADMINISTRATOR (USER MANUAL)
## Sistem Presensi Relawan & Pegawai: ARAP v2
### Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu

---

## DAFTAR ISI
1. [BAGIAN 1 — PANDUAN OPERASIONAL RELAWAN & OFFICER](#bagian-1--panduan-operasional-relawan--officer)
   - 1.1 [Cara Masuk ke Sistem (Login dengan NIK / Email)](#11-cara-masuk-ke-sistem-login-dengan-nik--email)
   - 1.2 [Memasang Aplikasi ke Layar Utama HP (Install PWA)](#12-memasang-aplikasi-ke-layar-utama-hp-install-pwa)
   - 1.3 [Panduan Presensi Masuk (Check-in) dengan Kamera Langsung & GPS](#13-panduan-presensi-masuk-check-in-dengan-kamera-langsung--gps)
   - 1.4 [Panduan Presensi Pulang (Check-out)](#14-panduan-presensi-pulang-check-out)
   - 1.5 [Solusi Kendala GPS Tidak Terdeteksi atau Di Luar Radius](#15-solusi-kendala-gps-tidak-terdeteksi-atau-di-luar-radius)
   - 1.6 [Memahami Skor & Perolehan Poin Kehadiran](#16-memahami-skor--perolehan-poin-kehadiran)
   - 1.7 [Mengajukan Izin atau Sakit dengan Lampiran Surat Dokter](#17-mengajukan-izin-atau-sakit-dengan-lampiran-surat-dokter)
   - 1.8 [Ganti Kata Sandi Mandiri (Self-Service Password)](#18-ganti-kata-sandi-mandiri-self-service-password)
2. [BAGIAN 2 — PANDUAN ADMINISTRATOR & TATA USAHA (PAK ASLAP)](#bagian-2--panduan-administrator--tata-usaha-pak-aslap)
   - 2.1 [Membaca Dashboard KPI Kehadiran Harian](#21-membaca-dashboard-kpi-kehadiran-harian)
   - 2.2 [Monitoring Presensi Realtime, Peta Sebaran & Bukti Selfie](#22-monitoring-presensi-realtime-peta-sebaran--bukti-selfie)
   - 2.3 [Meninjau Percobaan Presensi yang Ditolak (Audit Log)](#23-meninjau-percobaan-presensi-yang-ditolak-audit-log)
   - 2.4 [Mengatur Titik Lokasi & Radius SPPG di Peta (Geofence Setting)](#24-mengatur-titik-lokasi--radius-sppg-di-peta-geofence-setting)
   - 2.5 [Mengatur Jam Kerja per Divisi & Officer](#25-mengatur-jam-kerja-per-divisi--officer)
   - 2.6 [Manajemen Master Data Pegawai, Officer & Pembuatan Akun Login](#26-manajemen-master-data-pegawai-officer--pembuatan-akun-login)
   - 2.7 [Verifikasi & Persetujuan Permohonan Izin / Sakit](#27-verifikasi--persetujuan-permohonan-izin--sakit)
   - 2.8 [Membuka Arsip Log Fingerprint Mesin Lama & Deteksi Orphan UID](#28-membuka-arsip-log-fingerprint-mesin-lama-9838-data-pools--deteksi-orphan-uid)
   - 2.9 [Mencetak Rekapitulasi Kehadiran Bulanan 20–19 (Excel & PDF Resmi)](#29-mencetak-rekapitulasi-kehadiran-bulanan-2019-excel--pdf-resmi)
   - 2.10 [Kelola Mesin Fingerprint (IP & Port) & Tarik Data Presensi ZKTeco](#210-kelola-mesin-fingerprint-ip--port--tarik-data-presensi-zkteco)
   - 2.11 [Pengaturan Mode Rekapitulasi Presensi (Bulanan 20–19 vs Mingguan)](#211-pengaturan-mode-rekapitulasi-presensi-bulanan-2019-vs-mingguan)
   - 2.12 [Kelola Hari Libur Nasional & Sinkronisasi API](#212-kelola-hari-libur-nasional--sinkronisasi-api)
   - 2.13 [Cetak PDF Detail Kehadiran Individu untuk Klarifikasi Poin](#213-cetak-pdf-detail-kehadiran-individu-untuk-klarifikasi-poin)
3. [BAGIAN 3 — STANDAR OPERASIONAL PROSEDUR (SOP) PENDAFTARAN RELAWAN BARU](#bagian-3--standar-operasional-prosedur-sop-pendaftaran-relawan-baru)
   - 3.1 [Gambaran Alur Integrasi Hybrid](#31-gambaran-alur-integrasi-hybrid)
   - 3.2 [Langkah Demi Langkah Pendaftaran Relawan Baru](#32-langkah-demi-langkah-pendaftaran-relawan-baru)

---

# BAGIAN 1 — PANDUAN OPERASIONAL RELAWAN & OFFICER

Panduan ini ditujukan bagi seluruh Relawan Operasional Dapur dan staf Officer SPPG Kalisapu dalam melakukan presensi harian mandiri melalui ponsel pintar (*smartphone*).

---

### 1.1 Cara Masuk ke Sistem (Login dengan NIK / Email)
1. Buka peramban internet di ponsel Anda (gunakan **Google Chrome** pada Android atau **Safari** pada iPhone).
2. Kunjungi alamat resmi presensi: **`https://presensi.sppgkalisapu.id`** (atau alamat server yang diberikan oleh pengelola).
3. Pada halaman login:
   - **Nomor Identitas / Email:** Masukkan **16 digit Nomor Induk Kependudukan (NIK)** Anda yang terdaftar pada KTP, atau gunakan alamat email akun Anda.
   - **Kata Sandi:** Masukkan password akun Anda.
   - Ketuk tombol **Masuk ke Aplikasi**.
4. Sistem akan otomatis mengarahkan Anda ke halaman Dashboard ARAP v2.

---

### 1.2 Memasang Aplikasi ke Layar Utama HP (Install PWA)
Agar presensi setiap hari semudah membuka aplikasi Android/iPhone tanpa perlu mengetik ulang alamat web:
- **Pada HP Android (Google Chrome):**
  1. Buka situs ARAP di Chrome.
  2. Ketuk ikon titik tiga (⋮) di pojok kanan atas.
  3. Pilih menu **"Tambahkan ke Layar Utama"** (*Add to Home Screen*) atau **"Instal Aplikasi"**.
  4. Ketuk **Instal**. Ikon **ARAP** akan muncul di layar menu ponsel Anda.
- **Pada HP iPhone / iOS (Safari):**
  1. Buka situs ARAP di peramban Safari.
  2. Ketuk tombol **Bagikan** (*Share* — ikon kotak dengan panah ke atas di bagian bawah).
  3. Geser ke bawah dan pilih **"Tambahkan ke Layar Utama"** (*Add to Home Screen*).
  4. Ketuk **Tambah** di pojok kanan atas.

---

### 1.3 Panduan Presensi Masuk (Check-in) dengan Kamera Langsung & GPS
Lakukan langkah ini saat Anda sudah tiba di lokasi dapur SPPG Kalisapu sebelum jam kerja dimulai:

1. Buka aplikasi ARAP, lalu pilih menu **Presensi Mobile** di navigasi bawah/sidebar.
2. Jika muncul kotak dialog izin dari peramban:
   - Pilih **"Izinkan"** untuk **Akses Kamera**.
   - Pilih **"Izinkan saat menggunakan aplikasi"** untuk **Akses Lokasi (GPS)**.
3. Tunggu 2–5 detik hingga indikator GPS berwarna hijau (**"Lokasi Valid dalam Radius SPPG"**).
4. Layar kamera langsung (*Live Camera*) akan menyala di ponsel Anda:
   - Hadapkan kamera ke wajah Anda dengan pencahayaan yang cukup.
   - Ketuk tombol **Ambil Foto Selfie**.
   - Periksa pratinjau foto. Jika buram, ketuk *Foto Ulang*.
5. Ketuk tombol hijau besar: **"Kirim Presensi Masuk (Check-in)"**.
6. Pesan sukses akan muncul disertai waktu kedatangan dan status kehadiran Anda.

---

### 1.4 Panduan Presensi Pulang (Check-out)
1. Setelah jam kerja Anda berakhir, buka kembali menu **Presensi Mobile**.
2. Sistem akan mendeteksi bahwa Anda telah melakukan Check-in masuk hari ini, dan secara otomatis menyiapkan form **Presensi Pulang (Check-out)**.
3. Ambil foto selfie kepulangan Anda melalui kamera live.
4. Ketuk tombol biru: **"Kirim Presensi Pulang (Check-out)"**.
5. Sistem akan menghitung akumulasi jam kerja dan memperbarui total perolehan poin Anda hari ini.

---

### 1.5 Solusi Kendala GPS Tidak Terdeteksi atau Di Luar Radius
Jika muncul peringatan merah *"Di Luar Radius SPPG"* atau *"GPS Tidak Akurat"*:
1. **Pastikan GPS/Lokasi HP Aktif:** Tarik panel notifikasi HP ke bawah, pastikan ikon **Lokasi/GPS** menyala dengan mode *Akurasi Tinggi* (*High Accuracy*).
2. **Berdiri di Area Terbuka:** Jika Anda berada di dalam ruangan beratap seng tebal atau bunker, sinyal satelit GPS bisa terhalang. Melangkahlah ke dekat pintu atau teras dapur SPPG selama 5 detik, lalu ketuk tombol **"Perbarui Lokasi GPS"** di layar.
3. **Periksa Izin Lokasi di Browser:** Pastikan izin situs `https://presensi.sppgkalisapu.id` pada pengaturan peramban tidak dalam keadaan *Blocked* (Diblokir).

---

### 1.6 Memahami Skor & Perolehan Poin Kehadiran
Sistem ARAP v2 menerapkan aturan perhitungan poin otomatis yang adil berdasarkan jadwal divisi:
- **1.00 Poin (Hadir Penuh Tepat Waktu):** Anda datang sebelum batas jam masuk divisi dan pulang setelah batas jam kepulangan divisi.
- **0.80 Poin (Terlambat atau Pulang Lebih Awal):** Anda datang melewati batas toleransi jam masuk, atau melakukan check-out sebelum jam kerja berakhir.
- **0.00 Poin (Tidak Hadir / Izin / Sakit):** Tidak melakukan presensi harian, atau sedang dalam masa permohonan izin/sakit yang disetujui.

> Anda dapat memantau perolehan poin dan riwayat presensi harian Anda secara mandiri pada menu **Riwayat Kehadiran**.

---

### 1.7 Mengajukan Izin atau Sakit dengan Lampiran Surat Dokter
Jika Anda berhalangan hadir karena sakit atau ada keperluan mendesak:
1. Buka menu **Izin & Sakit** di aplikasi ARAP.
2. Ketuk tombol **"Ajukan Izin / Sakit Baru"**.
3. Isi formulir pengajuan:
   - **Jenis:** Pilih *Izin* atau *Sakit*.
   - **Tanggal Mulai & Selesai:** Tentukan rentang hari tidak hadir.
   - **Keterangan:** Tuliskan alasan dengan jelas dan sopan.
   - **Unggah Surat Bukti:** Khusus untuk sakit, lampirkan foto surat keterangan dokter/klinik (format JPG, PNG, atau PDF maksimal 3 MB).
4. Ketuk **Kirim Permohonan**.
5. Status pengajuan akan berstatus **"Menunggu"** hingga diverifikasi oleh staf Tata Usaha. Selama masih berstatus menunggu, Anda dapat membatalkan pengajuan jika sewaktu-waktu batal izin.

---

### 1.8 Ganti Kata Sandi Mandiri (Self-Service Password)
Setiap pengguna (Relawan, Officer, maupun Admin) dapat memperbarui kata sandi akunnya sendiri kapan saja demi keamanan:
1. Klik nama profil Anda di pojok kanan atas layar (topbar) lalu pilih **Ganti Password**, atau klik menu **Ganti Password** pada sidebar sebelah kiri.
2. Pada formulir yang muncul:
   - **Kata Sandi Saat Ini:** Masukkan kata sandi lama Anda untuk verifikasi identitas.
   - **Kata Sandi Baru:** Masukkan kata sandi baru (minimal 8 karakter kombinasi huruf dan angka).
   - **Konfirmasi Kata Sandi Baru:** Masukkan ulang kata sandi baru persis sama.
   - *Tips:* Anda dapat mengklik ikon mata di samping setiap kolom untuk memastikan ejaan kata sandi tidak salah ketik.
3. Klik tombol **Perbarui Kata Sandi**.
4. Sistem akan memperbarui kata sandi Anda dan memperbarui sesi login secara aman. Gunakan kata sandi baru ini untuk login berikutnya.

---

# BAGIAN 2 — PANDUAN ADMINISTRATOR & TATA USAHA (PAK ASLAP)

Panduan ini ditujukan bagi Staf Tata Usaha, Koordinator SPPG Kalisapu (Pak Aslap), dan Administrator dalam memantau kehadiran harian, memverifikasi permohonan, mengelola master data, serta mencetak laporan bulanan.

---

### 2.1 Membaca Dashboard KPI Kehadiran Harian
Saat login dengan akun berhak akses staf/admin, halaman utama **Dashboard** menyajikan ringkasan eksekutif secara langsung:
1. **Kartu KPI Hari Ini:**
   - *Total Pegawai Terdaftar:* Jumlah seluruh relawan dan Officer aktif di SPPG.
   - *Hadir Tepat Waktu:* Jumlah relawan yang hadir sesuai jadwal (skor 1.00).
   - *Terlambat / Pulang Awal:* Jumlah presensi dengan status terlambat (skor 0.80).
   - *Izin / Sakit Hari Ini:* Jumlah staf yang sedang dalam status izin disetujui.
   - *Belum Hadir:* Jumlah personel yang belum melakukan check-in hari ini.
   - *Percobaan Ditolak:* Percobaan presensi yang gagal karena berada di luar radius lokasi atau GPS tidak akurat.
2. **Rekapitulasi Cepat per Divisi:** Tabel persentase kehadiran per divisi operasional (Persiapan, Pengolahan, Pemorsian, Distribusi, Kebersihan, Security, Ompreng, dan Officer).
3. **Aktivitas Presensi Terakhir:** Daftar 10 presensi masuk terbaru lengkap dengan foto selfie mini dan selisih jarak ke sentral SPPG.

---

### 2.2 Monitoring Presensi Realtime, Peta Sebaran & Bukti Selfie
Menu **Monitoring Presensi** (`/admin/monitoring`) adalah pusat kendali operasional harian:
1. **Filter Fleksibel:** Anda dapat menyaring data berdasarkan tanggal tertentu, status kehadiran, pencarian nama/NIK, atau menyaring per divisi dengan mengklik tombol divisi (khusus tombol **Officer** ditandai bintang emas).
2. **Peta Sebaran Interaktif (Leaflet OpenStreetMap):**
   - Lingkaran biru di tengah adalah titik sentral SPPG Kalisapu beserta radius toleransinya.
   - Titik-titik marker di sekitar peta menunjukkan posisi fisik HP relawan saat menekan tombol check-in.
   - Klik pada titik marker untuk melihat nama relawan, divisi, waktu kedatangan, dan tombol intip bukti selfie.
3. **Modal Bukti Foto Selfie Privat:**
   - Pada tabel monitoring, klik tombol foto kamera untuk membuka modal pratinjau bukti kehadiran.
   - Modal akan menampilkan foto wajah relawan asli, koordinat presisi latitude/longitude, akurasi GPS dalam meter, dan cap waktu server yang tidak dapat dimanipulasi.

---

### 2.3 Meninjau Percobaan Presensi yang Ditolak (Audit Log)
Pada bagian bawah halaman Monitoring Kehadiran terdapat tab panel **Log Percobaan Ditolak**:
- Mencatat setiap upaya presensi yang gagal (misal relawan mencoba presensi dari rumah yang berjarak 2 km dari SPPG).
- Menampilkan alasan penolakan, jarak terdeteksi ke dapur SPPG, dan alamat IP perangkat untuk mencegah kecurangan kehadiran.

---

### 2.4 Mengatur Titik Lokasi & Radius SPPG di Peta (Geofence Setting)
Jika dapur sentral SPPG berpindah titik, atau toleransi radius perlu diperluas:
1. Masuk ke menu **Lokasi Geofence** (`/admin/settings/locations`).
2. Terdapat peta interaktif dengan pin sentral:
   - **Ubah Titik:** Cukup klik langsung pada lokasi baru di peta Leaflet, koordinat Latitude dan Longitude akan terisi otomatis.
   - **Radius Toleransi (Meter):** Masukkan jarak lingkaran yang diizinkan (default 100 meter).
   - **Batas Akurasi GPS:** Masukkan toleransi akurasi ponsel (default 50 meter).
3. Ketuk **Simpan Perubahan & Aktifkan**. Pengaturan langsung berlaku seketika untuk semua ponsel relawan tanpa restart server.

---

### 2.5 Mengatur Jam Kerja per Divisi & Officer
Setiap divisi memiliki pola jam kerja operasional yang berbeda (misal divisi persiapan yang bekerja shift malam):
1. Masuk ke menu **Jam Kerja Divisi** (`/admin/settings/working-hours`).
2. Tersedia kartu pengaturan untuk setiap 8 divisi resmi:
   - **Officer SPPG:** Jam kedatangan & jam kepulangan pengawas.
   - **Divisi Persiapan, Pengolahan, Pemorsian, Distribusi, Kebersihan, Security, Ompreng.**
3. Masukkan batas jam kedatangan (check-in) dan kepulangan (check-out) yang diinginkan.
4. Ketuk **Simpan Seluruh Pengaturan Jam Kerja**. Perhitungan status tepat waktu dan terlambat pada hari berikutnya akan otomatis mengikuti jadwal baru tersebut.

---

### 2.6 Manajemen Master Data Pegawai, Officer & Pembuatan Akun Login
Menu **Master Pegawai / Officer** (`/admin/pegawai`) digunakan untuk mengelola data relawan dan staf:
1. **Filter & Pencarian Komprehensif:**
   - Filter cepat berdasarkan status keaktifan: **Semua**, **Aktif Saja**, atau **Nonaktif / Diarsipkan**.
   - Filter divisi kerja (*Persiapan*, *Pengolahan*, *Pemorsian*, *Ompreng*, *Distribusi*, *Kebersihan*, *Security*, *Officer*).
   - Filter kepemilikan akun login (*Sudah Punya Akun* vs *Belum Punya Akun*).
   - Pencarian cerdas berdasarkan Nama, Nomor Induk/NIK, atau UID Mesin Fingerprint.
2. **Menambah Pegawai & Akun Sekaligus (Password Default Fleksibel):**
   - Ketuk tombol **Tambah Pegawai / Officer Baru**.
   - Masukkan **Nama Lengkap**, **Nomor Induk / ID Relawan** (bisa berupa ID pendek seperti `1051` atau 16 digit NIK KTP), **UID Mesin Fingerprint** (opsional, nomor ID di mesin fisik misal `1051`), Divisi/Jabatan, dan Nomor Telepon.
   - Pada bagian *Akun Login*: centang opsi buatkan akun, masukkan email login (misal `pegawai@arap.local`).
   - **Password Default = Nomor Induk / UID:** Kolom password **dapat dikosongkan**. Jika dikosongkan, sistem otomatis menetapkan kata sandi awal sama dengan Nomor Induk / UID relawan (misal: `1051`). Relawan dapat langsung login dan mengganti kata sandi menjadi lebih aman secara mandiri. Admin juga dapat mengetikkan password pendek (misal 4 karakter) tanpa terblokir validasi rumit.
   - Ketuk **Simpan Data Pegawai**.
3. **Mengedit Profil / Mereset Password:**
   - Klik tombol edit (pensil biru) pada baris pegawai yang dituju.
   - Anda dapat memperbarui data atau mengisi password baru jika relawan membutuhkan reset password dari Admin.
4. **Fitur Nonaktifkan Pegawai (Soft-Deactivate) & Proteksi Data Historis:**
   - **Mengapa Tombol Hapus Diproteksi?** Pegawai yang telah memiliki riwayat presensi di mesin fingerprint `pools` atau presensi mobile tidak boleh dihapus dari database. Jika dihapus paksa, rekapitulasi bulan-bulan sebelumnya akan menjadi pincang (orphan log) dan merusak integritas arsip laporan keuangan/operasional SPPG.
   - **Gunakan Tombol Nonaktifkan (Kuning):** Pada kolom aksi, klik tombol kuning bergambar silang (**Nonaktifkan Pegawai**). Pegawai akan langsung diarsipkan dengan konsekuensi aman:
     - Akun pegawai langsung diblokir dari login sistem dengan pesan ramah (*"Akun Anda berstatus nonaktif. Silakan hubungi Admin/Tata Usaha SPPG Kalisapu."*).
     - Pegawai tidak lagi muncul di halaman Rekapitulasi Presensi aktif, Monitoring Realtime, maupun penghitungan KPI Dashboard.
     - Seluruh riwayat presensi masa lalu di database tetap tersimpan 100% utuh.
   - **Mengaktifkan Kembali:** Jika pegawai kembali bekerja, buka filter *Nonaktif / Diarsipkan*, lalu klik tombol hijau (**Aktifkan Kembali Pegawai**). Seluruh hak akses dan rekap akan langsung aktif kembali.

---

### 2.7 Verifikasi & Persetujuan Permohonan Izin / Sakit
Menu **Verifikasi Izin** (`/admin/izin`) menampilkan antrean permohonan staf:
1. Klik baris permohonan yang berstatus **Menunggu**.
2. Anda dapat membaca rincian alasan dan mengklik tautan **Unduh Surat Dokter/Bukti** (file tersimpan secara privat dan terlindungi dari akses publik).
3. Klik tombol **Tinjau Permohonan**:
   - Pilih keputusan: **Setujui (Approve)** atau **Tolak (Reject)**.
   - Berikan catatan admin jika ada hal yang perlu disampaikan kepada relawan.
   - Ketuk **Kirim Keputusan**.
4. Pengajuan yang disetujui akan otomatis diperhitungkan pada rekapitulasi bulanan sehingga staf tidak dicatat sebagai Alpha.

---

### 2.8 Membuka Arsip Log Fingerprint Mesin Lama (9.838 Data Pools) & Deteksi Orphan UID
Seluruh 9.838 riwayat scan sidik jari mesin lama `FPDAPUR1` tersimpan utuh dan dapat ditelusuri:
1. Buka menu **Arsip Fingerprint** (`/admin/arsip-fingerprint`).
2. Gunakan filter rentang tanggal, filter mesin, atau cari berdasarkan nama relawan / UID mesin.
3. Halaman ini bersifat *read-only* (hanya baca) untuk memastikan keaslian arsip historis tidak berubah.
4. **Panel Peringatan Deteksi UID Mesin Belum Terdaftar (Orphan UID Detector):**
   - Jika ada relawan yang melakukan scan tap sidik jari di mesin fisik ZKTeco, namun nomor ID mesin (UID) tersebut belum dipetakan ke profil relawan di Master Pegawai (misalnya: saat mesin memberikan nomor baru seperti `1059` atau `1060`), sistem akan otomatis memunculkan panel peringatan kuning di bagian atas:
     > **"Terdeteksi X UID Mesin Belum Terdaftar di Master Pegawai"**
   - Panel ini menampilkan daftar UID yang aktif melakukan tap di mesin, total rekaman log, dan tanggal terakhir mesin membaca tap.
   - Admin cukup mengklik tombol tautan **Buka Master Pegawai**, lalu masukkan nomor UID tersebut pada profil pegawai yang bersangkutan. Seketika itu juga seluruh log tap mesin akan langsung terhubung dan otomatis masuk ke rekapitulasi kehadiran tanpa ada data yang tercecer.

---

### 2.9 Mencetak Rekapitulasi Kehadiran Bulanan 20–19 (Excel & PDF Resmi)
Sistem penggajian dan rekapitulasi SPPG Kalisapu menerapkan siklus cut-off **tanggal 20 bulan sebelumnya s.d. tanggal 19 bulan berjalan**:
1. Buka menu **Rekapitulasi (20–19)** (`/admin/rekap`).
2. Pilih **Bulan** dan **Tahun** periode yang ingin dilaporkan.
3. Sistem secara otomatis menggabungkan seluruh sumber data kehadiran:
   - **Prioritas 1:** Presensi Mobile GPS & Selfie kamera.
   - **Prioritas 2:** Log scan mesin fingerprint historis (`pools`).
   - **Prioritas 3:** Permohonan Izin/Sakit yang telah disetujui.
   - **Prioritas 4:** Hari libur nasional resmi (`liburs`).
4. **Melihat Rincian Harian Seseorang:** Klik nama relawan atau tombol rincian pada tabel untuk membuka lembar absensi harian perorangan dari tanggal 20 s.d. 19.
5. **Ekspor Microsoft Excel (`.xlsx`):**
   - Ketuk tombol hijau **Ekspor Excel**.
   - Berkas spreadsheet akan terunduh rapi dengan kolom jumlah tepat waktu, terlambat, izin, sakit, alpha, dan total skor poin presisi 2 desimal.
6. **Ekspor Dokumen PDF Resmi:**
   - Ketuk tombol merah **Cetak PDF**.
   - Dokumen PDF format **Landscape A4** akan terbuat otomatis dengan Kop Resmi **Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu**, tabel komprehensif, serta kolom tanda tangan untuk **Pak Aslap (Pengelola SPPG)** dan **Petugas Tata Usaha**.

---

### 2.10 Kelola Mesin Fingerprint (IP & Port) & Tarik Data Presensi ZKTeco
ARAP v2 mendukung operasional **Hybrid Attendance** (Mobile Attendance + Mesin Fingerprint ZKTeco) untuk mengakomodasi perangkat fisik di lokasi dapur (seperti `FPDAPUR1` di IP `192.168.1.8:4370`). Fitur ini dapat diakses pada menu **Kelola Mesin & Sync** (`/admin/mesin`):

1. **Daftar Mesin & Status Terakhir:**
   - Menampilkan seluruh mesin terdaftar, tipe koneksi (IP / UDP Port 4370 atau USB Flashdisk), alamat IP, port, grup, dan waktu sinkronisasi terakhir.
2. **Cek Koneksi Mesin (Ping UDP & Handshake):**
   - Klik tombol **Check Koneksi** pada kartu mesin IP.
   - Sistem akan melakukan handshake UDP langsung ke mesin fingerprint, menampilkan indikator latensi respon (ms) dan nama model perangkat tanpa mengganggu operasional mesin.
3. **Tarik Data / Sinkronkan Data Mesin ke Database:**
   - **Tarik Mesin Tertentu:** Klik tombol **Sinkronkan Data** pada baris mesin yang diinginkan.
   - **Tarik Semua Mesin Sekaligus:** Klik tombol **Sinkronkan Semua Mesin IP** di bagian atas halaman.
   - **Mekanisme Anti-Duplikasi & Atomic Lock:**
     - Sistem menggunakan *file lock* atomik sehingga proses penarikan tidak akan berjalan ganda jika tombol diklik berulang kali.
     - Penarikan data menggunakan *cutoff timestamp* otomatis (hanya menarik data baru setelah log terakhir di database) dan composite key `mesin_id|iduser|timestamp|type` sehingga tidak ada duplikasi data di tabel `pools`.
4. **Impor Log Presensi via Flashdisk USB (`.dat`):**
   - Jika mesin tidak terhubung ke kabel LAN/WiFi, unduh file log presensi dari mesin ke USB Flashdisk (biasanya berupa file `1_attlog.dat` atau `attlog.dat`).
   - Pada halaman Kelola Mesin, klik tombol **Upload Log USB (.dat)** pada mesin terkait.
   - Pilih berkas `.dat` dan klik **Unggah & Simpan ke Pools**. Log akan langsung diekstrak dan disaring anti-duplikasi.
5. **Sinkronisasi Otomatis Terjadwal (Cron / CLI):**
   - Administrator server dapat menjadwalkan penarikan data berkala tanpa membuka web browser menggunakan perintah Artisan:
     ```bash
     php artisan arap:sync-machine
     ```
   - Untuk memaksa penarikan seluruh data mesin tertentu:
     ```bash
     php artisan arap:sync-machine --mesin=12 --force
     ```

---

### 2.11 Pengaturan Mode Rekapitulasi Presensi (Bulanan 20–19 vs Mingguan)
Administrator dapat menentukan mode periode rekapitulasi kehadiran yang aktif di seluruh sistem:
1. Buka menu **Mode Rekapitulasi** (`/admin/settings/rekap-mode`).
2. Tersedia dua pilihan mode:
   - **Bulanan (Siklus 20–19):** Periode berjalan dari tanggal 20 bulan sebelumnya hingga tanggal 19 bulan ini (standar penggajian operasional SPPG Kalisapu).
   - **Mingguan (Senin–Minggu):** Periode rekapitulasi berbasis mingguan dari hari Senin hingga Minggu pekan berjalan.
3. Klik **Simpan Pengaturan Mode**.
4. Mode yang dipilih akan otomatis menjadi default pada tampilan Rekapitulasi Admin dan tampilan Riwayat Presensi Relawan/Pegawai.

---

### 2.12 Kelola Hari Libur Nasional & Sinkronisasi API
Daftar hari libur nasional digunakan secara otomatis oleh engine rekapitulasi presensi ARAP v2. Pada tanggal merah resmi, relawan tidak dijadwalkan hadir sehingga tidak akan dicatat sebagai Alpha:
1. Buka menu **Hari Libur Nasional** (`/admin/libur`) pada sidebar kelompok *Pengaturan & Master*.
2. **Melihat & Memfilter Hari Libur:**
   - Gunakan dropdown **Filter Tahun** untuk melihat kalender libur tahun berjalan (misal: 2026) maupun arsip tahun-tahun sebelumnya.
   - Gunakan kotak **Cari Keterangan** untuk mencari hari libur tertentu (misal: *"Idul Fitri"*, *"Natal"*, *"Pancasila"*).
3. **Menambah Hari Libur Baru Secara Manual:**
   - Klik tombol **Tambah Hari Libur**.
   - Masukkan tanggal (format kalender) dan nama keterangan libur nasional atau cuti bersama.
   - Klik **Simpan Hari Libur**. Sistem secara otomatis memproteksi agar tidak ada tanggal libur ganda.
4. **Sinkronisasi Otomatis dari API Nasional:**
   - Untuk mengisi hari libur tahun baru (misal tahun 2027) tanpa perlu mengetik satu per satu:
     - Klik tombol **Sinkronkan Libur Nasional (API)** di bagian atas halaman.
     - Pilih tahun target yang ingin ditarik.
     - Klik **Mulai Sinkronisasi**.
     - Sistem akan terhubung ke API hari libur nasional resmi Republik Indonesia dan menyimpan seluruh hari libur tanpa menduplikasi data yang sudah ada sebelumnya. Jika server sedang offline, sistem akan menampilkan notifikasi ramah agar admin dapat melanjutkan input secara manual.

---

### 2.13 Cetak PDF Detail Kehadiran Individu untuk Klarifikasi Poin
Apabila seorang relawan atau staf memerlukan rincian bukti kehadiran perorangan (misal untuk klarifikasi jam kerja atau rekap poin gaji kepada Pak Aslap):
1. Buka menu **Rekapitulasi (20–19)** (`/admin/rekap`).
2. Tentukan periode **Bulan** dan **Tahun** (atau mode **Mingguan**).
3. Cari nama relawan yang bersangkutan, lalu klik tombol **Rincian** (ikon mata/baris nama) untuk membuka halaman rincian harian (`/admin/rekap/{peserta}`).
4. Pada halaman rincian harian, klik tombol merah **Cetak PDF Detail** di kanan atas.
5. Dokumen resmi **Landscape/Portrait A4** akan terunduh otomatis dengan nama berkas `Detail_Presensi_{NIK}_{Periode}.pdf` yang memuat:
   - Kop resmi **Satuan Pelayanan Pemenuhan Gizi (SPPG) Kalisapu**.
   - Kotak profil lengkap: Nama, NIK, Divisi/Jabatan, UID Mesin, Periode Laporan, dan Waktu Cetak.
   - Kotak ringkasan metrik kehadiran (Hadir Tepat Waktu, Terlambat/Awal, Izin, Sakit, Alpha, dan Total Akumulasi Poin).
   - Tabel catatan harian per tanggal: jam masuk (IN), jam pulang (OUT), sumber kehadiran (*Mobile PWA* atau *Mesin Fisik*), skor poin harian, dan catatan status.
   - 3 Blok kolom tanda tangan klarifikasi: **Relawan Bersangkutan**, **Petugas Tata Usaha**, dan **Mengetahui Pengelola SPPG Kalisapu (Pak Aslap)**.

---

# BAGIAN 3 — STANDAR OPERASIONAL PROSEDUR (SOP) PENDAFTARAN RELAWAN BARU

SOP ini mengatur alur pendaftaran relawan baru di SPPG Kalisapu dari perangkat fisik mesin absensi sidik jari ZKTeco hingga terhubung ke aplikasi ARAP v2.

---

### 3.1 Gambaran Alur Integrasi Hybrid
ARAP v2 menerapkan model presensi **Hybrid**:
- **Mesin Fingerprint Fisik (`FPDAPUR1`):** Digunakan di area dapur SPPG Kalisapu untuk verifikasi sidik jari langsung.
- **Mobile Attendance (PWA):** Digunakan melalui smartphone dengan kamera live selfie dan validasi GPS geofencing radius 100 meter dari SPPG.

Kedua metode ini terintegrasi 100% menggunakan parameter kunci:
- **`pesertas.uid`:** Nomor identitas pengguna di mesin fingerprint fisik (misal: UID `105`).
- **`pesertas.nik` & `users.email`:** Nomor identitas KTP dan akun login website/PWA.

---

### 3.2 Langkah Demi Langkah Pendaftaran Relawan Baru

```
+-----------------------------------------------------------------------------------+
| 1. DAFTARKAN DI MESIN FISIK -> Catat UID (misal ID: 105)                          |
+-----------------------------------------------------------------------------------+
                                          |
                                          v
+-----------------------------------------------------------------------------------+
| 2. INPUT MASTER PEGAWAI DI ARAP v2 -> Isi Nama, NIK, Divisi, dan UID: 105         |
+-----------------------------------------------------------------------------------+
                                          |
                                          v
+-----------------------------------------------------------------------------------+
| 3. BUATKAN AKUN LOGIN -> Centang Buatkan Akun, isi Email & Password Awal          |
+-----------------------------------------------------------------------------------+
                                          |
                                          v
+-----------------------------------------------------------------------------------+
| 4. UJI COBA & SINKRONISASI -> Scan sidik jari di mesin & test check-in di web PWA |
+-----------------------------------------------------------------------------------+
                                          |
                                          v
+-----------------------------------------------------------------------------------+
| 5. VERIFIKASI SELESAI -> Log fingerprint masuk ke pools, rekap bulanan terhubung  |
+-----------------------------------------------------------------------------------+
```

#### Langkah 1: Pendaftaran Sidik Jari pada Mesin Fisik ZKTeco `FPDAPUR1`
1. Datangi mesin absensi fingerprint yang terpasang di dapur SPPG Kalisapu.
2. Tekan tombol **`M/OK`** pada mesin untuk membuka menu (masuk menggunakan kartu/sidik jari admin mesin jika terkunci).
3. Pilih menu **User Mgt** (Manajemen Pengguna) -> pilih **New User** (Pengguna Baru).
4. Mesin akan menampilkan nomor ID pengguna berikutnya secara berurutan (contoh: **`105`**).
   > **PENTING:** Catat nomor ID ini! Nomor ini adalah **UID Mesin** yang wajib dimasukkan ke website ARAP v2.
5. Arahkan kursor ke opsi **Fingerprint** (Sidik Jari), lalu tekan `M/OK`.
6. Minta relawan menempelkan jari telunjuk (disarankan mendaftarkan 2 jari: telunjuk kanan dan telunjuk kiri) sebanyak 3 kali berturut-turut pada sensor scanner hingga mesin berbunyi *"Terima Kasih"*.
7. Tekan tombol `ESC` beberapa kali hingga kembali ke layar utama mesin absensi.

#### Langkah 2: Pendaftaran Data Master Pegawai di Web ARAP v2
1. Buka peramban di komputer Tata Usaha, kunjungi website ARAP v2, dan login menggunakan akun Administrator (`Ultraman`).
2. Buka menu **Master Pegawai / Officer** (`/admin/pegawai`).
3. Klik tombol **Tambah Pegawai / Officer**.
4. Lengkapi isian data:
   - **Nama Lengkap:** Nama lengkap relawan sesuai KTP.
   - **Nomor Induk Kependudukan (NIK):** 16 digit NIK resmi relawan.
   - **UID Mesin Fingerprint:** Masukkan nomor ID yang dicatat dari mesin pada Langkah 1 (contoh: **`105`**).
     *Perhatian: Jika kolom UID ini tidak diisi atau salah ketik, log absensi sidik jari dari mesin fisik tidak akan tersambung ke nama relawan.*
   - **Divisi / Jabatan:** Pilih divisi kerja relawan (misal: *Persiapan*, *Pengolahan*, *Pemorsian*, *Distribusi*, *Kebersihan*, *Security*, atau *Ompreng*).
   - **Nomor Telepon:** Nomor WhatsApp aktif relawan.

#### Langkah 3: Pembuatan Akun Login Mobile PWA
1. Masih pada formulir penambahan pegawai yang sama, scroll ke bagian **Informasi Akun Login**:
2. Beri tanda centang pada opsi **"Buatkan Akun Login Sekaligus"**.
3. Masukkan **Alamat Email** relawan (akan digunakan untuk login alternatif atau reset password).
4. Masukkan **Kata Sandi Awal** (contoh: `Sppg2026!`).
5. Pilih **Role Akun**:
   - Pilih **`User`** untuk Relawan Dapur biasa.
   - Pilih **`Officer`** jika personel tersebut adalah koordinator/pengawas lapangan.
6. Klik tombol **Simpan Data Pegawai**.

#### Langkah 4: Uji Coba Presensi & Sinkronisasi Data
1. **Uji Coba Mesin Fisik:**
   - Minta relawan menempelkan jari di mesin dapur `FPDAPUR1`.
   - Pastikan mesin berbunyi sukses *"Terima Kasih"*.
   - Di web ARAP v2, buka menu **Kelola Mesin & Sync** (`/admin/mesin`).
   - Klik tombol **Check Koneksi** untuk memastikan mesin online, lalu klik **Sinkronkan Data**.
   - Buka menu **Arsip Fingerprint** (`/admin/arsip-fingerprint`), cari nama relawan dan pastikan log scan barusan sudah masuk ke tabel `pools`.
2. **Uji Coba Presensi Mobile (PWA):**
   - Minta relawan membuka `https://presensi.sppgkalisapu.id` di HP mereka.
   - Relawan dapat login menggunakan **NIK 16 digit** atau **Email** beserta kata sandi awal yang telah dibuatkan.
   - Relawan membuka menu **Presensi Mobile**, menyetujui izin lokasi & kamera, mengambil foto selfie, dan mengirim check-in.
   - Buka menu **Monitoring Presensi** (`/admin/monitoring`), pastikan status check-in, foto selfie, dan titik koordinat relawan muncul di peta.
3. Minta relawan masuk ke menu **Ganti Password** untuk memperbarui kata sandi awal mereka menjadi kata sandi pribadi yang aman.

#### Langkah 5: Selesai
Relawan kini resmi terdaftar di SPPG Kalisapu. Sistem ARAP v2 akan secara otomatis menghitung kehadiran harian relawan baik saat menggunakan mesin fingerprint di dapur maupun melalui smartphone di lokasi geofence SPPG. Laporan bulanan akan otomatis terakumulasi pada menu **Rekapitulasi (20–19)**.
