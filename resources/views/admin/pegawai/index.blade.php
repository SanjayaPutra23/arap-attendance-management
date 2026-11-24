@extends('layouts.app')

@section('title', 'Manajemen Pegawai & Officer')
@section('page_title', 'Master Pegawai, Relawan & Officer')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Page Info -->
    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1 text-primary-arap">
                <i class="bi bi-people-fill me-2"></i>Manajemen Pegawai, Relawan & Officer SPPG
            </h4>
            <p class="text-muted small mb-0">
                Kelola data profil relawan, staf dapur, penugasan Officer, dan pembuatan/penautan akun login sistem.
            </p>
        </div>
        <div>
            <button type="button" class="btn btn-sm btn-primary-arap fw-semibold" id="btnOpenCreateModal" data-bs-toggle="modal" data-bs-target="#pegawaiModal">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Pegawai / Officer
            </button>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Total Pegawai</span>
                    <div class="h3 fw-bold text-dark my-1">{{ $stats['total'] }}</div>
                    <small class="text-secondary"><i class="bi bi-people me-1"></i> Terdaftar</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-primary border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Staf Officer</span>
                    <div class="h3 fw-bold text-primary my-1">{{ $stats['officers'] }}</div>
                    <small class="text-primary"><i class="bi bi-shield-check me-1"></i> Pengawas</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-success border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Relawan Operasional</span>
                    <div class="h3 fw-bold text-success my-1">{{ $stats['relawan'] }}</div>
                    <small class="text-success"><i class="bi bi-egg-fried me-1"></i> Operasional</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-info border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Memiliki Akun Login</span>
                    <div class="h3 fw-bold text-info my-1">{{ $stats['has_account'] }}</div>
                    <small class="text-muted">Dapat presensi mobile PWA</small>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-xl-3">
            <div class="card border-0 shadow-sm bg-white h-100 border-start border-warning border-4">
                <div class="card-body p-3">
                    <span class="text-muted small fw-semibold">Belum Memiliki Akun</span>
                    <div class="h3 fw-bold text-warning my-1">{{ $stats['no_account'] }}</div>
                    <small class="text-muted">Perlu dibuatkan akun login</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Panel -->
    <div class="card border-0 shadow-sm bg-white mb-4">
        <div class="card-body p-3 p-md-4">
            <form method="GET" action="{{ route('admin.pegawai.index') }}" id="filterPegawaiForm">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-6 col-xl-4">
                        <label class="form-label small fw-semibold text-muted mb-1">Pencarian Nama, NIK, atau UID</label>
                        <div class="input-group input-group-sm">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama, NIK, atau UID..." value="{{ $search }}">
                            <button type="submit" class="btn btn-primary-arap">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-3">
                        <label class="form-label small fw-semibold text-muted mb-1">Status Akun Login</label>
                        <select name="account_status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="all" {{ ($accountStatus === 'all' || !$accountStatus) ? 'selected' : '' }}>Semua Status Akun</option>
                            <option value="with_account" {{ $accountStatus === 'with_account' ? 'selected' : '' }}>Sudah Punya Akun</option>
                            <option value="without_account" {{ $accountStatus === 'without_account' ? 'selected' : '' }}>Belum Ada Akun</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-xl-2">
                        <a href="{{ route('admin.pegawai.index') }}" class="btn btn-sm btn-outline-secondary w-100">
                            <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                        </a>
                    </div>
                </div>

                <!-- Division / Officer Filter Buttons -->
                <div class="mt-3 pt-3 border-top">
                    <label class="form-label small fw-semibold text-muted mb-2 d-block">
                        <i class="bi bi-funnel me-1"></i> Filter Divisi / Jabatan:
                    </label>
                    <div class="d-flex flex-wrap gap-1">
                        <input type="hidden" name="divisi" id="inputFilterDivisi" value="{{ $divisi ?? 'all' }}">

                        <button type="button" class="btn btn-sm {{ (!$divisi || $divisi === 'all') ? 'btn-primary-arap' : 'btn-outline-secondary' }} btn-pegawai-divisi" data-divisi="all">
                            Semua ({{ $stats['total'] }})
                        </button>

                        @foreach($divisions as $div)
                            @php
                                $isOfficer = strtolower($div) === 'officer';
                                $isActive = strtolower((string)$divisi) === strtolower($div);
                            @endphp
                            <button type="button"
                                    class="btn btn-sm {{ $isActive ? ($isOfficer ? 'btn-primary' : 'btn-primary-arap') : ($isOfficer ? 'btn-outline-primary fw-bold' : 'btn-outline-secondary') }} btn-pegawai-divisi"
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

    <!-- Pegawai Table Card -->
    <div class="card border-0 shadow-sm bg-white">
        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center justify-content-between">
            <h6 class="fw-bold mb-0 text-primary-arap">
                <i class="bi bi-person-lines-fill me-2"></i>Daftar Master Pegawai ({{ $pegawaiList->total() }})
            </h6>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                <thead class="table-light">
                    <tr>
                        <th>Nama Pegawai / Relawan</th>
                        <th>NIK & UID Mesin</th>
                        <th>Divisi / Jabatan</th>
                        <th>Tipe</th>
                        <th>Akun Login</th>
                        <th class="text-center">Riwayat Data</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pegawaiList as $p)
                        <tr>
                            <td>
                                <div class="fw-bold text-dark">{{ $p->name }}</div>
                                @if($p->telp)
                                    <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $p->telp }}</small>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold">NIK: {{ $p->nik ?? '-' }}</div>
                                <small class="text-muted">UID Mesin: {{ $p->uid ?? '-' }}</small>
                            </td>
                            <td>
                                @if(strtolower((string)$p->jabatan) === 'officer')
                                    <span class="badge bg-primary px-2 py-1">
                                        <i class="bi bi-star-fill text-warning me-1"></i> Officer SPPG
                                    </span>
                                @else
                                    <span class="badge bg-light text-secondary border px-2 py-1">
                                        {{ $p->jabatan }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ strtolower($p->type ?? '') === 'pegawai' ? 'bg-info-subtle text-info' : 'bg-secondary-subtle text-secondary' }}">
                                    {{ ucfirst($p->type ?? 'relawan') }}
                                </span>
                            </td>
                            <td>
                                @if($p->user)
                                    <div>
                                        <i class="bi bi-person-check-fill text-success me-1"></i>
                                        <span class="fw-semibold">{{ $p->user->email }}</span>
                                    </div>
                                    <div class="d-flex gap-1 mt-1">
                                        @foreach($p->user->roles as $role)
                                            <span class="badge bg-light text-dark border" style="font-size: 0.68rem;">{{ $role->name }}</span>
                                        @endforeach
                                    </div>
                                @else
                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle">
                                        <i class="bi bi-exclamation-triangle me-1"></i> Belum Ada Akun
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light text-muted border me-1" title="Presensi Mobile">
                                    <i class="bi bi-camera"></i> {{ $p->mobile_attendances_count }}
                                </span>
                                <span class="badge bg-light text-muted border me-1" title="Log Mesin Pools">
                                    <i class="bi bi-fingerprint"></i> {{ $p->pools_count }}
                                </span>
                                <span class="badge bg-light text-muted border" title="Permohonan Izin">
                                    <i class="bi bi-file-medical"></i> {{ $p->permohonan_izins_count }}
                                </span>
                            </td>
                            <td class="text-end">
                                <div class="btn-group btn-group-sm">
                                    <button type="button" class="btn btn-outline-primary btn-edit-pegawai"
                                            data-id="{{ $p->id }}"
                                            data-name="{{ $p->name }}"
                                            data-nik="{{ $p->nik }}"
                                            data-uid="{{ $p->uid }}"
                                            data-jabatan="{{ $p->jabatan }}"
                                            data-type="{{ $p->type }}"
                                            data-telp="{{ $p->telp }}"
                                            data-has-account="{{ $p->user ? '1' : '0' }}"
                                            data-email="{{ $p->user->email ?? '' }}"
                                            data-role="{{ $p->user?->roles->first()?->name ?? '' }}"
                                            title="Edit Profil & Akun">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <form method="POST" action="{{ route('admin.pegawai.destroy', $p) }}" class="d-inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus pegawai \'{{ $p->name }}\'?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" title="Hapus Pegawai">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="bi bi-people fs-3 d-block mb-2"></i>
                                Tidak ada data pegawai yang sesuai dengan filter pencarian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pegawaiList->hasPages())
            <div class="card-footer bg-white border-top py-3">
                {{ $pegawaiList->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Modal Tambah / Edit Pegawai & Akun Login -->
<div class="modal fade" id="pegawaiModal" tabindex="-1" aria-labelledby="pegawaiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 shadow">
            <div class="modal-header border-bottom">
                <h5 class="modal-title fw-bold text-primary-arap" id="pegawaiModalLabel">
                    <i class="bi bi-person-plus me-1"></i> Tambah Pegawai / Officer Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="{{ route('admin.pegawai.store') }}" id="formPegawai">
                @csrf
                <div id="methodPegawaiContainer"></div>

                <div class="modal-body p-4">
                    <div class="row g-3">
                        <!-- Data Profil Utama -->
                        <div class="col-12 col-md-6">
                            <label for="inputNamaPegawai" class="form-label small fw-semibold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="inputNamaPegawai" class="form-control form-control-sm" required placeholder="Nama lengkap pegawai">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="inputNikPegawai" class="form-label small fw-semibold">NIK (Nomor Induk Kependudukan) <span class="text-danger">*</span></label>
                            <input type="text" name="nik" id="inputNikPegawai" class="form-control form-control-sm" required placeholder="Contoh: 3328xxxxxxxxxxxx">
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="inputUidPegawai" class="form-label small fw-semibold">UID Mesin Fingerprint (Opsional)</label>
                            <input type="number" name="uid" id="inputUidPegawai" class="form-control form-control-sm" placeholder="Contoh: 1051">
                            <small class="text-muted" style="font-size: 0.7rem;">Nomor ID di mesin FPDAPUR1</small>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="inputJabatanPegawai" class="form-label small fw-semibold">Divisi / Jabatan <span class="text-danger">*</span></label>
                            <select name="jabatan" id="inputJabatanPegawai" class="form-select form-select-sm" required>
                                <option value="">-- Pilih Divisi / Jabatan --</option>
                                <option value="Officer">Officer SPPG</option>
                                @foreach($divisions as $div)
                                    @if(strtolower($div) !== 'officer')
                                        <option value="{{ $div }}">{{ $div }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="inputTypePegawai" class="form-label small fw-semibold">Tipe Pegawai</label>
                            <select name="type" id="inputTypePegawai" class="form-select form-select-sm">
                                <option value="relawan">Relawan</option>
                                <option value="pegawai">Pegawai</option>
                                <option value="staf">Staf</option>
                                <option value="officer">Officer</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="inputTelpPegawai" class="form-label small fw-semibold">No. Telepon / WhatsApp</label>
                            <input type="text" name="telp" id="inputTelpPegawai" class="form-control form-control-sm" placeholder="Contoh: 08123456789">
                        </div>
                    </div>

                    <!-- Kelola Akun Login Pengguna -->
                    <div class="mt-4 pt-3 border-top">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" role="switch" name="create_account" id="toggleAccountSection" value="1">
                            <label class="form-check-label fw-bold text-dark small" for="toggleAccountSection" id="labelToggleAccount">
                                Buat / Tautkan Akun Login Sistem untuk Pegawai Ini
                            </label>
                        </div>

                        <div id="accountFieldsContainer" class="d-none bg-light p-3 rounded border">
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label for="inputEmailAccount" class="form-label small fw-semibold">Alamat Email Login <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="inputEmailAccount" class="form-control form-control-sm" placeholder="pegawai@arap.local">
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="inputRoleAccount" class="form-label small fw-semibold">Peran Akses (Role)</label>
                                    <select name="role" id="inputRoleAccount" class="form-select form-select-sm">
                                        @foreach($roles as $r)
                                            <option value="{{ $r->name }}">{{ $r->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="inputPasswordAccount" class="form-label small fw-semibold" id="labelPasswordAccount">Password Login <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="inputPasswordAccount" class="form-control form-control-sm" placeholder="Minimal 6 karakter">
                                    <small class="text-muted d-block" id="notePasswordAccount" style="font-size: 0.72rem;">Kosongkan jika tidak ingin mengubah password.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-top py-2">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary-arap fw-semibold px-4" id="btnSubmitPegawai">
                        <i class="bi bi-save me-1"></i> Simpan Data Pegawai
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Filter Divisi button handler
        document.querySelectorAll('.btn-pegawai-divisi').forEach(btn => {
            btn.addEventListener('click', function() {
                const divisi = this.getAttribute('data-divisi');
                document.getElementById('inputFilterDivisi').value = divisi;
                document.getElementById('filterPegawaiForm').submit();
            });
        });

        // Toggle Account Container
        const toggleAccount = document.getElementById('toggleAccountSection');
        const accountContainer = document.getElementById('accountFieldsContainer');
        if (toggleAccount && accountContainer) {
            toggleAccount.addEventListener('change', function() {
                if (this.checked) {
                    accountContainer.classList.remove('d-none');
                } else {
                    accountContainer.classList.add('d-none');
                }
            });
        }

        const form = document.getElementById('formPegawai');
        const modalTitle = document.getElementById('pegawaiModalLabel');
        const methodContainer = document.getElementById('methodPegawaiContainer');
        const btnSubmit = document.getElementById('btnSubmitPegawai');
        const labelToggleAccount = document.getElementById('labelToggleAccount');
        const notePassword = document.getElementById('notePasswordAccount');

        // Reset to Create Mode
        document.getElementById('btnOpenCreateModal').addEventListener('click', () => {
            form.action = "{{ route('admin.pegawai.store') }}";
            methodContainer.innerHTML = '';
            modalTitle.innerHTML = '<i class="bi bi-person-plus me-1"></i> Tambah Pegawai / Officer Baru';
            btnSubmit.innerHTML = '<i class="bi bi-save me-1"></i> Simpan Data Pegawai';
            labelToggleAccount.textContent = 'Buat Akun Login Sistem untuk Pegawai Ini';
            toggleAccount.name = 'create_account';
            toggleAccount.checked = false;
            accountContainer.classList.add('d-none');
            notePassword.classList.add('d-none');

            document.getElementById('inputNamaPegawai').value = '';
            document.getElementById('inputNikPegawai').value = '';
            document.getElementById('inputUidPegawai').value = '';
            document.getElementById('inputJabatanPegawai').value = '';
            document.getElementById('inputTypePegawai').value = 'relawan';
            document.getElementById('inputTelpPegawai').value = '';
            document.getElementById('inputEmailAccount').value = '';
            document.getElementById('inputPasswordAccount').value = '';
        });

        // Populate for Edit Mode
        document.querySelectorAll('.btn-edit-pegawai').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const nik = this.getAttribute('data-nik');
                const uid = this.getAttribute('data-uid');
                const jabatan = this.getAttribute('data-jabatan');
                const type = this.getAttribute('data-type');
                const telp = this.getAttribute('data-telp');
                const hasAccount = this.getAttribute('data-has-account') === '1';
                const email = this.getAttribute('data-email');
                const role = this.getAttribute('data-role');

                form.action = `/admin/pegawai/${id}`;
                methodContainer.innerHTML = '<input type="hidden" name="_method" value="PUT">';
                modalTitle.innerHTML = `<i class="bi bi-pencil-square me-1"></i> Edit Data Pegawai: ${name}`;
                btnSubmit.innerHTML = '<i class="bi bi-check-lg me-1"></i> Perbarui Data Pegawai';
                labelToggleAccount.textContent = hasAccount ? 'Kelola Akun Login Pegawai (Email / Password / Peran)' : 'Buatkan Akun Login untuk Pegawai Ini';
                toggleAccount.name = 'manage_account';
                toggleAccount.checked = hasAccount;
                notePassword.classList.remove('d-none');

                if (hasAccount) {
                    accountContainer.classList.remove('d-none');
                } else {
                    accountContainer.classList.add('d-none');
                }

                document.getElementById('inputNamaPegawai').value = name;
                document.getElementById('inputNikPegawai').value = nik || '';
                document.getElementById('inputUidPegawai').value = uid || '';
                document.getElementById('inputJabatanPegawai').value = jabatan || '';
                document.getElementById('inputTypePegawai').value = type || 'relawan';
                document.getElementById('inputTelpPegawai').value = telp || '';
                document.getElementById('inputEmailAccount').value = email || '';
                document.getElementById('inputPasswordAccount').value = '';
                if (role) {
                    document.getElementById('inputRoleAccount').value = role;
                }

                const modal = new bootstrap.Modal(document.getElementById('pegawaiModal'));
                modal.show();
            });
        });
    });
</script>
@endpush
