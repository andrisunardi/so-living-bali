<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class FaqExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $faqs;

    public function __construct(object $faqs)
    {
        $this->faqs = $faqs;
    }

    public function view(): View
    {
        return view('excel.faq', [
            'faqs' => $this->faqs,
        ]);
    }
}
