<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_gambar extends Model
{
    use HasFactory;
    protected $table = 'tb_gambar';
    public function produk() {
        return $this->belongsTo(Tb_produk::class, 'produk_id', 'id_produk');
    }
}
