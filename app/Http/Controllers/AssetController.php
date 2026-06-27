<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    // =========================
    // TAMPILKAN DATA ASET
    // =========================
    public function index(Request $request)
    {
        $search = $request->search;

        $asets = Asset::when($search, function ($query) use ($search) {

            $query->where('nama_aset', 'like', "%{$search}%")
                  ->orWhere('kode_aset', 'like', "%{$search}%");

        })->orderBy('id', 'asc')->get();

        // AMBIL DATA RUANGAN
        $ruangans = Ruangan::all();

        return view('dataaset', compact('asets', 'ruangans'));
    }

    // =========================
    // SIMPAN DATA ASET
    // =========================
    public function store(Request $request)
    {
        $request->validate([

            'foto' => 'required|image',

            'nama_aset' => 'required',

            'tanggal_masuk' => 'required',

            'kode_aset' => 'required',

            'kategori' => 'required',

            'merk' => 'required',

            'lokasi' => 'required',

            'harga_beli' => 'required',

            'kondisi' => 'required',

            'stok' => 'required',

        ]);

        // =========================
        // UPLOAD FOTO
        // =========================
        $foto = time().'.'.$request->foto->extension();

        $request->foto->move(public_path('foto-aset'), $foto);

        // =========================
        // SIMPAN DATABASE
        // =========================
        Asset::create([

            'foto' => $foto,

            'nama_aset' => $request->nama_aset,

            'tanggal_masuk' => $request->tanggal_masuk,

            'kode_aset' => $request->kode_aset,

            'kategori' => $request->kategori,

            'merk' => $request->merk,

            'lokasi' => $request->lokasi,

            'harga_beli' => $request->harga_beli,

            'kondisi' => $request->kondisi,

            'stok' => $request->stok,

            'spesifikasi' => $request->spesifikasi,

        ]);

        return redirect()->back()
            ->with('success', 'Aset berhasil ditambahkan');
    }

    // =========================
    // HALAMAN EDIT
    // =========================
    public function edit($id)
    {
        $aset = Asset::findOrFail($id);

        return view('editaset', compact('aset'));
    }

    // =========================
    // UPDATE DATA
    // =========================
    public function update(Request $request, $id)
    {
        $aset = Asset::findOrFail($id);

        // =========================
        // VALIDASI
        // =========================
        $request->validate([

            'nama_aset' => 'required',

            'tanggal_masuk' => 'required',

            'kode_aset' => 'required',

            'kategori' => 'required',

            'lokasi' => 'required',

            'harga_beli' => 'required',

            'kondisi' => 'required',

            'stok' => 'required',

        ]);

        // =========================
        // UPLOAD FOTO BARU
        // =========================
        if ($request->hasFile('foto')) {

            // HAPUS FOTO LAMA
            $fotoLama = public_path('foto-aset/' . $aset->foto);

            if (file_exists($fotoLama)) {

                unlink($fotoLama);

            }

            // UPLOAD FOTO BARU
            $foto = time().'.'.$request->foto->extension();

            $request->foto->move(public_path('foto-aset'), $foto);

            $aset->foto = $foto;
        }

        // =========================
        // UPDATE DATA
        // =========================
        $aset->nama_aset = $request->nama_aset;

        $aset->tanggal_masuk = $request->tanggal_masuk;

        $aset->kode_aset = $request->kode_aset;

        $aset->kategori = $request->kategori;

        $aset->merk = $request->merk;

        $aset->lokasi = $request->lokasi;

        $aset->stok = $request->stok;

        $aset->harga_beli = $request->harga_beli;

        $aset->kondisi = $request->kondisi;

        $aset->spesifikasi = $request->spesifikasi;

        // =========================
        // SIMPAN
        // =========================
        $aset->save();

        return redirect('/data-aset')
            ->with('success', 'Data aset berhasil diupdate');
    }

    // =========================
    // HAPUS DATA
    // =========================
    public function destroy($id)
    {
        $aset = Asset::find($id);

        if ($aset) {

            // =========================
            // HAPUS FOTO
            // =========================
            $fotoPath = public_path('foto-aset/' . $aset->foto);

            if (file_exists($fotoPath)) {

                unlink($fotoPath);

            }

            // =========================
            // HAPUS DATABASE
            // =========================
            $aset->delete();
        }

        return redirect('/data-aset')
            ->with('success', 'Data aset berhasil dihapus');
    }

    public function detail($id)
    {
        $aset = Asset::findOrFail($id);

        return view(
            'detailasetqr',
            compact('aset')
        );
    }
}