<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');   
            $table->integer('customer_id');         
            $table->integer('service_type_id')->comment('type of services');
            $table->integer('vehicle_id');
            $table->date('from_date');           
            $table->date('to_date');    
            $table->integer('term_period');    
            $table->double('service_charge');    
            $table->double('service_amount');    
            $table->double('total');    
            $table->double('advance')->comment('paid_amount');    
            $table->double('balance'); 
            $table->tinyInteger('status')->comment('0-Not Paid,1-Paid'); 
            $table->tinyInteger('delete_status')->comment('0-deleted,1-Not deleted'); 
            $table->integer('year')->comment('time period in year');
            $table->integer('month')->comment('time period in month');
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
        Schema::dropIfExists('services');
    }
}
