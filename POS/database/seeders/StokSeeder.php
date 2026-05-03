<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_stok')->insert([
            ['barang_id' => 1, 'jumlah_stok' => 5, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Laptop', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 2, 'jumlah_stok' => 20, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Mouse', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 3, 'jumlah_stok' => 10, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Keyboard', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 4, 'jumlah_stok' => 8, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Monitor', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 5, 'jumlah_stok' => 15, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Headset', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 6, 'jumlah_stok' => 100, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Mie Instan', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 7, 'jumlah_stok' => 80, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Teh Botol', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 8, 'jumlah_stok' => 50, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Biscuit', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 9, 'jumlah_stok' => 60, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Kopi Instant', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 10, 'jumlah_stok' => 75, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Coklat', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 11, 'jumlah_stok' => 40, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Kaos Polos', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 12, 'jumlah_stok' => 25, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Celana Jeans', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 13, 'jumlah_stok' => 20, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Jaket', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 14, 'jumlah_stok' => 15, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Sepatu', 'created_at' => now(), 'updated_at' => now()],
            ['barang_id' => 15, 'jumlah_stok' => 30, 'tanggal_update' => now(), 'keterangan' => 'Stok awal Topi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
