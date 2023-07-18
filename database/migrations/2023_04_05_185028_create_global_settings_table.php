<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->id();
            $table->string('rest_map_sdk_key');
            $table->string('map_my_india_client_key');
            $table->string('map_my_india_secret_key');
            $table->string('night_fare_start_time');
            $table->string('night_fare_end_time');
            $table->string('night_fare_multiplyaer');
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
        Schema::dropIfExists('global_settings');
    }
}
