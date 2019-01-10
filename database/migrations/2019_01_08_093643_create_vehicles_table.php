<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('user_type')->comment('type of user');
            $table->string('vehicle_no');
            $table->string('vehicle_type');
            $table->string('vehicle_gcv');
            $table->string('vehicle_seater');
            $table->string('vehicle_description')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0-Inactive,1-Active');
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
        Schema::dropIfExists('vehicles');
    }
}
