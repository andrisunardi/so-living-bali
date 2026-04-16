<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ConceptExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $concepts;

    public function __construct(object $concepts)
    {
        $this->concepts = $concepts;
    }

    public function view(): View
    {
        return view('excel.concept', [
            'concepts' => $this->concepts,
        ]);
    }
}
