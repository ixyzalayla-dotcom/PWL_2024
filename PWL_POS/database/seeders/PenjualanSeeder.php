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
        // Insert t_penjualan - 10 transaksi
        DB::table('t_penjualan')->insert([
            ['user_id' => 1, 'tanggal_penjualan' => now()->subDays(9), 'total_harga' => 7650000, 'keterangan' => 'Penjualan hari 1', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'tanggal_penjualan' => now()->subDays(8), 'total_harga' => 152500, 'keterangan' => 'Penjualan hari 2', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'tanggal_penjualan' => now()->subDays(7), 'total_harga' => 800000, 'keterangan' => 'Penjualan hari 3', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'tanggal_penjualan' => now()->subDays(6), 'total_harga' => 375000, 'keterangan' => 'Penjualan hari 4', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'tanggal_penjualan' => now()->subDays(5), 'total_harga' => 8050000, 'keterangan' => 'Penjualan hari 5', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'tanggal_penjualan' => now()->subDays(4), 'total_harga' => 550000, 'keterangan' => 'Penjualan hari 6', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'tanggal_penjualan' => now()->subDays(3), 'total_harga' => 175000, 'keterangan' => 'Penjualan hari 7', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'tanggal_penjualan' => now()->subDays(2), 'total_harga' => 1500000, 'keterangan' => 'Penjualan hari 8', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'tanggal_penjualan' => now()->subDay(), 'total_harga' => 325000, 'keterangan' => 'Penjualan hari 9', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 1, 'tanggal_penjualan' => now(), 'total_harga' => 9000000, 'keterangan' => 'Penjualan hari 10', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Insert t_penjualan_detail - 30 records (3 per transaksi)
        DB::table('t_penjualan_detail')->insert([
            // Transaksi 1 - 3 barang
            ['penjualan_id' => 1, 'barang_id' => 1, 'jumlah' => 1, 'harga_satuan' => 7500000, 'subtotal' => 7500000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 1, 'barang_id' => 2, 'jumlah' => 1, 'harga_satuan' => 150000, 'subtotal' => 150000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 1, 'barang_id' => 6, 'jumlah' => 1, 'harga_satuan' => 0, 'subtotal' => 0, 'created_at' => now(), 'updated_at' => now()],
            // Transaksi 2 - 3 barang
            ['penjualan_id' => 2, 'barang_id' => 7, 'jumlah' => 61, 'harga_satuan' => 2500, 'subtotal' => 152500, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 2, 'barang_id' => 8, 'jumlah' => 0, 'harga_satuan' => 0, 'subtotal' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 2, 'barang_id' => 9, 'jumlah' => 0, 'harga_satuan' => 0, 'subtotal' => 0, 'created_at' => now(), 'updated_at' => now()],
            // Transaksi 3 - 3 barang
            ['penjualan_id' => 3, 'barang_id' => 3, 'jumlah' => 1, 'harga_satuan' => 500000, 'subtotal' => 500000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 3, 'barang_id' => 12, 'jumlah' => 2, 'harga_satuan' => 150000, 'subtotal' => 300000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 3, 'barang_id' => 11, 'jumlah' => 1, 'harga_satuan' => 0, 'subtotal' => 0, 'created_at' => now(), 'updated_at' => now()],
            // Transaksi 4 - 3 barang
            ['penjualan_id' => 4, 'barang_id' => 4, 'jumlah' => 1, 'harga_satuan' => 400000, 'subtotal' => 400000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 4, 'barang_id' => 13, 'jumlah' => 3, 'harga_satuan' => 120000, 'subtotal' => 360000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 4, 'barang_id' => 10, 'jumlah' => 0, 'harga_satuan' => 0, 'subtotal' => 0, 'created_at' => now(), 'updated_at' => now()],
            // Transaksi 5 - 3 barang
            ['penjualan_id' => 5, 'barang_id' => 5, 'jumlah' => 1, 'harga_satuan' => 400000, 'subtotal' => 400000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 5, 'barang_id' => 14, 'jumlah' => 2, 'harga_satuan' => 250000, 'subtotal' => 500000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 5, 'barang_id' => 15, 'jumlah' => 1, 'harga_satuan' => 50000, 'subtotal' => 50000, 'created_at' => now(), 'updated_at' => now()],
            // Transaksi 6 - 3 barang
            ['penjualan_id' => 6, 'barang_id' => 1, 'jumlah' => 1, 'harga_satuan' => 7500000, 'subtotal' => 7500000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 6, 'barang_id' => 8, 'jumlah' => 1, 'harga_satuan' => 3000, 'subtotal' => 3000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 6, 'barang_id' => 2, 'jumlah' => 1, 'harga_satuan' => 150000, 'subtotal' => 150000, 'created_at' => now(), 'updated_at' => now()],
            // Transaksi 7 - 3 barang
            ['penjualan_id' => 7, 'barang_id' => 6, 'jumlah' => 50, 'harga_satuan' => 2500, 'subtotal' => 125000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 7, 'barang_id' => 9, 'jumlah' => 20, 'harga_satuan' => 2500, 'subtotal' => 50000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 7, 'barang_id' => 11, 'jumlah' => 1, 'harga_satuan' => 0, 'subtotal' => 0, 'created_at' => now(), 'updated_at' => now()],
            // Transaksi 8 - 3 barang
            ['penjualan_id' => 8, 'barang_id' => 3, 'jumlah' => 2, 'harga_satuan' => 500000, 'subtotal' => 1000000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 8, 'barang_id' => 4, 'jumlah' => 1, 'harga_satuan' => 1500000, 'subtotal' => 1500000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 8, 'barang_id' => 12, 'jumlah' => 1, 'harga_satuan' => 0, 'subtotal' => 0, 'created_at' => now(), 'updated_at' => now()],
            // Transaksi 9 - 3 barang
            ['penjualan_id' => 9, 'barang_id' => 13, 'jumlah' => 2, 'harga_satuan' => 120000, 'subtotal' => 240000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 9, 'barang_id' => 14, 'jumlah' => 1, 'harga_satuan' => 250000, 'subtotal' => 250000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 9, 'barang_id' => 10, 'jumlah' => 1, 'harga_satuan' => 15000, 'subtotal' => 15000, 'created_at' => now(), 'updated_at' => now()],
            // Transaksi 10 - 3 barang
            ['penjualan_id' => 10, 'barang_id' => 1, 'jumlah' => 1, 'harga_satuan' => 7500000, 'subtotal' => 7500000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 10, 'barang_id' => 5, 'jumlah' => 1, 'harga_satuan' => 400000, 'subtotal' => 400000, 'created_at' => now(), 'updated_at' => now()],
            ['penjualan_id' => 10, 'barang_id' => 15, 'jumlah' => 2, 'harga_satuan' => 50000, 'subtotal' => 100000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
