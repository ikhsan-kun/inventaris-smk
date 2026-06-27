<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function barangMasuk()
    {
        // Ambil data transaksi yang tipenya 'masuk'
        $transaksi = Transaksi::with('barang')->where('tipe', 'masuk')->latest()->get();
        $barangs = Barang::all(); // Untuk pilihan di modal tambah
        return view('barang-masuk', compact('transaksi', 'barangs'));
    }

    public function simpanMasuk(Request $request)
    {
        DB::transaction(function () use ($request) {
            // 1. Catat di tabel transaksi
            Transaksi::create([
                'barang_id' => $request->barang_id,
                'jumlah' => $request->jumlah,
                'tipe' => 'masuk',
                'keterangan' => $request->keterangan,
            ]);

            // 2. Update stok di tabel barangs (TAMBAH)
            $barang = Barang::find($request->barang_id);
            $barang->increment('stok', $request->jumlah);
        });

        return redirect()->back()->with('success', 'Stok berhasil ditambah!');
    }
}
