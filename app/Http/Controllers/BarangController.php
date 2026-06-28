<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // =========================
    // TAMPILKAN DATA BARANG
    // =========================
    public function index(Request $request)
    {
        // AMBIL INPUT SEARCH
        $search = $request->search;

        // SEARCH DATA
        $barangs = Barang::when($search, function ($query) use ($search) {

            $query->where('nama_barang', 'like', "%{$search}%")
                ->orWhere('kode_barang', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");

        })
            ->latest()
            ->get();

        // TAMPILKAN KE VIEW
        return view('databarang', compact(
            'barangs',
            'search'
        ));
    }

    // =========================
    // FORM TAMBAH BARANG (redirect ke barang masuk)
    // =========================
    public function create()
    {
        return redirect()->route('barang.masuk');
    }

    // =========================
    // SIMPAN DATA BARANG
    // =========================
    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([

            'foto' => 'required|image',

            'nama_barang' => 'required',

            'kode_barang' => 'required|unique:barangs,kode_barang',

            'kategori' => 'required',

            'lokasi' => 'required',

            'stok' => 'required',

            'kondisi' => 'required',

        ]);

        // UPLOAD FOTO
        $foto = time() . '.' . $request->foto->extension();

        $request->foto->move(
            public_path('foto-barang'),
            $foto
        );

        // SIMPAN DATABASE
        Barang::create([

            'foto' => $foto,

            'nama_barang' => $request->nama_barang,

            'kode_barang' => $request->kode_barang,

            'kategori' => $request->kategori,

            'lokasi' => $request->lokasi,

            'stok' => $request->stok,

            'kondisi' => $request->kondisi,

            'keterangan' => $request->keterangan,

        ]);

        // REDIRECT
        return redirect('/barang')
            ->with(
                'success',
                'Barang berhasil ditambahkan'
            );
    }

    public function detail($id)
    {
        $barang = Barang::findOrFail($id);

        return view(
            'detailbarangqr',
            compact('barang')
        );
    }
}