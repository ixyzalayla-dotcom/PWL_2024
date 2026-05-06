<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $table = 'm_barang';
    protected $fillable = ['kode_barang', 'nama_barang', 'deskripsi', 'kategori_id', 'supplier_id', 'harga', 'stok'];

    // Attribute aliases untuk compatibility
    protected $appends = ['name', 'description', 'price', 'stock', 'category_id'];

    public function getName()
    {
        return $this->attributes['nama_barang'] ?? null;
    }

    public function getNameAttribute()
    {
        return $this->attributes['nama_barang'] ?? null;
    }

    public function getDescriptionAttribute()
    {
        return $this->attributes['deskripsi'] ?? null;
    }

    public function getPriceAttribute()
    {
        return $this->attributes['harga'] ?? null;
    }

    public function getStockAttribute()
    {
        return $this->attributes['stok'] ?? null;
    }

    public function getCategoryIdAttribute()
    {
        return $this->attributes['kategori_id'] ?? null;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
