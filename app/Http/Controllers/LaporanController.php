<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function barangPdf()
    {
        // ambil data barang dari database
        $barang = Barang::all();

        // load view pdf
        $pdf = Pdf::loadView('laporan.pdf.barang', compact('barang'));

        // download pdf
        return $pdf->download('laporan-barang.pdf');
    }
}