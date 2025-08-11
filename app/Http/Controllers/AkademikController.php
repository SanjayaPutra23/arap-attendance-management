<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DetailAbsen;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Pod;
use App\Models\Persepsi;
use App\Models\Libur;
use App\Models\Mesin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class AkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Mesin::where('grup', 7)->with('groupOption:id,text')->get();
        $pure = Pool::count();
        return view('page.ListAkadMesin',['list'=> $list, 'pur'=> $pure]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
{
    // 1) Validasi input
    $data = $request->validate([
        'type'  => 'required|in:mingguan,bulanan',
        'bln'   => 'required|integer|min:1|max:12',
        'thn'   => 'required|integer|min:2000|max:2100',
        'tgl_m' => 'nullable|string', // "YYYY-MM-DD&index" kalau mingguan
    ]);

    $type  = $data['type'];
    $bulan = (int) $data['bln'];
    $thn   = (int) $data['thn'];

    // 2) Tentukan periode & label typex
    if ($type === 'mingguan') {
        [$tgl_mu, $weekIndexRaw] = explode('&', (string) ($request->tgl_m ?? '')) + [null, -1];
        if (!$tgl_mu) {
            return back()->with('msg', 'danger-Tanggal mulai minggu tidak valid');
        }
        $weekIndex = (int) $weekIndexRaw + 1;

        $start = Carbon::parse($tgl_mu)->startOfDay();
        $end   = (clone $start)->addDays(6)->endOfDay();

        $typex = "minggu ke {$weekIndex}";
    } else {
        // 20 (bulan-1) s/d 19 (bulan ini) — string tetap Y-m-d agar cocok dengan pools.date (string)
        $start = Carbon::create($thn, $bulan, 20)->subMonth()->startOfDay();
        $end   = Carbon::create($thn, $bulan, 19)->endOfDay();

        $typex = "bulanan";
    }

    // 3) Cek apakah Absensi untuk periode ini sudah ada
    // peg default true (1). Sesuaikan kalau di tempatmu 'peg' memang harus 1.
    $existingId = Absensi::where('type', $typex)
        ->where('thn', (string) $thn)
        ->where('bln', (string) $bulan)
        ->where('peg', 1)
        ->value('id');

    if ($existingId) {
        return redirect()->route('absensi.show', $existingId)
            ->with('msg', 'success-berhasil menemukan absensi');
    }

    // 4) Susun daftar tanggal (string Y-m-d) sesuai kolom pools.date (string)
    $periodDays = CarbonPeriod::create($start->toDateString(), $end->toDateString());
    $allDates   = collect($periodDays)->map->toDateString(); // ['YYYY-MM-DD', ...]

    if ($allDates->isEmpty()) {
        return back()->with('msg', 'danger-Periode tanggal kosong');
    }

    // 5) Ambil peserta (sesuai filter lama)
    $peserta = Peserta::query()
        ->whereNotNull('type')
        ->whereNotIn('type', ['Satpam', 'cs'])
        ->orderBy('id', 'asc')
        ->get(['name', 'nik', 'uid']);

    if ($peserta->isEmpty()) {
        return back()->with('msg', 'danger-Tidak ada peserta yang memenuhi kriteria');
    }

    $uids = $peserta->pluck('uid')->map(fn($v) => (string) $v);

    // 6) Data libur → map[tanggal => ket]
    $liburMap = Libur::query()->pluck('ket', 'tanggal'); // tanggal format Y-m-d (string)

    // 7) Prefetch Pool untuk semua user & tanggal periode
    //    Kolom yang dipakai: iduser, date (string Y-m-d), time (string HH:ii:ss), type (0=in,1=out), timestamp
    $fromDate = $allDates->first();
    $toDate   = $allDates->last();

    $mesinIds = Mesin::query()
    ->where('grup', 7)
    ->pluck('id');

    $pools = Pool::query()
        ->whereIn('iduser', $uids)
        ->whereBetween('date', [$fromDate, $toDate]) // OK karena date adalah string Y-m-d
        ->when($mesinIds->isNotEmpty(), fn($q) => $q->whereIn('mesin_id', $mesinIds))
        ->get(['iduser', 'date', 'type', 'time', 'timestamp']);

    // Index-kan: $poolIndex[$uid][$date] = ['in' => 'HH:ii:ss'|'0', 'out' => 'HH:ii:ss'|'0', 'latest_ts' => Carbon]
    $poolIndex = [];
    foreach ($pools as $rec) {
        $uid  = (string) $rec->iduser;
        $date = (string) $rec->date;

        if (!isset($poolIndex[$uid][$date])) {
            $poolIndex[$uid][$date] = [
                'in'        => null,
                'out'       => null,
                'latest_ts' => $rec->timestamp, // datetime dari kolom `timestamp`
            ];
        }

        // earliest IN (type=0), latest OUT (type=1)
        if ((string) $rec->type === '0') {
            $cur = $poolIndex[$uid][$date]['in'];
            $poolIndex[$uid][$date]['in'] = is_null($cur) ? $rec->time : min($cur, $rec->time);
        } elseif ((string) $rec->type === '1') {
            $cur = $poolIndex[$uid][$date]['out'];
            $poolIndex[$uid][$date]['out'] = is_null($cur) ? $rec->time : max($cur, $rec->time);
        }

        // latest timestamp per (user,date)
        if ($rec->timestamp > $poolIndex[$uid][$date]['latest_ts']) {
            $poolIndex[$uid][$date]['latest_ts'] = $rec->timestamp;
        }
    }

    // Latest timestamp global dari Pool (untuk logika $over)
    $latestPoolTs = optional(
        Pool::query()->latest('id')->first()
    )->timestamp;

    // 8) Prefetch Pod (hak) → set dengan key "userId#tanggal"
    $podSet = Pod::query()
        ->whereIn('user_id', $uids)
        ->whereBetween('tanggal', [$fromDate, $toDate])
        ->get(['user_id', 'tanggal'])
        ->mapWithKeys(fn($r) => [ (string)$r->user_id.'#'.$r->tanggal => true ]);

    // 9) Transaksi: buat Absensi + Detail
    DB::beginTransaction();
    try {
        $abs = new Absensi();
        $abs->type        = $typex;
        $abs->tgl_mulai   = $start->toDateTimeString();   // kolom absensis.* adalah string → tetap string
        $abs->tgl_selesai = $end->toDateTimeString();
        $abs->thn         = (string) $thn;
        $abs->bln         = (string) $bulan;
        $abs->maker       = Auth::id();
        $abs->peg         = 1; // kalau memang wajib 1
        $abs->save();

        $now   = now()->toDateTimeString();
        $batch = [];

        foreach ($peserta as $p) {
            $uid     = (string) $p->uid;
            $namaNik = "{$p->name}-{$p->nik}";

            $presensiStr = '';
            foreach ($allDates as $d) {
                // Weekend/Libur (ikuti logika lama: Minggu=0, Sabtu=6)
                $dowPhp = Carbon::parse($d)->dayOfWeek; // 0..6
                $isWeekend = ($dowPhp === 0 || $dowPhp === 6);
                $isHoliday = $liburMap->has($d);
                $libur     = ($isWeekend || $isHoliday) ? 1 : 0;

                // Ambil IN/OUT dari index
                $pi  = $poolIndex[$uid][$d] ?? null;
                $had = $pi['in']  ?? 0; // string "HH:ii:ss" atau 0
                $pul = $pi['out'] ?? 0;

                // "over" (kalau mau dipakai di masa depan)
                // definisi: tanggal > latestPoolTs (dibanding startOfDay)
                // saat ini TIDAK disimpan agar kompatibel dengan format presensi lama
                // $over = 0;
                // if ($latestPoolTs) {
                //     $over = Carbon::parse($d)->startOfDay()->greaterThan($latestPoolTs) ? 1 : 0;
                // }

                // Hak (Pod) — tidak diserialisasi ke presensi untuk menjaga format lama
                // $hek = $podSet->has("{$uid}#{$d}") ? 1 : 0;

                $presensiStr .= "{$d}_{$libur}_{$had}_{$pul}&";
            }

            $batch[] = [
                'id_absen'     => $abs->id,
                'id_peserta'   => (int) $uid, // kolom unsignedBigInteger — cast ke int aman
                'data_peserta' => $namaNik,
                'presensi'     => $presensiStr,
                'created_at'   => $now,
                'updated_at'   => $now,
            ];
        }

        foreach (array_chunk($batch, 1000) as $chunk) {
            DetailAbsen::insert($chunk);
        }

        DB::commit();
        return redirect()->back()
            ->with('msg', 'success-berhasil membuat absensi');
    } catch (\Throwable $e) {
        DB::rollBack();
        return redirect()->back()
            ->with('msg', 'danger-Gagal euy, karena '.$e->getMessage());
    }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function persepsi()
    { 
        $listtgl= Pool::query()
                ->distinct()
                ->where('mesin_id', '>=', 12)
                ->pluck('date')
                ->toArray();
       // dd($listtgl);
       $mesin = Mesin::where('grup', 7)->get();
        $list = Persepsi::all();
       
        return view('page.ListPersepsi',compact('list' ,'listtgl', 'mesin'));
    }
}
