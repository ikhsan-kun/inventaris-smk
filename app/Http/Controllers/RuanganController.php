<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\Barang;
use App\Models\Asset;

class RuanganController extends Controller
{
    // =========================
    // HALAMAN DATA RUANGAN
    // =========================
    public function index()
    {
        $ruangans = Ruangan::latest()->get();

        return view('dataruangan', compact('ruangans'));
    }

    // =========================
    // HALAMAN TAMBAH RUANGAN
    // =========================
    public function create()
    {
        return view('tambah-ruangan');
    }

    // =========================
    // SIMPAN DATA RUANGAN
    // =========================
    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([

            'nama_ruangan' => 'required',

            'kode_ruangan' => 'required',

            'penanggung_jawab' => 'required',

            'kapasitas' => 'required',

            'lokasi' => 'required',

            'jenis' => 'required',

        ]);

        // SIMPAN
        Ruangan::create([

            'nama_ruangan' => $request->nama_ruangan,

            'kode_ruangan' => $request->kode_ruangan,

            'penanggung_jawab' => $request->penanggung_jawab,

            'kapasitas' => $request->kapasitas,

            'lokasi' => $request->lokasi,

            'jenis' => $request->jenis,

            'deskripsi' => $request->deskripsi,

        ]);

        // REDIRECT
        return redirect('/data-ruangan')
            ->with(
                'success',
                'Data ruangan berhasil ditambahkan'
            );
    }

    // =========================
    // UPDATE DATA RUANGAN
    // =========================
    public function update(Request $request, $id)
    {
        // VALIDASI
        $request->validate([

            'nama_ruangan' => 'required',

            'kode_ruangan' => 'required',

            'penanggung_jawab' => 'required',

            'kapasitas' => 'required',

            'lokasi' => 'required',

            'jenis' => 'required',

        ]);

        // CARI DATA
        $ruangan = Ruangan::find($id);

        // CEK DATA
        if (!$ruangan) {

            return back()->with(
                'error',
                'Data ruangan tidak ditemukan'
            );

        }

        // UPDATE DATA
        $ruangan->nama_ruangan = $request->nama_ruangan;

        $ruangan->kode_ruangan = $request->kode_ruangan;

        $ruangan->penanggung_jawab = $request->penanggung_jawab;

        $ruangan->kapasitas = $request->kapasitas;

        $ruangan->lokasi = $request->lokasi;

        $ruangan->jenis = $request->jenis;

        $ruangan->deskripsi = $request->deskripsi;

        // SIMPAN
        $ruangan->save();

        // REDIRECT
        return redirect('/data-ruangan')
            ->with(
                'success',
                'Data ruangan berhasil diupdate'
            );
    }

    // =========================
    // HAPUS DATA RUANGAN
    // =========================
    public function destroy($id)
    {
        // CARI DATA
        $ruangan = Ruangan::find($id);

        // HAPUS
        if ($ruangan) {

            $ruangan->delete();

        }

        // REDIRECT
        return redirect('/data-ruangan')
            ->with(
                'success',
                'Data ruangan berhasil dihapus'
            );
    }

    public function detail($id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $barangs = Barang::where(
            'lokasi',
            $ruangan->nama_ruangan
        )->get();

        $asets = Asset::where(
            'lokasi',
            $ruangan->nama_ruangan
        )->get();

        return view(
            'detail-ruangan',
            compact(
                'ruangan',
                'barangs',
                'asets'
            )
        );
    }

    public function lihatRuangan($id)
    {
        $ruangan = Ruangan::findOrFail($id);

        $barangs = Barang::where(
            'lokasi',
            $ruangan->nama_ruangan
        )->get();

        $asets = Asset::where(
            'lokasi',
            $ruangan->nama_ruangan
        )->get();

        return view(
            'lihatruangan',
            compact(
                'ruangan',
                'barangs',
                'asets'
            )
        );
    }
}