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
