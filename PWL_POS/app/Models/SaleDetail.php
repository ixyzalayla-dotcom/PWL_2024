<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SaleDetail extends Model
{
    protected $table = 't_penjualan_detail';
    protected $fillable = ['penjualan_id', 'barang_id', 'jumlah', 'harga_satuan', 'subtotal'];

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class, 'penjualan_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'barang_id');
    }
}
