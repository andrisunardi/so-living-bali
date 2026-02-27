<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SalesOutboundExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $salesOutbounds;

    public function __construct(object $salesOutbounds)
    {
        $this->salesOutbounds = $salesOutbounds;
    }

    public function view(): View
    {
        return view('excel.sales-outbound', [
            'salesOutbounds' => $this->salesOutbounds,
        ]);
    }
}
