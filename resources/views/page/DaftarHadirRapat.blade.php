@extends('layouts.app')

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item">Rapat & Notulensi</li>
            <li class="breadcrumb-item active">Daftar Hadir Rapat</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="fade-in">
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

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
            <div>
                <h3 class="font-weight-bold text-dark mb-1">Daftar Hadir Rapat</h3>
                <p class="text-muted mb-0">Kelola dan pantau presensi kehadiran peserta untuk setiap agenda rapat.</p>
            </div>
            <div class="mt-3 mt-md-0">
                <a href="{{ route('presensi.create') }}" class="btn btn-primary shadow-sm">
                    <i class="cil-plus mr-1"></i> Buat Agenda Rapat Baru
                </a>
            </div>
        </div>

        <!-- Filter / Pencarian -->
        <div class="card mb-4 shadow-sm border-0">
            <div class="card-body">
                <form method="GET" action="{{ route('kehadiran.index') }}">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-lg-5">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari nama rapat, agenda, atau tempat..." value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="cil-magnifying-glass"></i> Cari
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if(request('search'))
                            <div class="col-md-3 mt-2 mt-md-0">
                                <a href="{{ route('kehadiran.index') }}" class="btn btn-outline-secondary btn-sm">
                                    <i class="cil-reload mr-1"></i> Reset Pencarian
                                </a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Hadir Rapat -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 font-weight-bold text-dark">
                    <i class="cil-calendar mr-2 text-primary"></i>Rekapitulasi Presensi Rapat
                </h5>
                <span class="text-muted small">Total: {{ $rapatList->total() }} agenda</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 50px;" class="text-center">No</th>
                                <th>Nama / Judul Rapat</th>
                                <th>Agenda Rapat</th>
                                <th>Tanggal & Tempat</th>
                                <th style="width: 160px;" class="text-center">Kehadiran Peserta</th>
                                <th style="width: 250px;" class="text-center">Aksi Presensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rapatList as $index => $rapat)
                                <tr>
                                    <td class="text-center">{{ $rapatList->firstItem() + $index }}</td>
                                    <td>
                                        <div class="font-weight-bold text-dark">{{ $rapat->name }}</div>
                                        @if($rapat->note)
                                            <small class="text-muted">{{ Str::limit($rapat->note, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="text-secondary">{{ $rapat->agenda }}</span>
                                    </td>
                                    <td>
                                        <div><i class="cil-calendar text-primary mr-1"></i> <strong>{{ $rapat->tanggal }}</strong></div>
                                        <small class="text-muted"><i class="cil-location-pin text-danger mr-1"></i> {{ $rapat->tempat }}</small>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column align-items-center">
                                            <span class="badge {{ $rapat->hadir_count > 0 ? 'badge-success' : 'badge-secondary' }} px-3 py-1 font-size-14 mb-1">
                                                {{ $rapat->hadir_count }} / {{ $rapat->kehadirans_count }} Hadir
                                            </span>
                                            @if($rapat->kehadirans_count > 0)
                                                @php
                                                    $pct = round(($rapat->hadir_count / $rapat->kehadirans_count) * 100);
                                                @endphp
                                                <div class="progress w-75" style="height: 6px;">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $pct }}%;" aria-valuenow="{{ $pct }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('presensi.isi', $rapat->id) }}" class="btn btn-sm btn-primary" title="Buka Lembar Hadir">
                                                <i class="cil-pencil mr-1"></i> Buka Lembar Hadir
                                            </a>
                                            <a href="{{ route('presensi.prints', $rapat->id) }}" class="btn btn-sm btn-info text-white" title="Cetak Presensi PDF" target="_blank">
                                                <i class="cil-print mr-1"></i> Cetak
                                            </a>
                                            <a href="{{ route('presensi.show', $rapat->id) }}" class="btn btn-sm btn-outline-secondary" title="Detail Agenda Rapat">
                                                <i class="cil-info"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="cil-calendar display-4 text-secondary mb-3 d-block"></i>
                                        Belum ada agenda rapat yang dibuat.
                                        <div class="mt-2">
                                            <a href="{{ route('presensi.create') }}" class="btn btn-outline-primary btn-sm">
                                                <i class="cil-plus mr-1"></i> Buat Agenda Rapat Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($rapatList->hasPages())
                <div class="card-footer bg-white d-flex justify-content-end py-2">
                    {{ $rapatList->withQueryString()->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
