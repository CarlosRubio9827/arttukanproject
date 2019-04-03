<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioServicio extends Model
{   
    protected $table = 'usuarioservicios'; 
    protected $primaryKey = 'idUsuarioServicios'; 

   protected $fillable = [
'       idUser','idServicio','costoTotal'
   ];
}
