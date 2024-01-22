<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_barang_masuk';
    protected $fillable = ['user_id', 'barang_id', 'supplier_id', 'jumlah_masuk', 'keterangan'];
    public function barangs(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id_barang');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }

    public function suppliers(): BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id_supplier');
    }
}
