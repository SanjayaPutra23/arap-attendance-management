<?php

namespace App\Http\Controllers;

use App\Models\AttendanceAuditLog;
use App\Models\MobileAttendance;
use App\Models\PermohonanIzin;
use App\Models\Peserta;
use App\Models\Pool;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Divisi utama yang dipantau dalam ringkasan dashboard.
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
     * Tampilkan halaman utama dashboard ARAP v2.
     */
    public function index(Request $request): View
    {
        $user = Auth::user();
        $roles = $user ? $user->roles->pluck('name')->toArray() : [];

        $totalPeserta = Peserta::active()->count();
        $totalPools = Pool::count();
        $today = Carbon::now('Asia/Jakarta')->toDateString();

        $data = [
            'user' => $user,
            'roles' => $roles,
            'totalPeserta' => $totalPeserta,
            'totalPools' => $totalPools,
            'todayDate' => $today,
        ];

        // Jika user memiliki akses staf (Ultraman, Umum, Officer, Tata Usaha, Akademik)
        if (Gate::allows('staff-access')) {
            // Presensi hari ini
            $todayAttendances = MobileAttendance::with(['peserta', 'photos'])
                ->whereDate('attendance_date', $today)
                ->get();

            $hadirTepatWaktu = $todayAttendances->filter(fn (MobileAttendance $a) => $a->isOnTime())->count();
            $terlambatEarly = $todayAttendances->filter(fn (MobileAttendance $a) => $a->isLateOrEarly())->count();
            $totalHadir = $todayAttendances->count();

            // Izin / sakit disetujui hari ini
            $izinSakitHariIni = PermohonanIzin::where('status', PermohonanIzin::STATUS_DISETUJUI)
                ->where('tgl_mulai', '<=', $today)
                ->where('tgl_selesai', '>=', $today)
                ->count();

            // Percobaan ditolak hari ini
            $ditolakHariIni = AttendanceAuditLog::where('result', 'rejected')
                ->whereDate('created_at', $today)
                ->count();

            $belumHadir = max(0, $totalPeserta - ($totalHadir + $izinSakitHariIni));

            $data['kpi'] = [
                'total_peserta' => $totalPeserta,
                'hadir_tepat_waktu' => $hadirTepatWaktu,
                'terlambat_early' => $terlambatEarly,
                'total_hadir' => $totalHadir,
                'izin_sakit' => $izinSakitHariIni,
                'belum_hadir' => $belumHadir,
                'ditolak_hari_ini' => $ditolakHariIni,
            ];

            // Ringkasan per divisi
            $allPesertas = Peserta::active()->get(['id', 'jabatan']);
            $divisionSummary = [];

            foreach (self::DIVISIONS as $divisi) {
                $divLower = strtolower($divisi);

                $pesertaIds = $allPesertas->filter(function ($p) use ($divLower) {
                    $jab = strtolower(trim((string) $p->jabatan));
                    if ($divLower === 'security') {
                        return $jab === 'security' || $jab === 'scurity';
                    }

                    return $jab === $divLower;
                })->pluck('id');

                $divTotal = $pesertaIds->count();
                $divAtts = $todayAttendances->whereIn('peserta_id', $pesertaIds);
                $divHadir = $divAtts->count();
                $divOnTime = $divAtts->filter(fn (MobileAttendance $a) => $a->isOnTime())->count();
                $divLateEarly = $divAtts->filter(fn (MobileAttendance $a) => $a->isLateOrEarly())->count();

                $divisionSummary[] = [
                    'name' => $divisi,
                    'total' => $divTotal,
                    'hadir' => $divHadir,
                    'tepat_waktu' => $divOnTime,
                    'terlambat_early' => $divLateEarly,
                    'belum_hadir' => max(0, $divTotal - $divHadir),
                ];
            }

            $data['divisionSummary'] = $divisionSummary;

            // 10 Aktivitas presensi terakhir
            $data['recentActivities'] = MobileAttendance::with(['peserta', 'location', 'photos'])
                ->orderByDesc('check_in_at')
                ->limit(10)
                ->get();
        } else {
            // Ringkasan pribadi untuk relawan biasa
            $pesertaId = $user?->peserta_id;
            $data['myAttendanceToday'] = $pesertaId
                ? MobileAttendance::with('photos')->where('peserta_id', $pesertaId)->whereDate('attendance_date', $today)->first()
                : null;
        }

        return view('dashboard', $data);
    }
}
