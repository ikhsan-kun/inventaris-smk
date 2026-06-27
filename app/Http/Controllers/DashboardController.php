<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\PeminjamanExport;
use App\Exports\AsetExport;
use App\Exports\SemuaLaporanExport;

use App\Models\Peminjaman;
use App\Models\Asset;
use App\Models\Barang;
use App\Models\Ruangan;
use App\Models\Transaksi;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // USER PROFILE
        $user = User::first();

        // TOTAL BARANG
        $totalBarang = Barang::count();

        // TOTAL ASET
        $totalAset = Asset::count();

        // TOTAL BARANG MASUK
        $barangMasuk = Transaksi::where(
            'tipe',
            'masuk'
        )->sum('jumlah');

        // TOTAL BARANG KELUAR
        $barangKeluar = Transaksi::where(
            'tipe',
            'keluar'
        )->sum('jumlah');

        // PEMINJAMAN AKTIF
        $peminjamanAktif = Peminjaman::where(
            'status',
            '!=',
            'dikembalikan'
        )->count();
        
        // DATA GURU & SISWA
        $guru = 0;
        $siswa = 0;

        // GRAFIK INVENTARIS
        $grafikMasuk = [];
        $grafikKeluar = [];

        for ($i = 1; $i <= 12; $i++) {

            $masuk = Transaksi::where('tipe', 'masuk')
                ->whereMonth('created_at', $i)
                ->sum('jumlah');

            $keluar = Transaksi::where('tipe', 'keluar')
                ->whereMonth('created_at', $i)
                ->sum('jumlah');

            $grafikMasuk[] = $masuk;
            $grafikKeluar[] = $keluar;
        }

        return view('dashboard', compact(

            'user',

            'totalBarang',
            'totalAset',
            'barangMasuk',
            'barangKeluar',
            'peminjamanAktif',

            'grafikMasuk',
            'grafikKeluar',

            // TAMBAHAN
            'guru',
            'siswa'

        ));
    }

    // DATA BARANG
    public function dataBarang()
    {
        $barangs = Barang::all();

        return view('databarang', compact(
            'barangs'
        ));
    }

    // DATA ASET
    public function dataAset()
    {
        $asets = Asset::all();

        return view('dataaset', compact(
            'asets'
        ));
    }

    // BARANG MASUK
    public function barangMasuk()
    {
        $transaksiMasuk = Transaksi::with('barang')
            ->where('tipe', 'masuk')
            ->latest()
            ->get();

        $barangs = Barang::all();

        return view('barangmasuk', compact(

            'transaksiMasuk',

            'barangs'

        ));
    }

    // SIMPAN BARANG MASUK

    public function storeMasuk(Request $request)
    {
        Transaksi::create([

            'barang_id' => $request->barang_id,

            'jumlah' => $request->jumlah,

            'tipe' => 'masuk',

            'keterangan' => $request->keterangan

        ]);

        $barang = Barang::find(
            $request->barang_id
        );

        if ($barang) {

            $barang->stok += $request->jumlah;

            $barang->save();
        }

        return redirect()->route(
            'barang.masuk'
        );
    }

    // INVENTARIS KELUAR

    public function inventarisKeluar()
    {
        $transaksiKeluar = Transaksi::where('tipe', 'keluar')
            ->latest()
            ->get();

        $barangs = Barang::all();

        $asets = Asset::all();

        return view(
            'inventariskeluar',
            compact(
                'transaksiKeluar',
                'barangs',
                'asets'
            )
        );
    }

    public function storeKeluar(Request $request)
    {
        if ($request->tipe == 'barang') {

            $barang = Barang::find($request->barang_id);

            // cek barang ada
            if (!$barang) {

                return back()->with(
                    'error',
                    'Barang tidak ditemukan'
                );
            }

            // cek stok
            if ($barang->stok < $request->jumlah) {

                return back()->with(
                    'error',
                    'Stok barang tidak mencukupi!'
                );
            }

            // simpan transaksi
            Transaksi::create([

                'barang_id' => $barang->id,

                'jumlah' => $request->jumlah,

                'tipe' => 'keluar',

                'keterangan' => $request->keterangan

            ]);

            // kurangi stok
            $barang->stok -= $request->jumlah;

            $barang->save();
        }

        // JIKA ASET
        if ($request->tipe == 'aset') {

            $aset = Asset::find($request->aset_id);

            // cek aset ada
            if (!$aset) {

                return back()->with(
                    'error',
                    'Aset tidak ditemukan'
                );
            }

            // cek stok
            if ($aset->stok < $request->jumlah) {

                return back()->with(
                    'error',
                    'Stok aset tidak mencukupi!'
                );
            }

            // simpan transaksi
            Transaksi::create([

                'asset_id' => $aset->id,

                'jumlah' => $request->jumlah,

                'tipe' => 'keluar',

                'keterangan' => $request->keterangan

            ]);

            // kurangi stok
            $aset->stok -= $request->jumlah;

            $aset->save();
        }

        return redirect()
            ->route('inventaris.keluar')
            ->with(
                'success',
                'Inventaris berhasil dikeluarkan'
            );
    }

// UPDATE INVENTARIS KELUAR
public function updateKeluar(Request $request, $id)
{
    $transaksi = Transaksi::findOrFail($id);

    $transaksi->jumlah = $request->jumlah;

    $transaksi->keterangan = $request->keterangan;

    $transaksi->save();

    return back()->with(
        'success',
        'Transaksi berhasil diupdate'
    );
}

// HAPUS INVENTARIS KELUAR
public function destroyKeluar($id)
{
    $transaksi = Transaksi::findOrFail($id);

    // kembalikan stok barang
    if ($transaksi->barang) {

        $barang = $transaksi->barang;

        $barang->stok += $transaksi->jumlah;

        $barang->save();
    }

    // kembalikan stok aset
    if ($transaksi->asset) {

        $aset = $transaksi->asset;

        $aset->stok += $transaksi->jumlah;

        $aset->save();
    }

    $transaksi->delete();

    return back()->with(
        'success',
        'Transaksi berhasil dihapus'
    );
}

    // PEMINJAMAN
    public function peminjaman()
    {
        $barangs = Barang::all();

        return view('peminjaman', compact(
            'barangs'
        ));
    }

    // DATA RUANGAN
    public function dataRuangan()
    {
        return view('dataruangan');
    }

    // LAPORAN
    public function laporan()
    {
        $statistik = Transaksi::select(

            DB::raw("MONTHNAME(created_at) as bulan"),

            DB::raw("
                SUM(
                    CASE
                        WHEN tipe = 'masuk'
                        THEN jumlah
                        ELSE 0
                    END
                ) as masuk
            "),

            DB::raw("
                SUM(
                    CASE
                        WHEN tipe = 'keluar'
                        THEN jumlah
                        ELSE 0
                    END
                ) as keluar
            ")

        )
        ->groupBy('bulan')
        ->get();

        $kategori = Barang::select(

            'kategori',

            DB::raw('count(*) as total')

        )
        ->groupBy('kategori')
        ->get();

        return view('laporan', compact(

            'statistik',

            'kategori'

        ));
    }

// PDF PEMINJAMAN
public function laporanPeminjamanPdf()
{
    $data = Peminjaman::with([
        'user',
        'barang',
        'aset'
    ])->latest()->get();

    $pdf = Pdf::loadView(
        'laporan.pdf.peminjaman',
        compact('data')
    );

    return $pdf->download(
        'laporan-peminjaman.pdf'
    );
}

// PDF ASET
public function laporanAsetPdf()
{
    $data = Asset::latest()->get();

    $pdf = Pdf::loadView(
        'laporan.pdf.aset',
        compact('data')
    );

    return $pdf->download(
        'laporan-aset.pdf'
    );
}

public function laporanRuanganPdf()
{
    $data = Ruangan::latest()->get();

    $pdf = Pdf::loadView(
        'laporan.pdf.ruangan',
        compact('data')
    );

    return $pdf->download(
        'laporan-ruangan.pdf'
    );
}

// EXCEL PEMINJAMAN
public function laporanPeminjamanExcel()
{
    return Excel::download(
        new PeminjamanExport,
        'laporan-peminjaman.xlsx'
    );
}

// EXCEL ASET
public function laporanAsetExcel()
{
    return Excel::download(
        new AsetExport,
        'laporan-aset.xlsx'
    );
}

// PDF SEMUA
public function laporanSemuaPdf()
{
    $barang = Barang::all();

    $aset = Asset::all();

    $peminjaman = Peminjaman::with([
        'user',
        'barang',
        'aset'
    ])->get();

    $pdf = Pdf::loadView(
        'laporan.pdf.semua',
        compact(
            'barang',
            'aset',
            'peminjaman'
        )
    );

    return $pdf->download(
        'laporan-semua.pdf'
    );
}

// EXCEL SEMUA
public function laporanSemuaExcel()
{
    return Excel::download(
        new SemuaLaporanExport,
        'laporan-semua.xlsx'
    );
}
}