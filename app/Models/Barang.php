<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [

        'foto',
        'nama_barang',
        'tanggal_masuk',
        'kode_barang',
        'kategori',
        'lokasi',
        'stok',
        'satuan',
        'kondisi',
        'keterangan',

    ];
}