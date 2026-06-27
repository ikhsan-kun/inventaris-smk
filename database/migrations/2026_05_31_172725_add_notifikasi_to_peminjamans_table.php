<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotifikasiToPeminjamansTable extends Migration
{
    public function up()
    {
        Schema::table('peminjamans', function (Blueprint $table) {

            $table->text('notifikasi')
                  ->nullable()
                  ->after('status');

        });
    }

    public function down()
    {
        Schema::table('peminjamans', function (Blueprint $table) {

            $table->dropColumn('notifikasi');

        });
    }
}