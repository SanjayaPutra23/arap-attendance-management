<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <title>Signature ARAP</title>
  <meta name="description" content="Signature Pad ARAP.">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link href="{{ asset('assets/sp/css/signature-pad.css') }}" rel="stylesheet">


  <!--[if IE]>
    <link href="{{ asset('assets/sp/css/css/ie9.css') }}" rel="stylesheet">
  <![endif]-->

</head>
<body >


  <div id="signature-pad" class="signature-pad">
    <label class="col-md-12 col-form-label">Kegiatan : {{ $hadir->rapat()->first()->name }}</label>
    <label class="col-md-12 col-form-label">Tanggal : {{ $hadir->rapat()->first()->tanggal }}</label>
    <h3>{{ $hadir->pesertas()->first()->name }}</h3>
    <div class="signature-pad--body">
      <canvas></canvas>
    </div>
    <div class="signature-pad--footer">
      <div class="description">Sign above</div>
      <form id="sigform" method="POST" action="{{ route('kehadiran.update', $hadir->id) }}">
      @csrf
      @method('PUT')
      <div class="form-group row">

        <input type="hidden" name="peserta_id" value="{{ $hadir->pesertas()->first()->id }}">
        <input type="hidden" name="presensi_id" value="{{ $hadir->rapat()->first()->id }}">
        <input id="siginput" type="hidden" name="sign" value="" />
      </div>
      </form>
      <div class="signature-pad--actions">
        <div>
          <button type="button" class="button clear" data-action="clear">Clear</button>


        </div>
        <div>

          <button type="button" class="button save" data-action="save">simpan</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('assets/sp/js/signature_pad.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/sp/js/app.js') }}"></script>
</body>
</html>
