@extends('layouts.app')

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Profil Pengguna</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                @if(session('msg'))
                    @php
                        $msgParts = explode('-', session('msg'), 2);
                        $msgType = count($msgParts) === 2 ? $msgParts[0] : 'info';
                        $msgText = count($msgParts) === 2 ? $msgParts[1] : session('msg');
                    @endphp
                    <div class="alert alert-{{ $msgType }} alert-dismissible fade show" role="alert">
                        {{ $msgText }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if(isset($errors) && $errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="cil-warning mr-1"></i> Terjadi kesalahan validasi:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="row">
                    <!-- Form Profil Utama -->
                    <div class="col-lg-8 mb-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-white py-3">
                                <h5 class="mb-0 font-weight-bold text-dark">
                                    <i class="cil-user mr-2 text-primary"></i>Informasi Akun Profil
                                </h5>
                            </div>
                            <div class="card-body p-4">
                                <form id="profilform" method="POST" action="{{ route('profil.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group mb-3">
                                        <label for="name" class="font-weight-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email" class="font-weight-bold">Alamat Email / UID Login <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="telp" class="font-weight-bold">Nomor Telepon / WhatsApp</label>
                                        <input type="text" class="form-control @error('telp') is-invalid @enderror" id="telp" name="telp" value="{{ old('telp', $user->telp) }}" placeholder="Contoh: 081234567890">
                                        @error('telp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    @if($user->peserta)
                                        <div class="alert alert-secondary mb-3">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <small class="text-muted d-block">NIK Relawan</small>
                                                    <strong>{{ $user->peserta->nik ?? ($user->nik ?? '-') }}</strong>
                                                </div>
                                                <div class="col-sm-6 mt-2 mt-sm-0">
                                                    <small class="text-muted d-block">Divisi Penugasan</small>
                                                    <strong>{{ $user->peserta->jabatan_formatted ?? ($user->peserta->jabatan ?? '-') }}</strong>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <hr class="my-4">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary px-4" form="profilform" type="submit">
                                            <i class="cil-check mr-1"></i> Simpan Perubahan Profil
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Panel Samping: Avatar & Ganti Password -->
                    <div class="col-lg-4">
                        <!-- Card Avatar -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white py-3">
                                <h6 class="mb-0 font-weight-bold text-dark">
                                    <i class="cil-image mr-1 text-primary"></i>Foto Profil
                                </h6>
                            </div>
                            <div class="card-body text-center p-4">
                                <div class="mb-3">
                                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="rounded-circle shadow-sm" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #e2e8f0;" onerror="this.src='{{ asset('assets/img/avatars/default.png') }}'">
                                </div>
                                <form action="{{ route('avatar') }}" method="POST" id="form_avatar" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" id="avatar" name="avatar" accept="image/*" style="display: none;" onchange="document.getElementById('form_avatar').submit();">
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="document.getElementById('avatar').click();">
                                        <i class="cil-cloud-upload mr-1"></i> Ubah Foto Profil
                                    </button>
                                </form>
                                <small class="text-muted d-block mt-2">Format: JPG, PNG, GIF (Maks 2MB)</small>
                            </div>
                        </div>

                        <!-- Card Ganti Password -->
                        <div class="card shadow-sm border-0 mb-4">
                            <div class="card-header bg-white py-3">
                                <h6 class="mb-0 font-weight-bold text-dark">
                                    <i class="cil-lock-locked mr-1 text-primary"></i>Ubah Password
                                </h6>
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('password') }}" method="POST" id="passwordform">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="old_password" class="small font-weight-bold">Password Saat Ini <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-sm" name="old_password" id="old_password" placeholder="Masukkan password lama" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="new_password" class="small font-weight-bold">Password Baru <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-sm" name="new_password" id="new_password" placeholder="Minimal 8 karakter" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="c_password" class="small font-weight-bold">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control form-control-sm" name="c_password" id="c_password" placeholder="Ulangi password baru" required>
                                    </div>
                                    <button type="submit" class="btn btn-secondary btn-sm btn-block">
                                        <i class="cil-check mr-1"></i> Update Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
