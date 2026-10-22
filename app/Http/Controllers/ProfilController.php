<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Menampilkan halaman profil pengguna yang sedang login
     */
    public function index()
    {
        $user = Auth::user();
        return view('page.profil', compact('user'));
    }

    /**
     * Form edit profil pengguna
     */
    public function edit($id)
    {
        $user = Auth::user();
        return view('page.profil', compact('user'));
    }

    /**
     * Memperbarui profil pengguna yang login
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();

        // Keamanan: Cegah modifikasi akun user lain oleh non-admin
        if ((int)$id !== (int)$user->id && !$user->can('ultraman')) {
            abort(403, 'Akses Ditolak: Anda hanya dapat memperbarui profil Anda sendiri.');
        }

        $targetUser = (int)$id === (int)$user->id ? $user : User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $targetUser->id],
            'telp' => ['nullable', 'string', 'max:50'],
        ], [
            'name.required' => 'Nama pengguna wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah digunakan oleh akun lain.',
        ]);

        $targetUser->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'telp' => $validatedData['telp'] ?? $targetUser->telp,
        ]);

        return redirect()->route('profil.index')
            ->with('msg', 'success-Data profil ' . $targetUser->name . ' berhasil diperbarui.');
    }

    /**
     * Memperbarui foto profil / avatar pengguna
     */
    public function avatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ], [
            'avatar.required' => 'Silakan pilih berkas gambar avatar.',
            'avatar.image' => 'Berkas harus berupa gambar.',
            'avatar.mimes' => 'Format gambar yang didukung: JPEG, PNG, JPG, GIF.',
            'avatar.max' => 'Ukuran gambar avatar maksimal 2 MB.',
        ]);

        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $fileName = 'avatar_' . $user->id . '_' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $request->file('avatar')->move(public_path('assets/img/avatars'), $fileName);

            $user->avatar = $fileName;
            $user->save();

            return redirect()->route('profil.index')
                ->with('msg', 'success-Foto profil berhasil diperbarui.');
        }

        return redirect()->route('profil.index')
            ->with('msg', 'warning-Silakan pilih berkas foto profil.');
    }

    /**
     * Mengubah password pengguna yang login
     */
    public function password(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'max:255', 'same:c_password'],
            'c_password' => ['required', 'string', 'min:8', 'max:255'],
        ], [
            'old_password.required' => 'Password lama wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru minimal 8 karakter.',
            'new_password.same' => 'Konfirmasi password baru tidak cocok.',
            'c_password.required' => 'Konfirmasi password baru wajib diisi.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('profil.index')
                ->with('msg', 'danger-Password lama yang Anda masukkan tidak sesuai.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profil.index')
            ->with('msg', 'info-Password Anda berhasil diperbarui.');
    }

    /**
     * Menghasilkan avatar SVG deterministik berbasis identitas akun (inisial & warna stabil)
     */
    public function avatarSvg($id)
    {
        $user = User::find($id);
        $name = $user ? $user->name : 'User ' . $id;

        $words = preg_split('/\s+/', trim($name));
        if (count($words) >= 2) {
            $initials = mb_strtoupper(mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1));
        } else {
            $initials = mb_strtoupper(mb_substr($name, 0, min(2, mb_strlen($name))));
        }

        $palettes = [
            '#1e40af', // Blue
            '#065f46', // Emerald
            '#5b21b6', // Violet
            '#9a3412', // Orange
            '#3730a3', // Indigo
            '#155e75', // Cyan
            '#831843', // Pink
            '#115e59', // Teal
            '#78350f', // Amber
            '#334155', // Slate
            '#4338ca', // Indigo dark
            '#047857', // Green
        ];

        $colorIndex = abs((int)$id) % count($palettes);
        $bgColor = $palettes[$colorIndex];

        $svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" width="128" height="128">'
             . '<rect width="128" height="128" rx="64" fill="' . $bgColor . '"/>'
             . '<text x="64" y="68" font-family="-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif" font-size="46" font-weight="700" fill="#ffffff" text-anchor="middle" dominant-baseline="central">'
             . htmlspecialchars($initials)
             . '</text>'
             . '</svg>';

        return response($svg, 200, [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
