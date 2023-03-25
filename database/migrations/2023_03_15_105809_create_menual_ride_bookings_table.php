<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenualRideBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menual_ride_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('rider_contact_no');
            $table->string('rider_name');
            $table->string('rider_email');
            $table->string('ride_estimate ');
            $table->string('pickup_address');
            $table->string('destination_address');
            $table->string('pickup_date');
            $table->string('pickup_Time');
            $table->string('assign_driver');
            $table->string('ride_eta');
            $table->string('etimate_fare_total');
            $table->string('tax');
            $table->string('tax');
            $table->string('total_amount');
            $table->unsignedInteger('vehicle_cat_ids');
            $table->foreign('vehicle_cat_ids')->references('id')->on('vehicle_categories'); 
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
        Schema::dropIfExists('menual_ride_bookings');
    }
}
