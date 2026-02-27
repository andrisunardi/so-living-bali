<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NationalityExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $nationalities;

    public function __construct(object $nationalities)
    {
        $this->nationalities = $nationalities;
    }

    public function view(): View
    {
        return view('excel.nationality', [
            'nationalities' => $this->nationalities,
        ]);
    }
}
