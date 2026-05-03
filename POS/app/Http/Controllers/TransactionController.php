<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Sale::with(['product', 'user'])->latest()->paginate(10);
        $totalToday = Sale::whereDate('created_at', today())->sum('total_price');
        $countToday = Sale::whereDate('created_at', today())->count();
        
        return view('transactions.index', compact('transactions', 'totalToday', 'countToday'));
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        
        return view('transactions.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($validated['product_id']);
        
        // Check stock
        if ($product->stock < $validated['quantity']) {
            return redirect()->back()->with('error', 'Stok tidak cukup! Tersedia: ' . $product->stock);
        }

        $totalPrice = $product->price * $validated['quantity'];

        Sale::create([
            'product_id' => $validated['product_id'],
            'user_id' => $validated['user_id'],
            'quantity' => $validated['quantity'],
            'total_price' => $totalPrice,
            'sale_date' => today(),
        ]);

        // Reduce stock
        $product->decrement('stock', $validated['quantity']);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function show(Sale $transaction)
    {
        $transaction->load(['product', 'user']);
        return view('transactions.show', compact('transaction'));
    }

    public function destroy(Sale $transaction)
    {
        // Restore stock
        $transaction->product->increment('stock', $transaction->quantity);
        
        $transaction->delete();
        
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}
