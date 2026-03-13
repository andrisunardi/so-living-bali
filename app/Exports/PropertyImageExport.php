<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PropertyImageExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $propertyImages;

    public function __construct(object $propertyImages)
    {
        $this->propertyImages = $propertyImages;
    }

    public function view(): View
    {
        return view('excel.property-image', [
            'propertyImages' => $this->propertyImages,
        ]);
    }
}
