<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermohonanIzinRequest;
use App\Models\PermohonanIzin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class IzinController extends Controller
{
    /**
     * Tampilkan riwayat dan form pengajuan izin/sakit relawan.
     */
    public function index(Request $request): View
    {
        $user = $request->user();

        $izins = PermohonanIzin::where('user_id', $user->id)
            ->with(['approver', 'peserta'])
            ->latest('created_at')
            ->paginate(10);

        $stats = [
            'total' => PermohonanIzin::where('user_id', $user->id)->count(),
            'menunggu' => PermohonanIzin::where('user_id', $user->id)->whereIn('status', ['menunggu', 'pending'])->count(),
            'disetujui' => PermohonanIzin::where('user_id', $user->id)->whereIn('status', ['disetujui', 'approved'])->count(),
            'ditolak' => PermohonanIzin::where('user_id', $user->id)->whereIn('status', ['ditolak', 'rejected'])->count(),
        ];

        return view('izin.index', [
            'izins' => $izins,
            'stats' => $stats,
            'peserta' => $user->peserta,
        ]);
    }

    /**
     * Kirim permohonan izin/sakit baru ke sistem.
     */
    public function store(StorePermohonanIzinRequest $request): RedirectResponse
    {
        $user = $request->user();
        $peserta = $user->peserta;

        if (! $peserta) {
            return back()->with('error', 'Akun Anda belum ditautkan ke data relawan/pegawai SPPG. Silakan hubungi Tata Usaha.');
        }

        $filePath = null;

        if ($request->hasFile('surat_dokter')) {
            $file = $request->file('surat_dokter');
            $extension = $file->getClientOriginalExtension();
            $fileName = 'surat_'.$peserta->id.'_'.date('Ymd_His').'_'.Str::random(8).'.'.$extension;
            $filePath = $file->storeAs('', $fileName, 'izin_attachments');
        }

        PermohonanIzin::create([
            'user_id' => $user->id,
            'peserta_id' => $peserta->id,
            'jenis' => $request->jenis,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'alasan' => $request->alasan,
            'surat_dokter' => $filePath,
            'status' => PermohonanIzin::STATUS_MENUNGGU,
        ]);

        return redirect()->route('izin.index')
            ->with('success', 'Permohonan '.strtoupper($request->jenis).' berhasil diajukan dan sedang menunggu verifikasi Tata Usaha.');
    }

    /**
     * Batalkan pengajuan izin yang masih menunggu persetujuan (pending).
     */
    public function destroy(Request $request, PermohonanIzin $permohonanIzin): RedirectResponse
    {
        $user = $request->user();

        if ($permohonanIzin->user_id !== $user->id) {
            abort(403, 'Akses ditolak.');
        }

        if (! $permohonanIzin->isPending()) {
            return back()->with('error', 'Permohonan izin yang sudah diproses atau ditinjau oleh admin tidak dapat dibatalkan.');
        }

        if ($permohonanIzin->surat_dokter) {
            Storage::disk('izin_attachments')->delete($permohonanIzin->surat_dokter);
        }

        $permohonanIzin->delete();

        return redirect()->route('izin.index')
            ->with('success', 'Permohonan izin berhasil dibatalkan.');
    }
}
