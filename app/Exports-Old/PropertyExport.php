<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PropertyExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $properties;

    public function __construct(
        object $properties,
    ) {
        $this->properties = $properties;
    }

    public function view(): View
    {
        return view('excel.property', [
            'properties' => $this->properties,
        ]);
    }
}
