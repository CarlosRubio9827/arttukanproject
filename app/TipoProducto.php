<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
	    protected $table = 'tipoproductos'; 
     protected $primaryKey = 'idTipoProducto'; 

    protected $fillable = [
    	'nombreTipoProducto','descripcionTipoProducto','condicion'
    ];

}
   