<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Option;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $listm = Mesin::with('groupOption:id,text')->get();
        $grup = Option::where('list',2)->get();

        return view('page.ListMesin',['list'=> $listm, 'grup'=> $grup]);
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
        $mesin = new Mesin;
        $mesin->name = $request->name;
        $mesin->tipe = $request->tipe;
        $mesin->ip = $request->ip;
        $mesin->port = $request->port;
        $mesin->maker_id = Auth::user()->id;
        $mesin->save();
        return redirect( route('mesin.index'))->with('msg','success-Berhasil Menambahkan Mesin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show(Mesin $mesin)
    {
        if (!extension_loaded('sockets') && !function_exists('socket_create')) {
            $iniPath = php_ini_loaded_file() ?: 'php.ini';
            return redirect(route('mesin.index'))->with('msg', 'danger-Ekstensi PHP sockets belum aktif di server. File konfigurasi aktif: ' . $iniPath . '. Pastikan extension=sockets aktif pada file tersebut dan server telah di-restart.');
        }

        if (empty($mesin->ip) || empty($mesin->port)) {
            return redirect(route('mesin.index'))->with('msg', 'danger-Alamat IP atau Port mesin absensi belum dikonfigurasi dengan benar.');
        }

        try {
            $zk = new ZKTeco($mesin->ip, $mesin->port);
            if ($zk->connect()) {
                $zk->disconnect();
                return redirect(route('mesin.index'))->with('msg', 'success-Mesin Terkoneksi (' . $mesin->ip . ':' . $mesin->port . ')');
            } else {
                return redirect(route('mesin.index'))->with('msg', 'danger-Gagal menghubungkan ke mesin absensi (' . $mesin->ip . ':' . $mesin->port . '). Pastikan perangkat menyala dan berada dalam satu jaringan.');
            }
        } catch (\Throwable $e) {
            return redirect(route('mesin.index'))->with('msg', 'danger-Terjadi kendala saat memeriksa koneksi mesin: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Mesin $mesin)
    {
        $grup = Option::where('list',2)->get();
        return view('modal.mesinedit',['edit'=> $mesin, 'grup'=> $grup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Mesin $mesin)
    {
       
       
        $mesin->name = $request->name;
        $mesin->tipe = $request->tipe;
        $mesin->ip = $request->ip;
        $mesin->port = $request->port;
        $mesin->save();
        return redirect( route('mesin.index'))->with('msg','success-Berhasil Mengedit Mesin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Mesin $mesin)
    {
        $mesin->delete();
        return redirect( route('mesin.index'))->with('msg','success-Berhasil Menghapus Mesin');
    }
}
