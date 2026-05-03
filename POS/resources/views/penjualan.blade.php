@extends('layouts.app')

@section('title', 'Dashboard Penjualan')

@section('styles')
<style>
    .header-title {
        font-size: 28px;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    .header-subtitle {
        color: #7f8c8d;
        margin-bottom: 30px;
    }
    .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
    .stat-box { background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
    .stat-value { font-size: 24px; font-weight: bold; color: #3498db; }
    .stat-label { color: #7f8c8d; margin-top: 10px; }
    table { width: 100%; border-collapse: collapse; background-color: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ecf0f1; }
    th { background-color: #2c3e50; color: white; }
    tr:hover { background-color: #f8f9fa; }
    .no-data { text-align: center; padding: 40px; color: #7f8c8d; }
</style>
@endsection

@section('content')
<div>
    <h1 class="header-title">📊 Dashboard Penjualan</h1>
    <p class="header-subtitle">Kelola dan pantau penjualan produk Anda</p>
</div>

<div class="stats">
    <div class="stat-box">
        <div class="stat-value">{{ $totalTransactions }}</div>
        <div class="stat-label">Total Transaksi</div>
    </div>
    <div class="stat-box">
        <div class="stat-value">Rp {{ number_format($totalSales, 0, ',', '.') }}</div>
        <div class="stat-label">Total Penjualan</div>
    </div>
    <div class="stat-box">
        <div class="stat-value">{{ $products->count() }}</div>
        <div class="stat-label">Total Produk</div>
    </div>
</div>

<h2 style="color: #2c3e50; margin-bottom: 20px;">Daftar Penjualan</h2>
@if($sales->count())
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>User</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
                <tr>
                    <td>{{ $sale->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $sale->product->name }}</td>
                    <td>{{ $sale->user->name }}</td>
                    <td>{{ $sale->quantity }}</td>
                    <td>Rp {{ number_format($sale->total_price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="no-data">
        <p>Belum ada data penjualan</p>
    </div>
@endif
@endsection

