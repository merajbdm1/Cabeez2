<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupSaveRiderMobileByPromocodeIdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_save_rider_mobile_by_promocode_ids', function (Blueprint $table) {
            $table->id();
            $table->string('gp_pm_id');
            $table->string('rider_mobile');
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
        Schema::dropIfExists('group_save_rider_mobile_by_promocode_ids');
    }
}
