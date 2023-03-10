<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_categories', function (Blueprint $table) {
            //$table->string('vehicle_category_image');
            $table->integer('id');
            $table->string('icon');
            //$table->string('vehicle_category_name');
            $table->string('name');
            $table->string('capacity');
            $table->string('status');
            //$table->string('vehicle_seating_capacity');
            //$table->string('vehicle_category_status');
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
        Schema::dropIfExists('vehicle_categories');
        // Schema::table('vehicle_categories', function (Blueprint $table) {
        //     $table->dropColumn('vehicle_categories');
        // });
    }
}
