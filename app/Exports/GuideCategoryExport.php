<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GuideCategoryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $guideCategories;

    public function __construct(object $guideCategories)
    {
        $this->guideCategories = $guideCategories;
    }

    public function view(): View
    {
        return view('excel.guide-category', [
            'guideCategories' => $this->guideCategories,
        ]);
    }
}
