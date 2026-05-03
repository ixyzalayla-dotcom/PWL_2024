@extends('layouts.app')

@section('title', 'Baby & Kid - Produk')

@section('styles')
<style>
    .page-title { color: #2c3e50; font-size: 28px; margin-bottom: 10px; }
    .page-subtitle { color: #7f8c8d; margin-bottom: 30px; }
    .products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; margin-bottom: 30px; }
    .product-card { background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s, box-shadow 0.3s; }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
    .product-header { background-color: #ecf0f1; padding: 20px; text-align: center; }
    .product-name { color: #2c3e50; font-size: 18px; font-weight: 600; margin: 0; }
    .product-body { padding: 15px; }
    .product-desc { color: #7f8c8d; font-size: 14px; line-height: 1.5; margin-bottom: 15px; }
    .product-price { color: #27ae60; font-size: 20px; font-weight: 700; margin-bottom: 10px; }
    .product-stock { color: #2c3e50; font-size: 14px; margin: 0; }
    .stock-badge { display: inline-block; background-color: #e8f5e9; color: #27ae60; padding: 4px 8px; border-radius: 3px; font-size: 12px; font-weight: 600; }
    .empty-state { text-align: center; padding: 60px 20px; color: #7f8c8d; }
    .empty-icon { font-size: 48px; margin-bottom: 20px; }
</style>
@endsection

@section('content')
<div>
    <h1 class="page-title">👶 Baby & Kid</h1>
    <p class="page-subtitle">Produk bayi dan anak-anak yang aman</p>
</div>

@if($products->count())
    <div class="products-grid">
        @foreach($products as $product)
            <div class="product-card">
                <div class="product-header">
                    <h3 class="product-name">{{ $product->name }}</h3>
                </div>
                <div class="product-body">
                    <p class="product-desc">{{ $product->description }}</p>
                    <p class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="product-stock">
                        Stok: <span class="stock-badge">{{ $product->stock }} unit</span>
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-state">
        <div class="empty-icon">📭</div>
        <p>Tidak ada produk di kategori ini</p>
    </div>
@endif
@endsection