<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PartnershipExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $partnerships;

    public function __construct(object $partnerships)
    {
        $this->partnerships = $partnerships;
    }

    public function view(): View
    {
        return view('excel.partnership', [
            'partnerships' => $this->partnerships,
        ]);
    }
}
