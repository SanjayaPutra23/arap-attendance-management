<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReviewPermohonanIzinRequest;
use App\Models\PermohonanIzin;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminIzinController extends Controller
{
    /**
     * Divisi resmi untuk filter permohonan izin.
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
     * Tampilkan daftar verifikasi permohonan izin dan sakit relawan.
     */
    public function index(Request $request): View
    {
        $status = $request->input('status');
        $divisi = $request->input('divisi');
        $search = $request->input('search');

        $query = PermohonanIzin::with(['peserta', 'user', 'approver']);

        // Filter Status
        if ($status && $status !== 'all') {
            if ($status === 'menunggu' || $status === 'pending') {
                $query->whereIn('status', ['menunggu', 'pending']);
            } elseif ($status === 'disetujui' || $status === 'approved') {
                $query->whereIn('status', ['disetujui', 'approved']);
            } elseif ($status === 'ditolak' || $status === 'rejected') {
                $query->whereIn('status', ['ditolak', 'rejected']);
            } else {
                $query->where('status', $status);
            }
        }

        // Filter Divisi
        if ($divisi && $divisi !== 'all') {
            $target = strtolower(trim($divisi));
            $query->whereHas('peserta', function ($q) use ($target) {
                if ($target === 'security' || $target === 'scurity') {
                    $q->whereIn(DB::raw('LOWER(jabatan)'), ['security', 'scurity']);
                } else {
                    $q->whereRaw('LOWER(jabatan) = ?', [$target]);
                }
            });
        }

        // Pencarian Nama atau NIK
        if ($search) {
            $query->whereHas('peserta', function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('nik', 'like', "%{$search}%");
            });
        }

        $izins = $query->orderByDesc('created_at')->paginate(15)->withQueryString();

        $stats = [
            'total' => PermohonanIzin::count(),
            'menunggu' => PermohonanIzin::whereIn('status', ['menunggu', 'pending'])->count(),
            'disetujui' => PermohonanIzin::whereIn('status', ['disetujui', 'approved'])->count(),
            'ditolak' => PermohonanIzin::whereIn('status', ['ditolak', 'rejected'])->count(),
        ];

        return view('admin.izin.index', [
            'izins' => $izins,
            'stats' => $stats,
            'divisions' => self::DIVISIONS,
            'status' => $status,
            'divisi' => $divisi,
            'search' => $search,
        ]);
    }

    /**
     * Setujui (Approve) atau Tolak (Reject) permohonan izin/sakit.
     */
    public function review(ReviewPermohonanIzinRequest $request, PermohonanIzin $permohonanIzin): RedirectResponse
    {
        $statusInput = $request->status;
        $normalizedStatus = in_array($statusInput, ['disetujui', 'approved'], true)
            ? PermohonanIzin::STATUS_DISETUJUI
            : PermohonanIzin::STATUS_DITOLAK;

        $permohonanIzin->update([
            'status' => $normalizedStatus,
            'catatan_admin' => $request->catatan_admin,
            'approved_by' => $request->user()->id,
            'approved_at' => Carbon::now('Asia/Jakarta'),
        ]);

        $label = $normalizedStatus === PermohonanIzin::STATUS_DISETUJUI ? 'DISETUJUI' : 'DITOLAK';
        $namaPemohon = $permohonanIzin->peserta?->name ?? 'Relawan';

        return redirect()->route('admin.izin.index')
            ->with('success', "Permohonan izin {$namaPemohon} berhasil diproses dengan status: {$label}.");
    }
}
