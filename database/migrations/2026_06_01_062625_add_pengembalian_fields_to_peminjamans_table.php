<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPengembalianFieldsToPeminjamansTable extends Migration
{
    public function up()
    {
        Schema::table('peminjamans', function (Blueprint $table) {

            $table->string('foto_pengembalian')
                ->nullable()
                ->after('lokasi_pengembalian');

            $table->integer('jumlah_kembali')
                ->nullable()
                ->after('jumlah');

        });
    }

    public function down()
    {
        Schema::table('peminjamans', function (Blueprint $table) {

            $table->dropColumn([
                'foto_pengembalian',
                'jumlah_kembali'
            ]);

        });
    }
}