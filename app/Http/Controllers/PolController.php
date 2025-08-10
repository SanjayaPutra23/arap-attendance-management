<?php

namespace App\Http\Controllers;

use App\Models\Pod;
Use App\Models\Peserta;
use Illuminate\Http\Request;

class PolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peg = Peserta::wherein('uid', array(15, 44, 54))->get();
        $list = Pod::all();
        return view('page.ListPods', ["list" => $list, "peg"=> $peg]);
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
        $pod = new Pod();
        $pod->user_id = $request->user_id;
        $pod->tanggal = $request->tanggal;
        $pod->for = $request->for;
        $pod->save();
        return redirect(route('pol.index'))->with('msg', 'success-berhasil membuat Pol');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $pol = Pod::find($id);
        return view('modal.podsedit', ["edit" => $pol]);
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
        $pod = Pod::find($id);
        $pod->tanggal = $request->tanggal;
        $pod->for = $request->for;
        $pod->save();
        return redirect(route('pol.index'))->with('msg', 'success-berhasil mengedit Pol');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pol = Pod::find($id);
        $pol->delete();
        return redirect(route('pol.index'))->with('msg', 'success-berhasil menghapus Pol');
    }
}
