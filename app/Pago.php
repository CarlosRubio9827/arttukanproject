<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'pagos'; 
    protected $primaryKey = 'idPago'; 
    protected $fillable = [
          'reference','state','idCliente'
    ];
}
