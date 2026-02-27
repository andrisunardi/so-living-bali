<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ContactSubjectExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $contactSubjects;

    public function __construct(object $contactSubjects)
    {
        $this->contactSubjects = $contactSubjects;
    }

    public function view(): View
    {
        return view('excel.contact-subject', [
            'contactSubjects' => $this->contactSubjects,
        ]);
    }
}
