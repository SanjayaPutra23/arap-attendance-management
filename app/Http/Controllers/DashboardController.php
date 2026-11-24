<?php

namespace App\Http\Controllers;

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

        return view('dashboard', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }
}
