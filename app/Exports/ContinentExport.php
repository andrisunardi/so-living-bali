<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ContinentExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $continents;

    public function __construct(object $continents)
    {
        $this->continents = $continents;
    }

    public function view(): View
    {
        return view('excel.continent', [
            'continents' => $this->continents,
        ]);
    }
}
