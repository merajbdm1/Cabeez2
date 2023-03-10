<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riders', function (Blueprint $table) {
             
            $table->integer('rider_id');
            $table->string('f_name');
            $table->string('l_name');
            $table->unique('email');
            $table->unique('contact');
            $table->enum('status',['1','0']);
            $table->string('profile_pic');
            $table->date('created_at_mongo');
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
        Schema::dropIfExists('riders');
    }
}
