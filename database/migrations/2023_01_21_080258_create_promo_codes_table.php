<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code', function (Blueprint $table) {
            // $table->id();
            // $table->string('promo_title');
            // $table->string('promo_code');
            // $table->string('discount_type');
            // $table->string('limit_per_user');
            // $table->string('discount');
            // $table->string('used_cont');
            // $table->string('start_date');
            // $table->string('end_date');
            // $table->string('status');
            // $table->timestamps();

            $table->id();
            $table->enum('code_type',['general','speacial','first_timer','happy_hour','happy_day'])->default('general');
            $table->string('code');
            $table->string('title');
            $table->enum('discount_type',['fixed','percent','percent_max_discount']);
            $table->string('discount');
            $table->string('max_discount')->decimal(10,2);
            $table->integer('limit_per_user');
            $table->integer('usage_limit');
            $table->enum('code_rule',['location','card','category']);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('term_condition');
            $table->enum('status',['active','inactive','deleted'])->default('inactive');


        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_code');
    }
}
