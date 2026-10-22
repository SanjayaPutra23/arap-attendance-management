<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PermohonanIzin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminIzinController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:umum']);
    }

    /**
     * Menampilkan seluruh pengajuan izin/sakit dari seluruh relawan
     */
    public function index(Request $request)
    {
        $query = PermohonanIzin::with(['user', 'peserta', 'approver']);

        if ($request->filled('status') && in_array($request->status, ['menunggu', 'disetujui', 'ditolak'])) {
            $query->where('status', $request->status);
        }

        if ($request->filled('jenis') && in_array($request->jenis, ['izin', 'sakit'])) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($qu) use ($search) {
                    $qu->where('name', 'like', "%{$search}%")
                       ->orWhere('email', 'like', "%{$search}%");
                })->orWhereHas('peserta', function ($qp) use ($search) {
                    $qp->where('nik', 'like', "%{$search}%")
                       ->orWhere('name', 'like', "%{$search}%");
                });
            });
        }

        $izins = $query->orderBy('id', 'desc')->paginate(15);

        $counts = [
            'total' => PermohonanIzin::count(),
            'menunggu' => PermohonanIzin::where('status', 'menunggu')->count(),
            'disetujui' => PermohonanIzin::where('status', 'disetujui')->count(),
            'ditolak' => PermohonanIzin::where('status', 'ditolak')->count(),
        ];

        return view('page.admin.izin.index', compact('izins', 'counts'));
    }

    /**
     * Menampilkan detail permohonan izin/sakit dan formulir verifikasi
     */
    public function show($id)
    {
        $izin = PermohonanIzin::with(['user', 'peserta', 'approver'])->findOrFail($id);
        return view('page.admin.izin.show', compact('izin'));
    }

    /**
     * Menyetujui permohonan izin/sakit
     */
    public function approve(Request $request, $id)
    {
        $izin = PermohonanIzin::findOrFail($id);

        $izin->update([
            'status' => 'disetujui',
            'catatan_admin' => $request->input('catatan_admin'),
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return redirect()->route('admin.izin.index')->with('success', 'Permohonan ' . ucfirst($izin->jenis) . ' dari ' . ($izin->user->name ?? 'Relawan') . ' berhasil DISETUJUI.');
    }

    /**
     * Menolak permohonan izin/sakit
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan_admin' => 'required|string|min:3|max:1000',
        ], [
            'catatan_admin.required' => 'Wajib memberikan alasan atau catatan penolakan.',
            'catatan_admin.min' => 'Catatan penolakan minimal 3 karakter.',
        ]);

        $izin = PermohonanIzin::findOrFail($id);

        $izin->update([
            'status' => 'ditolak',
            'catatan_admin' => $request->input('catatan_admin'),
            'approved_by' => Auth::id(),
            'approved_at' => now(),
        ]);

        return redirect()->route('admin.izin.index')->with('warning', 'Permohonan ' . ucfirst($izin->jenis) . ' dari ' . ($izin->user->name ?? 'Relawan') . ' telah DITOLAK.');
    }

    /**
     * Mengunduh surat dokter oleh admin
     */
    public function downloadSurat($id)
    {
        $izin = PermohonanIzin::findOrFail($id);

        if (!$izin->surat_dokter || !Storage::disk('public')->exists($izin->surat_dokter)) {
            abort(404, 'Berkas surat dokter tidak ditemukan.');
        }

        return Storage::disk('public')->download($izin->surat_dokter);
    }
}
