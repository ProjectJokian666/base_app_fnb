<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Satuan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'satuans';

    protected $fillable = [
        'id',
        'satuan',
    ];

    public function gudangs()
    {
        return $this->hasMany(Gudang::class,'id_satuan','id');
    }
}
