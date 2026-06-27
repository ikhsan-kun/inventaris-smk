<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up(): void
{
    Schema::create('gurus', function (Blueprint $table) {

        $table->id();

        $table->string('nama');
        $table->string('nip');

        $table->string('kode')->nullable();

        $table->string('tempat_lahir')->nullable();

        $table->date('tanggal_lahir')->nullable();

        $table->string('jabatan');
        $table->string('no_hp');

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
