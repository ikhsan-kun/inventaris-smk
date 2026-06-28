<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddMissingFieldsToPeminjamansTable extends Migration
{
    public function up()
    {
        Schema::table('peminjamans', function (Blueprint $table) {

            // Kolom kondisi pinjam & kembali
            if (!Schema::hasColumn('peminjamans', 'kondisi_pinjam')) {
                $table->string('kondisi_pinjam')->nullable()->after('tanggal_pinjam');
            }

            if (!Schema::hasColumn('peminjamans', 'kondisi_kembali')) {
                $table->string('kondisi_kembali')->nullable()->after('tanggal_kembali');
            }

            // Keterangan pengembalian
            if (!Schema::hasColumn('peminjamans', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('kondisi_pinjam');
            }

            if (!Schema::hasColumn('peminjamans', 'keterangan_kembali')) {
                $table->text('keterangan_kembali')->nullable()->after('kondisi_kembali');
            }

            // Peminjam tipe & id (untuk aset yang dipinjam guru/siswa)
            if (!Schema::hasColumn('peminjamans', 'peminjam_tipe')) {
                $table->string('peminjam_tipe')->nullable()->after('user_id');
            }

            if (!Schema::hasColumn('peminjamans', 'peminjam_id')) {
                $table->unsignedBigInteger('peminjam_id')->nullable()->after('peminjam_tipe');
            }

        });

        // Ubah enum status untuk menambah 'menunggu_verifikasi'
        // Gunakan raw SQL karena Laravel tidak bisa alter enum secara langsung di semua DB
        DB::statement("
            ALTER TABLE peminjamans
            MODIFY COLUMN status ENUM(
                'pending',
                'disetujui',
                'ditolak',
                'menunggu_verifikasi',
                'dikembalikan'
            ) NOT NULL DEFAULT 'pending'
        ");
    }

    public function down()
    {
        Schema::table('peminjamans', function (Blueprint $table) {

            $columns = [
                'kondisi_pinjam',
                'kondisi_kembali',
                'keterangan',
                'keterangan_kembali',
                'peminjam_tipe',
                'peminjam_id',
            ];

            foreach ($columns as $col) {
                if (Schema::hasColumn('peminjamans', $col)) {
                    $table->dropColumn($col);
                }
            }
        });

        // Kembalikan enum ke nilai asal
        DB::statement("
            ALTER TABLE peminjamans
            MODIFY COLUMN status ENUM(
                'pending',
                'disetujui',
                'ditolak',
                'dikembalikan'
            ) NOT NULL DEFAULT 'pending'
        ");
    }
}
