<?php

namespace App\Exports;

use App\Models\Setting;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PPdetailExport implements FromView, ShouldAutoSize
{
    private $grouped;
    private $mesinNames;

    public function __construct($grouped, $mesinNames)
    {
        $this->grouped = $grouped;
        $this->mesinNames = $mesinNames;
    }
    
    public function view(): View
    {
        $grup = $this->grouped;
        $mesin = $this->mesinNames;
        $seting = Setting::whereIn('name', [
            'sesi1_batas',
            'sesi2_batas',
            'sesi3_batas',
            'sesi4_batas'
        ])->pluck('value','name');

        return view('export.exportppdetail', [ 
            'grouped'    => $grup,
            'mesinNames' => $mesin,
            'settings'   => $seting,        
        ]);
    }
}
