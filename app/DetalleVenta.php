<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalleventas'; 
     protected $primaryKey = 'idDetalleVenta'; 
     protected $fillable = [
          'idVenta','idProducto','cantidad','precioVenta'  
    ];
}
