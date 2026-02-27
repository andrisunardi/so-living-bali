<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OutletExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $outlets;

    public function __construct(object $outlets)
    {
        $this->outlets = $outlets;
    }

    public function view(): View
    {
        return view('excel.outlet', [
            'outlets' => $this->outlets,
        ]);
    }
}
