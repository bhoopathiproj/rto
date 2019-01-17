<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_children', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');   
            $table->integer('customer_id');
            $table->integer('service_id');   
            $table->integer('service_type_id')->comment('type of services');
            $table->integer('vehicle_id');
            $table->double('service_charge');    
            $table->double('amount');    
            $table->double('total');    
            $table->double('advance')->comment('paid_amount');    
            $table->double('balance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_children');
    }
}
