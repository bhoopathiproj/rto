<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesOfServices extends Model
{
    //
    public function services(){
   	 	return $this->hasMany('App\Services','service_type_id');
   	}
}
