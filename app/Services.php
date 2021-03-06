<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    //
    public function servicestype(){
   	 	return $this->belongsTo('App\TypesOfServices','service_type_id');
   	}

   	public function servicescustomer(){
   	 	return $this->belongsTo('App\Customer','customer_id');
   	}

   	public function servicesvehicle(){
   	 	return $this->belongsTo('App\Vehicle','vehicle_id');
   	}

   	public function serviceschild(){
   	 	return $this->hasMany('App\ServiceChild','service_id');
   	}
}
