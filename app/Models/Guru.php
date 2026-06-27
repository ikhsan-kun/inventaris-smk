<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [

        'user_id',

        'nama',
        'nip',
        'kode',
        'tempat_lahir',
        'tanggal_lahir',
        'jabatan',
        'no_hp'

    ];
}