<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PartnershipImageExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $partnershipImages;

    public function __construct(object $partnershipImages)
    {
        $this->partnershipImages = $partnershipImages;
    }

    public function view(): View
    {
        return view('excel.partnership-image', [
            'partnershipImages' => $this->partnershipImages,
        ]);
    }
}
