@extends('layouts.app')

@section('title', 'Data Transaksi')

@section('styles')
<style>
    .header-section { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
    .header-section h1 { color: #2c3e50; font-size: 28px; }
    .btn-add { background-color: #27ae60; color: white; padding: 12px 24px; border-radius: 5px; text-decoration: none; transition: background-color 0.3s; font-weight: 500; }
    .btn-add:hover { background-color: #229954; }
    .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 30px; }
    .stat-box { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); text-align: center; }
    .stat-value { font-size: 24px; font-weight: bold; color: #27ae60; }
    .stat-label { color: #7f8c8d; margin-top: 10px; }
    table { width: 100%; border-collapse: collapse; background-color: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ecf0f1; }
    th { background-color: #2c3e50; color: white; }
    tr:hover { background-color: #f8f9fa; }
    .actions { display: flex; gap: 10px; }
    .btn-view { background-color: #3498db; color: white; padding: 6px 12px; border-radius: 3px; text-decoration: none; font-size: 12px; transition: background-color 0.3s; }
    .btn-delete { background-color: #e74c3c; color: white; padding: 6px 12px; border-radius: 3px; font-size: 12px; border: none; cursor: pointer; transition: background-color 0.3s; }
    .btn-view:hover { background-color: #2980b9; }
    .btn-delete:hover { background-color: #c0392b; }
    .no-data { text-align: center; padding: 40px; color: #7f8c8d; }
    .pagination { display: flex; justify-content: center; gap: 5px; margin-top: 20px; flex-wrap: wrap; }
    .pagination a, .pagination span { padding: 8px 12px; border: 1px solid #ecf0f1; border-radius: 3px; text-decoration: none; color: #2c3e50; }
    .pagination a:hover { background-color: #ecf0f1; }
    .pagination .active span { background-color: #2c3e50; color: white; }
</style>
@endsection

@section('content')
<div class="header-section">
    <h1>📋 Data Transaksi</h1>
    <a href="/transactions/create" class="btn-add">+ Tambah Transaksi</a>
</div>

<div class="stats">
    <div class="stat-box">
        <div class="stat-value">{{ $countToday }}</div>
        <div class="stat-label">Transaksi Hari Ini</div>
    </div>
    <div class="stat-box">
        <div class="stat-value">Rp {{ number_format($totalToday, 0, ',', '.') }}</div>
        <div class="stat-label">Total Penjualan Hari Ini</div>
    </div>
</div>

@if ($transactions->count())
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Produk</th>
                <th>Kasir</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>#{{ $transaction->id }}</td>
                    <td>{{ $transaction->tanggal_penjualan->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($transaction->details->count())
                            @foreach($transaction->details as $detail)
                                {{ $detail->product->nama_barang }}
                                @if(!$loop->last)<br>@endif
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $transaction->user->nama ?? '-' }}</td>
                    <td>{{ $transaction->details->sum('jumlah') ?? '-' }}</td>
                    <td><strong>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</strong></td>
                    <td>
                        <div class="actions">
                            <a href="/transactions/{{ $transaction->id }}" class="btn-view">Lihat</a>
                            <form action="/transactions/{{ $transaction->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination">
        {{ $transactions->links() }}
    </div>
@else
    <div class="no-data">
        <p>Tidak ada data transaksi</p>
    </div>
@endif
@endsection
