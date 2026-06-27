<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamans', function (Blueprint $table) {

            $table->id();

            // USER PEMINJAM
            $table->unsignedBigInteger('user_id');

            // BARANG & ASET
            $table->unsignedBigInteger('barang_id')->nullable();

            $table->unsignedBigInteger('aset_id')->nullable();

            // JENIS
            $table->string('jenis');

            // JUMLAH
            $table->integer('jumlah')->default(1);

            // TANGGAL
            $table->date('tanggal_pinjam');

            $table->date('tanggal_kembali')->nullable();

            // STATUS
            $table->enum('status', [

                'pending',
                'disetujui',
                'ditolak',
                'dikembalikan'

            ])->default('pending');

            $table->timestamps();

            // RELASI
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('barang_id')
                  ->references('id')
                  ->on('barangs')
                  ->onDelete('cascade');

            $table->foreign('aset_id')
                ->references('id')
                ->on('assets')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamans');
    }
}