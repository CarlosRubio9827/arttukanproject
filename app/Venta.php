<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

	 protected $table = 'ventas'; 
     protected $primaryKey = 'idVenta'; 
     protected $fillable = [
          'fechaHora','totalVenta','estado'  
    ];
 
}
