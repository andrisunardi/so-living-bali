<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class NewsletterExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $newsletters;

    public function __construct(object $newsletters)
    {
        $this->newsletters = $newsletters;
    }

    public function view(): View
    {
        return view('excel.newsletter', [
            'newsletters' => $this->newsletters,
        ]);
    }
}
