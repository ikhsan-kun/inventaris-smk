<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Ruangan;

class BarangMasukController extends Controller
{
    // =========================
    // HALAMAN BARANG MASUK
    // =========================
    public function index()
    {
        $transaksiMasuk = Barang::latest()->get();

        $ruangans = Ruangan::all();

        return view('barangmasuk', compact(
            'transaksiMasuk',
            'ruangans'
        ));
    }

    // =========================
    // SIMPAN BARANG
    // =========================
    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([

            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'nama_barang' => 'required',

            'tanggal_masuk' => 'required',

            'kode_barang' => 'required|unique:barangs,kode_barang',

            'kategori' => 'required',

            'lokasi' => 'required',

            'stok' => 'required',

            'satuan' => 'required',

            'kondisi' => 'required',

        ]);

        // FOTO
        $namaFoto = null;

        if ($request->hasFile('foto')) {

            $namaFoto = time().'.'.$request->foto->extension();

            $request->foto->move(
                public_path('foto-barang'),
                $namaFoto
            );
        }

        // SIMPAN DATABASE
        Barang::create([

            'foto' => $namaFoto,

            'nama_barang' => $request->nama_barang,

            'tanggal_masuk' => $request->tanggal_masuk,

            'kode_barang' => $request->kode_barang,

            'kategori' => $request->kategori,

            'lokasi' => $request->lokasi,

            'stok' => $request->stok,

            'satuan' => $request->satuan,

            'kondisi' => $request->kondisi,

            'keterangan' => $request->keterangan,

        ]);

        // REDIRECT
        return redirect('/barang-masuk')
            ->with(
                'success',
                'Barang berhasil ditambahkan'
            );
    }

    // =========================
    // UPDATE BARANG
    // =========================
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        // VALIDASI
        $request->validate([

            'nama_barang' => 'required',

            'tanggal_masuk' => 'required',

            'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,

            'kategori' => 'required',

            'lokasi' => 'required',

            'stok' => 'required',

            'satuan' => 'required',

            'kondisi' => 'required',

        ]);

        // UPDATE FOTO
        if ($request->hasFile('foto')) {

            $namaFoto = time().'.'.$request->foto->extension();

            $request->foto->move(
                public_path('foto-barang'),
                $namaFoto
            );

            $barang->foto = $namaFoto;
        }

        // UPDATE DATA
        $barang->nama_barang = $request->nama_barang;

        $barang->tanggal_masuk = $request->tanggal_masuk;

        $barang->kode_barang = $request->kode_barang;

        $barang->kategori = $request->kategori;

        $barang->lokasi = $request->lokasi;

        $barang->stok = $request->stok;

        $barang->satuan = $request->satuan;

        $barang->kondisi = $request->kondisi;

        $barang->keterangan = $request->keterangan;

        // SIMPAN
        $barang->save();

        return back()->with(
            'success',
            'Barang berhasil diupdate'
        );
    }

    // =========================
    // HAPUS BARANG
    // =========================
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // HAPUS FOTO
        if ($barang->foto) {

            $path = public_path(
                'foto-barang/' . $barang->foto
            );

            if (file_exists($path)) {

                unlink($path);
            }
        }

        // HAPUS DATABASE
        $barang->delete();

        return back()->with(
            'success',
            'Barang berhasil dihapus'
        );
    }
}