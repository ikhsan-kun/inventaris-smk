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
        // Menghapus data lama agar tidak double saat di-seed ulang (opsional)
        DB::table('barangs')->truncate();

        DB::table('barangs')->insert([
            [
                'nama_barang' => 'Laptop Asus',
                'stok' => 15,
                'kategori' => 'Elektronik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_barang' => 'Kursi Guru',
                'stok' => 40,
                'kategori' => 'Furniture',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_barang' => 'Printer Epson',
                'stok' => 8,
                'kategori' => 'Elektronik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_barang' => 'Meja Siswa',
                'stok' => 200,
                'kategori' => 'Furniture',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_barang' => 'Laptop Acer',
                'stok' => 10,
                'kategori' => 'Elektronik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_barang' => 'Proyektor BenQ',
                'stok' => 8,
                'kategori' => 'Elektronik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}