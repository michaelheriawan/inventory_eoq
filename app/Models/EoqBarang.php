<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EoqBarang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_eoq_barang';
    protected $fillable = ['bulan', 'barang_id', 'jumlah_permintaan', 'harga_barang', 'biaya_pesan', 'biaya_simpan', 'eoq'];
    public function barangs(): BelongsTo
    {
        return $this->belongsTo(Barang::class, 'barang_id', 'id_barang');
    }

}
