<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Pool;
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
        $pools = Mesin::where('tipe', "ip")->where('id', $id)->first();
        $zk = new ZKTeco( $pools->ip, $pools->port);
        if($zk->connect()){
            $zk->disconnect();
            return redirect()->back()->with('msg','success-Mesin Terkoneksi');
        } else {
            return redirect()->back()->with('msg','success-Gagal Mesin Terkoneksi');
        }
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
        if ($this->tarik($id)){
            return redirect()->back()->with('msg','success-Data berhasil ditarik');
        } else {
            return redirect()->back()->with('msg','success-Gagal Mesin Terkoneksi');
        }
    }



    private function tarik(int $id): bool
        {
            $mesin = Mesin::where('tipe', 'ip')->find($id);
            if (!$mesin) return false;

            $zk = new ZKTeco($mesin->ip, $mesin->port);

            if (!$zk->connect()) {
                return false;
            }

            try {
                $rows = $zk->getAttendance(); // array data dari mesin
            } finally {
                $zk->disconnect();
            }

            if (empty($rows)) {
                // tidak ada data dari mesin
                return true;
            }

            // Ambil cutoff timestamp terakhir untuk mesin ini
            $lastTs = Pool::where('mesin_id', $id)->max('timestamp');
            // Jika null, pakai epoch awal
            $cutoff = $lastTs ? Carbon::parse($lastTs) : Carbon::create(1970,1,1,0,0,0);

            $now = now()->toDateTimeString();
            $buffer = [];

            // Optional: cegah duplikat di memori (kalau perangkat suka kirim ulang batch lama)
            // Key = mesin_id|iduser|timestamp|type
            $seen = [];

            foreach ($rows as $r) {
                // Pastikan field minimal tersedia
                if (!isset($r['timestamp'], $r['id'], $r['type'], $r['state'], $r['uid'])) {
                    continue;
                }

                // Parse timestamp dari mesin
                // Format umum ZKTeco: "YYYY-mm-dd HH:ii:ss"
                try {
                    $ts = Carbon::parse($r['timestamp']);
                } catch (\Throwable $e) {
                    continue; // skip yang tidak valid
                }

                // Hanya data yang lebih baru dari cutoff
                if ($ts->lessThanOrEqualTo($cutoff)) {
                    continue;
                }

                // Susun kolom sesuai schema lama (string) maupun baru (native)
                $dateStr = $ts->toDateString();      // "YYYY-mm-dd"
                $timeStr = $ts->toTimeString();      // "HH:ii:ss"
                $yearStr = $ts->format('Y');
                $monthStr= $ts->format('m');

                $record = [
                    'uid'       => $r['uid'],             // user UID dari mesin
                    'iduser'    => $r['id'],              // biasanya user id pada device
                    'state'     => (int) $r['state'],
                    'year'      => $yearStr,
                    'month'     => $monthStr,
                    'date'      => $dateStr,
                    'time'      => $timeStr,
                    'timestamp' => $ts->toDateTimeString(),
                    'type'      => (int) $r['type'],      // 0=in, 1=out (umum)
                    'mesin_id'  => $id,
                    'created_at'=> $now,
                    'updated_at'=> $now,
                ];

                // Dedup in-memory
                $k = $id.'|'.$record['iduser'].'|'.$record['timestamp'].'|'.$record['type'];
                if (isset($seen[$k])) {
                    continue;
                }
                $seen[$k] = true;

                $buffer[] = $record;
            }

            if (empty($buffer)) {
                // Tidak ada yang baru
                return true;
            }

            // Insert batch (chunk agar aman)
            DB::beginTransaction();
            try {
                foreach (array_chunk($buffer, 1000) as $chunk) {
                    // Jika sudah pasang UNIQUE index (mesin_id,iduser,timestamp,type),
                    // ganti baris berikut jadi: Pool::insertOrIgnore($chunk);
                    Pool::insert($chunk);
                }

                // Update last_sync pakai data DB terbaru
                $latest = Pool::where('mesin_id', $id)->max('timestamp');
                if ($latest) {
                    $mesin->last_sync = $latest;
                    $mesin->save();
                }

                DB::commit();
                return true;
            } catch (\Throwable $e) {
                DB::rollBack();
                // Log::error('Gagal tarik absen: '.$e->getMessage());
                return false;
            }
        }


   
        private function tarikX($id)
    {
        $poolz = Mesin::where('tipe', "ip")->where('id', $id)->first();

        $zk = new ZKTeco( $poolz->ip, $poolz->port);
        if($zk->connect()){
            $pool = $zk->getAttendance();
            $zk->disconnect();
            $poolArray = [];
            $now = now()->toDateTimeString();
            $lastp = Pool::where('mesin_id', $id)->orderBy('id', 'DESC')->first() ;
            if(is_null($lastp)){$tlas = 0;} else { $tlas = $lastp->timestamp;}
            foreach ($pool as $data) {
                if(strtotime($data['timestamp']) > strtotime($tlas)) {
                    $atd = explode(' ', $data['timestamp']);
                    $ym = explode('-', $atd[0]);
                    $poolArray[] = [
                        'uid' => $data['uid'],
                        'iduser' => $data['id'],
                        'state' => $data['state'],
                        'year'=> $ym[0],
                        'month'=> $ym[1],
                        'date' => $atd[0],
                        'time' => $atd[1],
                        'timestamp' => $data['timestamp'],
                        'type' => $data['type'],
                        'mesin_id' => $id,
                        'created_at'=> $now,
                        'updated_at'=> $now
                    ];
                }
            }
            Pool::insert($poolArray);
            $lastsync = Pool::where('mesin_id', $id)->orderBy('timestamp', 'DESC')->first();
            $poolz->last_sync = $lastsync->timestamp;

            $poolz->save();
            return true;
        } else {
            return false;
        }
    }

    public function pullall()
    {
        $datapool = Mesin::all('id');
        foreach($datapool as $atd){
            $this->tarik($atd->id);
        }
        return redirect( route('pool.index'))->with('msg','success-Data berhasil ditarik');
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

    public function purage(){
        $hitung = Pool::all('id')->count();
        if($hitung > 40000) {
             $tgl = date("Y-m-d", strtotime("-3 months"));
        //$tgl = date("Y-m-d", strtotime("2023-06-4"));
        $idp = Pool::where('date', $tgl)->orderby('id', 'DESC')->first('id');
        Pool::where('id','<',$idp->id)->delete();
        return redirect()->back()->with('msg','success-Pool data telah dibersihkan');
        } else {
            return redirect()->back()->with('msg','success-Pool data masih cukup bersih');
        }
    }
}
