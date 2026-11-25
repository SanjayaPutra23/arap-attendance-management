<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMobileAttendanceRequest;
use App\Models\AttendanceAuditLog;
use App\Models\AttendanceLocation;
use App\Models\AttendancePhoto;
use App\Models\Libur;
use App\Models\MobileAttendance;
use App\Models\PermohonanIzin;
use App\Models\Setting;
use App\Services\AttendanceCalculationService;
use App\Services\AttendanceRecapService;
use App\Services\GeofencingService;
use App\Services\SelfieMediaService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MobileAttendanceController extends Controller
{
    public function __construct(
        protected GeofencingService $geofencingService,
        protected SelfieMediaService $selfieMediaService,
        protected AttendanceCalculationService $attendanceCalculationService,
        protected AttendanceRecapService $attendanceRecapService
    ) {}

    /**
     * Tampilkan halaman utama presensi mobile relawan/pegawai.
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        $peserta = $user->peserta;

        $today = now('Asia/Jakarta')->toDateString();
        $activeLocation = AttendanceLocation::where('is_active', true)->first();

        $todayAttendance = null;
        $workingHours = null;
        $approvedLeave = null;

        if ($peserta) {
            $todayAttendance = MobileAttendance::with(['photos', 'location'])
                ->where('peserta_id', $peserta->id)
                ->whereDate('attendance_date', $today)
                ->first();

            $workingHours = $this->attendanceCalculationService->resolveWorkingHours($peserta);

            $approvedLeave = PermohonanIzin::where('peserta_id', $peserta->id)
                ->where('status', 'disetujui')
                ->whereDate('tgl_mulai', '<=', $today)
                ->whereDate('tgl_selesai', '>=', $today)
                ->first();
        }

        $isLibur = Libur::isLibur($today);
        $liburKeterangan = $isLibur ? Libur::getKeterangan($today) : null;

        return view('mobile-attendance.index', compact(
            'user',
            'peserta',
            'activeLocation',
            'todayAttendance',
            'workingHours',
            'approvedLeave',
            'isLibur',
            'liburKeterangan',
            'today'
        ));
    }

    /**
     * Proses kirim presensi check-in / check-out secara atomik & aman.
     */
    public function store(StoreMobileAttendanceRequest $request): JsonResponse
    {
        $user = $request->user();
        $peserta = $user->peserta;

        if (! $peserta) {
            $this->logAudit(
                $user->id,
                null,
                "{$request->type}_attempt",
                'rejected',
                'Akun login tidak ditautkan ke profil Relawan/Pegawai SPPG.',
                $request
            );

            return response()->json([
                'success' => false,
                'message' => 'Akun Anda belum ditautkan ke data Relawan/Pegawai SPPG. Silakan hubungi Tata Usaha.',
            ], 422);
        }

        // 1. Validasi Geofencing & Akurasi GPS di server
        $geo = $this->geofencingService->validateLocation(
            (float) $request->latitude,
            (float) $request->longitude,
            (float) $request->accuracy
        );

        if (! $geo['allowed']) {
            $this->logAudit(
                $user->id,
                $peserta->id,
                "{$request->type}_attempt",
                'rejected',
                $geo['reason'] ?? 'Lokasi tidak valid',
                $request,
                $geo['distance_meters']
            );

            return response()->json([
                'success' => false,
                'message' => $geo['reason'],
            ], 422);
        }

        $today = now('Asia/Jakarta')->toDateString();
        $now = now('Asia/Jakarta');

        // 2. Alur Check-in
        if ($request->type === 'check_in') {
            $existing = MobileAttendance::where('peserta_id', $peserta->id)
                ->whereDate('attendance_date', $today)
                ->first();

            if ($existing) {
                $timeFormatted = $existing->check_in_at ? $existing->check_in_at->format('H:i:s') : '-';
                $reason = "Anda sudah melakukan presensi masuk (check-in) hari ini pada pukul {$timeFormatted} WIB.";

                $this->logAudit(
                    $user->id,
                    $peserta->id,
                    'check_in_attempt',
                    'rejected',
                    $reason,
                    $request,
                    $geo['distance_meters']
                );

                return response()->json([
                    'success' => false,
                    'message' => $reason,
                ], 422);
            }

            // Simpan foto selfie
            try {
                $photoMeta = $this->selfieMediaService->storeSelfie(
                    $request->file('photo'),
                    $peserta->id,
                    'check_in',
                    $now
                );
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memproses foto selfie: '.$e->getMessage(),
                ], 422);
            }

            // Evaluasi status dan skor
            $eval = $this->attendanceCalculationService->evaluateAttendance($peserta, $now, null);

            $attendance = DB::transaction(function () use (
                $peserta,
                $user,
                $geo,
                $today,
                $now,
                $request,
                $eval,
                $photoMeta
            ) {
                $attendance = MobileAttendance::create([
                    'peserta_id' => $peserta->id,
                    'user_id' => $user->id,
                    'attendance_location_id' => $geo['location']?->id,
                    'attendance_date' => $today,
                    'check_in_at' => $now,
                    'check_in_lat' => $request->latitude,
                    'check_in_lng' => $request->longitude,
                    'check_in_distance_meters' => $geo['distance_meters'],
                    'check_in_accuracy_meters' => $request->accuracy,
                    'status' => $eval['status'],
                    'score' => $eval['score'],
                    'source' => 'mobile',
                ]);

                AttendancePhoto::create([
                    'mobile_attendance_id' => $attendance->id,
                    'type' => 'check_in',
                    'disk' => $photoMeta['disk'],
                    'path' => $photoMeta['path'],
                    'mime_type' => $photoMeta['mime_type'],
                    'file_size_bytes' => $photoMeta['file_size_bytes'],
                    'captured_at' => $photoMeta['captured_at'],
                    'sha256_hash' => $photoMeta['sha256_hash'],
                ]);

                $this->logAudit(
                    $user->id,
                    $peserta->id,
                    'check_in_attempt',
                    'accepted',
                    "Check-in berhasil (jarak {$geo['distance_meters']} m, status {$eval['status']})",
                    $request,
                    $geo['distance_meters']
                );

                return $attendance;
            });

            return response()->json([
                'success' => true,
                'message' => 'Presensi masuk (Check-in) berhasil dicatat.',
                'status' => $attendance->status,
                'score' => (float) $attendance->score,
                'time' => $now->format('H:i:s'),
            ], 200);
        }

        // 3. Alur Check-out
        if ($request->type === 'check_out') {
            $existing = MobileAttendance::where('peserta_id', $peserta->id)
                ->whereDate('attendance_date', $today)
                ->first();

            if (! $existing) {
                $reason = 'Anda belum melakukan check-in hari ini. Mohon lakukan check-in terlebih dahulu.';
                $this->logAudit(
                    $user->id,
                    $peserta->id,
                    'check_out_attempt',
                    'rejected',
                    $reason,
                    $request,
                    $geo['distance_meters']
                );

                return response()->json([
                    'success' => false,
                    'message' => $reason,
                ], 422);
            }

            if ($existing->check_out_at !== null) {
                $timeFormatted = $existing->check_out_at->format('H:i:s');
                $reason = "Anda sudah melakukan check-out hari ini pada pukul {$timeFormatted} WIB.";
                $this->logAudit(
                    $user->id,
                    $peserta->id,
                    'check_out_attempt',
                    'rejected',
                    $reason,
                    $request,
                    $geo['distance_meters']
                );

                return response()->json([
                    'success' => false,
                    'message' => $reason,
                ], 422);
            }

            // Simpan foto selfie check-out
            try {
                $photoMeta = $this->selfieMediaService->storeSelfie(
                    $request->file('photo'),
                    $peserta->id,
                    'check_out',
                    $now
                );
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Gagal memproses foto selfie: '.$e->getMessage(),
                ], 422);
            }

            // Evaluasi status dan skor akhir
            $eval = $this->attendanceCalculationService->evaluateAttendance(
                $peserta,
                $existing->check_in_at,
                $now
            );

            DB::transaction(function () use (
                $existing,
                $now,
                $request,
                $geo,
                $eval,
                $photoMeta,
                $user,
                $peserta
            ) {
                $existing->update([
                    'check_out_at' => $now,
                    'check_out_lat' => $request->latitude,
                    'check_out_lng' => $request->longitude,
                    'check_out_distance_meters' => $geo['distance_meters'],
                    'check_out_accuracy_meters' => $request->accuracy,
                    'status' => $eval['status'],
                    'score' => $eval['score'],
                ]);

                AttendancePhoto::create([
                    'mobile_attendance_id' => $existing->id,
                    'type' => 'check_out',
                    'disk' => $photoMeta['disk'],
                    'path' => $photoMeta['path'],
                    'mime_type' => $photoMeta['mime_type'],
                    'file_size_bytes' => $photoMeta['file_size_bytes'],
                    'captured_at' => $photoMeta['captured_at'],
                    'sha256_hash' => $photoMeta['sha256_hash'],
                ]);

                $this->logAudit(
                    $user->id,
                    $peserta->id,
                    'check_out_attempt',
                    'accepted',
                    "Check-out berhasil (jarak {$geo['distance_meters']} m, skor {$eval['score']})",
                    $request,
                    $geo['distance_meters']
                );
            });

            return response()->json([
                'success' => true,
                'message' => 'Presensi pulang (Check-out) berhasil dicatat.',
                'status' => $eval['status'],
                'score' => (float) $eval['score'],
                'time' => $now->format('H:i:s'),
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Tipe presensi tidak dikenali.',
        ], 422);
    }

    /**
     * Tampilkan rekapitulasi dan riwayat presensi pribadi gabungan (Mobile + Fingerprint + Izin).
     * Mengikuti mode periode (bulanan 20-19 atau mingguan) yang diatur oleh Admin.
     */
    public function history(Request $request): View
    {
        $user = $request->user();
        $peserta = $user->peserta;

        $mode = Setting::getValue('relawan_recap_period_mode', 'bulanan');
        if (! in_array($mode, ['bulanan', 'mingguan'], true)) {
            $mode = 'bulanan';
        }

        $now = Carbon::now('Asia/Jakarta');
        $date = $request->input('date', $now->toDateString());
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);

        if ($mode === 'mingguan' && $request->filled('date')) {
            $parsedDate = Carbon::parse($date, 'Asia/Jakarta');
            $year = $parsedDate->year;
            $month = $parsedDate->month;
        }

        if ($mode === 'mingguan') {
            $range = $this->attendanceCalculationService->getWeeklyPeriodRange($date);
            $prevDate = $range['start']->copy()->subWeek()->toDateString();
            $nextDate = $range['start']->copy()->addWeek()->toDateString();
            $prevYear = null;
            $prevMonth = null;
            $nextYear = null;
            $nextMonth = null;
        } else {
            $range = $this->attendanceCalculationService->getMonthlyPeriodRange($year, $month);
            $range['label'] = $range['start']->translatedFormat('d M Y').' - '.$range['end']->translatedFormat('d M Y');
            $currentMonthDt = Carbon::create($year, $month, 1, 0, 0, 0, 'Asia/Jakarta');
            $prevMonthDt = $currentMonthDt->copy()->subMonth();
            $nextMonthDt = $currentMonthDt->copy()->addMonth();
            $prevYear = $prevMonthDt->year;
            $prevMonth = $prevMonthDt->month;
            $nextYear = $nextMonthDt->year;
            $nextMonth = $nextMonthDt->month;
            $prevDate = null;
            $nextDate = null;
        }

        $record = null;
        $dates = [];
        $totalWorkingDays = 0;

        if ($peserta) {
            $recapData = $this->attendanceRecapService->getRecapForPeserta(
                $peserta,
                $year,
                $month,
                $mode,
                $date
            );
            $record = $recapData['record'];
            $dates = $recapData['dates'];
            if (! empty($recapData['period']['label'])) {
                $range['label'] = $recapData['period']['label'];
            }
            $totalWorkingDays = collect($dates)->where('is_libur', false)->count();
        }

        return view('mobile-attendance.history', compact(
            'user',
            'peserta',
            'record',
            'dates',
            'mode',
            'date',
            'year',
            'month',
            'range',
            'prevDate',
            'nextDate',
            'prevYear',
            'prevMonth',
            'nextYear',
            'nextMonth',
            'totalWorkingDays'
        ));
    }

    /**
     * Ekspor rekapitulasi kehadiran pribadi pengguna ke format PDF portrait resmi (Anti-IDOR).
     */
    public function exportMyRecapPdf(Request $request): Response|RedirectResponse
    {
        $user = $request->user();
        $peserta = $user->peserta;

        if (! $peserta) {
            return redirect()->route('mobile-attendance.history')
                ->with('error', 'Akun Anda belum ditautkan ke data profil Relawan/Pegawai SPPG.');
        }

        $mode = Setting::getValue('relawan_recap_period_mode', 'bulanan');
        if (! in_array($mode, ['bulanan', 'mingguan'], true)) {
            $mode = 'bulanan';
        }

        $now = Carbon::now('Asia/Jakarta');
        $date = $request->input('date', $now->toDateString());
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);

        if ($mode === 'mingguan' && $request->filled('date')) {
            $parsedDate = Carbon::parse($date, 'Asia/Jakarta');
            $year = $parsedDate->year;
            $month = $parsedDate->month;
        }

        $recap = $this->attendanceRecapService->generateRecap(
            $year,
            $month,
            null,
            null,
            $mode,
            $date,
            $peserta
        );

        $pesertaRecord = collect($recap['records'])->firstWhere('peserta.id', $peserta->id);

        if (! $pesertaRecord) {
            return redirect()->route('mobile-attendance.history')
                ->with('error', 'Data rekap kehadiran tidak ditemukan untuk periode ini.');
        }

        $identifier = $peserta->nik ? preg_replace('/[^A-Za-z0-9_-]/', '', $peserta->nik) : Str::slug($peserta->name);
        $periodSuffix = $mode === 'mingguan'
            ? 'Mingguan_'.$recap['period']['start']->format('Ymd').'_'.$recap['period']['end']->format('Ymd')
            : $year.'_'.str_pad((string) $month, 2, '0', STR_PAD_LEFT);

        $fileName = "Rekap_Presensi_{$identifier}_{$periodSuffix}.pdf";

        $pdf = Pdf::loadView('admin.rekap.individual-pdf', [
            'peserta' => $peserta,
            'record' => $pesertaRecord,
            'recap' => $recap,
            'mode' => $mode,
            'printedAt' => Carbon::now('Asia/Jakarta'),
        ])->setPaper('a4', 'portrait');

        return $pdf->download($fileName);
    }

    /**
     * Helper pencatatan audit log percobaan presensi.
     */
    protected function logAudit(
        int $userId,
        ?int $pesertaId,
        string $action,
        string $result,
        string $reason,
        Request $request,
        ?float $distance = null
    ): void {
        AttendanceAuditLog::create([
            'user_id' => $userId,
            'peserta_id' => $pesertaId,
            'action' => $action,
            'result' => $result,
            'reason' => $reason,
            'latitude' => $request->latitude ? (float) $request->latitude : null,
            'longitude' => $request->longitude ? (float) $request->longitude : null,
            'distance_meters' => $distance,
            'accuracy_meters' => $request->accuracy ? (float) $request->accuracy : null,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'created_at' => now(),
        ]);
    }
}
