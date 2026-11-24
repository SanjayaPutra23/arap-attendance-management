@extends('layouts.app')

@section('title', 'Monitoring Presensi Real-Time')
@section('page_title', 'Monitoring Kehadiran Harian')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-display me-2"></i>Monitoring Presensi Harian & Peta Real-Time
            </h4>
            <p class="text-muted small mb-0">
                Pemantauan sebaran titik presensi GPS, kepatuhan geofence, dan verifikasi selfie relawan SPPG Kalisapu.
            </p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-white border text-secondary px-3 py-2 shadow-sm">
                <i class="bi bi-calendar-event me-1"></i> Tanggal: <strong>{{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}</strong>
            </span>
        </div>
    </div>

    <!-- Filter Panel Card -->
    <div class="card border-0 shadow-sm mb-4 bg-white">
        <div class="card-body p-3 p-md-4">
            <form method="GET" action="{{ route('admin.monitoring.index') }}" id="filterForm">
                <div class="row g-3">
                    <!-- Date Picker -->
                    <div class="col-12 col-md-3">
                        <label class="form-label small fw-semibold text-muted mb-1">Tanggal Presensi</label>
                        <div class="input-group input-group-sm">
                            <input type="date" name="date" class="form-control" value="{{ $date }}" onchange="this.form.submit()">
                            <a href="{{ route('admin.monitoring.index') }}" class="btn btn-outline-secondary" title="Hari Ini">
                                Hari Ini
                            </a>
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <label class="form-label small fw-semibold text-muted mb-1">Status Kehadiran</label>
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="all" {{ ($status === 'all' || !$status) ? 'selected' : '' }}>Semua Status</option>
                            <option value="tepat_waktu" {{ $status === 'tepat_waktu' ? 'selected' : '' }}>Tepat Waktu (Skor 1.0)</option>
                            <option value="terlambat" {{ $status === 'terlambat' ? 'selected' : '' }}>Terlambat Datang</option>
                            <option value="pulang_awal" {{ $status === 'pulang_awal' ? 'selected' : '' }}>Pulang Lebih Awal</option>
                            <option value="terlambat_pulang_awal" {{ $status === 'terlambat_pulang_awal' ? 'selected' : '' }}>Terlambat & Pulang Awal</option>
                        </select>
                    </div>

                    <!-- Search Input -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <label class="form-label small fw-semibold text-muted mb-1">Pencarian Nama / NIK</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama relawan atau NIK..." value="{{ $search }}">
                            <button type="submit" class="btn btn-primary-arap">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Reset Action -->
                    <div class="col-12 col-md-2 d-flex align-items-end">
                        <a href="{{ route('admin.monitoring.index', ['date' => $date]) }}" class="btn btn-sm btn-outline-secondary w-100">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                        </a>
                    </div>
                </div>

                <!-- Division / Officer Filter Button Group -->
                <div class="mt-3 pt-3 border-top">
                    <label class="form-label small fw-semibold text-muted mb-2 d-block">
                        <i class="bi bi-filter me-1"></i> Filter Divisi / Jabatan:
                    </label>
                    <div class="d-flex flex-wrap gap-1">
                        <input type="hidden" name="divisi" id="inputDivisi" value="{{ $divisi ?? 'all' }}">

                        <button type="button" class="btn btn-sm {{ (!$divisi || $divisi === 'all') ? 'btn-primary-arap' : 'btn-outline-secondary' }} btn-filter-divisi" data-divisi="all">
                            Semua ({{ $metrics['total_hadir'] }})
                        </button>

                        @foreach($divisions as $div)
                            @php
                                $isOfficer = strtolower($div) === 'officer';
                                $isActive = strtolower((string)$divisi) === strtolower($div);
                            @endphp
                            <button type="button"
                                    class="btn btn-sm {{ $isActive ? ($isOfficer ? 'btn-primary' : 'btn-primary-arap') : ($isOfficer ? 'btn-outline-primary fw-bold' : 'btn-outline-secondary') }} btn-filter-divisi"
                                    data-divisi="{{ strtolower($div) }}">
                                @if($isOfficer)
                                    <i class="bi bi-star-fill text-warning me-1"></i>
                                @endif
                                {{ $div }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Map & Summary Row -->
    <div class="row g-3 mb-4">
        <!-- Interactive Leaflet Map -->
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-white">
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0 text-primary-arap">
                        <i class="bi bi-geo-alt-fill me-2"></i>Peta Sebaran Titik Presensi Relawan & Radius SPPG
                    </h6>
                    <div class="small text-muted">
                        <span class="badge bg-success-subtle text-success me-1">&bull; Tepat Waktu</span>
                        <span class="badge bg-warning-subtle text-warning me-1">&bull; Terlambat/Awal</span>
                        <span class="badge bg-primary-subtle text-primary">&bull; Lingkaran Geofence SPPG</span>
                    </div>
                </div>
                <div class="card-body p-2">
                    <div id="monitoringMap" style="height: 420px; width: 100%; border-radius: 6px;"></div>
                </div>
                <div class="card-footer bg-light py-2 px-3 small text-muted d-flex flex-wrap justify-content-between align-items-center">
                    <span>
                        <i class="bi bi-info-circle me-1"></i> Titik Geofence Aktif: <strong>{{ $activeLocation->name ?? 'SPPG Kalisapu' }}</strong>
                        (Radius {{ $activeLocation->radius_meters ?? 100 }}m &bull; Toleransi GPS {{ $activeLocation->max_gps_accuracy_meters ?? 50 }}m)
                    </span>
                    <span>Total titik terpeta: <strong>{{ count($mapPoints) }}</strong> posisi</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Tabs: Kehadiran vs Audit Log Ditolak -->
    <div class="card border-0 shadow-sm bg-white">
        <div class="card-header bg-white border-bottom p-0">
            <ul class="nav nav-tabs card-header-tabs m-0 px-3 pt-2" id="monitoringTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active fw-semibold" id="attendances-tab" data-bs-toggle="tab" data-bs-target="#tab-attendances" type="button" role="tab" aria-controls="tab-attendances" aria-selected="true">
                        <i class="bi bi-list-check me-1"></i> Daftar Presensi Harian
                        <span class="badge bg-primary-subtle text-primary ms-1">{{ $attendances->total() }}</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link fw-semibold text-danger" id="rejected-tab" data-bs-toggle="tab" data-bs-target="#tab-rejected" type="button" role="tab" aria-controls="tab-rejected" aria-selected="false">
                        <i class="bi bi-shield-x me-1"></i> Percobaan Ditolak (Audit Log)
                        @if($metrics['total_ditolak'] > 0)
                            <span class="badge bg-danger text-white ms-1">{{ $metrics['total_ditolak'] }}</span>
                        @endif
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="monitoringTabsContent">
            <!-- TAB 1: DAFTAR PRESENSI -->
            <div class="tab-pane fade show active" id="tab-attendances" role="tabpanel" aria-labelledby="attendances-tab">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                        <thead class="table-light">
                            <tr>
                                <th>Relawan / Staf</th>
                                <th>Divisi</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Jarak & Akurasi</th>
                                <th>Status</th>
                                <th class="text-center">Skor</th>
                                <th class="text-center">Bukti Selfie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($attendances as $item)
                                <tr>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $item->peserta?->name ?? 'Tanpa Nama' }}</div>
                                        <small class="text-muted">NIK: {{ $item->peserta?->nik ?? '-' }}</small>
                                    </td>
                                    <td>
                                        @if(strtolower((string)$item->peserta?->jabatan) === 'officer')
                                            <span class="badge bg-primary">Officer</span>
                                        @else
                                            <span class="badge bg-light text-secondary border">
                                                {{ $item->peserta?->jabatan ?? '-' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-semibold">{{ $item->check_in_at ? $item->check_in_at->setTimezone('Asia/Jakarta')->format('H:i:s') : '-' }}</div>
                                        <small class="text-muted">{{ $item->check_in_at ? $item->check_in_at->setTimezone('Asia/Jakarta')->format('d/m/Y') : '' }}</small>
                                    </td>
                                    <td>
                                        @if($item->check_out_at)
                                            <div class="fw-semibold">{{ $item->check_out_at->setTimezone('Asia/Jakarta')->format('H:i:s') }}</div>
                                            <small class="text-muted">{{ $item->check_out_at->setTimezone('Asia/Jakarta')->format('d/m/Y') }}</small>
                                        @else
                                            <span class="badge bg-light text-muted border">Belum Pulang</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div><i class="bi bi-bullseye text-primary me-1"></i> {{ (int) $item->check_in_distance_meters }} meter</div>
                                        <small class="text-muted"><i class="bi bi-broadcast me-1"></i> &plusmn;{{ (int) $item->check_in_accuracy_meters }}m GPS</small>
                                    </td>
                                    <td>
                                        @if($item->status === 'tepat_waktu')
                                            <span class="badge bg-success-subtle text-success border border-success-subtle">
                                                <i class="bi bi-check-circle me-1"></i> Tepat Waktu
                                            </span>
                                        @elseif($item->status === 'terlambat')
                                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle">
                                                <i class="bi bi-clock-history me-1"></i> Terlambat
                                            </span>
                                        @elseif($item->status === 'pulang_awal')
                                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle">
                                                <i class="bi bi-box-arrow-right me-1"></i> Pulang Cepat
                                            </span>
                                        @elseif($item->status === 'terlambat_pulang_awal')
                                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle">
                                                <i class="bi bi-exclamation-triangle me-1"></i> Terlambat & Awal
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($item->status) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center fw-bold {{ $item->score >= 1.0 ? 'text-success' : 'text-warning' }}">
                                        {{ number_format((float) $item->score, 2) }}
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            @php
                                                $inPhoto = $item->photos->firstWhere('type', 'check_in');
                                                $outPhoto = $item->photos->firstWhere('type', 'check_out');
                                            @endphp
                                            @if($inPhoto)
                                                <button type="button" class="btn btn-outline-primary btn-sm btn-view-photo"
                                                        data-bs-toggle="modal" data-bs-target="#photoModal"
                                                        data-photo-url="{{ route('attendance-photos.show', $inPhoto) }}"
                                                        data-photo-title="Selfie Check-in: {{ $item->peserta?->name }}"
                                                        data-photo-desc="Check-in: {{ $item->check_in_at ? $item->check_in_at->setTimezone('Asia/Jakarta')->format('d M Y H:i:s') : '-' }} &bull; Jarak: {{ (int) $item->check_in_distance_meters }}m &bull; Akurasi GPS: &plusmn;{{ (int) $item->check_in_accuracy_meters }}m">
                                                    <i class="bi bi-camera me-1"></i> Masuk
                                                </button>
                                            @endif
                                            @if($outPhoto)
                                                <button type="button" class="btn btn-outline-success btn-sm btn-view-photo"
                                                        data-bs-toggle="modal" data-bs-target="#photoModal"
                                                        data-photo-url="{{ route('attendance-photos.show', $outPhoto) }}"
                                                        data-photo-title="Selfie Check-out: {{ $item->peserta?->name }}"
                                                        data-photo-desc="Check-out: {{ $item->check_out_at ? $item->check_out_at->setTimezone('Asia/Jakarta')->format('d M Y H:i:s') : '-' }} &bull; Jarak: {{ (int) $item->check_out_distance_meters }}m">
                                                    <i class="bi bi-camera-fill me-1"></i> Pulang
                                                </button>
                                            @endif
                                            @if(!$inPhoto && !$outPhoto)
                                                <span class="text-muted small">Tidak ada</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-5">
                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                        Tidak ada catatan kehadiran yang sesuai dengan filter pada tanggal {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($attendances->hasPages())
                    <div class="card-footer bg-white border-top py-3">
                        {{ $attendances->links() }}
                    </div>
                @endif
            </div>

            <!-- TAB 2: AUDIT LOG DITOLAK -->
            <div class="tab-pane fade" id="tab-rejected" role="tabpanel" aria-labelledby="rejected-tab">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                        <thead class="table-light">
                            <tr>
                                <th>Waktu Kejadian</th>
                                <th>Relawan / Akun</th>
                                <th>Aksi Percobaan</th>
                                <th>Alasan Penolakan</th>
                                <th>Jarak Terdeteksi</th>
                                <th>Akurasi GPS</th>
                                <th>Perangkat / IP</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rejectedLogs as $log)
                                <tr>
                                    <td>
                                        <div class="fw-semibold text-danger">
                                            <i class="bi bi-x-circle-fill me-1"></i>
                                            {{ $log->created_at ? $log->created_at->setTimezone('Asia/Jakarta')->format('H:i:s') : '-' }} WIB
                                        </div>
                                        <small class="text-muted">{{ $log->created_at ? $log->created_at->setTimezone('Asia/Jakarta')->format('d M Y') : '' }}</small>
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $log->peserta?->name ?? ($log->user?->name ?? 'Tamu') }}</div>
                                        <small class="text-muted">{{ $log->peserta?->nik ?? ($log->user?->email ?? '-') }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border text-uppercase">
                                            {{ str_replace('_', ' ', $log->action) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle">
                                            {{ match($log->reason) {
                                                'outside_geofence_radius' => 'Di Luar Radius Geofence SPPG',
                                                'gps_accuracy_insufficient' => 'Akurasi GPS Tidak Memadai',
                                                'already_checked_in' => 'Sudah Melakukan Check-in Hari Ini',
                                                'not_checked_in_yet' => 'Belum Check-in (Tidak Dapat Check-out)',
                                                'already_checked_out' => 'Sudah Melakukan Check-out Hari Ini',
                                                'no_active_location' => 'Tidak Ada Lokasi Geofence Aktif',
                                                'selfie_face_not_detected' => 'Wajah Tidak Terdeteksi pada Selfie',
                                                default => ucfirst(str_replace('_', ' ', (string)$log->reason)),
                                            } }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($log->distance_meters !== null)
                                            <span class="fw-semibold text-danger">{{ (int) $log->distance_meters }} m</span>
                                            <small class="text-muted d-block">dari sentral</small>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($log->accuracy_meters !== null)
                                            <span>&plusmn;{{ (int) $log->accuracy_meters }} m</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted d-block text-truncate" style="max-width: 180px;" title="{{ $log->user_agent }}">
                                            {{ $log->ip_address }} &bull; {{ Str::limit($log->user_agent, 20) }}
                                        </small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">
                                        <i class="bi bi-shield-check fs-3 text-success d-block mb-2"></i>
                                        Tidak ada catatan percobaan presensi yang ditolak pada tanggal {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Selfie Photo Viewer Reusable -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h6 class="modal-title fw-bold" id="photoModalLabel">Bukti Foto Selfie Presensi</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center p-3">
                <div id="photoSpinner" class="py-5 text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Memuat foto...</span>
                    </div>
                </div>
                <img id="modalPhotoImage" src="" alt="Bukti Selfie" class="img-fluid rounded border shadow-sm d-none" style="max-height: 420px; width: auto; object-fit: contain;">
                <p id="photoDesc" class="small text-muted mt-3 mb-0"></p>
            </div>
            <div class="modal-footer border-top py-2">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Division filter button click handling
        document.querySelectorAll('.btn-filter-divisi').forEach(btn => {
            btn.addEventListener('click', function() {
                const divisi = this.getAttribute('data-divisi');
                document.getElementById('inputDivisi').value = divisi;
                document.getElementById('filterForm').submit();
            });
        });

        // 2. Leaflet OpenStreetMap Initialization
        const activeLocation = @json($activeLocation);
        const mapPoints = @json($mapPoints);

        const defaultLat = activeLocation ? parseFloat(activeLocation.latitude) : -6.9048386;
        const defaultLng = activeLocation ? parseFloat(activeLocation.longitude) : 109.1177696;
        const radiusMeters = activeLocation ? parseInt(activeLocation.radius_meters) : 100;

        const map = L.map('monitoringMap').setView([defaultLat, defaultLng], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Center SPPG Marker & Geofence Circle
        const sppgIcon = L.divIcon({
            html: '<div style="background-color: #1e3a8a; color: white; width: 34px; height: 34px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 10px rgba(0,0,0,0.4); border: 2px solid white;"><i class="bi bi-building fs-6"></i></div>',
            className: '',
            iconSize: [34, 34],
            iconAnchor: [17, 17]
        });

        const centerMarker = L.marker([defaultLat, defaultLng], { icon: sppgIcon }).addTo(map);
        centerMarker.bindPopup(`<strong>${activeLocation ? activeLocation.name : 'Titik Sentral SPPG Kalisapu'}</strong><br><small class="text-muted">Radius Validasi: ${radiusMeters} meter</small>`);

        const geofenceCircle = L.circle([defaultLat, defaultLng], {
            radius: radiusMeters,
            color: '#2563eb',
            fillColor: '#3b82f6',
            fillOpacity: 0.15,
            weight: 2,
            dashArray: '5, 5'
        }).addTo(map);

        // Plot Attendance Points
        const bounds = L.latLngBounds([[defaultLat, defaultLng]]);

        mapPoints.forEach(pt => {
            if (pt.lat && pt.lng) {
                bounds.extend([pt.lat, pt.lng]);

                const isOnTime = pt.status === 'tepat_waktu';
                const markerColor = isOnTime ? '#16a34a' : '#d97706';
                const statusBadge = isOnTime
                    ? '<span class="badge bg-success">Tepat Waktu</span>'
                    : '<span class="badge bg-warning text-dark">Terlambat/Awal</span>';

                const ptIcon = L.divIcon({
                    html: `<div style="background-color: ${markerColor}; color: white; width: 28px; height: 28px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 6px rgba(0,0,0,0.3); border: 2px solid white;"><i class="bi bi-person-fill" style="font-size: 13px;"></i></div>`,
                    className: '',
                    iconSize: [28, 28],
                    iconAnchor: [14, 14]
                });

                const popupContent = `
                    <div style="min-width: 180px;">
                        <h6 class="fw-bold mb-1">${pt.name}</h6>
                        <small class="text-muted d-block mb-1">NIK: ${pt.nik} &bull; ${pt.jabatan}</small>
                        <div class="mb-2">${statusBadge} &bull; Skor: <strong>${pt.score.toFixed(2)}</strong></div>
                        <div class="small mb-1"><i class="bi bi-clock"></i> Masuk: <strong>${pt.check_in_time}</strong></div>
                        <div class="small mb-1"><i class="bi bi-bullseye"></i> Jarak: <strong>${Math.round(pt.distance_meters)} m</strong></div>
                        <div class="small mb-2"><i class="bi bi-broadcast"></i> Akurasi GPS: <strong>&plusmn;${Math.round(pt.accuracy_meters)} m</strong></div>
                        ${pt.check_in_photo_id ? `
                            <button type="button" class="btn btn-xs btn-primary w-100 py-1 btn-popup-photo"
                                    data-photo-url="/attendance-photos/${pt.check_in_photo_id}"
                                    data-photo-title="Selfie Check-in: ${pt.name}"
                                    data-photo-desc="Jam Masuk: ${pt.check_in_time} &bull; Jarak: ${Math.round(pt.distance_meters)}m &bull; Akurasi: &plusmn;${Math.round(pt.accuracy_meters)}m">
                                <i class="bi bi-camera me-1"></i> Lihat Foto Selfie
                            </button>
                        ` : ''}
                    </div>
                `;

                const marker = L.marker([pt.lat, pt.lng], { icon: ptIcon }).addTo(map);
                marker.bindPopup(popupContent);
            }
        });

        if (mapPoints.length > 0) {
            map.fitBounds(bounds, { padding: [50, 50], maxZoom: 18 });
        }

        // Popup photo button trigger
        map.on('popupopen', function() {
            document.querySelectorAll('.btn-popup-photo').forEach(btn => {
                btn.addEventListener('click', function() {
                    const photoUrl = this.getAttribute('data-photo-url');
                    const photoTitle = this.getAttribute('data-photo-title');
                    const photoDesc = this.getAttribute('data-photo-desc');

                    const photoModal = new bootstrap.Modal(document.getElementById('photoModal'));
                    const titleEl = document.getElementById('photoModalLabel');
                    const imgEl = document.getElementById('modalPhotoImage');
                    const spinnerEl = document.getElementById('photoSpinner');
                    const descEl = document.getElementById('photoDesc');

                    if (titleEl) titleEl.textContent = photoTitle;
                    if (descEl) descEl.innerHTML = photoDesc;

                    if (imgEl && spinnerEl) {
                        imgEl.classList.add('d-none');
                        spinnerEl.classList.remove('d-none');
                        imgEl.onload = function() {
                            spinnerEl.classList.add('d-none');
                            imgEl.classList.remove('d-none');
                        };
                        imgEl.src = photoUrl;
                    }

                    photoModal.show();
                });
            });
        });

        // 3. Modal Photo Viewer Handler for Table Buttons
        const photoModalEl = document.getElementById('photoModal');
        if (photoModalEl) {
            photoModalEl.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                if (!button) return;

                const photoUrl = button.getAttribute('data-photo-url');
                const photoTitle = button.getAttribute('data-photo-title');
                const photoDesc = button.getAttribute('data-photo-desc');

                const titleEl = photoModalEl.querySelector('#photoModalLabel');
                const imgEl = photoModalEl.querySelector('#modalPhotoImage');
                const spinnerEl = photoModalEl.querySelector('#photoSpinner');
                const descEl = photoModalEl.querySelector('#photoDesc');

                if (titleEl) titleEl.textContent = photoTitle || 'Bukti Foto Selfie';
                if (descEl) descEl.innerHTML = photoDesc || '';

                if (imgEl && spinnerEl) {
                    imgEl.classList.add('d-none');
                    spinnerEl.classList.remove('d-none');
                    imgEl.onload = function() {
                        spinnerEl.classList.add('d-none');
                        imgEl.classList.remove('d-none');
                    };
                    imgEl.src = photoUrl;
                }
            });
        }
    });
</script>
@endpush
