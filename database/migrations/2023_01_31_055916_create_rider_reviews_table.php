<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiderReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rider_mobile_number');
            $table->string('driver_name_from');
            $table->string('rider_name_to');
            $table->string('rider_rating');
            $table->string('rider_reviews');
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
        Schema::dropIfExists('rider_reviews');
    }
}
