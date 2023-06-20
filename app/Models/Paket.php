<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jenis_produk()
    {
        return $this->belongsTo(JenisProduk::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
