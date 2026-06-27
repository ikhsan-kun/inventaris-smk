<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',

        'nama',
        'nis',
        'kelas',
        'no_hp'

    ];
}