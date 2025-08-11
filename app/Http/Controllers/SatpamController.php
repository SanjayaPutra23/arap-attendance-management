<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DetailAbsen;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Libur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class SatpamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $year = Pool::select('year')->distinct()->get();
        $month = Pool::select('month')->distinct()->get();
        //dd($month);
        $list = Absensi::where('peg', '0')->get();
        return view('page.ListAbsensiS', ["list" => $list, "year"=> $year, "month"=> $month]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$come = Pool::Where('iduser', '103')->where('date', '2022-07-20')->where('type', '0')->orderby('time', 'ASC')->first();
        $come = null;
        //$gone = Pool::Where('iduser', '103')->where('date', '2022-07-20')->where('type', '1')->orderby('time', 'ASC')->first();
        $gone = null;
        if(!is_null($come) && !is_null($gone)) {
            $in=  new \DateTime($come->time);
            //$in = new \DateTime("07:12:02");
            $out=  new \DateTime($gone->time);
            //$out = new \DateTime("19:13:00");
            //dd($in);
            $dif = $in->diff($out);
            $dif2 = $out->diff($in);
            //dd($dif2);
            if ($dif->invert == 1) {
                $mid = new \DateTime("00:00:01");
                $beda1 = $mid->diff($out);
                $menit = ($beda1->h * 60);
                $menit += $beda1->i;

                $mid2 = new \DateTime("23:59:59");
                $beda2 = $mid2->diff($in);
                $menit2 = ($beda2->h * 60);
                $menit2 += $beda2->i;

                $men = $menit + $menit2;
                $sift= "malam";
            } else {
                $menit = ($dif->h * 60);
                $menit += $dif->i;
                $men = $menit;
                $sift= "pagi";
            }
        } else if(is_null($come) && !is_null($gone)){
            $out=  new \DateTime($gone->time);
            //$out = new \DateTime("19:13:00");
            $mid = new \DateTime("00:00:01");
            $beda1 = $mid->diff($out);
            $menit = ($beda1->h * 60);
            $menit += $beda1->i;

            $men = $menit;
            $sift= "malam";
        } else if(!is_null($come) && is_null($gone)){
            $out=  new \DateTime($come->time);
            //$out = new \DateTime("19:13:00");
            $mid = new \DateTime("23:59:59");
            $beda1 = $mid->diff($out);
            $menit = ($beda1->h * 60);
            $menit += $beda1->i;

            $men = $menit;
            $sift= "malam";
        } else{
            $men = 0;
            $sift= "-";
        }


        dd(floor($men/60)." : ". ($men % 60));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

public function store(Request $request)
{
    // Normalisasi agar "07" -> 7
    $request->merge([
        'bln' => is_null($request->bln) ? null : (int) $request->bln,
        'thn' => is_null($request->thn) ? null : (int) $request->thn,
    ]);

    // 1) Validasi
    $data = $request->validate([
        'type'  => 'required|in:mingguan,bulanan',
        'thn'   => 'required|integer|min:2000|max:2100',
        'bln'   => 'required|integer|between:1,12',
        'tgl_m' => 'nullable|string', // "YYYY-MM-DD&index" untuk mingguan
    ]);

    $type  = $data['type'];
    $bulan = (int) $data['bln'];
    $thn   = (int) $data['thn'];

    // 2) Tentukan periode
    if ($type === 'mingguan') {
        [$tgl_mu, $weekIndexRaw] = explode('&', (string) ($request->tgl_m ?? '')) + [null, -1];
        if (!$tgl_mu) return back()->with('msg', 'danger-Tanggal mulai minggu tidak valid');

        $weekIndex = (int) $weekIndexRaw + 1;
        $start = Carbon::parse($tgl_mu)->startOfDay();
        $end   = (clone $start)->addDays(6)->endOfDay();
        $typex = "minggu ke {$weekIndex}";
    } else {
        // 20 (bulan-1) s/d 19 (bulan ini)
        $start = Carbon::create($thn, $bulan, 20)->subMonth()->startOfDay();
        $end   = Carbon::create($thn, $bulan, 19)->endOfDay();
        $typex = "bulanan";
    }

    // 3) Cek Absensi satpam (peg = 0)
    $existingId = Absensi::where('type', $typex)
        ->where('thn', (string) $thn)
        ->where('bln', (string) $bulan)
        ->where('peg', 0)
        ->value('id');

    if ($existingId) {
        return redirect()->route('absensi.show', $existingId)
            ->with('msg', 'success-berhasil menemukan absensi');
    }

    // 4) Daftar tanggal (string Y-m-d sesuai pools.date = string)
    $periodDays = CarbonPeriod::create($start->toDateString(), $end->toDateString());
    $allDates   = collect($periodDays)->map->toDateString();
    if ($allDates->isEmpty()) {
        return back()->with('msg', 'danger-Periode tanggal kosong');
    }

    // 5) Ambil peserta SATPAM saja + urutkan by id (ganti ke ->orderBy('uid') kalau mau)
    $peserta = Peserta::query()
        ->whereNotNull('type')
        ->where('type', 'Satpam')
        ->orderBy('id', 'asc')
        ->get(['id', 'name', 'nik', 'uid']);

    if ($peserta->isEmpty()) {
        return back()->with('msg', 'danger-Tidak ada peserta Satpam');
    }

    $uids = $peserta->pluck('uid')->map(fn($v) => (string) $v);

    // 6) Libur → map[tanggal => ket]
    $liburMap = Libur::query()->pluck('ket', 'tanggal');

    // 7) Prefetch Pool untuk semua uid & tanggal periode
    $fromDate = $allDates->first();
    $toDate   = $allDates->last();

    $pools = Pool::query()
        ->whereIn('iduser', $uids)
        ->whereBetween('date', [$fromDate, $toDate]) // kolom string Y-m-d
        ->get(['iduser', 'date', 'type', 'time', 'timestamp']);

    // Index-kan supaya O(1): $poolIndex[$uid][$date] = ['in' => ..., 'out' => ...]
    $poolIndex = [];
    foreach ($pools as $rec) {
        $uid  = (string) $rec->iduser;
        $date = (string) $rec->date;
        if (!isset($poolIndex[$uid][$date])) {
            $poolIndex[$uid][$date] = ['in' => null, 'out' => null, 'latest_ts' => $rec->timestamp];
        }
        if ((string) $rec->type === '0') {
            $curIn = $poolIndex[$uid][$date]['in'];
            $poolIndex[$uid][$date]['in'] = is_null($curIn) ? $rec->time : min($curIn, $rec->time);
        } elseif ((string) $rec->type === '1') {
            $curOut = $poolIndex[$uid][$date]['out'];
            $poolIndex[$uid][$date]['out'] = is_null($curOut) ? $rec->time : max($curOut, $rec->time);
        }
        if ($rec->timestamp > $poolIndex[$uid][$date]['latest_ts']) {
            $poolIndex[$uid][$date]['latest_ts'] = $rec->timestamp;
        }
    }

    // 8) Transaksi: buat Absensi (peg=0) + Detail
    DB::beginTransaction();
    try {
        $abs = new Absensi();
        $abs->type        = $typex;
        $abs->tgl_mulai   = $start->toDateTimeString();   // kolom string di schema awal → tetap string
        $abs->tgl_selesai = $end->toDateTimeString();
        $abs->thn         = (string) $thn;
        $abs->bln         = (string) $bulan;
        $abs->peg         = 0; // <— Satpam
        $abs->maker       = Auth::id();
        $abs->save();

        $now   = now()->toDateTimeString();
        $batch = [];

        foreach ($peserta as $p) {
            $uid     = (string) $p->uid;
            $namaNik = "{$p->name}-{$p->nik}";

            $presensiStr = '';
            foreach ($allDates as $d) {
                // Weekend/Libur (ikuti php dayOfWeek: 0=Min,6=Sab)
                $dowPhp   = Carbon::parse($d)->dayOfWeek;
                $isWeekend= ($dowPhp === 0 || $dowPhp === 6);
                $isHoliday= $liburMap->has($d);
                $libur    = ($isWeekend || $isHoliday) ? 1 : 0;

                $pi  = $poolIndex[$uid][$d] ?? null;
                $had = $pi['in']  ?? 0; // "HH:ii:ss" atau 0
                $pul = $pi['out'] ?? 0;

                // Format presensi tetap: Y-m-d_libur_in_out&
                $presensiStr .= "{$d}_{$libur}_{$had}_{$pul}&";
            }

            $batch[] = [
                'id_absen'     => $abs->id,
                'id_peserta'   => (int) $uid, // unsignedBigInteger → cast int
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

        // NB: kamu tadi redirect ke route('satpam.show', $abs->id)
        return redirect()->route('satpam.show', $abs->id)
            ->with('msg', 'success-berhasil membuat absensi');
    } catch (\Throwable $e) {
        DB::rollBack();
        return redirect()->route('satpam.index')
            ->with('msg', 'danger-Gagal euy, karena '.$e->getMessage());
    }
}


    public function storeX(Request $request)
    {
        //dd($request);
        $type = $request->type;
        $bulan = $request->bln;
        $thn = $request->thn;
        $tgl_mz = explode("&", $request->tgl_m);
        $tgl_mu = $tgl_mz[0];
        $mingguke = $tgl_mz[1]+1;
  
        if ($type == "mingguan") {
            $tgl_mulai = $tgl_mu . " 00:00:00";
            $tgl_s = strtotime($tgl_mu);
            $tgl_se = strtotime("+6 day", $tgl_s);
            $typex = "minggu ke ".$mingguke;
        } else {

            $tgl_mul = $thn . '-' . ($bulan - 1) . '-20';
            $tgl_mulai = $tgl_mul . " 00:00:00";
            $tgl_s = $thn . '-' . $bulan . '-19';
            $tgl_se = strtotime($tgl_s);
            $typex = "bulanan";
        }
        $findabs = Absensi::where('type', $typex)->where('thn', $thn)->where('bln', $bulan)->where('peg', 0)->first();
        //dd($findabs);
        if(!is_null($findabs)){
            return redirect( route('absensi.show', $findabs->id))->with('msg', 'success-berhasil menemukan absensi');
        } else {
            $tgl_selesai = date('Y-m-d H:i:s', $tgl_se);
            $list_tgl = dateRange($tgl_mulai, $tgl_selesai);
            //dd($list_tgl);
            $list_peserta = Peserta::orWhereNotNull('type')->Where('type','Satpam')->get(['name', 'nik', 'uid']);
            //dd($list_peserta);
            $now = now()->toDateTimeString();
            $latest = Pool::select('created_at')->orderBy('id', 'DESC')->first()->created_at;
            //dd($latest);
            $abs = new Absensi;
            $abs->type = $typex;
            $abs->tgl_mulai = $tgl_mulai;
            $abs->tgl_selesai = $tgl_selesai;
            $abs->thn = $thn;
            $abs->peg = 0;
            $abs->bln = $bulan;
            $abs->maker = Auth::user()->id;
            $abs->save();


            $json = Libur::all();

            //dd($json);
            $jlibur = [];
            foreach ($json as $sam) {
                    $jlibur[$sam->tanggal] = $sam->ket;
            }
            //dd($jlibur);
            $absDArray = [];
            foreach ($list_peserta as $pes) {
                $presensi = "";
                foreach ($list_tgl as $tgl) {
                    $date = new \DateTime($tgl);
                    $cek = isset($jlibur[$date->format("Y-m-d")]) ? true : false;
                    $tglx = date('w', strtotime($tgl));
                    if ($tglx == '0' || $tglx == '6' || $cek) {
                        $libur = 1;
                    } else {
                        $libur = 0;
                    }

                    $come = Pool::Where('iduser', $pes->uid)->where('date', $tgl)->where("type", '0')->orderby('time', 'ASC')->first();
                    if (!is_null($come)) {
                           $hade = $come->time;

                    } else {
                        $hade = 0;
                    }

                    $go = Pool::Where('iduser', $pes->uid)->where('date', $tgl)->where("type", '1')->orderby('time', 'DESC')->first();
                    if (!is_null($go)) {
                        $pule = $go->time;
                    } else {
                        $pule = 0;
                    }
                    // pindah ke loop tgl

                    //$latst = new \DateTime($go->created_at);
                    if ($date > $latest) {
                        $over = 1;
                    } else {
                        $over = 0;
                    }
                    //if((!$libur && $pes->uid == "15" && !$over) || (!$libur &&$pes->uid == "44" && !$over) || (!$libur &&$pes->uid == "54" && !$over) )
                    $ffff = false;
                    if ($ffff) {
                        $had = "07:" . rand(10, 59) . ":" . rand(10, 59);
                        $pul = "17:" . rand(10, 59) . ":" . rand(10, 59);
                    } else {
                        $had = $hade;
                        $pul = $pule;
                    }
                    $presensi .= $tgl . "_" . $libur . "_" . $had . "_" . $pul . "&";

                }
                $absDArray [] = [
                    'id_absen' => $abs->id,
                    'id_peserta' => $pes->uid,
                    'data_peserta' => $pes->name . "-" . $pes->nik,
                    'presensi' => $presensi,
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            }
            //dd($absDArray);
            DetailAbsen::insert($absDArray);
            return redirect(route('satpam.show', $abs->id))->with('msg', 'success-berhasil membuat absensi');
        }
        return redirect(route('satpam.index'))->with('msg', 'success-berhasil membuat absensi');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $satpam = Absensi::find($id);
        $detailArray = DetailAbsen::where('id_absen', $id)->get();
        //dd($detailArray);
        return view('page.detailAbsenS', ["list" => $detailArray, 'absen' => $satpam]);
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
        DetailAbsen::where('id_absen', $id)->delete();
        Absensi::find($id)->delete();
        return redirect(route('satpam.index'))->with('msg', 'success-berhasil menghapus absensi');
    }

    public function showRekap(Absensi $absensi)
    {


        //dd($tgllist);
        $dataAbsen = DetailAbsen::where('id_absen', $absensi->id)->get();

        $dataa= $dataAbsen[0];
        //dd($dataa);

        $datay = explode("&",$dataa->presensi);
        array_pop($datay);
        $tgllist = [];

        foreach($datay as $prey) {
            $prez = explode("_", $prey);

                $tgllist [] = $prez[0];

        }
        array_push($tgllist, "rekap");

        $detailArray =[];
        $f = 1;
        $h = 0.8;
        $t =0;
        foreach($dataAbsen as $data){

            $presensi = 0;
            $presnsiArray = [];
            $datax = explode("&",$data->presensi);
            array_pop($datax);
            foreach($datax as $pre){
                $pres = explode("_",$pre);

                    if (($pres[2] <> 0) && ($pres[3] <> 0)) {
                        $in=  new \DateTime($pres[2]);
                        $out=  new \DateTime($pres[3]);
                        $dif = $in->diff($out);
                        if ($dif->invert == 1) {
                            if($dif->h < 1){
                                 $mil = 300 / 60;
                                $presensi += 300;
                                 $presnsiArray [] = "salah absen-".$mil;
                            } else {
                            $mid = new \DateTime("00:00:01");
                            $beda1 = $mid->diff($out);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;

                            $mid2 = new \DateTime("23:59:59");
                            $beda2 = $mid2->diff($in);
                            $menit2 = ($beda2->h * 60);
                            $menit2 += $beda2->i;

                            $men = $menit + $menit2;
                            if( $men > 720) {
                                $mil = 720/60;
                                $presensi += 720;
                            } else {
                                $mil = $men/60;
                                $presensi += $men;
                            }
                            $presnsiArray [] = "malam x malam-".$mil;
                            }
                        } else {
                            $menit = ($dif->h * 60);
                            $menit += $dif->i;
                            $men = $menit;
                            if( $men > 720) {
                                $mil =720/60;
                                $presensi += 720;
                            } else {
                                $mil = $men/60;
                                $presensi += $men;
                            }
                            $presnsiArray [] = "Siang-".$mil;
                        }

                    } else if (($pres[2] == 0) && ($pres[3] <> 0)) {
                        $mid = new \DateTime("00:00:01");
                        $out=  new \DateTime($pres[3]);
                        $mid2 = new \DateTime("12:00:01");
                        $bedax = $mid2->diff($out);
                        if($bedax->invert == 1) {
                            $beda1 = $mid->diff($out);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if( $men > 420) {
                                $mil = 420/60;
                                $presensi += 420;
                            } else {
                                $mil = $men/60;
                                $presensi += $men;
                            }
                            $presnsiArray [] = "Malam x Libur-".$mil;
                        } else {
                            $beda1 = $mid2->diff($out);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if( $men > 420) {
                                $mil = 420/60;
                                $presensi += 420;
                            } else {
                                $mil = $men/60;
                                $presensi += $men;
                            }
                            $presnsiArray [] = "tidak absen pagi-".$mil;
                        }

                    } else if (($pres[2] <> 0) && ($pres[3] == 0)) {
                        $mid = new \DateTime("23:59:59");
                        $in=  new \DateTime($pres[2]);
                        $mid2 = new \DateTime("12:00:01");
                        $bedax = $mid2->diff($in);
                        if($bedax->invert == 0) {
                            $beda1 = $mid->diff($in);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if ($men > 300) {
                                $mil = 300 / 60;
                                $presensi += 300;
                            } else {
                                $mil = $men / 60;
                                $presensi += $men;
                            }
                            $presnsiArray [] = "libur x malam-" . $mil;
                        }else{
                            $beda1 = $mid2->diff($in);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if ($men > 300) {
                                $mil = 300 / 60;
                                $presensi += 300;
                            } else {
                                $mil = $men / 60;
                                $presensi += $men;
                            }
                            $presnsiArray [] = "tidak absen sore-" . $mil;
                        }
                    }else {
                        $presnsiArray [] = "libur";
                        $presensi += 0;
                    }


            }
            //$harga = floor($presensi/60/8) * 35000;
            $rekap = "(".($presensi/60)." jam)";

            array_push($presnsiArray,$rekap);
            $detailArray [$data->data_peserta] = $presnsiArray;
        }
        //dd($detailArray);



        //dd($tgllist);
        return view('page.detailRekapS', ["list" => $detailArray, "tgls"=>$tgllist, 'rekap'=>$absensi]);
    }
    Public function detail($id){
        $dataUser = DetailAbsen::find($id);
        $absen = Absensi::find($dataUser->id_absen);
        //dd($absen);
        return view('page.detailUserS', ["list"=> $dataUser, "absen"=> $absen]);
        //dd($absen);

    }

    Public function detailpdf($id){
        $dataUser = DetailAbsen::find($id);
        $peserta = explode("-",$dataUser->data_peserta);
        $absen = Absensi::find($dataUser->id_absen);
        $nama = $peserta[0]."_".$absen->type."_".$absen->bln."_".$absen->thn;
        //dd($absen);
        //return view('page.detailUser', ["list"=> $dataUser, "absen"=> $absen]);
        $pdf = PDF::loadview('pdf.detail_satpam_pdf',["list"=> $dataUser, "absen"=> $absen]);
        return $pdf->download('detail_satpam_'.$nama.'');
        //dd($absen);

    }
}
