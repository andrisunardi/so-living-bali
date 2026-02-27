<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProductExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $products;

    public function __construct(object $products)
    {
        $this->products = $products;
    }

    public function view(): View
    {
        return view('excel.product', [
            'products' => $this->products,
        ]);
    }
}
