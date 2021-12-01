<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id','nome','endereco','telefone'];
    
    
    public function pedido()
    {
        return $this->hasOne(Pedido::class,'id');
    }
}
