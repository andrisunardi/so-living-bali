<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AnnouncementExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $announcements;

    public function __construct(object $announcements)
    {
        $this->announcements = $announcements;
    }

    public function view(): View
    {
        return view('excel.announcement', [
            'announcements' => $this->announcements,
        ]);
    }
}
