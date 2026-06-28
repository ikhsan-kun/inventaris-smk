<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('assets')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('assets')->insert([
            [
                'kode_aset' => 'AST-001',
                'nama_aset' => 'Proyektor Epson EB-X51',
                'kategori' => 'Elektronik',
                'stok' => 8,
                'kondisi' => 'Baik',
                'lokasi' => 'Ruang Multimedia',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_aset' => 'AST-002',
                'nama_aset' => 'PC Lab Komputer',
                'kategori' => 'Elektronik',
                'stok' => 32,
                'kondisi' => 'Baik',
                'lokasi' => 'Lab Komputer 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_aset' => 'AST-006',
                'nama_aset' => 'AC Split 1.5 PK',
                'kategori' => 'Elektronik',
                'stok' => 12,
                'kondisi' => 'Rusak Ringan',
                'lokasi' => 'Ruang Guru',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}