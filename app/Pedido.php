<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos'; 
    protected $primaryKey = 'idPedido'; 
    protected $fillable = [
          'fechaHora','totalPedido','estado' ,'idCLiente'
    ];
}
 