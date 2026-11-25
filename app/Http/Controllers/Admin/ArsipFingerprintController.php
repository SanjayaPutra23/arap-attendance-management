<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mesin;
use App\Models\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ArsipFingerprintController extends Controller
{
    /**
     * Tampilkan riwayat arsip log fingerprint fisik FPDAPUR1 (read-only).
     */
    public function index(Request $request): View
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $mesinId = $request->input('mesin_id');
        $search = $request->input('search');

        $query = Pool::with(['peserta', 'mesin']);

        // Filter rentang tanggal
        if ($startDate) {
            $query->whereDate('date', '>=', $startDate);
        }
        if ($endDate) {
            $query->whereDate('date', '<=', $endDate);
        }

        // Filter mesin
        if ($mesinId && $mesinId !== 'all') {
            $query->where('mesin_id', $mesinId);
        }

        // Pencarian Nama atau UID peserta
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('iduser', 'like', "%{$search}%")
                    ->orWhereHas('peserta', function ($sub) use ($search) {
                        $sub->where('name', 'like', "%{$search}%")
                            ->orWhere('nik', 'like', "%{$search}%");
                    });
            });
        }

        $logs = $query->orderByDesc('date')
            ->orderByDesc('time')
            ->paginate(50)
            ->withQueryString();

        $stats = [
            'total_logs' => Pool::count(),
            'total_peserta_mesin' => Pool::distinct('iduser')->count('iduser'),
            'mesin_count' => Mesin::count(),
        ];

        // Deteksi UID mesin yang memiliki log di pools namun belum terdaftar di pesertas.uid
        $orphanUids = Pool::query()
            ->leftJoin('pesertas', 'pools.iduser', '=', 'pesertas.uid')
            ->whereNull('pesertas.id')
            ->select(
                'pools.iduser',
                DB::raw('count(*) as total_logs'),
                DB::raw('min(pools.timestamp) as first_log'),
                DB::raw('max(pools.timestamp) as latest_log')
            )
            ->groupBy('pools.iduser')
            ->orderByDesc('latest_log')
            ->get();

        $mesins = Mesin::orderBy('name')->get();

        return view('admin.arsip-fingerprint.index', [
            'logs' => $logs,
            'stats' => $stats,
            'orphanUids' => $orphanUids,
            'mesins' => $mesins,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'mesinId' => $mesinId,
            'search' => $search,
        ]);
    }
}
