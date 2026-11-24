<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttendanceAuditLog;
use App\Models\AttendanceLocation;
use App\Models\MobileAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MonitoringController extends Controller
{
    /**
     * Daftar divisi / jabatan resmi SPPG Kalisapu.
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
     * Tampilkan halaman monitoring presensi harian secara real-time.
     */
    public function index(Request $request): View
    {
        $today = Carbon::now('Asia/Jakarta')->toDateString();
        $date = $request->filled('date') ? $request->input('date') : $today;
        $divisi = $request->input('divisi');
        $status = $request->input('status');
        $search = $request->input('search');

        // Lokasi aktif SPPG sebagai acuan peta & geofence circle
        $activeLocation = AttendanceLocation::where('is_active', true)->first();

        // Base query kehadiran pada tanggal yang dipilih
        $query = MobileAttendance::with(['peserta', 'location', 'photos', 'user'])
            ->whereDate('attendance_date', $date);

        // Filter divisi / jabatan
        if ($divisi && $divisi !== 'all') {
            $query->whereHas('peserta', function ($q) use ($divisi) {
                $target = strtolower(trim($divisi));
                if ($target === 'security' || $target === 'scurity') {
                    $q->whereIn(DB::raw('LOWER(jabatan)'), ['security', 'scurity']);
                } else {
                    $q->whereRaw('LOWER(jabatan) = ?', [$target]);
                }
            });
        }

        // Filter status kehadiran
        if ($status && $status !== 'all') {
            if ($status === 'tepat_waktu' || $status === 'hadir') {
                $query->whereIn('status', MobileAttendance::onTimeStatuses());
            } elseif ($status === 'terlambat_early') {
                $query->whereIn('status', MobileAttendance::lateOrEarlyStatuses());
            } else {
                $query->where('status', $status);
            }
        }

        // Pencarian Nama atau NIK
        if ($search) {
            $query->whereHas('peserta', function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('name', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%");
                });
            });
        }

        // Ringkasan metrik kehadiran pada tanggal terpilih
        $metrics = [
            'total_hadir' => (clone $query)->count(),
            'tepat_waktu' => (clone $query)->whereIn('status', MobileAttendance::onTimeStatuses())->count(),
            'terlambat_early' => (clone $query)->whereIn('status', MobileAttendance::lateOrEarlyStatuses())->count(),
        ];

        // Data titik koordinat untuk Leaflet Map (semua record yang punya koordinat pada filter saat ini)
        $mapRecords = (clone $query)
            ->whereNotNull('check_in_lat')
            ->whereNotNull('check_in_lng')
            ->get();

        $mapPoints = $mapRecords->map(function (MobileAttendance $att) {
            $checkInPhoto = $att->photos->firstWhere('type', 'check_in');
            $checkOutPhoto = $att->photos->firstWhere('type', 'check_out');

            return [
                'id' => $att->id,
                'name' => $att->peserta?->name ?? 'Tanpa Nama',
                'nik' => $att->peserta?->nik ?? '-',
                'jabatan' => $att->peserta?->jabatan ?? '-',
                'lat' => (float) $att->check_in_lat,
                'lng' => (float) $att->check_in_lng,
                'status' => $att->status,
                'status_label' => match ($att->status) {
                    'tepat_waktu' => 'Tepat Waktu',
                    'terlambat' => 'Terlambat',
                    'pulang_awal' => 'Pulang Awal',
                    'terlambat_pulang_awal' => 'Terlambat & Pulang Awal',
                    default => ucfirst(str_replace('_', ' ', (string) $att->status)),
                },
                'distance_meters' => (float) $att->check_in_distance_meters,
                'accuracy_meters' => (float) $att->check_in_accuracy_meters,
                'check_in_time' => $att->check_in_at ? $att->check_in_at->setTimezone('Asia/Jakarta')->format('H:i:s') : '-',
                'check_out_time' => $att->check_out_at ? $att->check_out_at->setTimezone('Asia/Jakarta')->format('H:i:s') : '-',
                'score' => (float) $att->score,
                'check_in_photo_id' => $checkInPhoto?->id,
                'check_out_photo_id' => $checkOutPhoto?->id,
            ];
        })->values();

        // Data tabel dengan pagination
        $attendances = $query->orderByDesc('check_in_at')->paginate(15)->withQueryString();

        // Audit log percobaan ditolak pada tanggal terpilih
        $rejectedLogs = AttendanceAuditLog::with(['peserta', 'user'])
            ->where('result', 'rejected')
            ->whereDate('created_at', $date)
            ->latest('created_at')
            ->get();

        $metrics['total_ditolak'] = $rejectedLogs->count();

        return view('admin.monitoring.index', [
            'date' => $date,
            'divisi' => $divisi,
            'status' => $status,
            'search' => $search,
            'divisions' => self::DIVISIONS,
            'activeLocation' => $activeLocation,
            'attendances' => $attendances,
            'mapPoints' => $mapPoints,
            'rejectedLogs' => $rejectedLogs,
            'metrics' => $metrics,
        ]);
    }
}
