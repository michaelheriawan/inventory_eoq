<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_barang';
    protected $fillable = ['nama', 'kategori', 'stok', 'gambar'];
    public function kategoris(): BelongsTo
    {
        return $this->belongsTo(kategori::class, 'kategori', 'id_kategori')->withTrashed();
    }
}
