<?php

namespace App\Http\Controllers;

use App\Models\Notulensi;
use App\Models\Peserta;
use App\Models\Presensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
Use PDF;

class NotulensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notulensi = Notulensi::where('maker_id', Auth::user()->id)->get();
        return view('page.ListNotulensi', ['notulensi'=>$notulensi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notulensi  $notulensi
     * @return \Illuminate\Http\Response
     */
    public function show(Notulensi $notulensi)
    {
        $rapat = Presensi::find($notulensi->presensi_id);
        $notulis = Peserta::find($notulensi->notulis_id);


        //dd($notulensi->notulis_id);
        return view('page.vnotulen', ['notulis'=>$notulis, 'rapat'=>$rapat, 'notulensi'=>$notulensi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notulensi  $notulensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Notulensi $notulensi)
    {
        $rapat = Presensi::find($notulensi->presensi_id);
        $dosen = Peserta::where('jabatan', "Dosen")->get();
        $tendik = Peserta::where('jabatan', "Tendik")->get();
        $lainnya = Peserta::where('jabatan', "Lainnya")->get();

        //dd($notulensi->notulis_id);
        return view('page.Notulen', ['rapat'=> $rapat, 'dosen'=>$dosen, 'tendik'=> $tendik, 'lainnya'=> $lainnya, 'notulensi'=>$notulensi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notulensi  $notulensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notulensi $notulensi)
    {
        //dd($request);
        $notulensi->kesimpulan = $request->kesimpulan;
        $notulensi->tindaklanjut = $request->tindaklanjut;
        $notulensi->notulis_id = $request->notulen_id;
        $notulensi->save();
        return redirect( route('notulensi.edit', $notulensi->id))->with('msg','success-berhasil menyimpan notulensi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notulensi  $notulensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notulensi $notulensi)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function buat($pid)
    {
        $prs =  Presensi::find($pid);
        $random = Str::random(20);
        $notulen = new Notulensi;
        $notulen->presensi_id = $pid;
        $notulen->maker_id = $prs->user_id;
        $notulen->slug = $random;
        $notulen->pimpinan_id = $prs->peserta_id;
        $notulen->save();

        $prs->note = 1;
        $prs->save();
        return redirect( route('notulensi.edit', $notulen->id))->with('msg','success-berhasil membuat notulensi');
    }

    public function isinotulen($slugs){
        $note = Notulensi::Where('slug', $slugs)->first();
        if(is_null($note)){
            return view('page.gagal'); 
        } else if($note->presensi()->first()->note == 1) {
            $rapat = Presensi::find($note->presensi_id);
            $dosen = Peserta::where('jabatan', "Dosen")->get();
            $tendik = Peserta::where('jabatan', "Tendik")->get();
            $lainnya = Peserta::where('jabatan', "Lainnya")->get();
            return view('page.spnote', ['rapat'=> $rapat, 'dosen'=>$dosen, 'tendik'=> $tendik, 'lainnya'=> $lainnya, 'notulensi'=>$note]);

        }else {
            return view('page.noteberhasil');
        }
    }
    public function prosesnote(Request $request, $id)
    {
        $notulensi = Notulensi::find($id);
        $notulensi->kesimpulan = $request->kesimpulan;
        $notulensi->tindaklanjut = $request->tindaklanjut;
        $notulensi->notulis_id = $request->notulen_id;
        $notulensi->save();

        $pres = Presensi::find($notulensi->presensi_id);
        $pres->note = $request->valid;
        $pres->save();
        return redirect( route('notulen', $notulensi->slug))->with('msg','success-berhasil menyimpan notulensi');
    }

    public function printpdf(Notulensi $notulensi)
    {

        $rapat = Presensi::find($notulensi->presensi_id);
        $notulis = Peserta::find($notulensi->notulis_id);
        //dd($notulensi->id);
        //return view('page.vnotulen', ['notulis'=>$notulis, 'rapat'=>$rapat, 'notulensi'=>$notulensi]);
        $pdf = PDF::loadview('pdf.notulen_pdf',['notulis'=>$notulis, 'rapat'=>$rapat, 'notulensi'=>$notulensi]);
        return $pdf->download('Notulensi '.$rapat->name.'');
    }
    public function validnote($slug)
    {
        $notulensi=Notulensi::Where('slug', $slug)->first();
        $rapat = Presensi::find($notulensi->presensi_id);
        $notulis = Peserta::find($notulensi->notulis_id);

        //dd($notulensi->notulis_id);
        return view('page.valnotulen', ['notulis'=>$notulis, 'rapat'=>$rapat, 'notulensi'=>$notulensi]);
    }
    public function prosesval(Request $request, $id)
    {
        $notulensi = Notulensi::find($id);
        $pres = Presensi::find($notulensi->presensi_id);
        $pres->note = $request->valid;
        $pres->save();
        return redirect( route('notulen', $notulensi->slug))->with('msg','success-berhasil menyimpan notulensi');
    }


}
