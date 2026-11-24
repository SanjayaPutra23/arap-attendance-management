<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMobileAttendanceRequest;
use App\Models\AttendanceAuditLog;
use App\Models\AttendanceLocation;
use App\Models\AttendancePhoto;
use App\Models\Libur;
use App\Models\MobileAttendance;
use App\Models\PermohonanIzin;
use App\Services\AttendanceCalculationService;
use App\Services\GeofencingService;
use App\Services\SelfieMediaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MobileAttendanceController extends Controller
{
    public function __construct(
        protected GeofencingService $geofencingService,
        protected SelfieMediaService $selfieMediaService,
        protected AttendanceCalculationService $attendanceCalculationService
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
     * Tampilkan riwayat presensi pribadi relawan/pegawai yang login.
     */
    public function history(Request $request): View
    {
        $user = $request->user();
        $peserta = $user->peserta;

        $year = (int) $request->input('year', now('Asia/Jakarta')->year);
        $month = (int) $request->input('month', now('Asia/Jakarta')->month);

        $range = $this->attendanceCalculationService->getMonthlyPeriodRange($year, $month);

        $attendances = collect();
        if ($peserta) {
            $attendances = MobileAttendance::with(['photos', 'location'])
                ->where('peserta_id', $peserta->id)
                ->whereBetween('attendance_date', [
                    $range['start']->toDateString(),
                    $range['end']->toDateString(),
                ])
                ->orderBy('attendance_date', 'desc')
                ->get();
        }

        $countTepatWaktu = $attendances->where('score', 1.00)->count();
        $countBiasa = $attendances->where('score', 0.80)->count();
        $totalScore = (float) $attendances->sum('score');

        return view('mobile-attendance.history', compact(
            'user',
            'peserta',
            'attendances',
            'year',
            'month',
            'range',
            'countTepatWaktu',
            'countBiasa',
            'totalScore'
        ));
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
