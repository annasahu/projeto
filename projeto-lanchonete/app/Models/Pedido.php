<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['idCliente', 'data', 'valorTotal', 'observacoes'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class,'idCliente');
    }

    public function item()
    {
        return $this->hasOne(Item::class,'id');
    }
}
