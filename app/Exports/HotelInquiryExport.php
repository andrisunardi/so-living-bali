<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class HotelInquiryExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $hotelInquiries;

    public function __construct(object $hotelInquiries)
    {
        $this->hotelInquiries = $hotelInquiries;
    }

    public function view(): View
    {
        return view('excel.hotel-inquiry', [
            'hotelInquiries' => $this->hotelInquiries,
        ]);
    }
}
