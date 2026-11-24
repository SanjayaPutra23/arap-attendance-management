@extends('layouts.app')

@section('title', 'Presensi Mobile PWA')
@section('page_title', 'Presensi Mobile SPPG Kalisapu')

@section('content')
<div class="container-fluid p-0">
    @if(! $peserta)
        <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill fs-3 me-3 text-warning"></i>
            <div>
                <h5 class="alert-heading fw-bold mb-1">Akun Belum Ditautkan</h5>
                <p class="mb-0 small text-secondary">
                    Akun login Anda (<strong>{{ $user->name }}</strong>) belum ditautkan ke data profil Relawan/Pegawai SPPG.
                    Fitur presensi GPS & selfie hanya dapat digunakan oleh akun yang memiliki ID Relawan/Pegawai.
                    Silakan hubungi Petugas Tata Usaha untuk penautan profil.
                </p>
            </div>
        </div>
    @else
        <!-- Header Info Relawan & Jam Operasional -->
        <div class="card card-dashboard border-0 bg-primary-arap text-white mb-4">
            <div class="card-body p-3 p-md-4">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-md-8">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge bg-white text-primary fw-bold">Divisi: {{ ucfirst($peserta->jabatan) }}</span>
                            @if($isLibur)
                                <span class="badge bg-warning text-dark fw-bold">
                                    <i class="bi bi-calendar-event me-1"></i> Libur: {{ $liburKeterangan }}
                                </span>
                            @endif
                            @if($approvedLeave)
                                <span class="badge bg-info text-dark fw-bold">
                                    <i class="bi bi-file-medical me-1"></i> Status: {{ ucfirst($approvedLeave->jenis) }} Disetujui
                                </span>
                            @endif
                        </div>
                        <h4 class="fw-bold mb-1">{{ $peserta->name }}</h4>
                        <div class="small text-white-50 d-flex flex-wrap gap-3">
                            <span><i class="bi bi-person-badge me-1"></i> NIK: {{ $peserta->nik ?? ($peserta->uid ?? '-') }}</span>
                            <span><i class="bi bi-clock-history me-1"></i> Jadwal: {{ $workingHours['jam_datang'] ?? '08:00:00' }} - {{ $workingHours['jam_pulang'] ?? '17:00:00' }} WIB</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-md-end">
                        <div class="p-2 px-3 rounded bg-white bg-opacity-10 d-inline-block text-start text-md-end w-100 w-md-auto">
                            <div class="small text-white-50"><i class="bi bi-calendar3 me-1"></i> {{ date('l, d F Y') }}</div>
                            <div class="h5 fw-bold mb-0 text-white"><i class="bi bi-clock me-1"></i> <span id="mobileServerClock">{{ date('H:i:s') }} WIB</span></div>
                        </div>
                    </div>
                </div>

                <!-- Status Presensi Hari Ini -->
                <div class="row g-2 mt-2 pt-2 border-top border-white border-opacity-10 text-center">
                    <div class="col-6">
                        <div class="p-2 rounded bg-white bg-opacity-10">
                            <div class="small text-white-50 fw-semibold">Check-in Masuk</div>
                            <div class="fw-bold fs-6">
                                @if($todayAttendance && $todayAttendance->check_in_at)
                                    <i class="bi bi-check-circle-fill text-success me-1"></i> {{ $todayAttendance->check_in_at->format('H:i:s') }} WIB
                                @else
                                    <span class="text-white-50"><i class="bi bi-dash-circle me-1"></i> Belum Masuk</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-2 rounded bg-white bg-opacity-10">
                            <div class="small text-white-50 fw-semibold">Check-out Pulang</div>
                            <div class="fw-bold fs-6">
                                @if($todayAttendance && $todayAttendance->check_out_at)
                                    <i class="bi bi-check-circle-fill text-success me-1"></i> {{ $todayAttendance->check_out_at->format('H:i:s') }} WIB
                                @else
                                    <span class="text-white-50"><i class="bi bi-dash-circle me-1"></i> Belum Pulang</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Respons Submit / Notifikasi -->
        <div id="attendanceAlert" class="alert d-none shadow-sm mb-3" role="alert"></div>

        <!-- Layout 2 Kolom (Desktop) / 1 Kolom (Mobile) -->
        <div class="row g-3 mb-4">
            <!-- Kolom Kiri: Kamera Selfie Langsung (Anti-Galeri) -->
            <div class="col-12 col-lg-6">
                <div class="card card-dashboard h-100 bg-white">
                    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                        <h6 class="fw-bold mb-0 text-primary-arap">
                            <i class="bi bi-camera-fill me-2"></i>Kamera Selfie Langsung
                        </h6>
                        <span class="badge bg-success-subtle text-success small">Anti-Galeri (Live Only)</span>
                    </div>
                    <div class="card-body p-3 text-center">
                        <!-- Viewport Kamera & Preview -->
                        <div class="camera-viewport position-relative bg-dark rounded overflow-hidden shadow-inner mb-3" style="min-height: 280px; max-height: 380px;">
                            <video id="cameraVideo" autoplay playsinline muted class="w-100 h-100" style="object-fit: cover; min-height: 280px; transform: scaleX(-1);"></video>
                            <canvas id="cameraCanvas" class="d-none"></canvas>
                            <img id="selfiePreview" class="w-100 h-100 d-none" style="object-fit: cover; min-height: 280px;" alt="Selfie Preview">

                            <!-- Placeholder Belum Aktif -->
                            <div id="cameraPlaceholder" class="position-absolute top-50 start-50 translate-middle text-white text-center w-100 px-3">
                                <i class="bi bi-camera-video-off fs-1 text-white-50 mb-2"></i>
                                <p class="small mb-2 text-white-50">Kamera belum aktif. Tekan tombol di bawah untuk mengaktifkan kamera depan perangkat Anda.</p>
                                <button type="button" class="btn btn-sm btn-light fw-bold" onclick="startCamera()">
                                    <i class="bi bi-camera-video me-1"></i> Aktifkan Kamera
                                </button>
                            </div>

                            <!-- Face Guide Overlay saat kamera aktif -->
                            <div id="faceGuide" class="position-absolute top-50 start-50 translate-middle d-none pointer-events-none" style="width: 180px; height: 240px; border: 2px dashed rgba(255,255,255,0.6); border-radius: 50%;">
                                <div class="small text-white text-opacity-75 position-absolute bottom-0 start-50 translate-middle-x mb-2 text-nowrap" style="font-size: 0.7rem;">
                                    Posisikan Wajah di Sini
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Kontrol Kamera -->
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <button type="button" id="btnStartCamera" class="btn btn-outline-primary btn-sm fw-semibold" onclick="startCamera()">
                                <i class="bi bi-camera-video me-1"></i> Nyalakan Kamera
                            </button>
                            <button type="button" id="btnSnapPhoto" class="btn btn-primary btn-sm fw-semibold d-none" onclick="takeSnapshot()">
                                <i class="bi bi-record-circle me-1"></i> Ambil Foto
                            </button>
                            <button type="button" id="btnRetakePhoto" class="btn btn-outline-secondary btn-sm fw-semibold d-none" onclick="retakePhoto()">
                                <i class="bi bi-arrow-repeat me-1"></i> Ambil Ulang
                            </button>
                        </div>
                        <div class="small text-muted mt-2" style="font-size: 0.75rem;">
                            <i class="bi bi-shield-check text-success me-1"></i>Foto diverifikasi secara visual oleh Staf Tata Usaha. Pengambilan foto wajib dari stream kamera langsung.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kolom Kanan: GPS Geofencing & Leaflet OpenStreetMap -->
            <div class="col-12 col-lg-6">
                <div class="card card-dashboard h-100 bg-white">
                    <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
                        <h6 class="fw-bold mb-0 text-primary-arap">
                            <i class="bi bi-geo-alt-fill me-2"></i>Validasi Geofence & GPS
                        </h6>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="getCurrentLocation()">
                            <i class="bi bi-arrow-clockwise me-1"></i> Update GPS
                        </button>
                    </div>
                    <div class="card-body p-3">
                        <!-- Mini Map Leaflet -->
                        <div id="leafletMap" class="rounded border mb-3 shadow-sm" style="height: 220px; width: 100%; z-index: 1;"></div>

                        <!-- Panel Status Jarak & Akurasi -->
                        <div class="p-3 bg-light rounded border">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="small fw-bold text-secondary">Lokasi Sentral:</span>
                                <span class="badge bg-primary">{{ $activeLocation->name ?? 'SPPG Kalisapu' }}</span>
                            </div>
                            <div class="row g-2 text-center small mb-2">
                                <div class="col-4">
                                    <div class="p-2 border rounded bg-white">
                                        <div class="text-muted" style="font-size: 0.7rem;">Jarak ke Sentral</div>
                                        <div id="statDistance" class="fw-bold text-dark">- m</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 border rounded bg-white">
                                        <div class="text-muted" style="font-size: 0.7rem;">Radius Izin</div>
                                        <div class="fw-bold text-primary">{{ $activeLocation->radius_meters ?? 100 }} m</div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="p-2 border rounded bg-white">
                                        <div class="text-muted" style="font-size: 0.7rem;">Akurasi GPS</div>
                                        <div id="statAccuracy" class="fw-bold text-dark">- m</div>
                                    </div>
                                </div>
                            </div>
                            <div id="geofenceStatusBadge" class="alert alert-secondary py-2 px-3 mb-0 small text-center">
                                <i class="bi bi-hourglass-split me-1"></i> Menunggu koordinat GPS perangkat Anda...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi Utama Presensi -->
        <div class="card card-dashboard bg-white border-0 shadow-sm mb-4">
            <div class="card-body p-4 text-center">
                @if(! $todayAttendance)
                    {{-- Kasus 1: Belum Check-in --}}
                    <h5 class="fw-bold text-dark mb-1">Presensi Masuk (Check-in)</h5>
                    <p class="text-muted small mb-3">Pastikan Anda berada di area Dapur SPPG Kalisapu dan foto selfie telah diambil.</p>
                    <button type="button" id="btnSubmitAttendance" class="btn btn-success btn-lg px-5 fw-bold shadow-sm" onclick="submitAttendance('check_in')">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Kirim Presensi Masuk (Check-in)
                    </button>
                @elseif($todayAttendance->check_out_at === null)
                    {{-- Kasus 2: Sudah Check-in, Belum Check-out --}}
                    <h5 class="fw-bold text-dark mb-1">Presensi Pulang (Check-out)</h5>
                    <p class="text-muted small mb-3">
                        Anda telah check-in pada pukul <strong>{{ $todayAttendance->check_in_at->format('H:i:s') }} WIB</strong>.
                        Ambil foto selfie sebelum pulang dan kirim presensi check-out.
                    </p>
                    <button type="button" id="btnSubmitAttendance" class="btn btn-primary-arap btn-lg px-5 fw-bold shadow-sm" onclick="submitAttendance('check_out')">
                        <i class="bi bi-box-arrow-left me-2"></i> Kirim Presensi Pulang (Check-out)
                    </button>
                @else
                    {{-- Kasus 3: Lengkap In + Out --}}
                    <div class="text-success mb-2">
                        <i class="bi bi-patch-check-fill fs-1"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-1">Presensi Hari Ini Lengkap</h5>
                    <p class="text-muted small mb-3">
                        Anda telah menyelesaikan presensi masuk ({{ $todayAttendance->check_in_at->format('H:i') }} WIB) dan presensi pulang ({{ $todayAttendance->check_out_at->format('H:i') }} WIB) dengan skor poin <strong>{{ number_format($todayAttendance->score, 2) }}</strong>.
                    </p>
                    <a href="{{ route('mobile-attendance.history') }}" class="btn btn-outline-primary btn-sm fw-semibold">
                        <i class="bi bi-clock-history me-1"></i> Lihat Riwayat Presensi
                    </a>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
    // Konfigurasi Titik Sentral Geofence dari Database
    const centerLat = {{ $activeLocation->latitude ?? -6.9885000 }};
    const centerLng = {{ $activeLocation->longitude ?? 109.1378000 }};
    const allowedRadius = {{ $activeLocation->radius_meters ?? 100 }};
    const maxAllowedAccuracy = {{ $activeLocation->max_gps_accuracy_meters ?? 50 }};

    let map = null;
    let userMarker = null;
    let userCircle = null;
    let centerMarker = null;
    let centerCircle = null;

    let currentLat = null;
    let currentLng = null;
    let currentAccuracy = null;
    let currentDistance = null;
    let isGeofenceValid = false;

    let mediaStream = null;
    let selfieBlob = null;

    // Inisialisasi Jam Real-time
    function updateClock() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' }) + ' WIB';
        const el = document.getElementById('mobileServerClock');
        if (el) el.textContent = timeString;
    }
    setInterval(updateClock, 1000);

    // Inisialisasi Peta Leaflet
    document.addEventListener('DOMContentLoaded', () => {
        initMap();
        getCurrentLocation();
    });

    function initMap() {
        const mapContainer = document.getElementById('leafletMap');
        if (!mapContainer || typeof window.L === 'undefined') return;

        map = window.L.map('leafletMap').setView([centerLat, centerLng], 17);

        window.L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Marker & Radius Pusat SPPG Kalisapu
        centerMarker = window.L.marker([centerLat, centerLng])
            .addTo(map)
            .bindPopup('<b>Titik Sentral SPPG Kalisapu</b><br>Radius: ' + allowedRadius + ' meter');

        centerCircle = window.L.circle([centerLat, centerLng], {
            color: '#1e3a8a',
            fillColor: '#3b82f6',
            fillOpacity: 0.15,
            radius: allowedRadius
        }).addTo(map);
    }

    // Perhitungan Jarak Haversine Sisi Klien untuk Responsif Visual
    function calculateHaversine(lat1, lon1, lat2, lon2) {
        const R = 6371000;
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLon = (lon2 - lon1) * Math.PI / 180;
        const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                  Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                  Math.sin(dLon/2) * Math.sin(dLon/2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        return Math.round(R * c * 100) / 100;
    }

    // Dapatkan Lokasi GPS Perangkat
    function getCurrentLocation() {
        const statusBadge = document.getElementById('geofenceStatusBadge');
        const statDistance = document.getElementById('statDistance');
        const statAccuracy = document.getElementById('statAccuracy');

        if (!navigator.geolocation) {
            if (statusBadge) {
                statusBadge.className = 'alert alert-danger py-2 px-3 mb-0 small text-center';
                statusBadge.innerHTML = '<i class="bi bi-x-circle me-1"></i> Peramban browser tidak mendukung fitur Geolocation GPS.';
            }
            return;
        }

        if (statusBadge) {
            statusBadge.className = 'alert alert-info py-2 px-3 mb-0 small text-center';
            statusBadge.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Menghubungkan ke sensor GPS presisi tinggi...';
        }

        navigator.geolocation.getCurrentPosition(
            (position) => {
                currentLat = position.coords.latitude;
                currentLng = position.coords.longitude;
                currentAccuracy = Math.round(position.coords.accuracy * 10) / 10;

                currentDistance = calculateHaversine(currentLat, currentLng, centerLat, centerLng);

                if (statDistance) statDistance.textContent = currentDistance + ' m';
                if (statAccuracy) statAccuracy.textContent = currentAccuracy + ' m';

                // Update Map Layer User
                if (map) {
                    if (userMarker) map.removeLayer(userMarker);
                    if (userCircle) map.removeLayer(userCircle);

                    userMarker = window.L.marker([currentLat, currentLng])
                        .addTo(map)
                        .bindPopup('<b>Posisi Anda</b><br>Jarak: ' + currentDistance + ' m<br>Akurasi: ' + currentAccuracy + ' m')
                        .openPopup();

                    userCircle = window.L.circle([currentLat, currentLng], {
                        color: currentDistance <= allowedRadius ? '#10b981' : '#ef4444',
                        fillColor: currentDistance <= allowedRadius ? '#10b981' : '#ef4444',
                        fillOpacity: 0.2,
                        radius: currentAccuracy
                    }).addTo(map);

                    const group = new window.L.featureGroup([centerCircle, userMarker]);
                    map.fitBounds(group.getBounds().pad(0.2));
                }

                // Evaluasi Status Geofence
                if (currentAccuracy > maxAllowedAccuracy) {
                    isGeofenceValid = false;
                    statusBadge.className = 'alert alert-warning py-2 px-3 mb-0 small text-center';
                    statusBadge.innerHTML = `<i class="bi bi-exclamation-triangle-fill me-1"></i> Akurasi GPS rendah (${currentAccuracy} m > max ${maxAllowedAccuracy} m). Harap tunggu sinyal stabil / keluar ruangan.`;
                } else if (currentDistance > allowedRadius) {
                    isGeofenceValid = false;
                    statusBadge.className = 'alert alert-danger py-2 px-3 mb-0 small text-center';
                    statusBadge.innerHTML = `<i class="bi bi-geo-fill me-1"></i> Di luar radius (${currentDistance} m > ${allowedRadius} m). Anda harus berada di SPPG Kalisapu.`;
                } else {
                    isGeofenceValid = true;
                    statusBadge.className = 'alert alert-success py-2 px-3 mb-0 small text-center';
                    statusBadge.innerHTML = `<i class="bi bi-check-circle-fill me-1"></i> Lokasi Valid! Anda berada di dalam radius SPPG (${currentDistance} m, akurasi ${currentAccuracy} m).`;
                }
            },
            (error) => {
                let errorMsg = 'Gagal mengakses GPS: ' + error.message;
                if (error.code === 1) {
                    errorMsg = 'Izin lokasi GPS ditolak oleh pengguna. Mohon izinkan akses lokasi pada browser HP Anda.';
                }
                if (statusBadge) {
                    statusBadge.className = 'alert alert-danger py-2 px-3 mb-0 small text-center';
                    statusBadge.innerHTML = `<i class="bi bi-x-octagon-fill me-1"></i> ${errorMsg}`;
                }
            },
            {
                enableHighAccuracy: true,
                timeout: 15000,
                maximumAge: 0
            }
        );
    }

    // WebRTC Live Camera (Anti-Galeri)
    async function startCamera() {
        const video = document.getElementById('cameraVideo');
        const placeholder = document.getElementById('cameraPlaceholder');
        const faceGuide = document.getElementById('faceGuide');
        const btnStart = document.getElementById('btnStartCamera');
        const btnSnap = document.getElementById('btnSnapPhoto');
        const preview = document.getElementById('selfiePreview');

        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            showAlert('danger', 'Peramban browser tidak mendukung streaming kamera (getUserMedia) atau diakses bukan melalui HTTPS / localhost.');
            return;
        }

        try {
            if (mediaStream) {
                mediaStream.getTracks().forEach(track => track.stop());
            }

            mediaStream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'user',
                    width: { ideal: 640 },
                    height: { ideal: 480 }
                },
                audio: false
            });

            video.srcObject = mediaStream;
            video.classList.remove('d-none');
            if (preview) preview.classList.add('d-none');
            if (placeholder) placeholder.classList.add('d-none');
            if (faceGuide) faceGuide.classList.remove('d-none');
            if (btnStart) btnStart.classList.add('d-none');
            if (btnSnap) btnSnap.classList.remove('d-none');
        } catch (err) {
            showAlert('danger', 'Tidak dapat menyalakan kamera: ' + err.message + '. Mohon pastikan izin kamera diaktifkan.');
        }
    }

    // Ambil Snapshot dari Video Stream ke Canvas
    function takeSnapshot() {
        const video = document.getElementById('cameraVideo');
        const canvas = document.getElementById('cameraCanvas');
        const preview = document.getElementById('selfiePreview');
        const faceGuide = document.getElementById('faceGuide');
        const btnSnap = document.getElementById('btnSnapPhoto');
        const btnRetake = document.getElementById('btnRetakePhoto');

        if (!video || !canvas) return;

        canvas.width = video.videoWidth || 640;
        canvas.height = video.videoHeight || 480;

        const ctx = canvas.getContext('2d');
        // Gambar mirror horizontal agar cocok dengan preview kamera depan
        ctx.translate(canvas.width, 0);
        ctx.scale(-1, 1);
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        canvas.toBlob((blob) => {
            selfieBlob = blob;
            preview.src = URL.createObjectURL(blob);
            preview.classList.remove('d-none');
            video.classList.add('d-none');
            if (faceGuide) faceGuide.classList.add('d-none');
            if (btnSnap) btnSnap.classList.add('d-none');
            if (btnRetake) btnRetake.classList.remove('d-none');

            // Hentikan stream kamera sementara
            if (mediaStream) {
                mediaStream.getTracks().forEach(track => track.stop());
            }
        }, 'image/jpeg', 0.85);
    }

    // Ambil Ulang Foto Selfie
    function retakePhoto() {
        selfieBlob = null;
        const btnRetake = document.getElementById('btnRetakePhoto');
        if (btnRetake) btnRetake.classList.add('d-none');
        startCamera();
    }

    // Submit Presensi Check-in / Check-out
    async function submitAttendance(type) {
        const btnSubmit = document.getElementById('btnSubmitAttendance');

        // Validasi GPS
        if (!currentLat || !currentLng || currentAccuracy === null) {
            showAlert('warning', 'Koordinat GPS belum terdeteksi. Silakan tekan tombol "Update GPS" terlebih dahulu.');
            return;
        }

        if (!isGeofenceValid) {
            showAlert('danger', `Posisi Anda tidak valid untuk presensi (${currentDistance} m). Anda harus berada di radius SPPG Kalisapu (${allowedRadius} m) dengan akurasi GPS baik.`);
            return;
        }

        // Validasi Foto Selfie
        if (!selfieBlob) {
            showAlert('warning', 'Foto selfie belum diambil. Silakan aktifkan kamera dan ambil foto selfie terlebih dahulu.');
            return;
        }

        const formData = new FormData();
        formData.append('type', type);
        formData.append('latitude', currentLat);
        formData.append('longitude', currentLng);
        formData.append('accuracy', currentAccuracy);
        formData.append('photo', selfieBlob, 'selfie.jpg');

        const originalBtnHtml = btnSubmit.innerHTML;
        btnSubmit.disabled = true;
        btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status"></span> Mengirim Presensi...';

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

            const res = await fetch("{{ route('mobile-attendance.store') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await res.json();

            if (res.ok && data.success) {
                showAlert('success', `<i class="bi bi-check-circle-fill me-2"></i> ${data.message} Status: <strong>${data.status.toUpperCase()}</strong> (Poin: ${data.score}) pada ${data.time} WIB.`);
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                showAlert('danger', `<i class="bi bi-x-octagon-fill me-2"></i> Presensi Ditolak: ${data.message || 'Terjadi kesalahan sistem.'}`);
                btnSubmit.disabled = false;
                btnSubmit.innerHTML = originalBtnHtml;
            }
        } catch (err) {
            showAlert('danger', 'Gagal mengirim presensi: ' + err.message + '. Silakan periksa koneksi internet.');
            btnSubmit.disabled = false;
            btnSubmit.innerHTML = originalBtnHtml;
        }
    }

    function showAlert(type, html) {
        const el = document.getElementById('attendanceAlert');
        if (!el) return;
        el.className = `alert alert-${type} shadow-sm mb-3`;
        el.innerHTML = html;
        el.classList.remove('d-none');
        el.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }
</script>
@endpush
