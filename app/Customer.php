<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    public function vehicle(){
   	 	return $this->hasMany('App\Vehicle','customer_id');
   	}

   	public function cutomerservices(){
   	 	return $this->hasMany('App\Service','customer_id');
   	}
}
