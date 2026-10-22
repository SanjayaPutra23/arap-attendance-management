<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kehadiran;
use App\Models\Mesin;
use App\Models\Notulensi;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Presensi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Jika user adalah Relawan (Role User murni, bukan Admin/TU/Akademik)
        if ($user && $user->hasAnyRole('User') && !$user->hasAnyRoles(['Ultraman', 'Umum', 'Akademik'])) {
            return redirect()->route('user.presensi');
        }

        $id = $user->id;
        $rapatIds = Presensi::where('user_id', $id)->pluck('id');
        $jmlR = $rapatIds->count();
        $jmlN = Notulensi::whereIn('presensi_id', $rapatIds)->count();
        $jmlP = Kehadiran::whereIn('presensi_id', $rapatIds)->count();

        // Metrik Presensi & Mesin Aktual
        $totalRelawan = Peserta::count();
        $totalMesin = Mesin::count();
        $today = date('Y-m-d');
        $todayLogs = Pool::where('date', $today)->count();
        $todayRelawanHadir = Pool::where('date', $today)->distinct('iduser')->count('iduser');

        $thisMonth = (int)date('m');
        $thisYear = (int)date('Y');
        $monthLogs = Pool::where('year', $thisYear)->where('month', $thisMonth)->count();

        $lastSync = Pool::latest('timestamp')->value('timestamp');
        $latestAbsensi = Absensi::latest('id')->first();

        return view('home', [
            'rapat'             => $jmlR,
            'notulen'           => $jmlN,
            'peserta'           => $jmlP,
            'totalRelawan'      => $totalRelawan,
            'totalMesin'        => $totalMesin,
            'todayLogs'         => $todayLogs,
            'todayRelawanHadir' => $todayRelawanHadir,
            'thisMonth'         => $thisMonth,
            'thisYear'          => $thisYear,
            'monthLogs'         => $monthLogs,
            'lastSync'          => $lastSync,
            'latestAbsensi'     => $latestAbsensi,
        ]);
    }
}
