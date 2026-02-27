<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class SleekflowLogExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $sleekflowLogs;

    public function __construct(object $sleekflowLogs)
    {
        $this->sleekflowLogs = $sleekflowLogs;
    }

    public function view(): View
    {
        return view('excel.sleekflow-log', [
            'sleekflowLogs' => $this->sleekflowLogs,
        ]);
    }
}
