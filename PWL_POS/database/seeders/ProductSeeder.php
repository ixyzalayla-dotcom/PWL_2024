<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Food & Beverage (ID: 1)
        Product::create([
            'name' => 'Kopi Arabika Premium',
            'description' => 'Kopi arabika pilihan dari Sumatera',
            'price' => 45000,
            'stock' => 50,
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Teh Hijau Organik',
            'description' => 'Teh hijau asli dari pegunungan',
            'price' => 35000,
            'stock' => 75,
            'category_id' => 1
        ]);

        // Beauty & Health (ID: 2)
        Product::create([
            'name' => 'Sabun Wajah Herbal',
            'description' => 'Sabun wajah dengan bahan herbal alami',
            'price' => 25000,
            'stock' => 100,
            'category_id' => 2
        ]);
        Product::create([
            'name' => 'Vitamin C 1000mg',
            'description' => 'Suplemen vitamin C untuk imunitas',
            'price' => 75000,
            'stock' => 30,
            'category_id' => 2
        ]);

        // Home Care (ID: 3)
        Product::create([
            'name' => 'Detergent Powder 1kg',
            'description' => 'Bubuk detergen untuk laundry',
            'price' => 15000,
            'stock' => 200,
            'category_id' => 3
        ]);
        Product::create([
            'name' => 'Pembersih Lantai 500ml',
            'description' => 'Cairan pembersih lantai efektif',
            'price' => 12000,
            'stock' => 150,
            'category_id' => 3
        ]);

        // Baby & Kid (ID: 4)
        Product::create([
            'name' => 'Popok Bayi Size M',
            'description' => 'Popok bayi lembut dan nyaman',
            'price' => 55000,
            'stock' => 80,
            'category_id' => 4
        ]);
        Product::create([
            'name' => 'Susu Formula 800gr',
            'description' => 'Susu formula untuk bayi 6-12 bulan',
            'price' => 125000,
            'stock' => 40,
            'category_id' => 4
        ]);
    }
}
