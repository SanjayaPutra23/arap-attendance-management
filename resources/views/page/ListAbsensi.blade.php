@extends('layouts.app')

@section('css')


@endsection

@section('remah')
    <div class="c-subheader px-3">
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('absensi.index') }}">Presensi Relawan</a></li>
            @if(!empty($divisi))
                <li class="breadcrumb-item active">{{ formatDivisi($divisi) }}</li>
            @endif
        </ol>
    </div>
@endsection

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="float-left">{{ $pageTitle ?? 'Rekap Presensi Relawan' }}</h3>
                        @if(empty($divisi))
                        <button class="btn btn-outline-primary float-right" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Buat Rekap Presensi Baru</button>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="btn-group btn-group-sm flex-wrap" role="group">
                                <a href="{{ route('absensi.index') }}" class="btn {{ empty($divisi) ? 'btn-primary' : 'btn-outline-primary' }}">Semua Relawan</a>
                                <a href="{{ route('absensi.divisi', 'persiapan') }}" class="btn {{ ($divisi ?? '') == 'persiapan' ? 'btn-primary' : 'btn-outline-primary' }}">Persiapan</a>
                                <a href="{{ route('absensi.divisi', 'pengolahan') }}" class="btn {{ ($divisi ?? '') == 'pengolahan' ? 'btn-primary' : 'btn-outline-primary' }}">Pengolahan</a>
                                <a href="{{ route('absensi.divisi', 'pemorsian') }}" class="btn {{ ($divisi ?? '') == 'pemorsian' ? 'btn-primary' : 'btn-outline-primary' }}">Pemorsian</a>
                                <a href="{{ route('absensi.divisi', 'distribusi') }}" class="btn {{ ($divisi ?? '') == 'distribusi' ? 'btn-primary' : 'btn-outline-primary' }}">Distribusi</a>
                                <a href="{{ route('absensi.divisi', 'ompreng') }}" class="btn {{ ($divisi ?? '') == 'ompreng' ? 'btn-primary' : 'btn-outline-primary' }}">Ompreng</a>
                                <a href="{{ route('absensi.divisi', 'keamanan') }}" class="btn {{ ($divisi ?? '') == 'keamanan' ? 'btn-primary' : 'btn-outline-primary' }}">Keamanan</a>
                                <a href="{{ route('absensi.divisi', 'kebersihan') }}" class="btn {{ ($divisi ?? '') == 'kebersihan' ? 'btn-primary' : 'btn-outline-primary' }}">Kebersihan</a>
                                <a href="{{ route('absensi.divisi', 'officer') }}" class="btn {{ ($divisi ?? '') == 'officer' ? 'btn-primary' : 'btn-outline-primary' }}">Officer</a>
                            </div>
                        </div>

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <form method="POST" action="{{ route('absensi.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label>Tipe Absensi</label>
                                        <select class="form-control type" name="type" >
                                            <option value="bulanan">Bulanan</option>
                                            <option value="mingguan">Mingguan</option>
                                        </select>
                                    </div>
                                    <div class="form-group row ye">
                                        <label>Tahun</label>
                                        @php
                                            $earliest_year = 2022;
                                            $latest_year = date('Y');
                                        @endphp
                                        <select id="ye" class="form-control" name="thn">
                                            <option selected disabled>== Silahkan pilih Tahun ==</option>
                                            @foreach($year as $i)
                                                <option value="{{ $i->year }}">{{$i->year}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group row mon">
                                        <label>Bulan </label>
                                        <select id="mon" class="form-control" name="bln">

                                            <option selected disabled>== Silahkan Pilih Bulan==</option>
                                            @foreach($month as $data)

                                            <option value="{{ $data->month }}">{{namabulan($data->month)}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="demo" class="form-group row box">
                                        <label> Tanggal </label>
                                        <select class="form-control" >
                                            <option selected disabled>==Pilih Tahun dan Bulan dulu ==</option>
                                        </select>
                                        <input type="hidden" name="tgl_m" value="1">
                                    </div>
                                    <div class="form-group row  nobox">
                                        <label> tanggal : </label>
                                        <label  id="reno">  </label>
                                    </div>

                                    <button class="btn btn-success float-left" type="submit">Rekap Presensi</button>
                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive-sm table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jenis</th>
                                <th>Bulan </th>
                                <th>Tanggal </th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $data)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td> {{ $data->type }}</td>
                                    <td> {{ namabulan($data->bln) }} {{ $data->thn }}</td>
                                    <td> {{ $data->tgl_mulai }} sampai {{ $data->tgl_selesai }}</td>
                                    <td>
                                        @if(!empty($divisi))
                                            <a class="badge badge-info" href="{{ route('absensi.divisi.show', [$divisi, $data->id]) }}" >Lihat Absen</a>
                                            <a class="badge badge-success" href="{{ route('absensi.divisi.rekap', [$divisi, $data->id]) }}" >Lihat Rekap Absen</a>
                                        @else
                                            <a class="badge badge-info" href="{{ route('absensi.show', $data->id) }}" >Lihat Absen</a>
                                            <a class="badge badge-success" href="{{ route('absensi.rekap', $data->id) }}" >Lihat Rekap Absen</a>
                                        @endif
                                        <button class="badge badge-danger"
                                                onclick=" if( confirm('anda Yakin?')) { event.preventDefault();
                                                        document.getElementById('delete-option-form-{{$data->id}}').submit()} else{  event.preventDefault(); }">
                                            Hapus</button>
                                        <form id="delete-option-form-{{$data->id}}" action="{{ route('absensi.destroy', $data->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('modal')
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" >Modal title</h4>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button">Save changes</button>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="{{ asset('srcblog/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('srcblog/RemotModal.js') }}"></script>
    <script>
        $(document).ready(function(){
            var Tgl = {};
            $('#ye').change(function () {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    Tgl.thn = optionValue;
                });
            });
            $('#mon').change(function () {

                var val = $(this).val();
                Tgl.bln = val;
                //console.log ('ini tahun '+ Tgl.thn +' pada bulan '+ Tgl.bln ); // ini cuma terbaca kalo bulan nya sudah di pilih karena triger nya perubahan bulan. kalo belum tidak ada isi nya
                var days = new Date(Tgl.thn,Tgl.bln,0).getDate();
                var mondays =  new Date(Tgl.bln +'/01/'+ Tgl.thn).getDay();

                if(mondays != 1){
                    mondays = 9 - mondays;
                }
                mondays = [mondays];
                for (var i = mondays[0] + 7; i <= days; i += 7) {
                    mondays.push(i);
                }
                //console.log(mondays);
                let text = "";
                //mondays.forEach(myFunction);
                text = '<label> Tanggal </label>';
                text += '<select class="form-control" name="tgl_m">';
                for (i = 0; i < mondays.length; i++) {
                    var mgu = i + parseInt(1);
                    text += '<option value='+Tgl.thn+'-'+Tgl.bln+'-'+mondays[i]+'&'+[i]+'> Minggu ke '+mgu+' Senin , '+mondays[i]+'/'+Tgl.bln+'/'+Tgl.thn+'</option>';
                }
                text +='</select>';
                document.getElementById("demo").innerHTML = text;

                if(Tgl.bln === "01") {
                    var altmon = "12"
                } else {
                    var altmon = Tgl.bln - 1;
                }
                var altdate = 20;

                let altext = 'tgl '+altdate+'/'+altmon+'/'+Tgl.thn+' sampai '+altdate+'/'+Tgl.bln+'/'+Tgl.thn+'';
                document.getElementById("reno").innerHTML = altext;
            });

        });
    </script>

    <script>
        $(document).ready(function(){
            $(".type    ").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue == "mingguan"){
                        $(".box").show();
                        $(".nobox").hide();
                    } else{
                        $(".box").hide();
                        $(".nobox").show();
                    }
                });
            }).change();
        });
    </script>

@endsection

