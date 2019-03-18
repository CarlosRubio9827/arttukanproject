<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'users'; 
     protected $primaryKey = 'id'; 
     protected $fillable = [
    	'nombres',
    	'apellidos' 
    ];
}
  