<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('ruangans')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('ruangans')->insert([
            [
                'nama_ruangan'      => 'Ruang Multimedia',
                'kode_ruangan'      => 'RM-01',
                'penanggung_jawab'  => 'Imron Rosadi, S.Kom.',
                'kapasitas'         => 36,
                'lokasi'            => 'Gedung B Lantai 2',
                'jenis'             => 'Praktik',
                'deskripsi'         => 'Ruang pembelajaran multimedia dan editing',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nama_ruangan'      => 'Lab Komputer 1',
                'kode_ruangan'      => 'LK-01',
                'penanggung_jawab'  => 'Hasan Basri, S.T.',
                'kapasitas'         => 40,
                'lokasi'            => 'Gedung C Lantai 1',
                'jenis'             => 'Praktik',
                'deskripsi'         => 'Laboratorium komputer utama untuk praktik TKJ/RPL',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'nama_ruangan'      => 'Ruang Guru',
                'kode_ruangan'      => 'RG-01',
                'penanggung_jawab'  => 'Mulyono, M.Pd.',
                'kapasitas'         => 50,
                'lokasi'            => 'Gedung A Lantai 1',
                'jenis'             => 'Kantor',
                'deskripsi'         => 'Ruang kerja staff guru dan karyawan',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ]);
    }
}
