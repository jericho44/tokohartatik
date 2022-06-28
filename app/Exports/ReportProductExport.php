<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportProductExport implements FromView
{
    public function __construct($results)
    {
        $this->_results = $results;
    }

    public function view(): View
    {
        return view(
            'pages.admin.reports.exports.product_xlsx',
            [
                'products' => $this->_results,
            ]
        );
    }
}
