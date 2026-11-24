<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AttendanceRecapExport;
use App\Http\Controllers\Controller;
use App\Models\Peserta;
use App\Services\AttendanceRecapService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
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
     * Tampilkan halaman rekapitulasi kehadiran bulanan (periode tgl 20 - 19).
     */
    public function index(Request $request): View
    {
        $now = Carbon::now('Asia/Jakarta');
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);
        $divisi = $request->input('divisi');
        $search = $request->input('search');

        $recap = $this->recapService->generateRecap($year, $month, $divisi, $search);

        return view('admin.rekap.index', [
            'recap' => $recap,
            'year' => $year,
            'month' => $month,
            'divisi' => $divisi,
            'search' => $search,
            'divisions' => self::DIVISIONS,
        ]);
    }

    /**
     * Tampilkan rincian harian kehadiran untuk 1 orang peserta.
     */
    public function show(Request $request, Peserta $peserta): View
    {
        $now = Carbon::now('Asia/Jakarta');
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);

        $recap = $this->recapService->generateRecap($year, $month, null, $peserta->nik ?: $peserta->name);
        $pesertaRecord = collect($recap['records'])->firstWhere('peserta.id', $peserta->id);

        if (! $pesertaRecord) {
            abort(404, 'Data rekap peserta tidak ditemukan untuk periode ini.');
        }

        return view('admin.rekap.show', [
            'peserta' => $peserta,
            'record' => $pesertaRecord,
            'recap' => $recap,
            'year' => $year,
            'month' => $month,
        ]);
    }

    /**
     * Ekspor rekapitulasi kehadiran bulanan ke format Microsoft Excel (.xlsx).
     */
    public function exportExcel(Request $request): BinaryFileResponse
    {
        $now = Carbon::now('Asia/Jakarta');
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);
        $divisi = $request->input('divisi');
        $search = $request->input('search');

        $recap = $this->recapService->generateRecap($year, $month, $divisi, $search);
        $divisiSlug = $divisi && $divisi !== 'all' ? '_'.strtolower(str_replace(' ', '_', $divisi)) : '';
        $fileName = "Rekap_Presensi_SPPG_{$year}_{$month}{$divisiSlug}.xlsx";

        return Excel::download(new AttendanceRecapExport($recap, $divisi), $fileName);
    }

    /**
     * Ekspor rekapitulasi kehadiran bulanan ke format PDF siap cetak landscape.
     */
    public function exportPdf(Request $request): Response
    {
        $now = Carbon::now('Asia/Jakarta');
        $year = (int) $request->input('year', $now->year);
        $month = (int) $request->input('month', $now->month);
        $divisi = $request->input('divisi');
        $search = $request->input('search');

        $recap = $this->recapService->generateRecap($year, $month, $divisi, $search);
        $divisiSlug = $divisi && $divisi !== 'all' ? '_'.strtolower(str_replace(' ', '_', $divisi)) : '';
        $fileName = "Rekap_Presensi_SPPG_{$year}_{$month}{$divisiSlug}.pdf";

        $pdf = Pdf::loadView('admin.rekap.pdf', [
            'recap' => $recap,
            'divisi' => $divisi,
            'printedAt' => Carbon::now('Asia/Jakarta'),
        ])->setPaper('a4', 'landscape');

        return $pdf->download($fileName);
    }
}
