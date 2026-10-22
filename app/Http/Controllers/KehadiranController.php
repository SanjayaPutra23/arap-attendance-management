<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Notulensi;
use App\Models\Peserta;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PDF;

class KehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = Presensi::withCount([
            'kehadirans',
            'kehadirans as hadir_count' => function ($q) {
                $q->whereNotNull('sign');
            }
        ]);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('agenda', 'like', "%{$search}%")
                  ->orWhere('tempat', 'like', "%{$search}%");
            });
        }

        $rapatList = $query->orderBy('id', 'desc')->paginate(10);

        return view('page.DaftarHadirRapat', compact('rapatList'));
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $random = Str::random(20);
        $hadir = new Kehadiran;
        $hadir->presensi_id = $request->presensi_id;
        $hadir->peserta_id = $request->peserta_id;
        $hadir->slug = $random;
        $hadir->save();
        return redirect( route('presensi.isi', $request->presensi_id))->with('msg','success-berhasil menambahkan peserta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kehadiran  $Kehadiran
     * @return \Illuminate\Http\Response
     */
    public function show(Kehadiran $Kehadiran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kehadiran  $Kehadiran
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $hadir = Kehadiran::find($id);
        return view('page.sp', ['hadir'=> $hadir]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kehadiran  $Kehadiran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $folderPath = public_path('assets/img/');

        $image = explode(";base64,", $request->sign);

        $image_type = explode("image/", $image[0]);

        $image_type_png = $image_type[1];

        $image_base64 = base64_decode($image[1]);
        $fname = uniqid() . '.'.$image_type_png;
        $file = $folderPath . $fname;

        Storage::disk('public')->put($fname, $image_base64);
        $hadir = Kehadiran::Where('presensi_id', $request->presensi_id)->Where('peserta_id', $request->peserta_id)->first();
        $hadir->sign = $fname;
        $hadir->save();

        return redirect( route('presensi.isi', $request->presensi_id))->with('msg','success-berhasil absen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kehadiran  $Kehadiran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kehadiran $Kehadiran)
    {
        //dd($Kehadiran);
        $path = "storage/".$Kehadiran->sign;
        if(Storage::disk('public')->exists($Kehadiran->sign)){
            Storage::disk('public')->delete($Kehadiran->sign);
        }

        $Kehadiran->delete();
        return redirect( route('presensi.isi', $Kehadiran->presensi_id))->with('msg','success-berhasil menghapus peserta');
    }

    public function hadir($slugs)
    {
        $hadir = Kehadiran::where('slug', $slugs)->first();
        if(is_null($hadir)){
            return view('page.gagal');
        } else if(is_null($hadir->sign)) {
            return view('page.sp1', ['hadir'=> $hadir]);
        }else {
            return redirect( route('berhasil', $hadir->slug));
        }

    }

    public function prosess(Request $request, $id)
    {
        //dd($request);
        $folderPath = public_path('assets/img/');

        $image = explode(";base64,", $request->sign);

        $image_type = explode("image/", $image[0]);

        $image_type_png = $image_type[1];

        $image_base64 = base64_decode($image[1]);
        $fname = uniqid() . '.'.$image_type_png;
        $file = $folderPath . $fname;
        Storage::disk('public')->put($fname, $image_base64);
        $hadir = Kehadiran::Where('presensi_id', $request->presensi_id)->Where('peserta_id', $request->peserta_id)->first();
        $hadir->sign = $fname;
        $hadir->save();

        return redirect( route('hadir', $hadir->slug));
    }
    public function berhasil($slug)
    {
        $hadir = Kehadiran::Where('slug', $slug)->first()->presensi_id;
        $rapat =  Presensi::where('id',  $hadir)->first()->note;
        $noteu  = Notulensi::where('presensi_id', $hadir)->first()->slug ?? "000";

        if($rapat == 2){
            $rslug = $noteu;
            $note = true;
        } else {
            $rslug = "000";
            $note = false;
        }
//dd($rslug);

        return view('page.berhasil', ['note'=>$note, 'slg'=> $rslug]);
    }

    public function printpdf($slug)
    {

        $notulensi = Notulensi::where('slug', $slug)->first();
       // dd($notulensi);
        $rapat = Presensi::find($notulensi->presensi_id);
        $notulis = Peserta::find($notulensi->notulis_id);
        //dd($notulensi->id);
        //return view('page.vnotulen', ['notulis'=>$notulis, 'rapat'=>$rapat, 'notulensi'=>$notulensi]);
        $pdf = PDF::loadview('pdf.notulen_pdf',['notulis'=>$notulis, 'rapat'=>$rapat, 'notulensi'=>$notulensi]);
        return $pdf->download('Notulensi '.$rapat->name.'');
    }

    public function Baru(Request $request)
    {
        //dd($request);
        $check = Peserta::where('nik', $request->nik)->get()->count();
        if(0 == $check){


        $peserta = new Peserta;
        $peserta->name = $request->name;
        $peserta->uid = null;
        $peserta->nik = $request->nik;
        $peserta->jabatan = $request->jabatan;
        $peserta->save();

        $random = Str::random(20);
        $hadir = new Kehadiran;
        $hadir->presensi_id = $request->presensi_id;
        $hadir->peserta_id = $peserta->id;
        $hadir->slug = $random;
        $hadir->save();
        return redirect( route('presensi.isi', $request->presensi_id))->with('msg','success-berhasil menambahkan peserta'); 
        } else {
            return redirect( route('presensi.isi', $request->presensi_id))->with('msg','warning-Peserta sudah ada, silahkan gunakan dropdown peserta rapat'); 
        }
    }

}
