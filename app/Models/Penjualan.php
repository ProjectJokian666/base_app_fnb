<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penjualans';

    protected $fillable = [
        'id',
        'nama',
        'hrg_beli',
        'hrg_jual',
    ];
    
    public function bahans()
    {
        return $this->hasMany(Bahan::class,'id_penjualan','id');
    }
}
