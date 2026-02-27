<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DistrictExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public array $isShow = [];

    public array $isActive = [];

    public object $districts;

    public function __construct(
        array $isShow,
        array $isActive,
        object $districts,
    ) {
        $this->isShow = $isShow;
        $this->isActive = $isActive;
        $this->districts = $districts;
    }

    public function view(): View
    {
        return view('excel.district', [
            'isShow' => $this->isShow,
            'isActive' => $this->isActive,
            'districts' => $this->districts,
        ]);
    }
}
