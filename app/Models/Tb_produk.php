<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_produk extends Model
{
    use HasFactory;
    public $primaryKey='id_produk';
    protected $table = 'tb_produk';
    protected $fillable = ['gambar_produk','id_produk','nama_produk','desk_produk','harga_produk','stok_produk','id_kategori'];
    
    public function kategori(){
        return $this->belongsto(Tb_kategori::class,'id_kategori','id_kategori');
    }

    public function price(){
        return $this->hasMany(Tb_harga_produk::class, 'id_produk', 'id_produk');
    }
}
