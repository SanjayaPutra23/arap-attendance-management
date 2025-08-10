<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Notulensi;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $id =  Auth::user()->id;
        $rapat = Presensi::where('user_id', $id)->get();
        $jmlR = $rapat->count();
        $jmlN = 0;
            $jmlP =0;
        foreach ($rapat as $data){
           $notulen = Notulensi::where('presensi_id', $data->id)->get();
           $jmlN += $notulen->count();
           $peserta =Kehadiran::where('presensi_id', $data->id)->get();
           $jmlP += $peserta->count();
        }

        return view('home',['rapat'=> $jmlR, 'notulen'=> $jmlN, 'peserta'=> $jmlP]);
    }
}
