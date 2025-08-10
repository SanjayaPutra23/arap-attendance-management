<?php

namespace App\Http\Controllers;

use App\Models\Libur;
use Illuminate\Http\Request;

class LiburController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libur = Libur::orderBy('tanggal', 'DESC')->paginate(15);
        return view('page.liburList', ['list'=> $libur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.newLibur');
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
        
        Libur::updateOrCreate(
            ['tanggal'=> $request->tanggal],
            [ 'ket'=> $request->ket]
        );
        return redirect( route('libur.index'))->with('msg', 'success-berhasil Menambahkan libur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libur  $libur
     * @return \Illuminate\Http\Response
     */
    public function show(Libur $libur)
    {
        return redirect( route('libur.index'))->with('msg', 'danger-anda tersesat tadi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libur  $libur
     * @return \Illuminate\Http\Response
     */
    public function edit(Libur $libur)
    {
        return view('page.editLibur', ['data' =>$libur]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libur  $libur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libur $libur)
    {
        //dd($request);
        $libur->tanggal = $request->tanggal;
        $libur->ket = $request->ket;
        $libur->save();
        return redirect( route('libur.index'))->with('msg', 'success-data libur berhasil di update');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libur  $libur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libur $libur)
    {
        $libur->delete();
        return redirect( route('libur.index'))->with('msg', 'success-data libur berhasil di hapus');
    }

    
    public function tarik()
    { 
        $json = json_decode(file_get_contents('https://api-harilibur.vercel.app/api'), true);

            foreach ($json as $sam) {
                if ($sam["is_national_holiday"]) {
                    Libur::updateOrCreate(
                        ['tanggal'=> $sam['holiday_date']],
                        [ 'ket'=> $sam['holiday_name']]
                    );
                }
            }
            return redirect( route('libur.index'))->with('msg', 'success-berhasil menarik libur');                    
    }

}
