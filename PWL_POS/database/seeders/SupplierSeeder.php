<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_supplier')->insert([
            [
                'kode_supplier' => 'SUP001',
                'nama_supplier' => 'PT Elektronik Sejahtera',
                'alamat' => 'Jl. Merdeka No. 100, Jakarta',
                'telepon' => '021-1234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_supplier' => 'SUP002',
                'nama_supplier' => 'CV Makanan Berkah',
                'alamat' => 'Jl. Ahmad Yani No. 45, Surabaya',
                'telepon' => '031-9876543',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_supplier' => 'SUP003',
                'nama_supplier' => 'UD Fashion Terkini',
                'alamat' => 'Jl. Sudirman No. 78, Bandung',
                'telepon' => '022-5555555',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
