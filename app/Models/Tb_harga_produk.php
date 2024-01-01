<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tb_harga_produk extends Model
{
    use HasFactory;
    public $primaryKey='id';
    protected $table = 'tb_harga_produk';
    protected $fillable = [
        'start_harga', 'end_harga', 'harga_produk', 'id_produk'
    ];

    public function product()
    {
        return $this->belongsTo(Tb_produk::class, 'id_produk', 'id_produk');
    }
}
