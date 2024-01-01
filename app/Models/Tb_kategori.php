<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_kategori extends Model
{
    use HasFactory;
    public $primaryKey='id_kategori';
    protected $table = 'tb_kategori';
    protected $fillable = ['id_kategori','nama-kategori'];
    public function produk(){
        return $this->hasMany(Tb_produk::class,'id_kategori','id_kategori');
    }
}
