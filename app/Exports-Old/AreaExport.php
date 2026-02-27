<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AreaExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public array $isShow = [];

    public array $isActive = [];

    public object $areas;

    public function __construct(
        array $isShow,
        array $isActive,
        object $areas,
    ) {
        $this->isShow = $isShow;
        $this->isActive = $isActive;
        $this->areas = $areas;
    }

    public function view(): View
    {
        return view('excel.area', [
            'isShow' => $this->isShow,
            'isActive' => $this->isActive,
            'areas' => $this->areas,
        ]);
    }
}
