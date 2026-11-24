<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePesertaRequest;
use App\Http\Requests\Admin\UpdatePesertaRequest;
use App\Models\DetailAbsen;
use App\Models\Peserta;
use App\Models\Pool;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class PegawaiController extends Controller
{
    /**
     * Daftar divisi resmi SPPG Kalisapu.
     *
     * @var list<string>
     */
    public const DIVISIONS = [
        'Officer',
        'Persiapan',
        'Pengolahan',
        'Pemorsian',
        'Distribusi',
        'Kebersihan',
        'Security',
        'Ompreng',
    ];

    /**
     * Tampilkan daftar master pegawai / relawan & Officer.
     */
    public function index(Request $request): View
    {
        $divisi = $request->input('divisi');
        $search = $request->input('search');
        $accountStatus = $request->input('account_status');

        $query = Peserta::with(['user.roles'])
            ->withCount(['mobileAttendances', 'pools', 'permohonanIzins']);

        // Filter Divisi
        if ($divisi && $divisi !== 'all') {
            $target = strtolower(trim($divisi));
            if ($target === 'security' || $target === 'scurity') {
                $query->whereIn(DB::raw('LOWER(jabatan)'), ['security', 'scurity']);
            } else {
                $query->whereRaw('LOWER(jabatan) = ?', [$target]);
            }
        }

        // Filter Status Akun Login
        if ($accountStatus === 'with_account') {
            $query->has('user');
        } elseif ($accountStatus === 'without_account') {
            $query->doesntHave('user');
        }

        // Pencarian Nama, NIK, atau UID
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%")
                    ->orWhere('uid', 'like', "%{$search}%");
            });
        }

        $pegawaiList = $query->orderBy('name')->paginate(15)->withQueryString();

        // Ringkasan Statistik Pegawai
        $stats = [
            'total' => Peserta::count(),
            'officers' => Peserta::whereRaw('LOWER(jabatan) = ?', ['officer'])->count(),
            'relawan' => Peserta::whereRaw('LOWER(jabatan) != ?', ['officer'])->count(),
            'has_account' => Peserta::has('user')->count(),
            'no_account' => Peserta::doesntHave('user')->count(),
        ];

        $roles = Role::orderBy('name')->get();

        return view('admin.pegawai.index', [
            'pegawaiList' => $pegawaiList,
            'divisions' => self::DIVISIONS,
            'roles' => $roles,
            'stats' => $stats,
            'divisi' => $divisi,
            'search' => $search,
            'accountStatus' => $accountStatus,
        ]);
    }

    /**
     * Simpan pegawai baru dan opsi akun login terkait.
     */
    public function store(StorePesertaRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated, $request) {
            $peserta = Peserta::create([
                'name' => $validated['name'],
                'nik' => $validated['nik'],
                'uid' => $validated['uid'] ?? null,
                'jabatan' => $validated['jabatan'],
                'type' => $validated['type'] ?? 'relawan',
                'telp' => $validated['telp'] ?? null,
            ]);

            // Jika admin memilih opsi buat akun login
            if ($request->boolean('create_account')) {
                $user = User::create([
                    'peserta_id' => $peserta->id,
                    'name' => $peserta->name,
                    'email' => $validated['email'],
                    'nik' => $peserta->nik,
                    'telp' => $peserta->telp,
                    'password' => Hash::make($validated['password']),
                    'type' => $peserta->type,
                ]);

                $roleName = $validated['role']
                    ?? (strtolower($peserta->jabatan) === 'officer' ? 'Officer' : 'User');

                $role = Role::where('name', $roleName)->first();
                if ($role) {
                    $user->roles()->attach($role->id);
                }
            }
        });

        return redirect()->route('admin.pegawai.index')
            ->with('success', "Pegawai '{$validated['name']}' berhasil ditambahkan ke database.");
    }

    /**
     * Perbarui data profil pegawai dan kelola akun loginnya.
     */
    public function update(UpdatePesertaRequest $request, Peserta $pegawai): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated, $request, $pegawai) {
            $pegawai->update([
                'name' => $validated['name'],
                'nik' => $validated['nik'],
                'uid' => $validated['uid'] ?? null,
                'jabatan' => $validated['jabatan'],
                'type' => $validated['type'] ?? $pegawai->type,
                'telp' => $validated['telp'] ?? null,
            ]);

            // Sinkronisasi data ke User jika sudah tertaut
            if ($pegawai->user) {
                $userUpdate = [
                    'name' => $pegawai->name,
                    'nik' => $pegawai->nik,
                    'telp' => $pegawai->telp,
                ];

                if (! empty($validated['email']) && $validated['email'] !== $pegawai->user->email) {
                    $request->validate([
                        'email' => ['email', 'unique:users,email,'.$pegawai->user->id],
                    ]);
                    $userUpdate['email'] = $validated['email'];
                }

                if (! empty($validated['password'])) {
                    $userUpdate['password'] = Hash::make($validated['password']);
                }

                $pegawai->user->update($userUpdate);

                if (! empty($validated['role'])) {
                    $role = Role::where('name', $validated['role'])->first();
                    if ($role) {
                        $pegawai->user->roles()->sync([$role->id]);
                    }
                }
            } elseif ($request->boolean('manage_account') && ! empty($validated['email']) && ! empty($validated['password'])) {
                // Buat akun baru untuk pegawai yang sebelumnya belum punya
                $request->validate([
                    'email' => ['required', 'email', 'unique:users,email'],
                ]);

                $user = User::create([
                    'peserta_id' => $pegawai->id,
                    'name' => $pegawai->name,
                    'email' => $validated['email'],
                    'nik' => $pegawai->nik,
                    'telp' => $pegawai->telp,
                    'password' => Hash::make($validated['password']),
                    'type' => $pegawai->type,
                ]);

                $roleName = $validated['role']
                    ?? (strtolower($pegawai->jabatan) === 'officer' ? 'Officer' : 'User');
                $role = Role::where('name', $roleName)->first();
                if ($role) {
                    $user->roles()->attach($role->id);
                }
            }
        });

        return redirect()->route('admin.pegawai.index')
            ->with('success', "Data pegawai '{$pegawai->name}' berhasil diperbarui.");
    }

    /**
     * Hapus pegawai dengan proteksi anti-hapus jika memiliki riwayat historis.
     */
    public function destroy(Peserta $pegawai): RedirectResponse
    {
        $hasMobile = $pegawai->mobileAttendances()->exists();
        $hasPools = $pegawai->uid ? Pool::where('iduser', $pegawai->uid)->exists() : false;
        $hasDetailAbsens = DetailAbsen::where('id_peserta', $pegawai->id)->exists();
        $hasPermohonan = $pegawai->permohonanIzins()->exists();

        if ($hasMobile || $hasPools || $hasDetailAbsens || $hasPermohonan) {
            $reasons = [];
            if ($hasMobile) {
                $reasons[] = 'Presensi Mobile';
            }
            if ($hasPools) {
                $reasons[] = 'Log Mesin Fingerprint';
            }
            if ($hasDetailAbsens) {
                $reasons[] = 'Arsip Rekap Presensi';
            }
            if ($hasPermohonan) {
                $reasons[] = 'Permohonan Izin';
            }

            $reasonText = implode(', ', $reasons);

            return back()->with('error', "Pegawai '{$pegawai->name}' tidak dapat dihapus karena memiliki data historis ({$reasonText}). Integritas data dilindungi.");
        }

        DB::transaction(function () use ($pegawai) {
            if ($pegawai->user) {
                $pegawai->user->roles()->detach();
                $pegawai->user->delete();
            }
            $pegawai->delete();
        });

        return redirect()->route('admin.pegawai.index')
            ->with('success', "Pegawai '{$pegawai->name}' berhasil dihapus.");
    }
}
