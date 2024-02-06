<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama', 'kategori', 'stok', 'gambar', 'harga_beli', 'harga_jual'];
    public function kategoris(): BelongsTo
    {
        return $this->belongsTo(kategori::class, 'kategori', 'id_kategori');
    }

    public function barang_masuks(): HasMany
    {
        return $this->hasMany(BarangMasuk::class, 'barang_id', 'id_barang');

    }
}
