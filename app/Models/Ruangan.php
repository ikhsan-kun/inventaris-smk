<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $fillable = [

        'nama_ruangan',
        'kode_ruangan',
        'penanggung_jawab',
        'kapasitas',
        'lokasi',
        'jenis',
        'deskripsi',

    ];
}