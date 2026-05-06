<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    protected $table = 't_penjualan';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'tanggal_penjualan', 'total_harga', 'keterangan'];
    protected $appends = ['total_price'];
    protected $casts = [
        'tanggal_penjualan' => 'datetime',
    ];

    public function getTotalPriceAttribute()
    {
        return $this->attributes['total_harga'] ?? null;
    }

    public function details()
    {
        return $this->hasMany(SaleDetail::class, 'penjualan_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(MUser::class, 'user_id', 'user_id');
    }
}
