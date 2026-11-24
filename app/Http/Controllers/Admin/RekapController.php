<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AttendanceRecapExport;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Models\Setting;
use App\Services\AttendanceRecapService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RekapController extends Controller
{
    /**
     * Divisi resmi untuk filter rekapitulasi.
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

    public function __construct(
        protected AttendanceRecapService $recapService
    ) {}

    /**
     * Tampilkan halaman rekapitulasi kehadiran bulanan (20 - 19) atau mingguan.
     */
    public function index(Request $request): View
    {
        $now = Carbon::now('Asia/Jakarta');
        $mode = $request->input('mode', 'bulanan');
        if (! in_array($mode, ['bulanan', 'mingguan'], true)) {
            $mode = 'bulanan';
        }

        $date = $request->input('date', $now->toDateString());
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);

        if ($mode === 'mingguan' && $request->filled('date')) {
            $parsedDate = Carbon::parse($date, 'Asia/Jakarta');
            $year = $parsedDate->year;
            $month = $parsedDate->month;
        }

        $divisi = $request->input('divisi');
        $search = $request->input('search');

        $recap = $this->recapService->generateRecap($year, $month, $divisi, $search, $mode, $date);
        $relawanRecapMode = Setting::getValue('relawan_recap_period_mode', 'bulanan');

        return view('admin.rekap.index', [
            'recap' => $recap,
            'mode' => $mode,
            'date' => $date,
            'year' => $year,
            'month' => $month,
            'divisi' => $divisi,
            'search' => $search,
            'divisions' => self::DIVISIONS,
            'relawanRecapMode' => $relawanRecapMode,
        ]);
    }

    /**
     * Simpan preferensi mode rekap presensi untuk tampilan halaman riwayat relawan.
     */
    public function savePeriodSetting(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'mode' => ['required', 'string', 'in:bulanan,mingguan'],
        ]);

        Setting::updateOrCreate(
            ['name' => 'relawan_recap_period_mode'],
            ['value' => $validated['mode'], 'grup' => 1]
        );

        Setting::clearRuntimeCache();

        $label = $validated['mode'] === 'mingguan'
            ? 'Mingguan (Senin - Minggu)'
            : 'Bulanan (Cut-off 20 - 19)';

        return redirect()->back()->with(
            'success',
            "Pengaturan berhasil disimpan. Tampilan riwayat relawan diset ke Mode: {$label}."
        );
    }

    /**
     * Tampilkan rincian harian kehadiran untuk 1 orang peserta.
     */
    public function show(Request $request, Peserta $peserta): View
    {
        $now = Carbon::now('Asia/Jakarta');
        $mode = $request->input('mode', 'bulanan');
        if (! in_array($mode, ['bulanan', 'mingguan'], true)) {
            $mode = 'bulanan';
        }

        $date = $request->input('date', $now->toDateString());
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);

        $recap = $this->recapService->generateRecap(
            $year,
            $month,
            null,
            $peserta->nik ?: $peserta->name,
            $mode,
            $date
        );
        $pesertaRecord = collect($recap['records'])->firstWhere('peserta.id', $peserta->id);

        if (! $pesertaRecord) {
            abort(404, 'Data rekap peserta tidak ditemukan untuk periode ini.');
        }

        return view('admin.rekap.show', [
            'peserta' => $peserta,
            'record' => $pesertaRecord,
            'recap' => $recap,
            'mode' => $mode,
            'date' => $date,
            'year' => $year,
            'month' => $month,
        ]);
    }

    /**
     * Ekspor rekapitulasi kehadiran bulanan atau mingguan ke format Microsoft Excel (.xlsx).
     */
    public function exportExcel(Request $request): BinaryFileResponse
    {
        $now = Carbon::now('Asia/Jakarta');
        $mode = $request->input('mode', 'bulanan');
        if (! in_array($mode, ['bulanan', 'mingguan'], true)) {
            $mode = 'bulanan';
        }

        $date = $request->input('date', $now->toDateString());
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);
        $divisi = $request->input('divisi');
        $search = $request->input('search');

        $recap = $this->recapService->generateRecap($year, $month, $divisi, $search, $mode, $date);
        $divisiSlug = $divisi && $divisi !== 'all' ? '_'.strtolower(str_replace(' ', '_', $divisi)) : '';

        $fileName = $mode === 'mingguan'
            ? "Rekap_Presensi_Mingguan_SPPG_{$recap['period']['start']->format('Ymd')}_{$recap['period']['end']->format('Ymd')}{$divisiSlug}.xlsx"
            : "Rekap_Presensi_SPPG_{$year}_{$month}{$divisiSlug}.xlsx";

        return Excel::download(new AttendanceRecapExport($recap, $divisi), $fileName);
    }

    /**
     * Ekspor rekapitulasi kehadiran bulanan atau mingguan ke format PDF siap cetak landscape.
     */
    public function exportPdf(Request $request): Response
    {
        $now = Carbon::now('Asia/Jakarta');
        $mode = $request->input('mode', 'bulanan');
        if (! in_array($mode, ['bulanan', 'mingguan'], true)) {
            $mode = 'bulanan';
        }

        $date = $request->input('date', $now->toDateString());
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);
        $divisi = $request->input('divisi');
        $search = $request->input('search');

        $recap = $this->recapService->generateRecap($year, $month, $divisi, $search, $mode, $date);
        $divisiSlug = $divisi && $divisi !== 'all' ? '_'.strtolower(str_replace(' ', '_', $divisi)) : '';

        $fileName = $mode === 'mingguan'
            ? "Rekap_Presensi_Mingguan_SPPG_{$recap['period']['start']->format('Ymd')}_{$recap['period']['end']->format('Ymd')}{$divisiSlug}.pdf"
            : "Rekap_Presensi_SPPG_{$year}_{$month}{$divisiSlug}.pdf";

        $pdf = Pdf::loadView('admin.rekap.pdf', [
            'recap' => $recap,
            'divisi' => $divisi,
            'printedAt' => Carbon::now('Asia/Jakarta'),
        ])->setPaper('a4', 'landscape');

        return $pdf->download($fileName);
    }
}
