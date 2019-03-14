<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sugerencia extends Model
{
    protected $table = 'sugerencias'; 
     protected $primaryKey = 'idSugerencia'; 
     protected $fillable = [
        'nombres',
        'email',
    	'sugerencias' 
    ];
}
 