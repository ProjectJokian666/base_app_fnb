<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trx_Beli extends Model
{
    use HasFactory;

    protected $table = 'trx_belis';

    protected $fillable = [
        'id',
        'id_gudang',
        'jumlah',
        'harga',
    ];

    public function gudangs()
    {
        return $this->belongsTo(Gudang::class,'id_gudang','id');
    }
}
