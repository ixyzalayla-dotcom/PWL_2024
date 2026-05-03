<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function foodBeverage()
    {
        $products = Category::where('name', 'Food & Beverage')->first()?->products ?? [];
        return view('products.food-beverage', ['products' => $products]);
    }

    public function beautyHealth()
    {
        $products = Category::where('name', 'Beauty & Health')->first()?->products ?? [];
        return view('products.beauty-health', ['products' => $products]);
    }

    public function homeCare()
    {
        $products = Category::where('name', 'Home Care')->first()?->products ?? [];
        return view('products.home-care', ['products' => $products]);
    }

    public function babyKid()
    {
        $products = Category::where('name', 'Baby & Kid')->first()?->products ?? [];
        return view('products.baby-kid', ['products' => $products]);
    }
}
