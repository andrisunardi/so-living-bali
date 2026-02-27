<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AreaExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $areas;

    public function __construct(object $areas)
    {
        $this->areas = $areas;
    }

    public function view(): View
    {
        return view('excel.area', [
            'areas' => $this->areas,
        ]);
    }
}
