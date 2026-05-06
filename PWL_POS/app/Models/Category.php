<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'm_kategori';
    protected $fillable = ['nama_kategori', 'deskripsi'];
    protected $appends = ['name', 'description'];

    public function getNameAttribute()
    {
        return $this->attributes['nama_kategori'] ?? null;
    }

    public function getDescriptionAttribute()
    {
        return $this->attributes['deskripsi'] ?? null;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'kategori_id');
    }
}
