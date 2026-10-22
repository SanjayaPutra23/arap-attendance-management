<?php

namespace App\Http\Controllers;

use App\Exports\ExAbsen;
use App\Exports\ExRekap;
use App\Exports\ExDetail;
use App\Exports\ExDetailS;
use App\Exports\PPdetailExport;
use App\Models\Absensi;
use App\Models\DetailAbsen;
use App\Models\Peserta;
use App\Models\Persepsi;
use App\Models\DetailPersepsi;
use App\Models\Setting;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
        return redirect()->route('home');
    }


    public function absen(Absensi $absensi)
    {

        $nama = $absensi->type."_".namabulan($absensi->bln)."-".$absensi->thn;

        $list_tgl=dateRange( $absensi->tgl_mulai, $absensi->tgl_selesai);
        $detailArray = DetailAbsen::where('id_absen', $absensi->id)
            ->orderByRaw("CASE WHEN LOWER(data_peserta) LIKE '%riski%' THEN 1 ELSE 0 END, id ASC")
            ->get();
        return Excel::download(new ExAbsen($detailArray, $list_tgl), 'Data_'.$nama.'.xlsx');

    }

    public function absenS(Absensi $absensi)
    {

        $nama = $absensi->type."_".namabulan($absensi->bln)."-".$absensi->thn;

        $list_tgl=dateRange( $absensi->tgl_mulai, $absensi->tgl_selesai);
        $detailArray = DetailAbsen::where('id_absen', $absensi->id)->get();
        return Excel::download(new ExAbsen($detailArray, $list_tgl), 'Data_Satpam_'.$nama.'.xlsx');

    }
    public function rekap(Absensi $absensi)
    {
        $nama = $absensi->type." ".namabulan($absensi->bln)."-".$absensi->thn;

        $dataAbsen = DetailAbsen::where('id_absen', $absensi->id)
            ->orderByRaw("CASE WHEN LOWER(data_peserta) LIKE '%riski%' THEN 1 ELSE 0 END, id ASC")
            ->get();

        if ($dataAbsen->isEmpty()) {
            return Excel::download(new ExRekap([], ['rekap']), 'Rekap_'.$nama.'.xlsx');
        }

        $dataa = $dataAbsen->first();
        $datay = explode("&", $dataa->presensi);
        array_pop($datay);
        $tgllist = [];

        foreach($datay as $prey) {
            $prez = explode("_", $prey);
            if(isset($prez[1]) && $prez[1] == 0) {
                $tgllist[] = $prez[0];
            }
        }
        array_push($tgllist, "rekap");

        $settings = Setting::pluck('value', 'name');
        $pesertaMap = Peserta::whereIn('uid', $dataAbsen->pluck('id_peserta'))->pluck('jabatan', 'uid');

        $detailArray = [];
        $f = 1;
        $h = 0.8;
        $t = 0;

        foreach($dataAbsen as $data) {
            $jabatanUser = strtolower($pesertaMap[$data->id_peserta] ?? ($absensi->peg == 2 ? 'kebersihan' : 'persiapan'));
            $btsd = $settings['jam_datang_' . $jabatanUser] ?? ($absensi->peg == 2 ? ($settings['jam_datang_kebersihan'] ?? '08:00:00') : ($settings['jam_datang_persiapan'] ?? '08:00:00'));
            $btsp = $settings['jam_pulang_' . $jabatanUser] ?? ($absensi->peg == 2 ? ($settings['jam_pulang_kebersihan'] ?? '15:00:00') : ($settings['jam_pulang_persiapan'] ?? '17:00:00'));

            $presensi = 0;
            $presnsiArray = [];
            $datax = explode("&", $data->presensi);
            array_pop($datax);

            foreach($datax as $pre) {
                $pres = explode("_", $pre);
                if(isset($pres[1]) && $pres[1] == 0) {
                    $datang = $pres[2] ?? 0;
                    $pulang = $pres[3] ?? 0;

                    if ($datang == 0 && $pulang == 0) {
                        $presnsiArray[] = "Tidak Hadir";
                        $presensi += $t;
                    } else if ($datang != 0 && $pulang != 0) {
                        $dtg = strtotime($datang);
                        $plg = strtotime($pulang);
                        $limd = strtotime($btsd);
                        $limp = strtotime($btsp);

                        $tepatWaktu = false;
                        if ($limd && $limp) {
                            if ($limp < $limd) { // Cross midnight (e.g. Ompreng)
                                $dtgOnTime = ($dtg <= $limd || $dtg >= strtotime("12:00:00"));
                                $plgOnTime = ($plg >= $limp && $plg < strtotime("12:00:00"));
                                $tepatWaktu = ($dtgOnTime && $plgOnTime);
                            } else {
                                $tepatWaktu = ($dtg <= $limd && $plg >= $limp);
                            }
                        }

                        if ($tepatWaktu) {
                            $presnsiArray[] = "Tepat Waktu";
                            $presensi += $f;
                        } else {
                            $presnsiArray[] = "Hadir";
                            $presensi += $h;
                        }
                    } else {
                        $presnsiArray[] = "Hadir";
                        $presensi += $h;
                    }
                }
            }
            $rekap = $presensi . " Hari";
            array_push($presnsiArray, $rekap);
            $detailArray[$data->data_peserta] = $presnsiArray;
        }

        return Excel::download(new ExRekap($detailArray, $tgllist), 'Rekap_'.$nama.'.xlsx');
    }

    private function abjad($n) {
        $r = '';
        for ($i = 1; $n >= 0 && $i < 10; $i++) {
        $r = chr(0x41 + ($n % pow(26, $i) / pow(26, $i - 1))) . $r;
        $n -= pow(26, $i);
        }
        return $r;
    }

    public function rekap2(Absensi $absensi)
    {
        $nama = $absensi->type." ".namabulan($absensi->bln)."-".$absensi->thn;

        $dataAbsen = DetailAbsen::where('id_absen', $absensi->id)
            ->orderByRaw("CASE WHEN LOWER(data_peserta) LIKE '%riski%' THEN 1 ELSE 0 END, id ASC")
            ->get();

        if ($dataAbsen->isEmpty()) {
            return Excel::download(new ExRekap([], ['rekap']), 'Hitungan_Rekap_'.$nama.'.xlsx');
        }

        $dataa = $dataAbsen->first();
        $datay = explode("&", $dataa->presensi);
        array_pop($datay);
        $tgllist = [];

        foreach($datay as $prey) {
            $prez = explode("_", $prey);
            if(isset($prez[1]) && $prez[1] == 0) {
                $tgllist[] = $prez[0];
            }
        }
        array_push($tgllist, "rekap");

        $settings = Setting::pluck('value', 'name');
        $pesertaMap = Peserta::whereIn('uid', $dataAbsen->pluck('id_peserta'))->pluck('jabatan', 'uid');

        $detailArray = [];
        $f = 1;
        $h = 0.8;
        $t = 0;
        $line = 3;

        foreach($dataAbsen as $data) {
            $jabatanUser = strtolower($pesertaMap[$data->id_peserta] ?? ($absensi->peg == 2 ? 'kebersihan' : 'persiapan'));
            $btsd = $settings['jam_datang_' . $jabatanUser] ?? ($absensi->peg == 2 ? ($settings['jam_datang_kebersihan'] ?? '08:00:00') : ($settings['jam_datang_persiapan'] ?? '08:00:00'));
            $btsp = $settings['jam_pulang_' . $jabatanUser] ?? ($absensi->peg == 2 ? ($settings['jam_pulang_kebersihan'] ?? '15:00:00') : ($settings['jam_pulang_persiapan'] ?? '17:00:00'));

            $presensi = 0;
            $presnsiArray = [];
            $datax = explode("&", $data->presensi);
            array_pop($datax);

            foreach($datax as $pre) {
                $pres = explode("_", $pre);
                if(isset($pres[1]) && $pres[1] == 0) {
                    $datang = $pres[2] ?? 0;
                    $pulang = $pres[3] ?? 0;

                    if ($datang == 0 && $pulang == 0) {
                        $presnsiArray[] = $t;
                        $presensi += $t;
                    } else if ($datang != 0 && $pulang != 0) {
                        $dtg = strtotime($datang);
                        $plg = strtotime($pulang);
                        $limd = strtotime($btsd);
                        $limp = strtotime($btsp);

                        $tepatWaktu = false;
                        if ($limd && $limp) {
                            if ($limp < $limd) { // Cross midnight
                                $dtgOnTime = ($dtg <= $limd || $dtg >= strtotime("12:00:00"));
                                $plgOnTime = ($plg >= $limp && $plg < strtotime("12:00:00"));
                                $tepatWaktu = ($dtgOnTime && $plgOnTime);
                            } else {
                                $tepatWaktu = ($dtg <= $limd && $plg >= $limp);
                            }
                        }

                        if ($tepatWaktu) {
                            $presnsiArray[] = $f;
                            $presensi += $f;
                        } else {
                            $presnsiArray[] = $h;
                            $presensi += $h;
                        }
                    } else {
                        $presnsiArray[] = $h;
                        $presensi += $h;
                    }
                }
            }
            $jmlrek = count($presnsiArray) + 2;
            $abi = $this->abjad($jmlrek);
            $rekap = "=sum(D".$line.":".$abi.$line.")";
            array_push($presnsiArray, $rekap);
            $detailArray[$data->data_peserta] = $presnsiArray;
            $line++;
        }

        return Excel::download(new ExRekap($detailArray, $tgllist), 'Hitungan_Rekap_'.$nama.'.xlsx');
    }

    public function rekapS(Absensi $absensi)
    {

        $nama = $absensi->type." ".namabulan($absensi->bln)."-".$absensi->thn;


        //dd($tgllist);
        $dataAbsen = DetailAbsen::where('id_absen', $absensi->id)->get();
        $dataa= $dataAbsen[0];
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
                                 $presnsiArray [] = "Salah absen";
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
                        $presnsiArray [] = "Malam x Malam";
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
                        $presnsiArray [] = "Siang";
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
                        $presnsiArray [] = "Malam x Libur";
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
                        $presnsiArray [] = "Tidak absen pagi";
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
                        $presnsiArray [] = "Libur x Malam";
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
                        $presnsiArray [] = "Tidak absen sore";
                    }
                }else {
                    $presnsiArray [] = "libur";
                    $presensi += 0;
                }


            }
            //$harga = floor($presensi/60/8) * 35000;
            $rekap = "(".floor($presensi/60)." jam)";

            array_push($presnsiArray,$rekap);
            $detailArray [$data->data_peserta] = $presnsiArray;
        }
        return Excel::download(new ExRekap($detailArray, $tgllist), 'Rekap_satpam_'.$nama.'.xlsx');

    }

    public function rekap2S(Absensi $absensi)
    {

        $nama = $absensi->type." ".namabulan($absensi->bln)."-".$absensi->thn;


        //dd($tgllist);
        $dataAbsen = DetailAbsen::where('id_absen', $absensi->id)->get();
        $dataa= $dataAbsen[0];
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
        $zz =2;

            foreach($dataAbsen as $data){
                $zz++;
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
                                $presensi += $mil;
                                 $presnsiArray [] = $mil;
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
                                $presensi += $mil;
                            } else {
                                $mil = $men/60;
                                $presensi += $mil;
                            }
                            $presnsiArray [] = $mil;
                        }
                        } else {
                            $menit = ($dif->h * 60);
                            $menit += $dif->i;
                            $men = $menit;
                            if( $men > 720) {
                                $mil =720/60;
                                $presensi += $mil;
                            } else {
                                $mil = $men/60;
                                $presensi += $mil;
                            }
                            $presnsiArray [] = $mil;
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
                                $presensi += $mil;
                            } else {
                                $mil = $men/60;
                                $presensi += $mil;
                            }
                            $presnsiArray [] = $mil;
                        } else {
                            $beda1 = $mid2->diff($out);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if( $men > 420) {
                                $mil = 420/60;
                                $presensi += $mil;
                            } else {
                                $mil = $men/60;
                                $presensi += $mil;
                            }
                            $presnsiArray [] = $mil;
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
                                $presensi += $mil;
                            } else {
                                $mil = $men / 60;
                                $presensi += $mil;
                            }
                            $presnsiArray [] = $mil;
                        }else{
                            $beda1 = $mid2->diff($in);
                            $menit = ($beda1->h * 60);
                            $menit += $beda1->i;
                            $men = $menit;
                            if ($men > 300) {
                                $mil = 300 / 60;
                                $presensi += $mil;
                            } else {
                                $mil = $men / 60;
                                $presensi += $mil;
                            }
                            $presnsiArray [] = $mil;
                        }
                    }else {
                        $presnsiArray [] = 0;
                        $presensi += 0;
                    }
                }

                $jmlrek = count($presnsiArray) +2;
                $abi = $this->abjad($jmlrek);
                $rekap = "=sum(D".$zz.":".$abi.$zz.")";
                array_push($presnsiArray,$rekap);
                $detailArray [$data->data_peserta] = $presnsiArray;

        }

        //dd($detailArray);
        return Excel::download(new ExRekap($detailArray, $tgllist), 'Hitungan_Rekap_satpam_'.$nama.'.xlsx');

    }

    public function detailK($id){
        $detailArray = DetailAbsen::find($id);
        $peserta = explode("-",$detailArray->data_peserta);

        $absen = Absensi::find($detailArray->id_absen);
        $nama = $peserta[0]."_".$absen->type."_".$absen->bln."_".$absen->thn;
        //dd($absen);
        return Excel::download(new ExDetail($detailArray, $absen), 'Detail_'.$nama.'.xlsx');
    }
    public function detailS($id){
        $detailArray = DetailAbsen::find($id);
        $peserta = explode("-",$detailArray->data_peserta);

        $absen = Absensi::find($detailArray->id_absen);
        $nama = $peserta[0]."_".$absen->type."_".$absen->bln."_".$absen->thn;
        //dd($absen);
        return Excel::download(new ExDetailS($detailArray, $absen), 'Detail_Satpam_'.$nama.'.xlsx');
    }

    public function detailPP($id){
        $persepsi = Persepsi::find($id);
        $rows = DetailPersepsi::where('id_persepsis', $id)
            ->with('mesin:id,name')        // pastikan relasi ada: belongsTo(Mesin::class, 'alamat' atau 'mesin_id'?)
            ->orderBy('alamat')          // sesuaikan nama FK ke mesin (mis. 'alamat' kalau itu menyimpan mesin_id)
            ->orderBy('sesi')
            ->orderBy('jam')
            ->get();

        // Map: mesin_id => nama mesin (fallback ke id)
        $mesinNames = $rows->pluck('mesin.name', 'alamat')->toArray();

        // Group: [mesin_id => [sesi => Collection<rows>]]
        $grouped = $rows->groupBy('alamat')->map(fn($g) => $g->groupBy('sesi'));

      return Excel::download(new PPdetailExport($grouped, $mesinNames, $persepsi), 'Kehadiran_Persamaan_Persepsi_'.tgl($persepsi->tanggal).'.xlsx');
        
    }

}
