<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barangs', function (Blueprint $table) {

            if (!Schema::hasColumn('barangs', 'kode_barang')) {
                $table->string('kode_barang')->nullable();
            }

            if (!Schema::hasColumn('barangs', 'lokasi')) {
                $table->string('lokasi')->nullable();
            }

            if (!Schema::hasColumn('barangs', 'satuan')) {
                $table->string('satuan')->nullable();
            }

            if (!Schema::hasColumn('barangs', 'keterangan')) {
                $table->text('keterangan')->nullable();
            }

        });
    }

    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {

            $table->dropColumn([
                'tanggal_masuk',
                'kode_barang',
                'lokasi',
                'satuan',
                'keterangan'
            ]);

        });
    }
};