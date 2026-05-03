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
            ['nama_kategori' => 'Elektronik', 'deskripsi' => 'Produk elektronik', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Makanan', 'deskripsi' => 'Produk makanan dan minuman', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kategori' => 'Pakaian', 'deskripsi' => 'Produk pakaian dan fashion', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
