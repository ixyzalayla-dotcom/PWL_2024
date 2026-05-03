<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert t_penjualan
        DB::table('t_penjualan')->insert([
            [
                'user_id' => 1,
                'tanggal_penjualan' => now(),
                'total_harga' => 7650000,
                'keterangan' => 'Penjualan pertama',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'tanggal_penjualan' => now()->subDay(),
                'total_harga' => 152500,
                'keterangan' => 'Penjualan kedua',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insert t_penjualan_detail
        DB::table('t_penjualan_detail')->insert([
            [
                'penjualan_id' => 1,
                'barang_id' => 1,
                'jumlah' => 1,
                'harga_satuan' => 7500000,
                'subtotal' => 7500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 1,
                'barang_id' => 2,
                'jumlah' => 1,
                'harga_satuan' => 150000,
                'subtotal' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'penjualan_id' => 2,
                'barang_id' => 3,
                'jumlah' => 61,
                'harga_satuan' => 2500,
                'subtotal' => 152500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
