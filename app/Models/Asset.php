<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    // =========================
    // NAMA TABEL
    // =========================
    protected $table = 'assets';

    // =========================
    // FIELD YANG BOLEH DISIMPAN
    // =========================
    protected $fillable = [

        'foto',

        'nama_aset',

        'tanggal_masuk',

        'kode_aset',

        'kategori',

        'merk',

        'lokasi',

        'harga_beli',

        'kondisi',

        'stok',

        'spesifikasi',

    ];
}