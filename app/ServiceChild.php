<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceChild extends Model
{
    //
    public function services(){
   	 	return $this->belongsTo('App\Services','service_id');
   	}

   	public function serviceschildtype(){
   	 	return $this->belongsTo('App\TypesOfServices','service_type_id');
   	}

   	public function serviceschildcustomer(){
   	 	return $this->belongsTo('App\Customer','customer_id');
   	}

   	public function servicesvehicle(){
   	 	return $this->belongsTo('App\Vehicle','vehicle_id');
   	}
}
