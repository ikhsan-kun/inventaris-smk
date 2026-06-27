<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;

class AsetExport implements FromCollection
{
    public function collection()
    {
        return Asset::all();
    }
}