@extends('auth.aBase')

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    body.c-app {
        background: radial-gradient(circle at 12% 18%, rgba(37, 99, 235, 0.08) 0%, transparent 45%),
                    radial-gradient(circle at 88% 82%, rgba(79, 70, 229, 0.08) 0%, transparent 45%),
                    #f8fafc !important;
        min-height: 100vh;
        font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
        color: #1e293b;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px 16px;
        margin: 0;
    }

    .arap-login-wrapper {
        width: 100%;
        max-width: 960px;
        margin: auto;
    }

    .arap-login-card {
        background: #ffffff;
        border-radius: 24px;
        border: 1px solid rgba(226, 232, 240, 0.85);
        box-shadow: 0 25px 50px -12px rgba(15, 23, 42, 0.08), 
                    0 4px 6px -2px rgba(15, 23, 42, 0.02),
                    0 0 0 1px rgba(15, 23, 42, 0.02);
        overflow: hidden;
    }

    /* Left Form Panel */
    .arap-form-panel {
        padding: 48px 48px 40px 48px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    @media (max-width: 575.98px) {
        .arap-form-panel {
            padding: 32px 24px 28px 24px;
        }
    }

    .brand-mobile-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 6px 14px 6px 8px;
        background: #eff6ff;
        border: 1px solid #dbeafe;
        border-radius: 100px;
        width: fit-content;
        margin-bottom: 20px;
    }

    .brand-mobile-icon {
        width: 28px;
        height: 28px;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
    }

    .brand-mobile-text {
        font-size: 13px;
        font-weight: 700;
        color: #1e40af;
        letter-spacing: 0.5px;
    }

    .login-header {
        margin-bottom: 28px;
    }

    .login-title {
        font-size: 26px;
        font-weight: 800;
        color: #0f172a;
        margin-bottom: 8px;
        letter-spacing: -0.5px;
    }

    .login-subtitle {
        font-size: 14px;
        color: #64748b;
        margin: 0;
        line-height: 1.5;
    }

    /* Form Fields */
    .form-group-custom {
        margin-bottom: 20px;
    }

    .form-label-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 13.5px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon-left {
        position: absolute;
        left: 16px;
        width: 20px;
        height: 20px;
        color: #94a3b8;
        pointer-events: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: color 0.2s ease;
        z-index: 2;
    }

    .form-control-custom {
        width: 100%;
        height: 48px;
        padding: 10px 16px 10px 48px;
        font-size: 14.5px;
        color: #0f172a;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        transition: all 0.2s ease;
        font-family: inherit;
    }

    .form-control-custom.has-right-btn {
        padding-right: 50px;
    }

    .form-control-custom::placeholder {
        color: #94a3b8;
        font-size: 14px;
    }

    .form-control-custom:focus {
        background: #ffffff;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
        outline: none;
    }

    .input-wrapper:focus-within .input-icon-left {
        color: #2563eb;
    }

    .btn-toggle-password {
        position: absolute;
        right: 8px;
        background: transparent;
        border: none;
        padding: 8px;
        cursor: pointer;
        color: #94a3b8;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: color 0.2s ease, background-color 0.2s ease;
        z-index: 2;
    }

    .btn-toggle-password:hover {
        color: #334155;
        background-color: #f1f5f9;
    }

    .btn-toggle-password:focus {
        outline: none;
    }

    /* Options (Remember & Forgot) */
    .form-options-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: -4px;
        margin-bottom: 24px;
        font-size: 13.5px;
    }

    .remember-wrap {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        user-select: none;
        color: #475569;
        font-weight: 500;
        margin: 0;
    }

    .remember-wrap input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: #2563eb;
        cursor: pointer;
        border-radius: 4px;
        margin: 0;
    }

    .forgot-link {
        color: #2563eb;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .forgot-link:hover {
        color: #1d4ed8;
        text-decoration: underline;
    }

    /* Submit Button */
    .btn-login-submit {
        width: 100%;
        height: 50px;
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        color: #ffffff;
        border: none;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 700;
        letter-spacing: 0.3px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
        transition: all 0.2s ease;
        font-family: inherit;
    }

    .btn-login-submit:hover {
        background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
        box-shadow: 0 6px 20px rgba(37, 99, 235, 0.45);
        transform: translateY(-1px);
        color: #ffffff;
        text-decoration: none;
    }

    .btn-login-submit:active {
        transform: translateY(0);
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.25);
    }

    .btn-login-submit svg {
        transition: transform 0.2s ease;
    }

    .btn-login-submit:hover svg {
        transform: translateX(3px);
    }

    /* Security note */
    .security-note {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        font-size: 12.5px;
        color: #94a3b8;
        margin-top: 24px;
        margin-bottom: 0;
    }

    /* Right Brand Panel */
    .arap-brand-panel {
        background: linear-gradient(145deg, #0f172a 0%, #1e3a8a 55%, #2563eb 100%);
        color: #ffffff;
        padding: 48px 40px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    .brand-glow-circle-1 {
        position: absolute;
        top: -80px;
        right: -80px;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(96, 165, 250, 0.28) 0%, transparent 70%);
        pointer-events: none;
    }

    .brand-glow-circle-2 {
        position: absolute;
        bottom: -60px;
        left: -60px;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.22) 0%, transparent 70%);
        pointer-events: none;
    }

    .brand-header-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 100px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.4px;
        backdrop-filter: blur(8px);
        width: fit-content;
        position: relative;
        z-index: 1;
    }

    .brand-content {
        position: relative;
        z-index: 1;
        margin: 36px 0;
    }

    .brand-logo-emblem {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.05));
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(10px);
    }

    .brand-title {
        font-size: 32px;
        font-weight: 800;
        letter-spacing: 1px;
        margin-bottom: 6px;
        color: #ffffff;
    }

    .brand-desc {
        font-size: 14px;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.85);
        margin-bottom: 28px;
    }

    .feature-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .feature-card {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.12);
        border-radius: 14px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 14px;
        backdrop-filter: blur(8px);
        transition: transform 0.2s ease, background 0.2s ease;
    }

    .feature-card:hover {
        background: rgba(255, 255, 255, 0.12);
        transform: translateX(4px);
    }

    .feature-icon-wrap {
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.15);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: #ffffff;
    }

    .feature-text-wrap h5 {
        font-size: 13.5px;
        font-weight: 700;
        margin: 0 0 2px 0;
        color: #ffffff;
    }

    .feature-text-wrap p {
        font-size: 12px;
        margin: 0;
        color: rgba(255, 255, 255, 0.7);
    }

    .brand-footer {
        position: relative;
        z-index: 1;
        font-size: 12px;
        color: rgba(255, 255, 255, 0.65);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #34d399;
        display: inline-block;
        box-shadow: 0 0 0 3px rgba(52, 211, 153, 0.3);
    }

    /* Custom Alert Enhancements */
    .arap-form-panel .alert {
        border-radius: 12px;
        padding: 12px 16px;
        font-size: 13.5px;
        margin-bottom: 22px;
        border: 1px solid transparent;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .arap-form-panel .alert-danger {
        background-color: #fef2f2;
        border-color: #fecaca;
        color: #991b1b;
    }

    .arap-form-panel .alert-success {
        background-color: #f0fdf4;
        border-color: #bbf7d0;
        color: #166534;
    }

    .arap-form-panel .alert .close {
        padding: 0 8px;
        color: inherit;
        opacity: 0.6;
        background: transparent;
        border: none;
        font-size: 20px;
        line-height: 1;
    }

    .arap-form-panel .alert .close:hover {
        opacity: 1;
    }
</style>
@endsection

@section('content')

<div class="arap-login-wrapper">
    <div class="arap-login-card">
        <div class="row no-gutters">
            <!-- Left Column: Login Form -->
            <div class="col-12 col-lg-7">
                <div class="arap-form-panel">
                    
                    <!-- Mobile Brand Badge (shows on mobile only) -->
                    <div class="brand-mobile-badge d-lg-none">
                        <div class="brand-mobile-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                            </svg>
                        </div>
                        <span class="brand-mobile-text">ARAP PRESENSI</span>
                    </div>

                    <div class="login-header">
                        <h2 class="login-title">Selamat Datang Kembali</h2>
                        <p class="login-subtitle">Silakan masukkan akun Anda untuk mengakses sistem Aplikasi Rapat dan Administrasi Presensi.</p>
                    </div>

                    @include('layouts.alert')

                    <form method="POST" action="{{ route('login') }}" class="login-form">
                        @csrf

                        <!-- Email / Username Input -->
                        <div class="form-group-custom">
                            <label for="email" class="form-label-custom">
                                <span>Alamat E-Mail atau UID / NIK</span>
                            </label>
                            <div class="input-wrapper">
                                <span class="input-icon-left">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="16" x="2" y="4" rx="2"/>
                                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                                    </svg>
                                </span>
                                <input id="email" 
                                       class="form-control-custom" 
                                       type="text" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       placeholder="Masukkan E-Mail atau UID / NIK" 
                                       required 
                                       autocomplete="username" 
                                       autofocus>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="form-group-custom">
                            <div class="form-label-custom">
                                <span>Kata Sandi</span>
                                <a href="{{ route('password.request') }}" class="forgot-link">Lupa Password?</a>
                            </div>
                            <div class="input-wrapper">
                                <span class="input-icon-left">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                                    </svg>
                                </span>
                                <input id="password" 
                                       class="form-control-custom has-right-btn" 
                                       type="password" 
                                       name="password" 
                                       placeholder="Masukkan kata sandi" 
                                       required 
                                       autocomplete="current-password">
                                <button type="button" class="btn-toggle-password" id="togglePassword" title="Tampilkan / Sembunyikan Kata Sandi" aria-label="Toggle password visibility">
                                    <!-- Eye Icon (Open) -->
                                    <svg id="eyeIcon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    <!-- Eye Off Icon (Hidden) -->
                                    <svg id="eyeOffIcon" class="d-none" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                                        <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                                        <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                                        <line x1="2" x2="22" y1="2" y2="22"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Remember Me -->
                        <div class="form-options-row">
                            <label class="remember-wrap" for="remember">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Ingat saya di perangkat ini</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <button class="btn-login-submit" type="submit">
                            <span>Masuk ke Sistem</span>
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M5 12h14"/>
                                <path d="m12 5 7 7-7 7"/>
                            </svg>
                        </button>
                    </form>

                    <div class="security-note">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                        <span>Sistem Presensi & Administrasi Terenkripsi Aman</span>
                    </div>

                </div>
            </div>

            <!-- Right Column: Brand & Feature Showcase (Desktop) -->
            <div class="col-12 col-lg-5 d-none d-lg-flex">
                <div class="arap-brand-panel w-100">
                    <div class="brand-glow-circle-1"></div>
                    <div class="brand-glow-circle-2"></div>

                    <!-- Top Tag -->
                    <div class="brand-header-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>
                        </svg>
                        <span>PORTAL ADMINISTRASI & PRESENSI</span>
                    </div>

                    <!-- Main Brand Body -->
                    <div class="brand-content">
                        <div class="brand-logo-emblem">
                            <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2a10 10 0 0 0-10 10c0 4.42 2.87 8.17 6.84 9.5.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34-.46-1.16-1.11-1.47-1.11-1.47-.91-.62.07-.6.07-.6 1 .07 1.53 1.03 1.53 1.03.87 1.52 2.34 1.07 2.91.83.1-.65.35-1.09.63-1.34-2.22-.25-4.55-1.11-4.55-4.92 0-1.11.38-2 1.03-2.71-.1-.25-.45-1.29.1-2.64 0 0 .84-.27 2.75 1.02.79-.22 1.65-.33 2.5-.33.85 0 1.71.11 2.5.33 1.91-1.29 2.75-1.02 2.75-1.02.55 1.35.2 2.39.1 2.64.65.71 1.03 1.6 1.03 2.71 0 3.82-2.34 4.66-4.57 4.91.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2Z"/>
                            </svg>
                        </div>

                        <h1 class="brand-title">ARAP</h1>
                        <p class="brand-desc">Aplikasi Rapat dan Administrasi Presensi terintegrasi untuk efisiensi pengelolaan kehadiran, notulensi rapat, dan data pegawai.</p>

                        <div class="feature-list">
                            <!-- Feature 1 -->
                            <div class="feature-card">
                                <div class="feature-icon-wrap">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 2a10 10 0 0 0-10 10c0 5.52 4.48 10 10 10s10-4.48 10-10c0-1.38-.28-2.69-.78-3.88"/>
                                        <path d="m9 12 2 2 4-4"/>
                                    </svg>
                                </div>
                                <div class="feature-text-wrap">
                                    <h5>Presensi Real-time & Akurat</h5>
                                    <p>Perekaman presensi pegawai, divisi relawan, kebersihan & keamanan.</p>
                                </div>
                            </div>

                            <!-- Feature 2 -->
                            <div class="feature-card">
                                <div class="feature-icon-wrap">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                        <polyline points="14 2 14 8 20 8"/>
                                        <line x1="16" x2="8" y1="13" y2="13"/>
                                        <line x1="16" x2="8" y1="17" y2="17"/>
                                        <line x1="10" x2="8" y1="9" y2="9"/>
                                    </svg>
                                </div>
                                <div class="feature-text-wrap">
                                    <h5>Administrasi & Risalah Rapat</h5>
                                    <p>Pengelolaan agenda, presensi kehadiran, serta validasi notulensi rapat.</p>
                                </div>
                            </div>

                            <!-- Feature 3 -->
                            <div class="feature-card">
                                <div class="feature-icon-wrap">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="20" height="14" x="2" y="3" rx="2"/>
                                        <line x1="8" x2="16" y1="21" y2="21"/>
                                        <line x1="12" x2="12" y1="17" y2="21"/>
                                    </svg>
                                </div>
                                <div class="feature-text-wrap">
                                    <h5>Sinkronisasi Mesin Absensi</h5>
                                    <p>Koneksi langsung dan penarikan data log mesin absensi otomatis.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Info -->
                    <div class="brand-footer">
                        <span>Aplikasi ARAP</span>
                        <span><span class="status-dot mr-1"></span> Sistem Aktif</span>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggleBtn = document.getElementById('togglePassword');
    var passwordInput = document.getElementById('password');
    var eyeIcon = document.getElementById('eyeIcon');
    var eyeOffIcon = document.getElementById('eyeOffIcon');

    if (toggleBtn && passwordInput) {
        toggleBtn.addEventListener('click', function() {
            var isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            
            if (eyeIcon && eyeOffIcon) {
                if (isPassword) {
                    eyeIcon.classList.add('d-none');
                    eyeOffIcon.classList.remove('d-none');
                } else {
                    eyeIcon.classList.remove('d-none');
                    eyeOffIcon.classList.add('d-none');
                }
            }
            passwordInput.focus();
        });
    }
});
</script>
@endsection
