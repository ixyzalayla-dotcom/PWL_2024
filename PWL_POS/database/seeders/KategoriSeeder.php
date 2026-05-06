<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_kategori')->insert([
            ['nama_kategori' => 'Food & Beverage', 'deskripsi' => 'Makanan dan minuman', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Beauty & Health', 'deskripsi' => 'Produk kecantikan dan kesehatan', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Home Care', 'deskripsi' => 'Produk perawatan rumah', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Baby & Kid', 'deskripsi' => 'Produk bayi dan anak-anak', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
