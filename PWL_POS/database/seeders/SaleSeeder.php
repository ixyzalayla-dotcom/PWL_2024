<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $products = Product::all();

        foreach ($products as $key => $product) {
            Sale::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'quantity' => rand(1, 5),
                'total_price' => $product->price * rand(1, 5),
                'sale_date' => Carbon::now()->subDays(rand(0, 30))->format('Y-m-d')
            ]);
        }
    }
}
