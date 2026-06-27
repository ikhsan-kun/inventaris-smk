<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAssetsTable extends Migration
{
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {

            $table->string('foto')->nullable();

            $table->date('tanggal_masuk')->nullable();

            $table->string('merk')->nullable();

            $table->string('harga_beli')->nullable();

            $table->text('keterangan')->nullable();

        });
    }

    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {

            $table->dropColumn([
                'foto',
                'tanggal_masuk',
                'merk',
                'lokasi',
                'harga_beli',
                'kondisi',
                'keterangan'
            ]);

        });
    }
}