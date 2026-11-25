@extends('layouts.app')

@section('title', 'Ganti Kata Sandi')
@section('page_title', 'Keamanan Akun & Kata Sandi')

@section('content')
<div class="container-fluid p-0">
    <!-- Header Title -->
    <div class="mb-4">
        <h4 class="fw-bold mb-1 text-primary-arap">
            <i class="bi bi-shield-lock-fill me-2"></i>Ganti Kata Sandi Akun
        </h4>
        <p class="text-muted small mb-0">
            Perbarui kata sandi akun Anda secara berkala untuk menjaga keamanan data kehadiran dan akses sistem ARAP v2.
        </p>
    </div>

    <div class="row g-4">
        <!-- Profile Overview Card -->
        <div class="col-12 col-lg-4">
            <div class="card border-0 shadow-sm bg-white h-100">
                <div class="card-body p-4 text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-sm" style="width: 72px; height: 72px;">
                        <i class="bi bi-person-fill fs-1"></i>
                    </div>
                    <h5 class="fw-bold mb-1 text-dark">{{ $user->name }}</h5>
                    <p class="text-muted small mb-3">{{ $user->email }}</p>

                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-3 py-2 text-uppercase">
                            {{ $user->roles->pluck('name')->first() ?? 'Relawan' }}
                        </span>
                        @if($user->peserta?->jabatan)
                            <span class="badge bg-secondary-subtle text-secondary border px-3 py-2">
                                {{ $user->peserta->jabatan }}
                            </span>
                        @endif
                    </div>

                    <hr class="text-muted opacity-25">

                    <div class="text-start small">
                        <div class="d-flex justify-content-between py-1 border-bottom">
                            <span class="text-muted">Nomor Induk (NIK):</span>
                            <span class="fw-semibold">{{ $user->nik ?? '-' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-1 border-bottom">
                            <span class="text-muted">UID Fingerprint:</span>
                            <span class="fw-semibold">{{ $user->peserta?->uid ?? '-' }}</span>
                        </div>
                        <div class="d-flex justify-content-between py-1">
                            <span class="text-muted">Status Akun:</span>
                            <span class="badge bg-success-subtle text-success">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Password Form Card -->
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm bg-white">
                <div class="card-header bg-white border-bottom py-3">
                    <h6 class="fw-bold mb-0 text-primary-arap">
                        <i class="bi bi-key-fill me-2"></i>Formulir Pembaruan Kata Sandi
                    </h6>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('profile.password.update') }}">
                        @csrf
                        @method('PUT')

                        <!-- Password Saat Ini -->
                        <div class="mb-3">
                            <label for="current_password" class="form-label small fw-semibold">
                                Kata Sandi Saat Ini <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-lock"></i></span>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    placeholder="Masukkan kata sandi yang Anda gunakan saat ini" required autocomplete="current-password">
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="current_password">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Kata Sandi Baru -->
                        <div class="mb-3">
                            <label for="password" class="form-label small fw-semibold">
                                Kata Sandi Baru <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-shield-lock"></i></span>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Minimal 8 karakter kombinasi huruf dan angka" required autocomplete="new-password">
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Konfirmasi Kata Sandi Baru -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label small fw-semibold">
                                Konfirmasi Kata Sandi Baru <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-check2-circle"></i></span>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control"
                                    placeholder="Ulangi kata sandi baru persis seperti di atas" required autocomplete="new-password">
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password_confirmation">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Petunjuk Keamanan Sandi -->
                        <div class="alert alert-light border small text-muted mb-4">
                            <h6 class="fw-bold text-dark fs-6 mb-2">
                                <i class="bi bi-info-circle text-primary me-1"></i> Ketentuan Kata Sandi yang Aman:
                            </h6>
                            <ul class="mb-0 ps-3">
                                <li>Panjang kata sandi minimal <strong>8 karakter</strong>.</li>
                                <li>Kata sandi baru <strong>harus berbeda</strong> dari kata sandi saat ini.</li>
                                <li>Pastikan untuk mengingat kata sandi baru Anda atau menyimpannya di tempat yang aman.</li>
                            </ul>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-secondary">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-sm btn-primary px-3">
                                <i class="bi bi-check-circle me-1"></i> Perbarui Kata Sandi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.toggle-password').forEach(function (button) {
        button.addEventListener('click', function () {
            var targetId = this.getAttribute('data-target');
            var input = document.getElementById(targetId);
            var icon = this.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    });
});
</script>
@endpush
