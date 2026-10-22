<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->query('grup') == 7 || (!Gate::allows('umum') && Gate::allows('akademik'))) {
            $seting = Setting::where('grup', 7)->orderBy('id', 'asc')->paginate(25);
            $pageTitle = 'Setting Batas Jam Akademik';
        } else {
            $seting = Setting::where(function($q) {
                $q->whereNull('grup')->orWhere('grup', 6);
            })->orderBy('id', 'asc')->paginate(25);
            $pageTitle = 'Setting Jam Kerja';
        }
        
        return view('page.settingList', ['seting' => $seting, 'pageTitle' => $pageTitle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.newSetting');
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
        $data = New Setting;
        $data->name = $request->name;
        $data->value = $request->value;
        $data->save();
        return redirect( route('setting.index'))->with('msg', 'success-berhasil membuat setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        return view('page.EditSetting', ['setting' =>$setting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {

        $setting->value = $request->value;
        $setting->save();
        return redirect( route('setting.index'))->with('msg', 'success-berhasil mengubah setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        $setting->delete();
        return redirect( route('setting.index'))->with('msg', 'success-berhasil menghapus setting');
    }
}
