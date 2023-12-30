<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_supplier';
    protected $fillable = ['nama', 'nama_usaha', 'No_Tlp', 'email', 'alamat'];
}
