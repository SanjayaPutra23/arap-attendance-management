<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Pool;
use App\Services\MachineSyncService;
use Illuminate\Http\Request;
use Rats\Zkteco\Lib\ZKTeco;
    use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Mesin::where('grup', 6)->with('groupOption:id,text')->get();
        $pure = Pool::count();
        return view('page.ListPoolMesin',['list'=> $list, 'pur'=> $pure]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mesin = Mesin::where('tipe', 'ip')->find($id);
        if (!$mesin) {
            return redirect()->back()->with('msg', 'danger-Data mesin tidak ditemukan atau IP/Port belum dikonfigurasi.');
        }

        $res = app(MachineSyncService::class)->checkConnection($mesin);
        return redirect()->back()->with('msg', $res['type'] . '-' . $res['message']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function edit(Pool $pool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pool $pool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pool $pool)
    {
        //
    }

    public function pull($id)
    {
        $res = $this->tarik((int) $id);
        return redirect()->back()->with('msg', $res['type'] . '-' . $res['message']);
    }

    private function tarik(int $id): array
    {
        $mesin = Mesin::where('tipe', 'ip')->find($id);
        if (!$mesin) {
            return [
                'success' => false,
                'type' => 'danger',
                'message' => 'Data mesin tidak ditemukan atau tipe mesin bukan IP.'
            ];
        }

        return app(MachineSyncService::class)->syncMachine($mesin);
    }

    public function pullall()
    {
        $res = app(MachineSyncService::class)->syncAll(false, false, 6);
        if ($res['fail_count'] === 0) {
            return redirect(route('pool.index'))->with('msg', 'success-Seluruh mesin berhasil disinkronkan (' . $res['success_count'] . ' mesin).');
        } else {
            return redirect(route('pool.index'))->with('msg', 'warning-Sinkronisasi selesai: ' . $res['success_count'] . ' berhasil, ' . $res['fail_count'] . ' gagal/offline.');
        }
    }

    public function usbupload(Mesin $mesin)
    {
        //dd($mesin);
        return view('page.usbup',['upl'=> $mesin]);
    }

    public function upload(request $request){
        $id = $request->id;
        $file = $request->file('filedata')->getRealPath();
        $data = file($file);
        //dd($data);
        $now = now()->toDateTimeString();
        $lastp = Pool::where('mesin_id', $id)->orderBy('timestamp', 'DESC')->first() ;
        if(is_null($lastp)){$tlas = 0;} else { $tlas = $lastp->timestamp;}
        $poolArray = [];
        foreach($data as $data1){
            $data3 = trim($data1);
            $str = preg_replace('/(\v|\s)+/', '@', $data3);
            $data2= explode('@',$str);
            if(strtotime($data2[1]." ".$data2[2]) > strtotime($tlas)) {
                $ym = explode('-', $data2[1]);
                $poolArray[] = [
                    'uid' => $data2[0],
                    'iduser' => $data2[0],
                    'state' => $data2[3],
                    'year'=> $ym[0],
                    'month'=> $ym[1],
                    'date' => $data2[1],
                    'time' => $data2[2],
                    'timestamp' => $data2[1]." ".$data2[2],
                    'type' => $data2[4],
                    'mesin_id' => $request->id,
                    'created_at'=> $now,
                    'updated_at'=> $now
                ];
            }
        }
//dd($poolArray);
        $poolz = Mesin::find($id);
        foreach (array_chunk($poolArray, 1000) as $prepared) {
            Pool::insert($prepared);
        }
        

        $lastsync = Pool::where('mesin_id', $id)->orderBy('timestamp', 'DESC')->first();
        $poolz->last_sync = $lastsync->timestamp;
        $poolz->save();
        return redirect()->back()->with('msg','success-Data berhasil diupload');
    }

    public function purage()
    {
        $hitung = Pool::count();
        if ($hitung > 40000) {
            $tgl = date("Y-m-d", strtotime("-3 months"));
            $idp = Pool::where('date', '<=', $tgl)->orderBy('id', 'DESC')->first('id');
            if ($idp) {
                Pool::where('id', '<=', $idp->id)->delete();
                return redirect()->back()->with('msg', 'success-Pool data (lebih dari 3 bulan) telah dibersihkan');
            } else {
                return redirect()->back()->with('msg', 'warning-Tidak ada data pool yang lebih lama dari 3 bulan untuk dibersihkan');
            }
        } else {
            return redirect()->back()->with('msg', 'success-Pool data masih cukup bersih');
        }
    }
}
