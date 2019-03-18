<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use Illuminate\Notifications\Notifiable;

class Role extends EntrustRole
{

	use Notifiable;


	public function users(){
        return $this->belongsToMany('App\User');
	}

   		protected $table = 'roles'; 
	    protected $primaryKey = 'id'; 
        protected $fillable = [
    	'name','desciption'];

}
 