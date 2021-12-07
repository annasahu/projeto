<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ['idPedido', 'idProduto'];

    public function produto()
    {
        return $this->belongsTo(Produto::class,'idProduto');
    }

    public function pedido()
    {
        return $this->belongsTo(Pedido::class,'idPedido');
    }
}
