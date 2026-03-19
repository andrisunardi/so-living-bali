<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OauthExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $oauths;

    public function __construct(object $oauths)
    {
        $this->oauths = $oauths;
    }

    public function view(): View
    {
        return view('excel.oauth', [
            'oauths' => $this->oauths,
        ]);
    }
}
