<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detallepedidos'; 
    protected $primaryKey = 'idDetallePedido'; 
    protected $fillable = [
          'idVenta','idProducto','cantidad'
    ];
}

