<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios'; 
	    protected $primaryKey = 'idServicio'; 
	    public $timestamps=false;
        protected $fillable = [
    	'codigo','nombreServicio','descripcion','precio'

    ];
  
}
