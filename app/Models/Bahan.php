<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    use HasFactory;

    protected $table = 'bahans';

    protected $fillable = [
        'id_gudang',
        'id_penjualan',
        'jumlah',
    ];

    public function gudangs()
    {
        return $this->belongsTo(Gudang::class,'id_gudang','id');
    }
    public function penjualans()
    {
        return $this->belongsTo(Penjualan::class,'id_penjualan','id');
    }
}