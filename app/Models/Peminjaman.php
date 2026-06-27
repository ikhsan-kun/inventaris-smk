<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Asset;
use App\Models\Guru;
use App\Models\Siswa;

class Peminjaman extends Model
{
    use HasFactory;

    // TAMBAHAN INI
    protected $table = 'peminjamans';

    protected $fillable = [

        'user_id',

        'peminjam_tipe',
        'peminjam_id',

        'barang_id',
        'aset_id',

        'jenis',
        'jumlah',
        'jumlah_kembali',

        'tanggal_pinjam',
        'tanggal_kembali',

        'kondisi_pinjam',
        'kondisi_kembali',

        'lokasi_pengembalian',

        'keterangan',
        'keterangan_kembali',

        'foto_pengembalian',

        'status',
        'notifikasi'
    ];

    // =========================
    // RELASI USER
    // =========================
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // =========================
    // RELASI BARANG
    // =========================
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    // =========================
    // RELASI ASET
    // =========================
    public function aset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function guru()
    {
        return $this->belongsTo(
            Guru::class,
            'peminjam_id'
        );
    }

    public function siswa()
    {
        return $this->belongsTo(
            Siswa::class,
            'peminjam_id'
        );
    }

}