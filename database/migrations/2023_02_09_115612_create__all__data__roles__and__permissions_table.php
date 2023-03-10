<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllDataRolesAndPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_all__data__roles__and__permissions', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->enum('driver_permissions',['Add','Edit','View','Delete']);
            $table->enum('riders_permissions',['Add','Edit','View','Delete']);
            $table->enum('rides_persmissions',['Add','Edit','View','Delete']);
            $table->enum('promocode_permissions',['Add','Edit','View','Delete']);
            $table->enum('reports_permissions',['Add','Edit','View','Delete']);
            $table->enum('manual_ride_booking_permissions',['Add','Edit','View','Delete']);
            $table->enum('rider_reviews_permissions',['Add','Edit','View','Delete']);
            $table->enum('driver_reviews_permissions',['Add','Edit','View','Delete']);
            $table->enum('vehicle_categories_permissions',['Add','Edit','View','Delete']);
            $table->enum('vehicle_make_permissions',['Add','Edit','View','Delete']);
            $table->enum('vehicle_model_permissions',['Add','Edit','View','Delete']);
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
        Schema::dropIfExists('_all__data__roles__and__permissions');
    }
}
