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
            // Supplier 1 - Elektronik (5 barang)
            ['kode_barang' => 'ELKT001', 'nama_barang' => 'Laptop', 'deskripsi' => 'Laptop Gaming', 'kategori_id' => 1, 'supplier_id' => 1, 'harga' => 7500000, 'stok' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'ELKT002', 'nama_barang' => 'Mouse', 'deskripsi' => 'Mouse Wireless', 'kategori_id' => 1, 'supplier_id' => 1, 'harga' => 150000, 'stok' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'ELKT003', 'nama_barang' => 'Keyboard', 'deskripsi' => 'Keyboard Mekanik', 'kategori_id' => 1, 'supplier_id' => 1, 'harga' => 500000, 'stok' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'ELKT004', 'nama_barang' => 'Monitor', 'deskripsi' => 'Monitor 24 inch', 'kategori_id' => 1, 'supplier_id' => 1, 'harga' => 1500000, 'stok' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'ELKT005', 'nama_barang' => 'Headset', 'deskripsi' => 'Headset Gaming', 'kategori_id' => 1, 'supplier_id' => 1, 'harga' => 400000, 'stok' => 15, 'created_at' => now(), 'updated_at' => now()],
            
            // Supplier 2 - Makanan (5 barang)
            ['kode_barang' => 'MKAN001', 'nama_barang' => 'Mie Instan', 'deskripsi' => 'Mie Instan Premium', 'kategori_id' => 2, 'supplier_id' => 2, 'harga' => 2500, 'stok' => 100, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'MKAN002', 'nama_barang' => 'Teh Botol', 'deskripsi' => 'Teh Botol 500ml', 'kategori_id' => 2, 'supplier_id' => 2, 'harga' => 3000, 'stok' => 80, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'MKAN003', 'nama_barang' => 'Biscuit', 'deskripsi' => 'Biscuit Gandum', 'kategori_id' => 2, 'supplier_id' => 2, 'harga' => 15000, 'stok' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'MKAN004', 'nama_barang' => 'Kopi Instant', 'deskripsi' => 'Kopi Instant Premium', 'kategori_id' => 2, 'supplier_id' => 2, 'harga' => 8000, 'stok' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'MKAN005', 'nama_barang' => 'Coklat', 'deskripsi' => 'Coklat Batang', 'kategori_id' => 2, 'supplier_id' => 2, 'harga' => 5000, 'stok' => 75, 'created_at' => now(), 'updated_at' => now()],
            
            // Supplier 3 - Pakaian (5 barang)
            ['kode_barang' => 'PKL001', 'nama_barang' => 'Kaos Polos', 'deskripsi' => 'Kaos Polos Putih', 'kategori_id' => 3, 'supplier_id' => 3, 'harga' => 25000, 'stok' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'PKL002', 'nama_barang' => 'Celana Jeans', 'deskripsi' => 'Celana Jeans Biru', 'kategori_id' => 3, 'supplier_id' => 3, 'harga' => 120000, 'stok' => 25, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'PKL003', 'nama_barang' => 'Jaket', 'deskripsi' => 'Jaket Hoodie', 'kategori_id' => 3, 'supplier_id' => 3, 'harga' => 150000, 'stok' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'PKL004', 'nama_barang' => 'Sepatu', 'deskripsi' => 'Sepatu Olahraga', 'kategori_id' => 3, 'supplier_id' => 3, 'harga' => 250000, 'stok' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['kode_barang' => 'PKL005', 'nama_barang' => 'Topi', 'deskripsi' => 'Topi Snapback', 'kategori_id' => 3, 'supplier_id' => 3, 'harga' => 50000, 'stok' => 30, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
