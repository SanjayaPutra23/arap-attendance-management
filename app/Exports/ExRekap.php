<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExRekap implements FromView, ShouldAutoSize
{
    private $detailArray;
    private $tgllist;

    public function __construct($detailArray, $tgllist)
    {
        $this->detailArray = $detailArray;
        $this->tgllist = $tgllist;

    }

    public function view(): View
    {
        $list = $this->detailArray;
        $tglx = $this->tgllist;

        return view('export.exportrekap', [
            "list" => $list,
            "tgls"=> $tglx
        ]);
    }
}
