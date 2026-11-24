@extends('layouts.app')

@section('title', 'Pengaturan Lokasi Geofence')
@section('page_title', 'Master Lokasi Geofence SPPG')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-pin-map-fill me-2"></i>Master Lokasi Sentral & Radius Geofence
            </h4>
            <p class="text-muted small mb-0">
                Atur koordinat GPS sentral, radius toleransi kehadiran (meter), dan batas akurasi GPS perangkat relawan SPPG Kalisapu.
            </p>
        </div>
        <div>
            <button type="button" class="btn btn-sm btn-primary-arap fw-semibold" id="btnAddNewLocation">
                <i class="bi bi-plus-lg me-1"></i> Tambah Lokasi Baru
            </button>
        </div>
    </div>

    <div class="row g-4">
        <!-- Map Picker & Form Section -->
        <div class="col-12 col-xl-5">
            <div class="card border-0 shadow-sm bg-white sticky-top" style="top: 80px; z-index: 10;">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0 text-primary-arap" id="formCardTitle">
                        <i class="bi bi-geo-alt me-1"></i> Form Titik Lokasi Geofence
                    </h6>
                </div>
                <div class="card-body p-3 p-md-4">
                    <!-- Interactive Leaflet Map Picker -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold text-muted d-flex justify-content-between">
                            <span><i class="bi bi-hand-index-thumb me-1"></i> Klik peta / geser pin untuk tentukan koordinat:</span>
                            <span class="badge bg-light text-primary border" id="mapCoordsDisplay">-6.9048386, 109.1177696</span>
                        </label>
                        <div id="locationPickerMap" style="height: 240px; width: 100%; border-radius: 6px;" class="border"></div>
                        <small class="text-muted" style="font-size: 0.75rem;">
                            <i class="bi bi-info-circle"></i> Lingkaran biru menggambarkan batas radius presensi yang dapat diterima sistem.
                        </small>
                    </div>

                    <form method="POST" action="{{ route('admin.settings.locations.store') }}" id="locationForm">
                        @csrf
                        <div id="methodContainer"></div>

                        <!-- Nama Lokasi -->
                        <div class="mb-3">
                            <label for="inputName" class="form-label small fw-semibold">Nama Lokasi / Unit <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="inputName" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                   placeholder="Contoh: SPPG Kalisapu Slawi" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="inputAddress" class="form-label small fw-semibold">Alamat Lengkap</label>
                            <textarea name="address" id="inputAddress" rows="2" class="form-control form-control-sm @error('address') is-invalid @enderror"
                                      placeholder="Jl. Raya Kalisapu No. 12, Slawi, Tegal">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Latitude & Longitude -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label for="inputLatitude" class="form-label small fw-semibold">Latitude <span class="text-danger">*</span></label>
                                <input type="number" step="any" name="latitude" id="inputLatitude"
                                       class="form-control form-control-sm @error('latitude') is-invalid @enderror"
                                       value="{{ old('latitude', $activeLocation->latitude ?? -6.9048386) }}" required>
                                @error('latitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="inputLongitude" class="form-label small fw-semibold">Longitude <span class="text-danger">*</span></label>
                                <input type="number" step="any" name="longitude" id="inputLongitude"
                                       class="form-control form-control-sm @error('longitude') is-invalid @enderror"
                                       value="{{ old('longitude', $activeLocation->longitude ?? 109.1177696) }}" required>
                                @error('longitude')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Radius & Toleransi Akurasi GPS -->
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label for="inputRadius" class="form-label small fw-semibold">
                                    Radius Geofence (m) <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-sm">
                                    <input type="number" name="radius_meters" id="inputRadius" min="10" max="5000"
                                           class="form-control @error('radius_meters') is-invalid @enderror"
                                           value="{{ old('radius_meters', $activeLocation->radius_meters ?? 100) }}" required>
                                    <span class="input-group-text">meter</span>
                                </div>
                                <small class="text-muted" style="font-size: 0.7rem;">Min 10m &bull; Max 5.000m</small>
                                @error('radius_meters')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="inputAccuracy" class="form-label small fw-semibold">
                                    Maks Akurasi GPS (m) <span class="text-danger">*</span>
                                </label>
                                <div class="input-group input-group-sm">
                                    <input type="number" name="max_gps_accuracy_meters" id="inputAccuracy" min="10" max="1000"
                                           class="form-control @error('max_gps_accuracy_meters') is-invalid @enderror"
                                           value="{{ old('max_gps_accuracy_meters', $activeLocation->max_gps_accuracy_meters ?? 50) }}" required>
                                    <span class="input-group-text">meter</span>
                                </div>
                                <small class="text-muted" style="font-size: 0.7rem;">Min 10m &bull; Max 1.000m</small>
                                @error('max_gps_accuracy_meters')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Status Aktif -->
                        <div class="form-check form-switch mb-4">
                            <input class="form-check-input" type="checkbox" role="switch" name="is_active" id="inputIsActive" value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label small fw-semibold" for="inputIsActive">
                                Jadikan Titik Sentral Aktif Utama
                            </label>
                            <small class="text-muted d-block" style="font-size: 0.75rem;">
                                Mengaktifkan titik ini akan otomatis menjadikannya titik validasi presensi GPS aktif.
                            </small>
                        </div>

                        <!-- Submit & Cancel Actions -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-sm btn-primary-arap flex-grow-1" id="btnSubmitLocation">
                                <i class="bi bi-save me-1"></i> Simpan Lokasi
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary d-none" id="btnCancelEdit">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Locations List Table Section -->
        <div class="col-12 col-xl-7">
            <div class="card border-0 shadow-sm bg-white">
                <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
                    <h6 class="fw-bold mb-0 text-primary-arap">
                        <i class="bi bi-buildings me-2"></i>Daftar Master Titik Lokasi ({{ count($locations) }})
                    </h6>
                    <span class="badge bg-success-subtle text-success">
                        <i class="bi bi-check-circle me-1"></i> Minimal 1 Lokasi Aktif Terproteksi
                    </span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                        <thead class="table-light">
                            <tr>
                                <th>Lokasi / Unit</th>
                                <th>Koordinat GPS</th>
                                <th>Radius & Akurasi</th>
                                <th class="text-center">Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($locations as $loc)
                                <tr class="{{ $loc->is_active ? 'table-primary-subtle' : '' }}">
                                    <td>
                                        <div class="fw-bold text-dark d-flex align-items-center gap-1">
                                            @if($loc->is_active)
                                                <i class="bi bi-check-circle-fill text-success" title="Titik Sentral Aktif"></i>
                                            @endif
                                            {{ $loc->name }}
                                        </div>
                                        <small class="text-muted d-block text-truncate" style="max-width: 200px;">
                                            {{ $loc->address ?? '-' }}
                                        </small>
                                    </td>
                                    <td>
                                        <div class="small fw-semibold text-secondary">
                                            {{ number_format((float)$loc->latitude, 6) }}, {{ number_format((float)$loc->longitude, 6) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div><i class="bi bi-bullseye text-primary me-1"></i> {{ $loc->radius_meters }} meter</div>
                                        <small class="text-muted"><i class="bi bi-broadcast me-1"></i> &plusmn;{{ $loc->max_gps_accuracy_meters }}m</small>
                                    </td>
                                    <td class="text-center">
                                        @if($loc->is_active)
                                            <span class="badge bg-success">Aktif Utama</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <!-- Edit button loads into form -->
                                            <button type="button" class="btn btn-outline-primary btn-edit-location"
                                                    data-id="{{ $loc->id }}"
                                                    data-name="{{ $loc->name }}"
                                                    data-address="{{ $loc->address }}"
                                                    data-lat="{{ (float) $loc->latitude }}"
                                                    data-lng="{{ (float) $loc->longitude }}"
                                                    data-radius="{{ $loc->radius_meters }}"
                                                    data-accuracy="{{ $loc->max_gps_accuracy_meters }}"
                                                    data-active="{{ $loc->is_active ? '1' : '0' }}"
                                                    title="Edit Lokasi">
                                                <i class="bi bi-pencil"></i>
                                            </button>

                                            <!-- Toggle Active Status Form -->
                                            <form method="POST" action="{{ route('admin.settings.locations.toggle', $loc) }}" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                @if($loc->is_active)
                                                    <button type="submit" class="btn btn-outline-warning" title="Nonaktifkan Lokasi"
                                                            onclick="return confirm('Apakah Anda yakin ingin menonaktifkan lokasi sentral ini? Pastikan ada lokasi aktif lain.')">
                                                        <i class="bi bi-toggle-on text-success fs-6"></i>
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn btn-outline-secondary" title="Aktifkan sebagai Titik Utama"
                                                            onclick="return confirm('Jadikan lokasi \'{{ $loc->name }}\' sebagai titik sentral utama geofence?')">
                                                        <i class="bi bi-toggle-off fs-6"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Belum ada titik lokasi geofence yang tercatat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputLat = document.getElementById('inputLatitude');
        const inputLng = document.getElementById('inputLongitude');
        const inputRadius = document.getElementById('inputRadius');
        const coordsDisplay = document.getElementById('mapCoordsDisplay');
        const locationForm = document.getElementById('locationForm');
        const methodContainer = document.getElementById('methodContainer');
        const formCardTitle = document.getElementById('formCardTitle');
        const btnSubmitLocation = document.getElementById('btnSubmitLocation');
        const btnCancelEdit = document.getElementById('btnCancelEdit');

        let currentLat = parseFloat(inputLat.value) || -6.9048386;
        let currentLng = parseFloat(inputLng.value) || 109.1177696;
        let currentRadius = parseInt(inputRadius.value) || 100;

        // Inisialisasi Map Picker
        const map = L.map('locationPickerMap').setView([currentLat, currentLng], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Custom draggable picker marker
        const pickerIcon = L.divIcon({
            html: '<div style="background-color: #ef4444; color: white; width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 8px rgba(0,0,0,0.4); border: 2px solid white;"><i class="bi bi-geo-alt-fill fs-6"></i></div>',
            className: '',
            iconSize: [32, 32],
            iconAnchor: [16, 32]
        });

        const pickerMarker = L.marker([currentLat, currentLng], {
            draggable: true,
            icon: pickerIcon
        }).addTo(map);

        const radiusCircle = L.circle([currentLat, currentLng], {
            radius: currentRadius,
            color: '#2563eb',
            fillColor: '#3b82f6',
            fillOpacity: 0.2,
            weight: 2,
            dashArray: '5, 5'
        }).addTo(map);

        function updateCoords(lat, lng) {
            currentLat = lat;
            currentLng = lng;
            inputLat.value = lat.toFixed(7);
            inputLng.value = lng.toFixed(7);
            coordsDisplay.textContent = `${lat.toFixed(6)}, ${lng.toFixed(6)}`;

            pickerMarker.setLatLng([lat, lng]);
            radiusCircle.setLatLng([lat, lng]);
        }

        function updateRadius(radius) {
            currentRadius = radius;
            radiusCircle.setRadius(radius);
        }

        // Marker drag handler
        pickerMarker.on('dragend', function(e) {
            const pos = e.target.getLatLng();
            updateCoords(pos.lat, pos.lng);
        });

        // Map click handler
        map.on('click', function(e) {
            updateCoords(e.latlng.lat, e.latlng.lng);
        });

        // Input manual event listeners
        inputLat.addEventListener('input', () => {
            const lat = parseFloat(inputLat.value);
            if (!isNaN(lat)) updateCoords(lat, currentLng);
        });

        inputLng.addEventListener('input', () => {
            const lng = parseFloat(inputLng.value);
            if (!isNaN(lng)) updateCoords(currentLat, lng);
        });

        inputRadius.addEventListener('input', () => {
            const r = parseInt(inputRadius.value);
            if (!isNaN(r) && r >= 10 && r <= 5000) {
                updateRadius(r);
            }
        });

        // Edit location button handling
        document.querySelectorAll('.btn-edit-location').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const address = this.getAttribute('data-address');
                const lat = parseFloat(this.getAttribute('data-lat'));
                const lng = parseFloat(this.getAttribute('data-lng'));
                const radius = parseInt(this.getAttribute('data-radius'));
                const accuracy = parseInt(this.getAttribute('data-accuracy'));
                const active = this.getAttribute('data-active') === '1';

                // Setup edit form
                locationForm.action = `/admin/settings/locations/${id}`;
                methodContainer.innerHTML = '<input type="hidden" name="_method" value="PUT">';
                formCardTitle.innerHTML = `<i class="bi bi-pencil-square me-1"></i> Edit Lokasi: ${name}`;
                btnSubmitLocation.innerHTML = '<i class="bi bi-check-lg me-1"></i> Perbarui Lokasi';
                btnCancelEdit.classList.remove('d-none');

                document.getElementById('inputName').value = name;
                document.getElementById('inputAddress').value = address || '';
                document.getElementById('inputAccuracy').value = accuracy;
                document.getElementById('inputIsActive').checked = active;

                updateCoords(lat, lng);
                updateRadius(radius);
                map.setView([lat, lng], 17);

                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });

        // Cancel edit action
        function resetForm() {
            locationForm.action = "{{ route('admin.settings.locations.store') }}";
            methodContainer.innerHTML = '';
            formCardTitle.innerHTML = '<i class="bi bi-geo-alt me-1"></i> Form Titik Lokasi Geofence';
            btnSubmitLocation.innerHTML = '<i class="bi bi-save me-1"></i> Simpan Lokasi';
            btnCancelEdit.classList.add('d-none');

            document.getElementById('inputName').value = '';
            document.getElementById('inputAddress').value = '';
            document.getElementById('inputAccuracy').value = '50';
            document.getElementById('inputIsActive').checked = true;

            const resetLat = -6.9048386;
            const resetLng = 109.1177696;
            const resetRadius = 100;
            updateCoords(resetLat, resetLng);
            updateRadius(resetRadius);
            map.setView([resetLat, resetLng], 17);
        }

        btnCancelEdit.addEventListener('click', resetForm);
        document.getElementById('btnAddNewLocation').addEventListener('click', () => {
            resetForm();
            window.scrollTo({ top: 0, behavior: 'smooth' });
            document.getElementById('inputName').focus();
        });
    });
</script>
@endpush
