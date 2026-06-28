<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAssetIdToTransaksisTable extends Migration
{
    public function up()
    {
        Schema::table('transaksis', function (Blueprint $table) {

            // Buat barang_id nullable karena transaksi bisa untuk aset juga
            $table->unsignedBigInteger('barang_id')->nullable()->change();

            // Tambah kolom asset_id untuk transaksi aset
            if (!Schema::hasColumn('transaksis', 'asset_id')) {
                $table->unsignedBigInteger('asset_id')
                      ->nullable()
                      ->after('barang_id');

                $table->foreign('asset_id')
                      ->references('id')
                      ->on('assets')
                      ->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('transaksis', function (Blueprint $table) {

            if (Schema::hasColumn('transaksis', 'asset_id')) {
                $table->dropForeign(['asset_id']);
                $table->dropColumn('asset_id');
            }

            // Kembalikan barang_id ke NOT NULL
            $table->unsignedBigInteger('barang_id')->nullable(false)->change();
        });
    }
}
