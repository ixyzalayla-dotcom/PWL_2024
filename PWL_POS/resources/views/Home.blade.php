@extends('layouts.app')

@section('title', 'POS System - Home')

@section('styles')
<style>
    .categories { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin: 40px 0; }
    .category-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center; cursor: pointer; transition: transform 0.3s; }
    .category-card:hover { transform: translateY(-5px); box-shadow: 0 5px 20px rgba(0,0,0,0.15); }
    .category-card h3 { color: #333; margin-bottom: 15px; font-size: 20px; }
    .category-card p { color: #666; margin-bottom: 20px; }
    .btn-card { display: inline-block; background-color: #2c3e50; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; transition: background-color 0.3s; }
    .btn-card:hover { background-color: #34495e; }
    .header { text-align: center; margin-bottom: 40px; }
    .header h1 { color: #2c3e50; margin-bottom: 10px; font-size: 32px; }
    .header p { color: #666; font-size: 18px; }
</style>
@endsection

@section('content')
<div class="header">
    <h1>Selamat Datang di Sistem POS</h1>
    <p>Kelola penjualan produk Anda dengan mudah dan efisien</p>
</div>

<div class="categories">
    <div class="category-card">
        <h3>🍔 Food & Beverage</h3>
        <p>Produk makanan dan minuman berkualitas tinggi</p>
        <a href="/category/food-beverage" class="btn-card">Lihat Produk</a>
    </div>

    <div class="category-card">
        <h3>💄 Beauty & Health</h3>
        <p>Produk kecantikan dan kesehatan pilihan</p>
        <a href="/category/beauty-health" class="btn-card">Lihat Produk</a>
    </div>

    <div class="category-card">
        <h3>🏠 Home Care</h3>
        <p>Peralatan dan produk perawatan rumah</p>
        <a href="/category/home-care" class="btn-card">Lihat Produk</a>
    </div>

    <div class="category-card">
        <h3>👶 Baby & Kid</h3>
        <p>Produk bayi dan anak-anak yang aman</p>
        <a href="/category/baby-kid" class="btn-card">Lihat Produk</a>
    </div>
</div>
@endsection