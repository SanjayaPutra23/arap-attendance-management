<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfilePasswordController extends Controller
{
    /**
     * Tampilkan formulir ganti kata sandi mandiri.
     */
    public function edit(Request $request): View
    {
        return view('profile.password', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Perbarui kata sandi akun pengguna.
     */
    public function update(UpdatePasswordRequest $request): RedirectResponse
    {
        $request->user()->update([
            'password' => Hash::make($request->validated('password')),
        ]);

        $request->session()->regenerate();

        return redirect()->route('profile.password.edit')
            ->with('success', 'Kata sandi Anda berhasil diperbarui. Silakan gunakan kata sandi baru untuk login berikutnya.');
    }
}
