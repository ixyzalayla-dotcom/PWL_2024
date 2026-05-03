@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('styles')
<style>
    .form-container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    .form-container h1 { color: #2c3e50; margin-bottom: 30px; font-size: 24px; }
    .form-group { margin-bottom: 20px; }
    label { display: block; margin-bottom: 8px; color: #2c3e50; font-weight: 600; }
    input, select { width: 100%; padding: 10px; border: 1px solid #bdc3c7; border-radius: 5px; font-size: 14px; transition: border-color 0.3s; }
    input:focus, select:focus { outline: none; border-color: #3498db; background-color: #ecf0f1; }
    .info-box { background-color: #ecf0f1; padding: 15px; border-radius: 5px; margin-bottom: 20px; font-size: 14px; }
    .info-box strong { color: #2c3e50; }
    .product-info { background-color: #f0f0f0; padding: 10px; border-radius: 3px; margin-top: 5px; font-size: 13px; }
    .btn-group { display: flex; gap: 10px; margin-top: 30px; }
    .btn { padding: 12px 20px; border-radius: 5px; border: none; font-size: 14px; cursor: pointer; transition: background-color 0.3s; flex: 1; }
    .btn-submit { background-color: #27ae60; color: white; font-weight: 600; }
    .btn-submit:hover { background-color: #229954; }
    .btn-back { background-color: #95a5a6; color: white; text-decoration: none; text-align: center; font-weight: 600; }
    .btn-back:hover { background-color: #7f8c8d; }
    .error-message { color: #e74c3c; font-size: 12px; margin-top: 5px; }
    .error-list { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
    .error-list p { margin-bottom: 5px; }
</style>
@endsection

@section('content')
<div class="form-container">
    <h1>➕ Tambah Transaksi Baru</h1>

    @if ($errors->any())
        <div class="error-list">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="/transactions" method="POST">
        @csrf

        <div class="form-group">
            <label for="product_id">Pilih Produk *</label>
            <select name="product_id" id="product_id" required onchange="updateProductInfo()">
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" 
                        data-price="{{ $product->price }}" 
                        data-stock="{{ $product->stock }}"
                        data-name="{{ $product->name }}">
                        {{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            <div id="productInfo" class="product-info" style="display: none;">
                <strong>Stok Tersedia:</strong> <span id="stockInfo">0</span>
            </div>
            @error('product_id')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="user_id">Pilih User/Kasir *</label>
            <select name="user_id" id="user_id" required>
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Jumlah (Qty) *</label>
            <input type="number" name="quantity" id="quantity" min="1" required 
                placeholder="Masukkan jumlah produk" onchange="calculateTotal()">
            @error('quantity')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="info-box">
            <strong>Harga Satuan:</strong> Rp <span id="priceDisplay">0</span><br>
            <strong>Total Harga:</strong> Rp <span id="totalDisplay">0</span>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-submit">💾 Simpan Transaksi</button>
            <a href="/transactions" class="btn btn-back">❌ Batal</a>
        </div>
    </form>
</div>

@endsection

@section('scripts')
<script>
    function updateProductInfo() {
        const select = document.getElementById('product_id');
        const option = select.options[select.selectedIndex];
        const stock = option.dataset.stock;
        const price = option.dataset.price;
        
        if (stock !== undefined) {
            document.getElementById('stockInfo').textContent = stock;
            document.getElementById('productInfo').style.display = 'block';
            document.getElementById('priceDisplay').textContent = new Intl.NumberFormat('id-ID').format(price);
        } else {
            document.getElementById('productInfo').style.display = 'none';
        }
        calculateTotal();
    }

    function calculateTotal() {
        const select = document.getElementById('product_id');
        const option = select.options[select.selectedIndex];
        const price = option.dataset.price || 0;
        const quantity = document.getElementById('quantity').value || 0;
        const total = price * quantity;
        document.getElementById('totalDisplay').textContent = new Intl.NumberFormat('id-ID').format(total);
    }
</script>
@endsection
