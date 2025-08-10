<?php

namespace App\Http\Controllers;

use App\Models\Cs;
use App\Models\Pool;
use App\Models\Absensi;
use App\Models\Peserta;
use App\Models\DetailAbsen;
use App\Models\Libur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class CsController extends Controller
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
        $list = Absensi::where('peg', '2')->get();
        return view('page.ListcsAbsensi', ["list" => $list, "year"=> $year, "month"=> $month]);
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
        //dd($request);
        $type = $request->type;
        $bulan = $request->bln;
        $thn = $request->thn;
        $tgl_mz = explode("&", $request->tgl_m);
        $tgl_mu = $tgl_mz[0];
        $mingguke = $tgl_mz[1]+1;
//dd($mingguke);
        if ($type == "mingguan") {
            $tgl_mulai = $tgl_mu . " 00:00:00";
            $tgl_s = strtotime($tgl_mu);
            $tgl_se = strtotime("+6 day", $tgl_s);
            $typex = "minggu ke ".$mingguke;
        } else {

            $tgl_mul = $thn . '-' . ($bulan - 1) . '-26';
            $tgl_mulai = $tgl_mul . " 00:00:00";
            $tgl_s = $thn . '-' . $bulan . '-25';
            $tgl_se = strtotime($tgl_s);
            $typex = "bulanan";
        }
        $findabs = Absensi::where('type', $typex)->where('thn', $thn)->where('bln', $bulan)->where('peg', 2)->first();
        //dd($findabs);
        if(!is_null($findabs)){
            return redirect( route('cs.show', $findabs->id))->with('msg', 'success-berhasil menemukan absensi');
        } else {
            $tgl_selesai = date('Y-m-d H:i:s', $tgl_se);
            $list_tgl = dateRange($tgl_mulai, $tgl_selesai);
            //dd($list_tgl);
            $list_peserta = Peserta::orWhereNotNull('type')->Where('type','cs')->get(['name', 'nik', 'uid']);
            //dd($list_peserta);
            $now = now()->toDateTimeString();
            $latest = Pool::select('created_at')->orderBy('id', 'DESC')->first()->created_at;
            //dd($latest);
            $abs = new Absensi;
            $abs->type = $typex;
            $abs->tgl_mulai = $tgl_mulai;
            $abs->tgl_selesai = $tgl_selesai;
            $abs->thn = $thn;
            $abs->peg = 2;
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
            return redirect(route('cs.show', $abs->id))->with('msg', 'success-berhasil membuat absensi');
        }
        return redirect(route('cs.index'))->with('msg', 'success-berhasil membuat absensi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cs  $cs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cs = Absensi::find($id);
        $detailArray = DetailAbsen::where('id_absen', $id)->get();
        //dd($detailArray);
        return view('page.detailAbsenC', ["list" => $detailArray, 'absen' => $cs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cs  $cs
     * @return \Illuminate\Http\Response
     */
    public function edit(Cs $cs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cs  $cs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cs $cs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cs  $cs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailAbsen::where('id_absen', $id)->delete();
        Absensi::find($id)->delete();
        return redirect(route('cs.index'))->with('msg', 'success-berhasil menghapus absensi');
    }

    Public function detail($id){
        $dataUser = DetailAbsen::find($id);
        $absen = Absensi::find($dataUser->id_absen);
        //dd($absen);
        return view('page.detailUserCs', ["list"=> $dataUser, "absen"=> $absen]);
        //dd($absen);

    }
    Public function detailpdf($id){
        $dataUser = DetailAbsen::find($id);
        $peserta = explode("-",$dataUser->data_peserta);
        $absen = Absensi::find($dataUser->id_absen);
        $nama = $peserta[0]."_".$absen->type."_".$absen->bln."_".$absen->thn;
        //dd($absen);
        //return view('page.detailUser', ["list"=> $dataUser, "absen"=> $absen]);
        $pdf = PDF::loadview('pdf.detail_cs_pdf',["list"=> $dataUser, "absen"=> $absen]);
        return $pdf->download('detail_cs_'.$nama.'');
        //dd($absen);

    }
}
