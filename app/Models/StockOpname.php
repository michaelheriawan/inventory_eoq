<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StockOpname extends Model
{
    use HasFactory;
    protected $table = 'stock_opname';
    protected $primaryKey = 'id_stock_opname';
    protected $fillable = ['user_id', 'barang_id', 'sisa_stok', 'stok_update', 'keterangan'];
    public function barangs(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id_barang');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id_user');
    }
}
