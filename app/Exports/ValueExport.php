<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ValueExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $values;

    public function __construct(object $values)
    {
        $this->values = $values;
    }

    public function view(): View
    {
        return view('excel.value', [
            'values' => $this->values,
        ]);
    }
}
