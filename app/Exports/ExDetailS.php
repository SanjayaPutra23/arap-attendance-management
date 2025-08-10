<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ExDetailS implements FromView, ShouldAutoSize
{
    private $detailArray;
    private $absen;

    public function __construct($detailArray, $absen)
    {
        $this->detailArray = $detailArray;
        $this->absen = $absen;

    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $list = $this->detailArray;
        $dataabsen= $this->absen;

        return view('export.exportdetailS', [
            "list" => $list,
            "absen"=> $dataabsen
        ]);
    }
}
