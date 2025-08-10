<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\DetailAbsen;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Pod;
use App\Models\Setting;
use App\Models\Libur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $year = Pool::select('year')->distinct()->get();
        $month = Pool::select('month')->distinct()->get();
        //dd($month);
        $list = Absensi::where('peg', '1')->get();
        return view('page.ListAbsensi', ["list" => $list, "year"=> $year, "month"=> $month]);
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
     * @param \Illuminate\Http\Request $request
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

            $tgl_mul = $thn . '-' . ($bulan - 1) . '-20';
            $tgl_mulai = $tgl_mul . " 00:00:00";
            $tgl_s = $thn . '-' . $bulan . '-19';
            $tgl_se = strtotime($tgl_s);
            $typex = "bulanan";
        }
        $findabs = Absensi::where('type', $typex)->where('thn', $thn)->where('bln', $bulan)->where('peg', 1)->first('id');
        //dd($findabs);
        if(!is_null($findabs)){
            return redirect( route('absensi.show', $findabs->id))->with('msg', 'success-berhasil menemukan absensi');
        } else {

            DB::beginTransaction();
            try{

            
            $tgl_selesai = date('Y-m-d H:i:s', $tgl_se);
            $list_tgl = dateRange($tgl_mulai, $tgl_selesai);
            //dd($list_tgl);
            $list_peserta = Peserta::orWhereNotNull('type')->Where('type','<>','Satpam')->Where('type','<>','cs')->get(['name', 'nik', 'uid']);
            //dd($list_peserta);
            $now = now()->toDateTimeString();
            $latest = Pool::select('created_at')->orderBy('id', 'DESC')->first()->created_at;
            //dd($latest);
            $abs = new Absensi;
            $abs->type = $typex;
            $abs->tgl_mulai = $tgl_mulai;
            $abs->tgl_selesai = $tgl_selesai;
            $abs->thn = $thn;
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

                    $come = Pool::Where('iduser', $pes->uid)->where('date', $tgl)->where("type", '0')->orderby('time', 'ASC')->first('time');
                    if (!is_null($come)) {
                        $hade = $come->time;
                    } else {
                        $hade = 0;
                    }

                    $go = Pool::Where('iduser', $pes->uid)->where('date', $tgl)->where("type", '1')->orderby('time', 'DESC')->first('time');
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

                    $hak = Pod::where('user_id', $pes->uid)->where('tanggal', $tgl)->first('id');
                    if (!is_null($hak)) {
                        $hek = 1;
                    } else {
                        $hek = 0;
                    }

                     $ffff = false;
                     if ($ffff) {
                    //if((!$libur && $pes->uid == "15" && !$over) || (!$libur &&$pes->uid == "44" && !$over) || (!$libur &&$pes->uid == "54" && !$over) ){
                        //if(!$libur && !$over && !$hek && ( $pes->uid == "15" || $pes->uid == "44" || $pes->uid == "54" ) ){
                    
                        $had = "0".rand(6,8).":" . rand(10, 59) . ":" . rand(10, 59);
                        $pul = "1".rand(7,8).":" . rand(10, 59) . ":" . rand(10, 59);
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
            DB::commit();
            return redirect(route('absensi.show', $abs->id))->with('msg', 'success-berhasil membuat absensi');

            }catch (\Exception $e) {
                DB::rollback();
                return redirect(route('absensi.index'))->with('msg', 'danger-Gagal euy,karena '.$exception->getMessage().'kasih tau mas admin yah');
            }
        }
        return redirect(route('absensi.index'))->with('msg', 'success-berhasil membuat absensi');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Absensi $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        $list_tgl=dateRange( $absensi->tgl_mulai, $absensi->tgl_selesai);
             $detailArray = DetailAbsen::where('id_absen', $absensi->id)->get();
        //dd($detailArray);
        return view('page.detailAbsen', ["list" => $detailArray, 'absen' => $absensi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Absensi $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Absensi $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Absensi $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        DetailAbsen::where('id_absen', $absensi->id)->delete();
        $absensi->delete();
        return redirect(route('absensi.index'))->with('msg', 'success-berhasil menghapus absensi');
    }
    /**
     * Display the specified resource.
     * lihat rekap absen untuk 1 jenis absensi bisa bulan dan minggu
     * @param \App\Models\Absensi $absensi
     * @return \Illuminate\Http\Response
     */
    public function showRekap(Absensi $absensi)
    {
        $btsd = Setting::where('name','jam_datang_karyawan')->first()->value;
        $btsp = Setting::where('name','jam_pulang_karyawan')->first()->value;

        //dd($tgllist);
            $dataAbsen = DetailAbsen::where('id_absen', $absensi->id)->get();

            $dataa= $dataAbsen[0];
        //dd($dataa);

        $datay = explode("&",$dataa->presensi);
        array_pop($datay);
        $tgllist = [];

        foreach($datay as $prey) {
            $prez = explode("_", $prey);
            if($prez[1]==0) {
                $tgllist [] = $prez[0];
            }
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
                    if($pres[1]==0) {
                        if (($pres[2] == 0) && ($pres[3] == 0)) {
                            $presnsiArray [] = "Tidak Hadir";
                            $presensi += $t;
                        } else if (($pres[2] <> 0) && ($pres[3] <> 0)) {
                            $dtg = strtotime($pres[2]);
                            $plg = strtotime($pres[3]);
                            $limd = strtotime($btsd);
                            $limp = strtotime($btsp);
                            if ($dtg < $limd && $plg > $limp) {
                            $presnsiArray [] = "Tepat waktu";
                            $presensi += $f;
                            } else  {
                                $presnsiArray [] = "Hadir";
                                $presensi += $h;
                            }
                        } else {
                            $presnsiArray [] = "Hadir";
                            $presensi += $h;
                        }

                    }
                }
                $harga = $presensi * 35000;
                $rekap = $presensi ." hari";

                 array_push($presnsiArray,$rekap);
                 $detailArray [$data->data_peserta] = $presnsiArray;
            }




        //dd($tgllist);
        return view('page.detailRekap', ["list" => $detailArray, "tgls"=>$tgllist, 'rekap'=>$absensi]);
    }

    Public function detail($id){
        $dataUser = DetailAbsen::find($id);
        $absen = Absensi::find($dataUser->id_absen);
        //dd($absen);
        return view('page.detailUser', ["list"=> $dataUser, "absen"=> $absen]);
        //dd($absen);

    }
    Public function detailpdf($id){
        $dataUser = DetailAbsen::find($id);
        $peserta = explode("-",$dataUser->data_peserta);
        $absen = Absensi::find($dataUser->id_absen);
        $nama = $peserta[0]."_".$absen->type."_".$absen->bln."_".$absen->thn;
        //dd($absen);
        //return view('page.detailUser', ["list"=> $dataUser, "absen"=> $absen]);
        $pdf = PDF::loadview('pdf.detail_user_pdf',["list"=> $dataUser, "absen"=> $absen]);
        return $pdf->download('detail_'.$nama.'');
        //dd($absen);

    }

}
