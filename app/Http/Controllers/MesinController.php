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
        $zk = new ZKTeco( $mesin->ip, $mesin->port);
        if($zk->connect()){
            //$user = $zk->getUser();
            $zk->disconnect();

            ///dd($user);
            return redirect( route('mesin.index'))->with('msg','success-Mesin Terkoneksi');
        } else {
            return redirect( route('mesin.index'))->with('msg','success-Gagal Mesin Terkoneksi');
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
