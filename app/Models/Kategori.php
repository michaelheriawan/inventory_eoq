<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama'];

    public function barangs(): HasMany
    {
        return $this->hasMany(Barang::class);
    }
}
