<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_barang')->insert([
            [
                'kode_barang' => 'ELKT001',
                'nama_barang' => 'Laptop',
                'deskripsi' => 'Laptop Gaming',
                'kategori_id' => 1,
                'harga' => 7500000,
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'ELKT002',
                'nama_barang' => 'Mouse',
                'deskripsi' => 'Mouse Wireless',
                'kategori_id' => 1,
                'harga' => 150000,
                'stok' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'MKAN001',
                'nama_barang' => 'Mie Instan',
                'deskripsi' => 'Mie Instan Premium',
                'kategori_id' => 2,
                'harga' => 2500,
                'stok' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_barang' => 'PKL001',
                'nama_barang' => 'Kaos',
                'deskripsi' => 'Kaos Polos',
                'kategori_id' => 3,
                'harga' => 50000,
                'stok' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
