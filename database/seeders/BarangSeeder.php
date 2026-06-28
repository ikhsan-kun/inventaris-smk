<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Nonaktifkan foreign key checks sementara untuk keamanan
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('barangs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        DB::table('barangs')->insert([
            [
                'nama_barang'   => 'Laptop Asus',
                'kode_barang'   => 'BRG-001',
                'kategori'      => 'Elektronik',
                'stok'          => 15,
                'kondisi'       => 'Baik',
                'satuan'        => 'Unit',
                'lokasi'        => null,
                'keterangan'    => null,
                'foto'          => null,
                'tanggal_masuk' => Carbon::now()->toDateString(),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nama_barang'   => 'Kursi Guru',
                'kode_barang'   => 'BRG-002',
                'kategori'      => 'Furniture',
                'stok'          => 40,
                'kondisi'       => 'Baik',
                'satuan'        => 'Unit',
                'lokasi'        => null,
                'keterangan'    => null,
                'foto'          => null,
                'tanggal_masuk' => Carbon::now()->toDateString(),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nama_barang'   => 'Printer Epson',
                'kode_barang'   => 'BRG-003',
                'kategori'      => 'Elektronik',
                'stok'          => 8,
                'kondisi'       => 'Baik',
                'satuan'        => 'Unit',
                'lokasi'        => null,
                'keterangan'    => null,
                'foto'          => null,
                'tanggal_masuk' => Carbon::now()->toDateString(),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nama_barang'   => 'Meja Siswa',
                'kode_barang'   => 'BRG-004',
                'kategori'      => 'Furniture',
                'stok'          => 200,
                'kondisi'       => 'Baik',
                'satuan'        => 'Unit',
                'lokasi'        => null,
                'keterangan'    => null,
                'foto'          => null,
                'tanggal_masuk' => Carbon::now()->toDateString(),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nama_barang'   => 'Laptop Acer',
                'kode_barang'   => 'BRG-005',
                'kategori'      => 'Elektronik',
                'stok'          => 10,
                'kondisi'       => 'Baik',
                'satuan'        => 'Unit',
                'lokasi'        => null,
                'keterangan'    => null,
                'foto'          => null,
                'tanggal_masuk' => Carbon::now()->toDateString(),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'nama_barang'   => 'Proyektor BenQ',
                'kode_barang'   => 'BRG-006',
                'kategori'      => 'Elektronik',
                'stok'          => 8,
                'kondisi'       => 'Baik',
                'satuan'        => 'Unit',
                'lokasi'        => null,
                'keterangan'    => null,
                'foto'          => null,
                'tanggal_masuk' => Carbon::now()->toDateString(),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ]);
    }
}
