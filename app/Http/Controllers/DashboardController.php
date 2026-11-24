<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman utama dashboard ARAP v2.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $roles = $user ? $user->roles->pluck('name')->toArray() : [];

        $totalPeserta = Peserta::count();
        $totalPools = Pool::count();

        return view('dashboard', [
            'user' => $user,
            'roles' => $roles,
            'totalPeserta' => $totalPeserta,
            'totalPools' => $totalPools,
        ]);
    }
}
