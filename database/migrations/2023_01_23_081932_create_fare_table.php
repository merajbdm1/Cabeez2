<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fare', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_category');
            $table->integer('base_fare');
            $table->integer('time_factor_for_travel');
            $table->integer('rate_per_km_25_kms');
            $table->integer('rate_per_km_25_to_50_kms');
            $table->integer('rate_per_km_50_to_100_kms');
            $table->integer('rate_per_km_100_to_250_kms');
            $table->integer('rate_per_km_250_to_500_kms');
            $table->integer('rate_per_km_500_kms');
            $table->integer('minimum_fare');
            $table->integer('km_for_min_fare');
            $table->enum('status', ['1', '0']);
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
        Schema::dropIfExists('fare');
    }
}
