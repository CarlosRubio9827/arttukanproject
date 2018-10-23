<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
     protected $table = 'DetalleIngresos'; 
     protected $primaryKey = 'idDetalleIngreso'; 
     protected $fillable = [
    	'cantidad',
    	'idProducto'
    ];

    
}
