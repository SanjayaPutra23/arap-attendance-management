<?php

namespace App\Http\Controllers;
use Rats\Zkteco\Lib\ZKTeco;
use App\Models\Peserta;
use App\Http\Requests\StorePesertaRequest;
use App\Http\Requests\UpdatePesertaRequest;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $peserta = Peserta::all();
        return view('page.ListPeserta',['peserta'=>$peserta]);
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
     * @param  \App\Http\Requests\StorePesertaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePesertaRequest $request)
    {
       //dd($request);
        if($request->type == "0"){
            $tipe = null;
        }else if($request->type == "Karyawan"){
            $tipe = $request->jabatan;
        } else {
            $tipe = $request->type;
        }
        $peserta = new Peserta;
        $peserta->name = $request->name;
        $peserta->uid = $request->uid;
        $peserta->telp = $request->telp;
        $peserta->nik = $request->nik;
        $peserta->type = $tipe;
        $peserta->jabatan = $request->jabatan;
        $peserta->save();
        return redirect( route('admin.peserta.index'))->with('msg','success-Berhasil menginput pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function edit(Peserta $pesertum)
    {
        return view('modal.pesertaedit',['edit'=> $pesertum]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePesertaRequest  $request
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePesertaRequest $request, Peserta $pesertum)
    {
        //dd($request);
        if($request->type == "0"){
            $tipe = null;
        }else if($request->type == "Karyawan"){
            $tipe = $request->jabatan;
        } else {
            $tipe = $request->type;
        }
        $peserta = Peserta::find($pesertum->id);
        $peserta->name = $request->name;
        $peserta->uid = $request->uid;
        $peserta->telp = $request->telp;
        $peserta->nik = $request->nik;
        $peserta->type = $tipe;
        $peserta->jabatan = $request->jabatan;
        $peserta->save();
        return redirect( route('admin.peserta.index'))->with('msg','success-Berhasil pengedit pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peserta  $peserta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peserta $pesertum)
    {
        $pesertum->delete();
        return redirect( route('admin.peserta.index'))->with('msg','success-Berhasil Menghapus Peserta');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function uindex()
    {

        $peserta = Peserta::all();
        return view('page.ulistPeserta',['peserta'=>$peserta]);
    }

    public function uedit(Peserta $pesertum)
    {
        return view('modal.pesertauedit',['edit'=> $pesertum]);
    }

    public function updateu(UpdatePesertaRequest $request, Peserta $pesertum)
    {
        //dd($request);
        $peserta = Peserta::find($pesertum->id);
        $peserta->name = $request->name;
        $peserta->telp = $request->telp;
        $peserta->nik = $request->nik;
        $peserta->jabatan = $request->jabatan;
        $peserta->save();
        return redirect( route('peserta.index'))->with('msg','success-Berhasil pengedit pegawai');
    }

    public function ustore(StorePesertaRequest $request)
    {
        $peserta = new Peserta;
        $peserta->name = $request->name;
       
        $peserta->telp = $request->telp;
        $peserta->nik = $request->nik;
        $peserta->jabatan = $request->jabatan;
        $peserta->save();
        return redirect( route('peserta.index'))->with('msg','success-Berhasil menginput pegawai');
    }

    public function test($telp)
    {
        $nomor = tilpun($telp);
        $r = sendWATest($nomor);
        return response()->json([
            'status' => 'tested',
            'phone'  => $nomor,
            'result' => $r
        ]);
    }





    public function syncAccounts()
    {
        \Illuminate\Support\Facades\Artisan::call('arap:sync-relawan');
        return redirect()->route('admin.peserta.index')->with('msg', 'success-Berhasil menyinkronkan seluruh akun login relawan');
    }

}
