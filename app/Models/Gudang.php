<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gudang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gudangs';

    protected $fillable = [
        'id',
        'nama',
        'id_satuan',
        'stok',
        'hrg_jual',
        'hrg_beli',
    ];

    public function satuans()
    {
        return $this->belongsTo(Satuan::class,'id_satuan','id');
    }
    public function bahans()
    {
        return $this->hasMany(Bahan::class,'id_gudang','id');
    }
    public function trx_belis()
    {
        return $this->hasMany(Trx_Beli::class,'id_gudang','id');
    }
}