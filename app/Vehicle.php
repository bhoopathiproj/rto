<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    public function customer(){
   	 	return $this->belongsTo('App\Customer','customer_id');
   	}

   	public function vehicleservices(){
   	 	return $this->hasMany('App\Services','vehicle_id');
   	}
}
