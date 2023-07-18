<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->string('ride_number');
            $table->string('pick_up_address');
            $table->string('drop2');
            $table->string('pickup2');

            $table->string('pick_up_postcode');
            $table->float('pick_up_latitude');
            $table->float('pick_up_longitude');
            $table->string('drop_off_address');
            $table->string('drop_off_postcode');
            $table->float('drop_off_latitude');
            $table->float('drop_off_longitude');
            $table->float('accept_latitude');
            $table->float('accept_longitude');
            $table->float('start_latitude');
            $table->float('start_longitude');
            $table->float('end_latitude');
            $table->float('end_longitude');
            $table->string('passenger_capacity');
            $table->string('accept_date');
            $table->string('arrive_date');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('calling_pin');
            $table->string('otp');
            $table->string('is_otp_verified');
            $table->string('ride_amount');
            $table->string('ride_amount_without_fee');
            $table->string('ride_km');
            $table->string('estimate_time');
            $table->string('actual_time');
            $table->string('car_registration_number');
            $table->string('cancel_reason');
            $table->string('booking_date');
            $table->string('is_pre_booking');
            $table->string('payment_type');
            $table->string('is_paid');
            $table->string('status');
            $table->string('car_category');
            $table->string('car_category_icon');
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
            $table->string('toll_total');
            $table->string('night_fare_multiplier');
            $table->string('promo_code');
            $table->string('promo_discount');
            $table->string('promo_discount_type');
            $table->string('promo_discount_value');
            $table->string('promo_max_discount');
            $table->string('portal_percentage');
            $table->string('portal_earning');
            $table->string('driver_percentage');
            $table->string('driver_earning');
            $table->string('driver_rating');
            $table->string('driver_review');
            $table->string('customer_rating');
            $table->string('customer_review');
            $table->string('is_customer_rated');
            $table->string('is_driver_rated');
            $table->string('proxy_number');
            $table->string('proxy_service_sid');
            $table->string('proxy_session_sid');
            $table->string('capture_charge_id');
            $table->string('capture_amount');
            $table->string('order_id');
            $table->string('tax_percentage');
            $table->string('tax_value');
            $table->string('created_at');
            $table->string('updated_at');
            $table->unsignedInteger('driver_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('rider_id');
            $table->unsignedInteger('promo_id');
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('category_id')->references('id')->on('vehicle_categories');
            $table->foreign('rider_id')->references('id')->on('riders');
            $table->foreign('promo_id')->references('id')->on('promo_codes');
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

        Schema::dropIfExists('rides');
        // Schema::table('rides', function (Blueprint $table) {
        //     $table->dropColumn('rides');
        // });
    }
}
