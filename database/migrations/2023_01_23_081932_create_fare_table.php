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
            $table->string('category_id');
            $table->string('base_fare');
            $table->string('minimum_fare');
            $table->string('per_min_fare');
            $table->string('per_km_fare');
            $table->string('per_km_fare_slab1');
            $table->string('per_km_fare_slab2');
            $table->string('per_km_fare_slab3');
            $table->string('per_km_fare_slab4');
            $table->string('per_km_fare_slab5');
            $table->string('minimum_fare_km');
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
