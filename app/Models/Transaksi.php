<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['barang_id', 'jumlah', 'tipe', 'keterangan'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}