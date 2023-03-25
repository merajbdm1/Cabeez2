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
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('password');
            $table->integer('phone_number_country');
            $table->integer('phone_number_country_code');
            $table->string('phone_number');
            $table->string('photo');
            $table->string('address');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('verify_token');
            $table->enum('customer_type',['android','ios','webdesk','butler']);
            $table->string('referral_code');
            $table->enum('is_referred',['1','0'])->default('0');
            $table->string('referred_by');
            $table->enum('referred_by_type',['customer','driver']);
            $table->enum('status',['active','pending','inactive','deleted'])->default('active');
            $table->string('access_token');
            $table->string('device_id');
            $table->enum('device_type',['android','ios','webdesk','butler']);
            $table->string('device_info');
            $table->string('razorpay_customer_id');
            $table->string('razorpay_payment_id');
            $table->enum('razorpay_account_status',['active','pending','inactive','not_exist']);
            $table->string('api_log');
            $table->string('last_login');
            $table->string('avg_rating');
            $table->string('total_referral');
            $table->string('referral_earning');
            $table->string('bonus_earning');
            $table->string('total_earning');
            $table->string('earning_paid');
            $table->string('earning_balance');
            $table->string('build_version');
            $table->string('otp');
            $table->timestamps('expire_at');
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
