<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ContactExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $contacts;

    public function __construct(object $contacts)
    {
        $this->contacts = $contacts;
    }

    public function view(): View
    {
        return view('excel.contact', [
            'contacts' => $this->contacts,
        ]);
    }
}
