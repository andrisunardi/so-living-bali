<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ContactExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public string $startDate = '';

    public string $endDate = '';

    public object $contacts;

    public function __construct(string $startDate, string $endDate, object $contacts)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->contacts = $contacts;
    }

    public function view(): View
    {
        return view('excel.contact', [
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'contacts' => $this->contacts,
        ]);
    }
}
