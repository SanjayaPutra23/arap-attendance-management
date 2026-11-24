@extends('layouts.app')

@section('title', 'Kelola Mesin Fingerprint & Tarik Data')
@section('page_title', 'Kelola Mesin Fingerprint & Tarik Data ZKTeco')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-hdd-network-fill me-2"></i>Kelola Mesin Fingerprint & Tarik Data ZKTeco
            </h4>
            <p class="text-muted small mb-0">
                Manajemen perangkat absensi fisik SPPG Kalisapu, uji koneksi UDP port 4370, sinkronisasi presensi ke <code>pools</code>, dan impor log USB.
            </p>
        </div>
        <div class="d-flex align-items-center gap-2">
            <!-- Tombol Sinkronkan Semua Mesin IP -->
            <button type="button" class="btn btn-sm btn-outline-success fw-semibold" id="btnSyncAll">
                <i class="bi bi-arrow-repeat me-1"></i> Sinkronkan Semua Mesin IP
            </button>
            <!-- Tombol Tambah Mesin Baru -->
            <button type="button" class="btn btn-sm btn-primary-arap fw-semibold" data-bs-toggle="modal" data-bs-target="#modalTambahMesin">
                <i class="bi bi-plus-lg me-1"></i> Tambah Mesin
            </button>
        </div>
    </div>

    <!-- Alert / Toast Notifikasi AJAX Real-Time -->
    <div id="ajaxAlertContainer"></div>

    <!-- Summary KPI Cards Grid -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-primary border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Total Mesin Terdaftar</span>
                    <div class="h3 fw-bold text-dark my-1">{{ $stats['total'] }}</div>
                    <small class="text-muted"><i class="bi bi-hdd me-1"></i> Unit Mesin Fisik</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-success border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Mesin Tipe IP (Network)</span>
                    <div class="h3 fw-bold text-success my-1">{{ $stats['ip_count'] }}</div>
                    <small class="text-success"><i class="bi bi-wifi me-1"></i> UDP Port 4370 Live</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-secondary border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Mesin Tipe USB (Offline)</span>
                    <div class="h3 fw-bold text-secondary my-1">{{ $stats['usb_count'] }}</div>
                    <small class="text-muted"><i class="bi bi-usb-drive me-1"></i> Impor Berkas .dat</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-info border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Total Log di Database</span>
                    <div class="h3 fw-bold text-info my-1">{{ number_format($stats['total_pools'], 0, ',', '.') }}</div>
                    <small class="text-muted"><i class="bi bi-database me-1"></i> Arsip tabel <code>pools</code></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Mesin Fingerprint -->
    <div class="card border-0 shadow-sm bg-white mb-4">
        <div class="card-header bg-white py-3 border-bottom d-flex align-items-center justify-content-between">
            <h6 class="fw-bold mb-0 text-primary-arap">
                <i class="bi bi-list-columns me-2"></i>Daftar Perangkat Mesin Absensi
            </h6>
            <a href="{{ route('admin.arsip-fingerprint.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-archive me-1"></i> Buka Arsip Fingerprint
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="small text-muted text-uppercase" style="font-size: 0.75rem;">
                            <th class="ps-3" style="width: 50px;">No</th>
                            <th>Nama Perangkat</th>
                            <th>Tipe Koneksi</th>
                            <th>Alamat IP &amp; Port</th>
                            <th>Grup</th>
                            <th>Total Log</th>
                            <th>Sinkronisasi Terakhir</th>
                            <th class="text-center">Status Koneksi</th>
                            <th class="text-end pe-3" style="min-width: 220px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($machines as $index => $m)
                            <tr id="row-mesin-{{ $m->id }}">
                                <td class="ps-3 text-muted fw-semibold">{{ $index + 1 }}</td>
                                <td>
                                    <div class="fw-bold text-dark d-flex align-items-center gap-2">
                                        <i class="bi bi-hdd-network {{ $m->tipe === 'ip' ? 'text-primary' : 'text-secondary' }} fs-5"></i>
                                        <span>{{ $m->name }}</span>
                                    </div>
                                    <small class="text-muted">ID Mesin: #{{ $m->id }}</small>
                                </td>
                                <td>
                                    @if($m->tipe === 'ip')
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">
                                            <i class="bi bi-router me-1"></i> IP Network
                                        </span>
                                    @else
                                        <span class="badge bg-secondary-subtle text-secondary border px-2 py-1">
                                            <i class="bi bi-usb-drive me-1"></i> USB Offline
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($m->tipe === 'ip')
                                        <code class="text-primary fw-semibold">{{ $m->ip }}:{{ $m->port ?? '4370' }}</code>
                                    @else
                                        <span class="text-muted small">&ndash; (Manual Import)</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark border">
                                        Grup {{ $m->grup ?? 6 }} (SPPG)
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.arsip-fingerprint.index') }}" class="fw-bold text-decoration-none">
                                        {{ number_format($m->pools_count, 0, ',', '.') }} log
                                    </a>
                                </td>
                                <td>
                                    @if($m->last_sync)
                                        <div class="small fw-semibold text-dark">
                                            {{ \Carbon\Carbon::parse($m->last_sync)->translatedFormat('d M Y') }}
                                        </div>
                                        <small class="text-muted">{{ \Carbon\Carbon::parse($m->last_sync)->format('H:i:s') }} WIB</small>
                                    @else
                                        <span class="text-muted small">Belum pernah</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div id="status-badge-{{ $m->id }}">
                                        @if($m->tipe === 'ip')
                                            <span class="badge bg-light text-muted border">Siap Diuji</span>
                                        @else
                                            <span class="badge bg-light text-muted border">Offline .dat</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-end pe-3">
                                    <div class="btn-group btn-group-sm" role="group">
                                        @if($m->tipe === 'ip')
                                            <!-- Check Koneksi Button -->
                                            <button type="button" class="btn btn-outline-info btn-check-koneksi"
                                                    data-id="{{ $m->id }}"
                                                    data-name="{{ $m->name }}"
                                                    data-url="{{ route('admin.mesin.check-connection', $m) }}"
                                                    title="Check Koneksi UDP">
                                                <i class="bi bi-activity me-1"></i> Cek
                                            </button>

                                            <!-- Sinkronkan Data Button -->
                                            <button type="button" class="btn btn-outline-success btn-sync-mesin"
                                                    data-id="{{ $m->id }}"
                                                    data-name="{{ $m->name }}"
                                                    data-url="{{ route('admin.mesin.sync', $m) }}"
                                                    title="Tarik &amp; Sinkronkan Data Presensi">
                                                <i class="bi bi-arrow-repeat me-1"></i> Tarik
                                            </button>
                                        @else
                                            <!-- Upload USB .dat Button -->
                                            <button type="button" class="btn btn-outline-secondary btn-upload-dat"
                                                    data-id="{{ $m->id }}"
                                                    data-name="{{ $m->name }}"
                                                    data-url="{{ route('admin.mesin.upload-usb', $m) }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalUploadUsb">
                                                <i class="bi bi-upload me-1"></i> Upload .dat
                                            </button>
                                        @endif

                                        <!-- Edit Mesin Button -->
                                        <button type="button" class="btn btn-outline-primary btn-edit-mesin"
                                                data-id="{{ $m->id }}"
                                                data-name="{{ $m->name }}"
                                                data-tipe="{{ $m->tipe }}"
                                                data-ip="{{ $m->ip }}"
                                                data-port="{{ $m->port }}"
                                                data-grup="{{ $m->grup }}"
                                                data-update-url="{{ route('admin.mesin.update', $m) }}"
                                                title="Edit Konfigurasi Mesin">
                                            <i class="bi bi-pencil"></i>
                                        </button>

                                        <!-- Hapus Mesin Button -->
                                        @if($m->pools_count > 0)
                                            <button type="button" class="btn btn-outline-danger" disabled
                                                    title="Mesin ini memiliki riwayat {{ $m->pools_count }} log presensi dan tidak dapat dihapus untuk menjaga integritas data.">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-outline-danger btn-hapus-mesin"
                                                    data-id="{{ $m->id }}"
                                                    data-name="{{ $m->name }}"
                                                    data-delete-url="{{ route('admin.mesin.destroy', $m) }}"
                                                    title="Hapus Mesin">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-5">
                                    <i class="bi bi-hdd-network fs-2 d-block mb-2 text-secondary"></i>
                                    Belum ada perangkat mesin fingerprint yang terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Mesin -->
<div class="modal fade" id="modalTambahMesin" tabindex="-1" aria-labelledby="modalTambahMesinLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.mesin.store') }}" class="modal-content border-0 shadow">
            @csrf
            <div class="modal-header bg-primary-arap text-white">
                <h6 class="modal-title fw-bold" id="modalTambahMesinLabel">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Mesin Fingerprint Baru
                </h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Nama Mesin / Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Contoh: FPDAPUR1 / Finger Dapur Utama" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Tipe Koneksi Mesin <span class="text-danger">*</span></label>
                    <select name="tipe" id="tambahTipeMesin" class="form-select" required>
                        <option value="ip" selected>IP Network (Kabel LAN / Wi-Fi via UDP)</option>
                        <option value="usb">USB Flashdisk (Impor Manual Berkas .dat)</option>
                    </select>
                </div>

                <div id="sectionIpPortTambah">
                    <div class="row g-2 mb-3">
                        <div class="col-8">
                            <label class="form-label small fw-semibold">Alamat IP Mesin <span class="text-danger">*</span></label>
                            <input type="text" name="ip" id="tambahIpInput" class="form-control font-monospace" placeholder="192.168.1.8">
                            <small class="text-muted" style="font-size: 0.7rem;">Alamat IPv4 mesin di jaringan lokal SPPG.</small>
                        </div>
                        <div class="col-4">
                            <label class="form-label small fw-semibold">Port UDP <span class="text-danger">*</span></label>
                            <input type="number" name="port" id="tambahPortInput" class="form-control font-monospace" value="4370" min="1" max="65535">
                            <small class="text-muted" style="font-size: 0.7rem;">Default: 4370</small>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label small fw-semibold">Grup Mesin</label>
                    <input type="number" name="grup" class="form-control" value="6">
                    <small class="text-muted" style="font-size: 0.7rem;">Grup 6: SPPG / Tata Usaha Kalisapu.</small>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-sm btn-primary-arap">
                    <i class="bi bi-save me-1"></i> Simpan Mesin
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Mesin -->
<div class="modal fade" id="modalEditMesin" tabindex="-1" aria-labelledby="modalEditMesinLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="formEditMesin" class="modal-content border-0 shadow">
            @csrf
            @method('PUT')
            <div class="modal-header bg-light border-bottom">
                <h6 class="modal-title fw-bold text-dark" id="modalEditMesinLabel">
                    <i class="bi bi-pencil-square me-1 text-primary"></i> Edit Konfigurasi Mesin Fingerprint
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="mb-3">
                    <label class="form-label small fw-semibold">Nama Mesin / Lokasi <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="editNamaMesin" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Tipe Koneksi Mesin <span class="text-danger">*</span></label>
                    <select name="tipe" id="editTipeMesin" class="form-select" required>
                        <option value="ip">IP Network (Kabel LAN / Wi-Fi via UDP)</option>
                        <option value="usb">USB Flashdisk (Impor Manual Berkas .dat)</option>
                    </select>
                </div>

                <div id="sectionIpPortEdit">
                    <div class="row g-2 mb-3">
                        <div class="col-8">
                            <label class="form-label small fw-semibold">Alamat IP Mesin <span class="text-danger">*</span></label>
                            <input type="text" name="ip" id="editIpMesin" class="form-control font-monospace">
                            <small class="text-muted" style="font-size: 0.7rem;">Alamat IPv4 mesin di jaringan SPPG.</small>
                        </div>
                        <div class="col-4">
                            <label class="form-label small fw-semibold">Port UDP <span class="text-danger">*</span></label>
                            <input type="number" name="port" id="editPortMesin" class="form-control font-monospace" min="1" max="65535">
                            <small class="text-muted" style="font-size: 0.7rem;">Default: 4370</small>
                        </div>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="form-label small fw-semibold">Grup Mesin</label>
                    <input type="number" name="grup" id="editGrupMesin" class="form-control" value="6">
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-save me-1"></i> Perbarui Mesin
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Upload USB .dat -->
<div class="modal fade" id="modalUploadUsb" tabindex="-1" aria-labelledby="modalUploadUsbLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="formUploadUsb" enctype="multipart/form-data" class="modal-content border-0 shadow">
            @csrf
            <div class="modal-header bg-secondary text-white">
                <h6 class="modal-title fw-bold" id="modalUploadUsbLabel">
                    <i class="bi bi-usb-drive-fill me-1"></i> Unggah Berkas Log USB (.dat)
                </h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="alert alert-info py-2 px-3 small border-0 mb-3">
                    <i class="bi bi-info-circle me-1"></i> Berkas <code>.dat</code> dihasilkan saat Anda mencolokkan flashdisk ke mesin ZKTeco dan memilih menu <strong>Download Attlog</strong>.
                </div>

                <p class="small text-muted mb-3">
                    Target Perangkat: <strong id="uploadTargetName" class="text-dark">-</strong>
                </p>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Pilih Berkas (.dat / .txt) <span class="text-danger">*</span></label>
                    <input type="file" name="filedata" class="form-control" accept=".dat,.txt" required>
                    <small class="text-muted" style="font-size: 0.7rem;">Maksimal ukuran berkas 10 MB.</small>
                </div>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-sm btn-primary">
                    <i class="bi bi-upload me-1"></i> Impor Log ke Database
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Konfirmasi Hapus Mesin -->
<div class="modal fade" id="modalHapusMesin" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <form method="POST" id="formHapusMesin" class="modal-content border-0 shadow">
            @csrf
            @method('DELETE')
            <div class="modal-body p-4 text-center">
                <i class="bi bi-exclamation-triangle-fill text-danger fs-1 mb-2 d-block"></i>
                <h6 class="fw-bold text-dark mb-1">Hapus Mesin?</h6>
                <p class="small text-muted mb-3" id="hapusMesinText">
                    Perangkat mesin ini akan dihapus dari sistem.
                </p>
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // Helper Tampilkan Alert Realtime
    function showAlert(type, message) {
        const container = document.getElementById('ajaxAlertContainer');
        if (!container) return;

        const alertEl = document.createElement('div');
        alertEl.className = `alert alert-${type} alert-dismissible fade show shadow-sm mb-3`;
        alertEl.role = 'alert';
        alertEl.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="bi ${type === 'success' ? 'bi-check-circle-fill' : (type === 'warning' ? 'bi-exclamation-triangle-fill' : 'bi-x-circle-fill')} me-2 fs-5"></i>
                <div>${message}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        container.prepend(alertEl);

        setTimeout(() => {
            alertEl.classList.remove('show');
            setTimeout(() => alertEl.remove(), 200);
        }, 8000);
    }

    // Toggle Input IP/Port Tambah Mesin
    const tambahTipe = document.getElementById('tambahTipeMesin');
    const sectionIpTambah = document.getElementById('sectionIpPortTambah');
    if (tambahTipe && sectionIpTambah) {
        tambahTipe.addEventListener('change', function() {
            sectionIpTambah.style.display = this.value === 'ip' ? 'block' : 'none';
        });
    }

    // Toggle Input IP/Port Edit Mesin
    const editTipe = document.getElementById('editTipeMesin');
    const sectionIpEdit = document.getElementById('sectionIpPortEdit');
    if (editTipe && sectionIpEdit) {
        editTipe.addEventListener('change', function() {
            sectionIpEdit.style.display = this.value === 'ip' ? 'block' : 'none';
        });
    }

    // Setup Edit Modal
    document.querySelectorAll('.btn-edit-mesin').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = document.getElementById('formEditMesin');
            form.action = this.getAttribute('data-update-url');

            document.getElementById('editNamaMesin').value = this.getAttribute('data-name');
            const tipe = this.getAttribute('data-tipe');
            document.getElementById('editTipeMesin').value = tipe;
            document.getElementById('editIpMesin').value = this.getAttribute('data-ip') || '';
            document.getElementById('editPortMesin').value = this.getAttribute('data-port') || '4370';
            document.getElementById('editGrupMesin').value = this.getAttribute('data-grup') || '6';

            if (sectionIpEdit) {
                sectionIpEdit.style.display = tipe === 'ip' ? 'block' : 'none';
            }

            const modal = new bootstrap.Modal(document.getElementById('modalEditMesin'));
            modal.show();
        });
    });

    // Setup Upload Modal
    document.querySelectorAll('.btn-upload-dat').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = document.getElementById('formUploadUsb');
            form.action = this.getAttribute('data-url');
            document.getElementById('uploadTargetName').textContent = this.getAttribute('data-name');
        });
    });

    // Setup Hapus Modal
    document.querySelectorAll('.btn-hapus-mesin').forEach(btn => {
        btn.addEventListener('click', function() {
            const form = document.getElementById('formHapusMesin');
            form.action = this.getAttribute('data-delete-url');
            document.getElementById('hapusMesinText').textContent = `Yakin ingin menghapus mesin "${this.getAttribute('data-name')}"?`;

            const modal = new bootstrap.Modal(document.getElementById('modalHapusMesin'));
            modal.show();
        });
    });

    // AJAX Check Koneksi Real-time
    document.querySelectorAll('.btn-check-koneksi').forEach(btn => {
        btn.addEventListener('click', async function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const url = this.getAttribute('data-url');
            const badgeContainer = document.getElementById(`status-badge-${id}`);

            const origHtml = this.innerHTML;
            this.disabled = true;
            this.innerHTML = `<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Menguji...`;

            if (badgeContainer) {
                badgeContainer.innerHTML = `<span class="badge bg-warning-subtle text-warning border"><span class="spinner-border spinner-border-sm" style="width: 0.75rem; height: 0.75rem;"></span> Ping...</span>`;
            }

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    }
                });

                const data = await response.json();
                if (data.connected) {
                    if (badgeContainer) {
                        badgeContainer.innerHTML = `<span class="badge bg-success-subtle text-success border"><i class="bi bi-check-circle me-1"></i> Terhubung (${data.latency_ms} ms)</span>`;
                    }
                    showAlert('success', `<strong>${name}</strong>: ${data.message} (${data.latency_ms} ms)`);
                } else {
                    if (badgeContainer) {
                        badgeContainer.innerHTML = `<span class="badge bg-danger-subtle text-danger border"><i class="bi bi-x-circle me-1"></i> Gagal</span>`;
                    }
                    showAlert('danger', `<strong>${name}</strong>: ${data.message}`);
                }
            } catch (err) {
                if (badgeContainer) {
                    badgeContainer.innerHTML = `<span class="badge bg-danger text-white">Error</span>`;
                }
                showAlert('danger', `Gagal berkomunikasi dengan server saat memeriksa koneksi ${name}.`);
            } finally {
                this.disabled = false;
                this.innerHTML = origHtml;
            }
        });
    });

    // AJAX Tarik / Sinkronkan Data Mesin
    document.querySelectorAll('.btn-sync-mesin').forEach(btn => {
        btn.addEventListener('click', async function() {
            const id = this.getAttribute('data-id');
            const name = this.getAttribute('data-name');
            const url = this.getAttribute('data-url');

            if (!confirm(`Tarik data presensi dari mesin "${name}" sekarang?`)) {
                return;
            }

            const origHtml = this.innerHTML;
            this.disabled = true;
            this.innerHTML = `<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Menarik...`;

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    }
                });

                const data = await response.json();
                if (data.success) {
                    showAlert('success', `<strong>${name}</strong>: ${data.message}`);
                    setTimeout(() => window.location.reload(), 1500);
                } else {
                    showAlert('danger', `<strong>${name}</strong>: ${data.message}`);
                }
            } catch (err) {
                showAlert('danger', `Terjadi error saat sinkronisasi mesin ${name}.`);
            } finally {
                this.disabled = false;
                this.innerHTML = origHtml;
            }
        });
    });

    // AJAX Sinkronkan Semua Mesin IP
    const btnSyncAll = document.getElementById('btnSyncAll');
    if (btnSyncAll) {
        btnSyncAll.addEventListener('click', async function() {
            if (!confirm('Tarik dan sinkronkan data dari seluruh mesin absensi bertipe IP sekarang?')) {
                return;
            }

            const origHtml = this.innerHTML;
            this.disabled = true;
            this.innerHTML = `<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Menyinkronkan Semua...`;

            try {
                const response = await fetch("{{ route('admin.mesin.sync-all') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    }
                });

                const data = await response.json();
                showAlert(data.fail_count === 0 ? 'success' : 'warning', data.message);
                setTimeout(() => window.location.reload(), 2000);
            } catch (err) {
                showAlert('danger', 'Terjadi error saat sinkronisasi seluruh mesin.');
            } finally {
                this.disabled = false;
                this.innerHTML = origHtml;
            }
        });
    }
});
</script>
@endpush
