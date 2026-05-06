<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['user', 'details'])->latest()->get();
        $totalSales = Sale::sum('total_harga');
        $totalTransactions = Sale::count();
        $products = Product::all();
        
        return view('penjualan', compact('sales', 'totalSales', 'totalTransactions', 'products'));
    }
}