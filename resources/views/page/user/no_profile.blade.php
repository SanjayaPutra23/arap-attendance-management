@extends('layouts.app')

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Peringatan Akun</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-warning">
                    <div class="card-header bg-warning text-dark font-weight-bold">
                        <i class="cil-warning mr-1"></i> Profil Relawan Belum Terhubung
                    </div>
                    <div class="card-body py-4 text-center">
                        <div class="mb-3">
                            <i class="cil-user-unfollow text-warning" style="font-size: 56px;"></i>
                        </div>
                        <h4 class="font-weight-bold text-dark">Halo, {{ $user->name }}</h4>
                        <p class="text-muted">
                            Akun login Anda (E-Mail: <code>{{ $user->email }}</code>) saat ini belum ditautkan dengan data pegawai / relawan di sistem.
                        </p>
                        <p class="text-muted">
                            Silakan hubungi administrator atau bagian <strong>Tata Usaha</strong> untuk mengaitkan akun Anda dengan data relawan atau menyinkronkan data pegawai.
                        </p>
                        <a href="{{ url('/home') }}" class="btn btn-outline-secondary mt-2">
                            <i class="cil-arrow-left mr-1"></i> Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
