<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambil extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pengambil';
    protected $fillable = ['nama', 'nama_usaha', 'No_Tlp', 'email', 'alamat'];
}
