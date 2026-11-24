@extends('layouts.guest')

@section('title', 'Masuk ke Sistem')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5">
            <div class="card auth-card border-0 shadow-sm">
                <div class="card-body p-4 p-sm-5">
                    <!-- Brand Header -->
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary-arap text-white rounded-circle mb-3" style="width: 64px; height: 64px;">
                            <i class="bi bi-fingerprint fs-1"></i>
                        </div>
                        <h4 class="fw-bold text-primary-arap mb-1">ARAP v2</h4>
                        <p class="text-muted small mb-0">Sistem Presensi Relawan & Pegawai SPPG Kalisapu</p>
                    </div>

                    <!-- Flash Alerts / Validation Errors -->
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show small" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}" class="needs-validation">
                        @csrf

                        <!-- Identifier (Email / NIK) -->
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-semibold text-secondary">Email atau NIK</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-person"></i></span>
                                <input type="text"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="contoh: 1051 atau user@sppg.id"
                                       required
                                       autofocus
                                       autocomplete="username">
                            </div>
                            <div class="form-text small text-muted">Relawan dapat login menggunakan NIK atau UID kartu.</div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label small fw-semibold text-secondary">Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-muted"><i class="bi bi-lock"></i></span>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       placeholder="••••••••"
                                       required
                                       autocomplete="current-password">
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label small text-secondary" for="remember">
                                    Ingat saya
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary-arap btn-lg fs-6 py-2 fw-semibold">
                                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang
                            </button>
                        </div>
                    </form>

                    <!-- Footer Info -->
                    <div class="text-center mt-4 pt-2 border-top">
                        <small class="text-muted d-block">
                            <i class="bi bi-shield-check text-success me-1"></i> Terhubung ke ARAP Server &middot; PWA Ready
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
