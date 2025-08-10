<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Notulensi;
use App\Models\Peserta;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PDF;

class PresensiController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dekan = Peserta::where('jabatan', "Dekanat")->get();
        $dosen = Peserta::where('jabatan', "Dosen")->get();
        $tendik = Peserta::where('jabatan', "Tendik")->get();
        $lainnya = Peserta::where('jabatan', "Lainnya")->get();
        return view('page.ListPresensi', ['list'=> Presensi::where('user_id', Auth::user()->id)->get()->sortByDesc('id'), 'dekanat'=> $dekan, 'dosen'=>$dosen, 'tendik'=> $tendik, 'lainnya'=> $lainnya]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       //dd($request);
        $press = New Presensi;
        $press->name = $request->name;
        $press->tanggal = $request->tanggal;
        $press->tempat = $request->tempat;
        $press->agenda = $request->agenda;
        $press->peserta_id = $request->peserta_id;
        $press->user_id = Auth::user()->id;
        $press->save();
        $random = Str::random(20);
        $hadir = new Kehadiran;
        $hadir->presensi_id = $press->id;
        $hadir->peserta_id = $request->peserta_id;
        $hadir->slug = $random;
        $hadir->save();
        return redirect( route('presensi.index'))->with('msg','success-berhasil menambahkan Presensi');
    }
    public function isi($id)
    {
        $dekan = Peserta::where('jabatan', "Dekanat")->get();
        $dosen = Peserta::where('jabatan', "Dosen")->get();
        $tendik = Peserta::where('jabatan', "Tendik")->get();
        $lainnya = Peserta::where('jabatan', "Lainnya")->get();
        $peserta = Kehadiran::where('presensi_id', $id)->get();
        $pres =Presensi::find($id);

        return view('page.ListKehadiran', ['dekanat'=> $dekan, 'dosen'=>$dosen, 'tendik'=> $tendik, 'pres'=>$pres, 'lainnya'=> $lainnya, 'pid'=>$id, 'peserta'=>$peserta]);
    }
    public function printpdf($id)
    {
        $peserta = Kehadiran::where('presensi_id', $id)->get();
        $presensi = Presensi::find($id);
        $pdf = PDF::loadview('pdf.rapat_pdf',['peserta'=>$peserta , 'presensi'=>$presensi]);
        return $pdf->download('Presensi '.$presensi->name.'');
    }

    public function destroy(Presensi $presensi)
    {
        $kehadiran = Kehadiran::where('presensi_id', $presensi->id)->get();
        foreach ($kehadiran as $file){
            $path = "assets/img/".$file->sign;
            if(Storage::disk('public')->exists($file->sign)){
                Storage::disk('public')->delete($file->sign);
            }
        }
        //dd($kehadiran);
        Kehadiran::where('presensi_id', $presensi->id)->delete();
        Notulensi::where('presensi_id', $presensi->id)->delete();
        $presensi->delete();
        return redirect( route('presensi.index'))->with('msg','success-berhasil menghapus Presensi');
    }

    Public function sendnotif ( $slug, $pid){
        $kehadiran = Kehadiran::where('slug',$slug)->first();
        $peserta = $kehadiran->pesertas()->first();
        $rapats = $kehadiran->rapat()->first();
        $waktu=gmdate("H:i",time()+7*3600);
            $t=explode(":",$waktu);
            $jam=$t[0];
            $menit=$t[1];

            if ($jam >= 00 and $jam < 10 ){
            if ($menit >00 and $menit<60){
            $ucapan="Selamat Pagi";
            }
            }else if ($jam >= 10 and $jam < 15 ){
            if ($menit >00 and $menit<60){
            $ucapan="Selamat Siang";
            }
            }else if ($jam >= 15 and $jam < 18 ){
            if ($menit >00 and $menit<60){
            $ucapan="Selamat Sore";
            }
            }else if ($jam >= 18 and $jam <= 24 ){
            if ($menit >00 and $menit<60){
            $ucapan="Selamat Malam";
            }
            }else {
            $ucapan="Hi";

            }
        $nomor = tilpun('0'.$peserta->telp);
        $msg = $ucapan." ".$peserta->name.", ijin melampirkan link untuk ttd Rapat ".$rapats->name." hari ini. Terimakasih banyak. ". route('hadir', $slug)." Jika Link tidak dapat dibuka, *mohon hilangkan huruf 's' pada https: menjadi http: di url browser anda*";
       $r = sendWA($nomor, $msg);
       $pesan = json_decode($r);
       return Redirect (route('presensi.isi', $pid))->with('msg','success-'.$pesan->msg);

    }


}
