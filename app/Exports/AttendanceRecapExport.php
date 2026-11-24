<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AttendanceRecapExport implements FromView, ShouldAutoSize
{
    /**
     * @param  array{
     *     period: array{year: int, month: int, start: Carbon, end: Carbon, label: string},
     *     summary: array<string, mixed>,
     *     records: array<int, array<string, mixed>>,
     *     dates: array<int, array<string, mixed>>
     * }  $recapData
     */
    public function __construct(
        protected array $recapData,
        protected ?string $divisi = null
    ) {}

    public function view(): View
    {
        return view('admin.rekap.excel', [
            'recap' => $this->recapData,
            'divisi' => $this->divisi,
        ]);
    }
}
