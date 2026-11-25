<?php

namespace App\Services;

use App\Models\Libur;
use App\Models\MobileAttendance;
use App\Models\PermohonanIzin;
use App\Models\Peserta;
use App\Models\Pool;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class AttendanceRecapService
{
    public function __construct(
        protected AttendanceCalculationService $calculationService
    ) {}

    /**
     * Menghasilkan rekapitulasi kehadiran gabungan periode bulanan (tgl 20 s.d. 19) atau mingguan (Senin s.d. Minggu).
     *
     * @param  int  $year  Tahun periode berjalan
     * @param  int  $month  Bulan periode berjalan (1 - 12)
     * @param  string|null  $divisi  Filter divisi/jabatan (opsional)
     * @param  string|null  $search  Filter nama/NIK peserta (opsional)
     * @param  string  $mode  Mode rekapitulasi ('bulanan' atau 'mingguan')
     * @param  string|null  $referenceDate  Tanggal acuan untuk mode mingguan (Y-m-d)
     * @param  Peserta|null  $targetPeserta  Target peserta tunggal (opsional)
     * @return array{
     *     period: array{mode: string, year: int, month: int, start: Carbon, end: Carbon, label: string, reference_date: string},
     *     summary: array{
     *         total_peserta: int,
     *         total_hadir_tepat_waktu: int,
     *         total_terlambat_early: int,
     *         total_izin: int,
     *         total_sakit: int,
     *         total_alpha: int,
     *         total_points: float,
     *         source_mobile: int,
     *         source_fingerprint: int
     *     },
     *     records: array<int, array<string, mixed>>,
     *     dates: array<int, array{date: string, day_name: string, is_libur: bool, libur_ket: ?string}>
     * }
     */
    public function generateRecap(
        int $year,
        int $month,
        ?string $divisi = null,
        ?string $search = null,
        string $mode = 'bulanan',
        ?string $referenceDate = null,
        ?Peserta $targetPeserta = null
    ): array {
        // 1. Tentukan rentang periode berdasarkan mode
        if ($mode === 'mingguan') {
            $periodRange = $this->calculationService->getWeeklyPeriodRange(
                $referenceDate ?? sprintf('%04d-%02d-01', $year, $month)
            );
            $startDate = $periodRange['start']->copy()->startOfDay();
            $endDate = $periodRange['end']->copy()->endOfDay();
            $periodLabel = $periodRange['label'];
        } else {
            $mode = 'bulanan';
            $periodRange = $this->calculationService->getMonthlyPeriodRange($year, $month);
            $startDate = $periodRange['start']->copy()->startOfDay();
            $endDate = $periodRange['end']->copy()->endOfDay();
            $periodLabel = $startDate->translatedFormat('d M Y').' - '.$endDate->translatedFormat('d M Y');
        }

        $startStr = $startDate->toDateString();
        $endStr = $endDate->toDateString();

        // 2. Susun daftar seluruh tanggal dalam periode
        $carbonPeriod = CarbonPeriod::create($startDate, $endDate);
        $periodDates = [];

        // 3. Ambil data hari libur nasional
        $liburs = Libur::all();
        $holidayMap = [];
        foreach ($liburs as $libur) {
            $formattedDate = Carbon::parse($libur->tanggal)->toDateString();
            $holidayMap[$formattedDate] = $libur->ket;
        }

        foreach ($carbonPeriod as $dt) {
            $dStr = $dt->toDateString();
            $isLibur = isset($holidayMap[$dStr]);
            $periodDates[] = [
                'date' => $dStr,
                'carbon' => $dt,
                'day_name' => $dt->translatedFormat('D'),
                'is_libur' => $isLibur,
                'libur_ket' => $isLibur ? $holidayMap[$dStr] : null,
            ];
        }

        // 4. Ambil peserta sesuai filter
        if ($targetPeserta !== null) {
            $pesertas = collect([$targetPeserta]);
        } else {
            $pesertaQuery = Peserta::active();

            if ($divisi && $divisi !== 'all') {
                $target = strtolower(trim($divisi));
                if ($target === 'security' || $target === 'scurity') {
                    $pesertaQuery->whereIn(DB::raw('LOWER(jabatan)'), ['security', 'scurity']);
                } else {
                    $pesertaQuery->whereRaw('LOWER(jabatan) = ?', [$target]);
                }
            }

            if ($search) {
                $pesertaQuery->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('nik', 'like', "%{$search}%")
                        ->orWhere('uid', 'like', "%{$search}%");
                });
            }

            $pesertas = $pesertaQuery->orderBy('name')->get();
        }

        $pesertaIds = $pesertas->pluck('id')->toArray();
        $pesertaUids = $pesertas->pluck('uid')->filter()->map(fn ($u) => (string) $u)->toArray();

        // 5. Batch Eager Loading untuk efisiensi tinggi (hindari N+1 query)
        // A. Presensi Mobile (Prioritas 1)
        $mobileAttendances = MobileAttendance::with(['photos'])
            ->whereIn('peserta_id', $pesertaIds)
            ->whereDate('attendance_date', '>=', $startStr)
            ->whereDate('attendance_date', '<=', $endStr)
            ->get()
            ->groupBy('peserta_id');

        // B. Log Fingerprint Mesin Pools (Prioritas 2)
        $pools = empty($pesertaUids)
            ? collect()
            : Pool::whereIn('iduser', $pesertaUids)
                ->whereDate('date', '>=', $startStr)
                ->whereDate('date', '<=', $endStr)
                ->orderBy('time')
                ->get()
                ->groupBy(fn ($p) => (string) $p->iduser);

        // C. Permohonan Izin Disetujui (Prioritas 3)
        $approvedLeaves = PermohonanIzin::whereIn('peserta_id', $pesertaIds)
            ->whereIn('status', [PermohonanIzin::STATUS_DISETUJUI, PermohonanIzin::STATUS_APPROVED])
            ->where('tgl_mulai', '<=', $endStr)
            ->where('tgl_selesai', '>=', $startStr)
            ->get()
            ->groupBy('peserta_id');

        // 6. Evaluasi Rekapitulasi per Peserta
        $records = [];
        $totalHadirTepatWaktu = 0;
        $totalTerlambatEarly = 0;
        $totalIzin = 0;
        $totalSakit = 0;
        $totalAlpha = 0;
        $totalPointsAll = 0.0;
        $totalSourceMobile = 0;
        $totalSourceFingerprint = 0;

        foreach ($pesertas as $peserta) {
            $pesertaMobile = $mobileAttendances->get($peserta->id, collect());
            $uidKey = (string) ($peserta->uid ?? '');
            $pesertaPools = $uidKey !== '' ? $pools->get($uidKey, collect()) : collect();
            $pesertaLeaves = $approvedLeaves->get($peserta->id, collect());

            $pesertaOnTime = 0;
            $pesertaLateEarly = 0;
            $pesertaIzin = 0;
            $pesertaSakit = 0;
            $pesertaAlpha = 0;
            $pesertaScoreTotal = 0.0;
            $pesertaMobileCount = 0;
            $pesertaFingerprintCount = 0;

            $dailyDetails = [];

            foreach ($periodDates as $pDate) {
                $dateStr = $pDate['date'];
                $isHoliday = $pDate['is_libur'];
                $holidayDesc = $pDate['libur_ket'];

                // Prioritas 1: Mobile Attendance
                $mobileAtt = $pesertaMobile->first(function (MobileAttendance $att) use ($dateStr) {
                    return $att->attendance_date && $att->attendance_date->format('Y-m-d') === $dateStr;
                });

                if ($mobileAtt) {
                    $isOnTime = $mobileAtt->isOnTime();
                    $score = (float) $mobileAtt->score;

                    if ($isOnTime) {
                        $pesertaOnTime++;
                    } else {
                        $pesertaLateEarly++;
                    }

                    $pesertaScoreTotal += $score;
                    $pesertaMobileCount++;

                    $inPhoto = $mobileAtt->photos ? $mobileAtt->photos->firstWhere('type', 'check_in') : null;
                    $outPhoto = $mobileAtt->photos ? $mobileAtt->photos->firstWhere('type', 'check_out') : null;

                    $dailyDetails[$dateStr] = [
                        'mobile_attendance_id' => $mobileAtt->id,
                        'in_photo_id' => $inPhoto?->id,
                        'out_photo_id' => $outPhoto?->id,
                        'status' => $mobileAtt->status,
                        'status_label' => $isOnTime ? 'Tepat Waktu' : 'Terlambat/Awal',
                        'score' => $score,
                        'source' => 'Mobile',
                        'check_in' => $mobileAtt->check_in_at ? $mobileAtt->check_in_at->setTimezone('Asia/Jakarta')->format('H:i:s') : '-',
                        'check_out' => $mobileAtt->check_out_at ? $mobileAtt->check_out_at->setTimezone('Asia/Jakarta')->format('H:i:s') : '-',
                        'is_libur' => $isHoliday,
                    ];

                    continue;
                }

                // Prioritas 2: Log Fingerprint Pools
                $datePools = $pesertaPools->filter(function (Pool $p) use ($dateStr) {
                    return $p->date && $p->date->format('Y-m-d') === $dateStr;
                })->sortBy('time');

                if ($datePools->isNotEmpty()) {
                    $earliest = $datePools->first();
                    $latest = $datePools->last();

                    $checkInTime = $earliest->time;
                    $checkOutTime = null;

                    // Jika terdapat >1 scan di hari yang sama, gunakan scan terakhir jika selisih waktu >= 5 menit (300 detik)
                    if ($latest->id !== $earliest->id) {
                        $tEarliest = strtotime("{$dateStr} {$earliest->time}");
                        $tLatest = strtotime("{$dateStr} {$latest->time}");
                        if ($tEarliest !== false && $tLatest !== false && ($tLatest - $tEarliest) >= 300) {
                            $checkOutTime = $latest->time;
                        }
                    }

                    $eval = $this->calculationService->evaluateAttendance(
                        $peserta,
                        "{$dateStr} {$checkInTime}",
                        $checkOutTime ? "{$dateStr} {$checkOutTime}" : null
                    );

                    $isOnTime = in_array($eval['status'], MobileAttendance::onTimeStatuses(), true);
                    $score = (float) $eval['score'];

                    if ($isOnTime) {
                        $pesertaOnTime++;
                    } else {
                        $pesertaLateEarly++;
                    }

                    $pesertaScoreTotal += $score;
                    $pesertaFingerprintCount++;

                    $dailyDetails[$dateStr] = [
                        'mobile_attendance_id' => null,
                        'in_photo_id' => null,
                        'out_photo_id' => null,
                        'status' => $eval['status'],
                        'status_label' => $isOnTime ? 'Tepat Waktu' : 'Terlambat/Awal',
                        'score' => $score,
                        'source' => 'Fingerprint',
                        'check_in' => $checkInTime,
                        'check_out' => $checkOutTime ?? '-',
                        'is_libur' => $isHoliday,
                    ];

                    continue;
                }

                // Prioritas 3: Permohonan Izin / Sakit Disetujui
                $approvedLeave = $pesertaLeaves->first(function (PermohonanIzin $leave) use ($dateStr) {
                    $mulai = $leave->tgl_mulai->format('Y-m-d');
                    $selesai = $leave->tgl_selesai->format('Y-m-d');

                    return $dateStr >= $mulai && $dateStr <= $selesai;
                });

                if ($approvedLeave) {
                    $isSakit = strtolower($approvedLeave->jenis) === 'sakit';
                    if ($isSakit) {
                        $pesertaSakit++;
                    } else {
                        $pesertaIzin++;
                    }

                    $dailyDetails[$dateStr] = [
                        'mobile_attendance_id' => null,
                        'in_photo_id' => null,
                        'out_photo_id' => null,
                        'status' => $isSakit ? 'sakit' : 'izin',
                        'status_label' => $isSakit ? 'Sakit' : 'Izin',
                        'score' => 0.0,
                        'source' => 'Izin',
                        'check_in' => '-',
                        'check_out' => '-',
                        'notes' => $approvedLeave->alasan,
                        'is_libur' => $isHoliday,
                    ];

                    continue;
                }

                // Prioritas 4: Hari Libur vs Alpha
                if ($isHoliday) {
                    $dailyDetails[$dateStr] = [
                        'mobile_attendance_id' => null,
                        'in_photo_id' => null,
                        'out_photo_id' => null,
                        'status' => 'libur',
                        'status_label' => 'Libur ('.$holidayDesc.')',
                        'score' => 0.0,
                        'source' => 'Libur',
                        'check_in' => '-',
                        'check_out' => '-',
                        'is_libur' => true,
                    ];
                } else {
                    $pesertaAlpha++;
                    $dailyDetails[$dateStr] = [
                        'mobile_attendance_id' => null,
                        'in_photo_id' => null,
                        'out_photo_id' => null,
                        'status' => 'alpha',
                        'status_label' => 'Alpha',
                        'score' => 0.0,
                        'source' => 'System',
                        'check_in' => '-',
                        'check_out' => '-',
                        'is_libur' => false,
                    ];
                }
            }

            $totalHadir = $pesertaOnTime + $pesertaLateEarly;

            $totalHadirTepatWaktu += $pesertaOnTime;
            $totalTerlambatEarly += $pesertaLateEarly;
            $totalIzin += $pesertaIzin;
            $totalSakit += $pesertaSakit;
            $totalAlpha += $pesertaAlpha;
            $totalPointsAll += $pesertaScoreTotal;
            $totalSourceMobile += $pesertaMobileCount;
            $totalSourceFingerprint += $pesertaFingerprintCount;

            $records[] = [
                'peserta' => $peserta,
                'hadir_tepat_waktu' => $pesertaOnTime,
                'hadir_terlambat_early' => $pesertaLateEarly,
                'total_hadir' => $totalHadir,
                'izin' => $pesertaIzin,
                'sakit' => $pesertaSakit,
                'alpha' => $pesertaAlpha,
                'total_points' => round($pesertaScoreTotal, 2),
                'sources' => [
                    'mobile' => $pesertaMobileCount,
                    'fingerprint' => $pesertaFingerprintCount,
                ],
                'daily' => $dailyDetails,
            ];
        }

        $summary = [
            'total_peserta' => count($pesertas),
            'total_hadir_tepat_waktu' => $totalHadirTepatWaktu,
            'total_terlambat_early' => $totalTerlambatEarly,
            'total_hadir' => $totalHadirTepatWaktu + $totalTerlambatEarly,
            'total_izin' => $totalIzin,
            'total_sakit' => $totalSakit,
            'total_alpha' => $totalAlpha,
            'total_points' => round($totalPointsAll, 2),
            'source_mobile' => $totalSourceMobile,
            'source_fingerprint' => $totalSourceFingerprint,
        ];

        return [
            'period' => [
                'mode' => $mode,
                'year' => $year,
                'month' => $month,
                'start' => $startDate,
                'end' => $endDate,
                'label' => $periodLabel,
                'reference_date' => $referenceDate ?? $startDate->toDateString(),
            ],
            'summary' => $summary,
            'records' => $records,
            'dates' => $periodDates,
        ];
    }

    /**
     * Mengambil rekapitulasi lengkap untuk 1 peserta spesifik.
     *
     * @return array{
     *     period: array{mode: string, year: int, month: int, start: Carbon, end: Carbon, label: string, reference_date: string},
     *     dates: array<int, array{date: string, day_name: string, is_libur: bool, libur_ket: ?string}>,
     *     record: ?array<string, mixed>,
     *     summary: array<string, mixed>
     * }
     */
    public function getRecapForPeserta(
        Peserta $peserta,
        int $year,
        int $month,
        string $mode = 'bulanan',
        ?string $referenceDate = null
    ): array {
        $recap = $this->generateRecap(
            $year,
            $month,
            null,
            null,
            $mode,
            $referenceDate,
            $peserta
        );

        $record = collect($recap['records'])->firstWhere('peserta.id', $peserta->id);

        return [
            'period' => $recap['period'],
            'dates' => $recap['dates'],
            'record' => $record,
            'summary' => $recap['summary'],
        ];
    }
}
