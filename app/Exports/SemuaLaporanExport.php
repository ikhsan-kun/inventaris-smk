<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SemuaLaporanExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [

            new BarangExport,
            new AsetExport,
            new PeminjamanExport

        ];
    }
}