<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Food & Beverage',
            'description' => 'Kategori makanan dan minuman'
        ]);
        Category::create([
            'name' => 'Beauty & Health',
            'description' => 'Kategori kecantikan dan kesehatan'
        ]);
        Category::create([
            'name' => 'Home Care',
            'description' => 'Kategori peralatan rumah tangga'
        ]);
        Category::create([
            'name' => 'Baby & Kid',
            'description' => 'Kategori produk bayi dan anak'
        ]);
    }
}
