<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\User;
use App\Models\MUser;
use App\Models\SaleDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Sale::with(['user', 'details'])->latest()->paginate(10);
        $totalToday = Sale::whereDate('tanggal_penjualan', today())->sum('total_harga');
        $countToday = Sale::whereDate('tanggal_penjualan', today())->count();
        
        return view('transactions.index', compact('transactions', 'totalToday', 'countToday'));
    }

    public function create()
    {
        $products = Product::all();
        $users = MUser::all();
        
        return view('transactions.create', compact('products', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:m_barang,id',
            'user_id' => 'required|exists:m_user,user_id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $product = Product::find($validated['barang_id']);
        
        // Check stock
        if ($product->stok < $validated['jumlah']) {
            return redirect()->back()->with('error', 'Stok tidak cukup! Tersedia: ' . $product->stok);
        }

        $subtotal = $product->harga * $validated['jumlah'];

        // Create penjualan (master)
        $sale = Sale::create([
            'user_id' => $validated['user_id'],
            'tanggal_penjualan' => now(),
            'total_harga' => $subtotal,
        ]);

        // Create penjualan_detail
        SaleDetail::create([
            'penjualan_id' => $sale->id,
            'barang_id' => $validated['barang_id'],
            'jumlah' => $validated['jumlah'],
            'harga_satuan' => $product->harga,
            'subtotal' => $subtotal,
        ]);

        // Reduce stock
        $product->decrement('stok', $validated['jumlah']);

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function show(Sale $transaction)
    {
        $transaction->load(['user', 'details.product']);
        return view('transactions.show', compact('transaction'));
    }

    public function destroy(Sale $transaction)
    {
        // Restore stock for all details
        foreach ($transaction->details as $detail) {
            $detail->product->increment('stok', $detail->jumlah);
        }
        
        // Delete details first
        SaleDetail::where('penjualan_id', $transaction->id)->delete();
        
        // Then delete transaction
        $transaction->delete();
        
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}

