<?php

namespace App\Http\Controllers;

use App\Models\Libur;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    
    public function tarik(Request $request)
    { 
        $year = $request->query('year', date('Y'));

        // Mirror resmi endpoint api-harilibur (Cloudflare Pages & Netlify)
        $endpoints = [
            "https://api-harilibur.pages.dev/api?year={$year}",
            "https://api-harilibur.netlify.app/api?year={$year}"
        ];

        $rawResponse = null;
        $lastError = null;

        foreach ($endpoints as $url) {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 12);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 6);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERAGENT, 'ARAP-Application/1.0');
            $exec = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $curlErr = curl_error($ch);
            curl_close($ch);

            if ($exec !== false && $httpCode === 200) {
                $rawResponse = $exec;
                break;
            } else {
                $lastError = !empty($curlErr) ? $curlErr : "HTTP status {$httpCode}";
            }
        }

        if (!$rawResponse) {
            return redirect(route('libur.index'))->with(
                'msg',
                'danger-Gagal mengambil data libur nasional: Layanan API tidak dapat dijangkau (' . ($lastError ?? 'koneksi gagal') . '). Pastikan koneksi internet aktif.'
            );
        }

        $items = json_decode($rawResponse, true);

        if (!is_array($items)) {
            return redirect(route('libur.index'))->with(
                'msg',
                'danger-Gagal memproses data libur nasional: Format respons data tidak valid.'
            );
        }

        $count = 0;
        foreach ($items as $item) {
            if (!is_array($item)) {
                continue;
            }

            if (!empty($item['is_national_holiday']) && !empty($item['holiday_date']) && !empty($item['holiday_name'])) {
                try {
                    $tanggal = Carbon::parse($item['holiday_date'])->format('Y-m-d');
                    $ket = trim((string) $item['holiday_name']);

                    Libur::updateOrCreate(
                        ['tanggal' => $tanggal],
                        ['ket' => $ket]
                    );
                    $count++;
                } catch (\Throwable $e) {
                    continue;
                }
            }
        }

        if ($count === 0) {
            return redirect(route('libur.index'))->with(
                'msg',
                'warning-Penarikan selesai, namun tidak ditemukan hari libur nasional untuk tahun ' . $year . '.'
            );
        }

        return redirect(route('libur.index'))->with(
            'msg',
            'success-Berhasil menarik data libur nasional tahun ' . $year . '. Sebanyak ' . $count . ' hari libur tersimpan.'
        );                    
    }

}
