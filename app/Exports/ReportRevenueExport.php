<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportRevenueExport implements FromView
{
    private $_results;

    public function __construct($results)
    {
        $this->_results = $results;
    }

    public function view(): View
    {
        return view(
            'pages.admin.reports.exports.revenue_xlsx',
            [
                'revenues' => $this->_results,
            ]
        );
    }
}
