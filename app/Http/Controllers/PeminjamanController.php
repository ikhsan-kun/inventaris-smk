<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Asset;
use App\Models\Peminjaman;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Ruangan;

class PeminjamanController extends Controller
{
    // =========================
    // FORM BARANG
    // =========================
    public function formBarang($id)
    {
        $barang = Barang::findOrFail($id);

        return view('form-peminjaman', compact('barang'));
    }

    // =========================
    // FORM ASET
    // =========================
    public function formAset($id)
    {
        $aset = Asset::findOrFail($id);

        return view('form-peminjaman-aset', compact('aset'));
    }

    // =========================
    // SIMPAN PEMINJAMAN
    // =========================
    public function store(Request $request)
    {
        // USER PINJAM BARANG
        if ($request->jenis == 'barang')
        {
            $barang = Barang::find($request->barang_id);

            if(!$barang)
            {
                return back()->with(
                    'error',
                    'Barang tidak ditemukan'
                );
            }

            if($request->jumlah > $barang->stok)
            {
                return back()->with(
                    'error',
                    'Jumlah pinjaman melebihi stok tersedia'
                );
            }

            Peminjaman::create([

                'user_id' => session('user_id'),

                'barang_id' => $request->barang_id,

                'jenis' => 'barang',

                'jumlah' => $request->jumlah,

                'tanggal_pinjam' => $request->tanggal_pinjam,

                'kondisi_pinjam' => $request->kondisi_pinjam,

                'keterangan' => $request->keterangan,

                'status' => 'pending'

            ]);

            return redirect('/dashboard-peminjam')
                ->with(
                    'success',
                    'Peminjaman berhasil diajukan'
                );
        }

        // ADMIN INPUT ASET
        else
        {

            $aset = Asset::find($request->aset_id);

            if(!$aset)
            {
                return back()->with(
                    'error',
                    'Aset tidak ditemukan'
                );
            }

            if($request->jumlah > $aset->stok)
            {
                return back()->with(
                    'error',
                    'Jumlah pinjaman melebihi stok aset'
                );
            }

            $peminjamId = null;

            if ($request->peminjam_tipe == 'guru')
            {
                $peminjamId = $request->guru_id;
            }

            if ($request->peminjam_tipe == 'siswa')
            {
                $peminjamId = $request->siswa_id;
            }

            Peminjaman::create([

                'user_id'       => session('admin_id') ?? session('user_id'),

                'peminjam_tipe' => $request->peminjam_tipe,
                'peminjam_id'   => $peminjamId,

                'aset_id' => $request->aset_id,

                'jenis' => 'aset',

                'jumlah' => $request->jumlah,

                'tanggal_pinjam' => $request->tanggal_pinjam,

                'kondisi_pinjam' => $request->kondisi_pinjam,

                'keterangan' => $request->keterangan,

                'status' => 'pending'
            ]);

            return redirect('/peminjaman')
            ->with('success', 'Data peminjaman berhasil ditambahkan');
        }

    }

    // =========================
    // RIWAYAT PEMINJAM
    // =========================
    public function riwayat()
    {
        $userId = session('user_id');

        $riwayat = Peminjaman::with([
            'barang',
            'aset',
            'guru',
            'siswa'
        ])
        ->where('user_id', $userId)
        ->latest()
        ->get();

        $ruangans = Ruangan::all();

        return view(
            'riwayatpeminjaman',
            compact(
                'riwayat',
                'ruangans'
            )
        );
    }

    // =========================
    // DATA PEMINJAMAN ADMIN
    // =========================
    public function index()
    {
        $peminjaman = Peminjaman::with([
            'user',
            'guru',
            'siswa',
            'barang',
            'aset'
        ])->latest()->get();

        $barangs = Barang::all();
        $asets = Asset::all();

        $gurus = Guru::all();
        $siswas = Siswa::all();
        $ruangans = Ruangan::all();

        return view('peminjaman', compact(
            'peminjaman',
            'barangs',
            'asets',
            'gurus',
            'siswas',
            'ruangans'
        ));
    }

    public function setujui($id)
    {
        $data = Peminjaman::findOrFail($id);

        // Kurangi stok barang
        if($data->barang_id)
        {
            $barang = Barang::find($data->barang_id);

            if($barang)
            {
                if($barang->stok < $data->jumlah)
                {
                    return back()->with(
                        'error',
                        'Stok barang tidak mencukupi'
                    );
                }

                $barang->stok -= $data->jumlah;
                $barang->save();
            }
        }

        // Kurangi stok aset
        if($data->aset_id)
        {
            $aset = Asset::find($data->aset_id);

            if($aset)
            {
                if($aset->stok < $data->jumlah)
                {
                    return back()->with(
                        'error',
                        'Stok aset tidak mencukupi'
                    );
                }

                $aset->stok -= $data->jumlah;
                $aset->save();
            }
        }

        $data->status = 'disetujui';

        $data->notifikasi =
            'Peminjaman barang Anda telah disetujui';

        $data->save();

        return back();
    }

    public function tolak($id)
    {
        $data = Peminjaman::findOrFail($id);

        $data->status = 'ditolak';

        $data->notifikasi =
            'Peminjaman barang Anda ditolak';

        $data->save();

        return back();
    }

    public function setujuiPengembalian($id)
    {
        $data = Peminjaman::findOrFail($id);

        // Kembalikan stok barang
        if($data->barang_id)
        {
            $barang = Barang::find($data->barang_id);

            if($barang)
            {
                $barang->stok += $data->jumlah_kembali;
                $barang->save();
            }
        }

        // Kembalikan stok aset
        if($data->aset_id)
        {
            $aset = Asset::find($data->aset_id);

            if($aset)
            {
                $aset->stok += $data->jumlah_kembali;
                $aset->save();
            }
        }

        $data->status = 'dikembalikan';

        $data->notifikasi =
            'Pengembalian barang telah disetujui';

        $data->save();

        return back();
    }

public function tolakPengembalian($id)
{
    $data = Peminjaman::findOrFail($id);

    $data->status = 'disetujui';

    $data->notifikasi =
        'Pengembalian barang ditolak';

    $data->save();

    return back();
}

public function detail($id)
{
    $peminjaman = Peminjaman::with([
        'user',
        'guru',
        'siswa',
        'barang',
        'aset'
    ])->findOrFail($id);

    return view(
        'detail-peminjaman',
        compact('peminjaman')
    );
}

public function update(Request $request)
{
    $data = Peminjaman::findOrFail(
        $request->id
    );

    $data->update([

        'tanggal_kembali' =>
        $request->tanggal_kembali,

        'kondisi_kembali' =>
        $request->kondisi_kembali,

        'lokasi_pengembalian' =>
        $request->lokasi_pengembalian,

        'keterangan_kembali' =>
        $request->keterangan_kembali,

        'status' => 'menunggu_verifikasi'

    ]);

    return back();
}

public function qr($id)
{
    $peminjaman = Peminjaman::findOrFail($id);

    return view(
        'qr-peminjaman',
        compact('peminjaman')
    );
}

public function hapus($id)
{
    $data = Peminjaman::findOrFail($id);

    $data->delete();

    return back()->with(
        'success',
        'Data peminjaman berhasil dihapus'
    );
}

public function pinjamBarang($id)
{
    $barangDipilih = Barang::findOrFail($id);

    $barangs = Barang::all();

    return view(
        'pinjambarang',
        compact(
            'barangs',
            'barangDipilih'
        )
    );
}

public function pengembalian(Request $request)
{
    $data = Peminjaman::findOrFail($request->id);

    if($request->jumlah_kembali < 1)
    {
        return back()->with(
            'error',
            'Jumlah pengembalian tidak valid'
        );
    }

    if($request->jumlah_kembali > $data->jumlah)
    {
        return back()->with(
            'error',
            'Jumlah pengembalian melebihi jumlah yang dipinjam'
        );
    }

    $foto = null;

    if ($request->hasFile('foto_pengembalian'))
    {
        $foto = time().'_'.$request
            ->file('foto_pengembalian')
            ->getClientOriginalName();

        $request->file('foto_pengembalian')
            ->move(public_path('foto_pengembalian'), $foto);
    }

    $data->update([

        'tanggal_kembali' =>
            $request->tanggal_kembali,

        'jumlah_kembali' =>
            $request->jumlah_kembali,

        'kondisi_kembali' =>
            $request->kondisi_kembali,

        'lokasi_pengembalian' =>
            $request->lokasi_pengembalian,

        'keterangan_kembali' =>
            $request->keterangan_kembali,

        'foto_pengembalian' =>
            $foto,

        'status' => 'menunggu_verifikasi',

        'notifikasi' =>
            'Pengembalian sedang menunggu verifikasi admin'
    ]);

    return back()->with(
        'success',
        'Pengembalian berhasil diajukan'
    );
}
}