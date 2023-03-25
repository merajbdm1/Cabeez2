<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleMakeModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_make_models', function (Blueprint $table) {
            // $table->string('vehicle_model');

            // $table->string('vehicle_model_status');
            // $table->timestamps();
                $table->integer('id');
                $table->string('name');
                $table->string('icon');
                $table->string('status');
            // $table->enum('type',['cng','ev']);
            // $table->string('ev_range_on_full_charge');
            // $table->string('ev_conservative_range_on_full_charge');
            // $table->string('ev_time_for_fast_charge');
            // $table->string('ev_time_for_fast_chargedsd');
            // $table->enum('active',['1','0'])->default('0');
            // $table->foreignId('vehicle_make_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('vehicle_category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
             // $table->string('vehicle_model_status');
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
        Schema::dropIfExists('vehicle_make_models');
    }
}
