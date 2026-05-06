@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('styles')
<style>
    .detail-container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    .detail-container h1 { color: #2c3e50; margin-bottom: 30px; text-align: center; font-size: 24px; }
    .detail-item { margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #ecf0f1; }
    .detail-label { color: #7f8c8d; font-size: 12px; text-transform: uppercase; font-weight: 600; }
    .detail-value { font-size: 16px; font-weight: 600; color: #2c3e50; margin-top: 8px; }
    .detail-item:last-child { border-bottom: none; }
    .summary-box { background-color: #ecf0f1; padding: 20px; border-radius: 8px; margin: 30px 0; }
    .summary-row { display: flex; justify-content: space-between; margin-bottom: 15px; }
    .summary-row:last-child { margin-bottom: 0; border-top: 2px solid #2c3e50; padding-top: 15px; }
    .summary-label { color: #7f8c8d; font-weight: 600; }
    .summary-value { font-weight: 700; color: #2c3e50; }
    .total-label { font-size: 16px; color: #27ae60; }
    .total-value { font-size: 20px; color: #27ae60; }
    .btn-group { display: flex; gap: 10px; margin-top: 30px; }
    .btn { padding: 12px 20px; border-radius: 5px; border: none; font-size: 14px; cursor: pointer; transition: background-color 0.3s; text-decoration: none; text-align: center; font-weight: 600; flex: 1; }
    .btn-back { background-color: #3498db; color: white; }
    .btn-back:hover { background-color: #2980b9; }
    .btn-delete { background-color: #e74c3c; color: white; }
    .btn-delete:hover { background-color: #c0392b; }
    .status-badge { display: inline-block; background-color: #27ae60; color: white; padding: 6px 12px; border-radius: 3px; font-size: 12px; font-weight: 600; }
</style>
@endsection

@section('content')
<div class="detail-container">
    <h1>📄 Detail Transaksi #{{ $transaction->id }}</h1>

    <div class="detail-item">
        <div class="detail-label">ID Transaksi</div>
        <div class="detail-value">#{{ $transaction->id }}</div>
    </div>

    <div class="detail-item">
        <div class="detail-label">Tanggal</div>
        <div class="detail-value">{{ $transaction->tanggal_penjualan->format('d F Y H:i:s') }}</div>
    </div>

    <div class="detail-item">
        <div class="detail-label">Produk</div>
        <div class="detail-value">
            @if($transaction->details->count())
                @foreach($transaction->details as $detail)
                    {{ $detail->product->nama_barang }}
                    @if(!$loop->last)<br>@endif
                @endforeach
            @else
                -
            @endif
        </div>
    </div>

    <div class="detail-item">
        <div class="detail-label">Kasir</div>
        <div class="detail-value">{{ $transaction->user->nama ?? '-' }}</div>
    </div>

    <div class="summary-box">
        @if($transaction->details->count())
            @foreach($transaction->details as $detail)
                <div class="summary-row">
                    <span class="summary-label">{{ $detail->product->nama_barang }} - Harga Satuan</span>
                    <span class="summary-value">Rp {{ number_format($detail->harga_satuan, 0, ',', '.') }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Jumlah (Qty)</span>
                    <span class="summary-value">{{ $detail->jumlah }}</span>
                </div>
                <div class="summary-row">
                    <span class="summary-label">Subtotal</span>
                    <span class="summary-value">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                </div>
            @endforeach
        @endif
        <div class="summary-row">
            <span class="summary-label total-label">Total Harga</span>
            <span class="summary-value total-value">Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="detail-item">
        <div class="detail-label">Status</div>
        <div class="status-badge">✓ Selesai</div>
    </div>

    <div class="btn-group">
        <a href="/transactions" class="btn btn-back">← Kembali</a>
        <form action="/transactions/{{ $transaction->id }}" method="POST" style="flex: 1;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus transaksi ini?')" style="width: 100%; margin: 0;">🗑️ Hapus</button>
        </form>
    </div>
</div>
@endsection
