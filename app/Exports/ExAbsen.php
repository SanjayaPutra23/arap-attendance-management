<?php

namespace App\Exports;

use App\Models\Absensi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ExAbsen implements FromView, ShouldAutoSize
{

    private $detailArray;
    private $tgllist;

    public function __construct($detailArray, $tgllist)
    {
        $this->detailArray = $detailArray;
        $this->tgllist = $tgllist;

    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $list = $this->detailArray;
        $tglx = $this->tgllist;

        return view('export.exportabsen', [
            "list" => $list,
            "tgls"=> $tglx
        ]);
    }
}
