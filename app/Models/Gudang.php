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
        'hpp',
    ];

    public function satuans()
    {
        return $this->belongsTo(Satuan::class,'id_satuan','id');
    }
}
