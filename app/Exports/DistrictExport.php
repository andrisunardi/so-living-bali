<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DistrictExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $districts;

    public function __construct(object $districts)
    {
        $this->districts = $districts;
    }

    public function view(): View
    {
        return view('excel.district', [
            'districts' => $this->districts,
        ]);
    }
}
