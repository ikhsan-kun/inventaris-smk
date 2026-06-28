<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpesifikasiToAssetsTable extends Migration
{
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {

            if (!Schema::hasColumn('assets', 'spesifikasi')) {
                $table->text('spesifikasi')->nullable()->after('kondisi');
            }

            // Pastikan lokasi dan kondisi nullable agar tidak error saat insert
            $table->string('lokasi')->nullable()->change();
            $table->string('kondisi')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {

            if (Schema::hasColumn('assets', 'spesifikasi')) {
                $table->dropColumn('spesifikasi');
            }
        });
    }
}
