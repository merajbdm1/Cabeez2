<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('date_of_birth');
            $table->string('blood_group');
            $table->string('address');
            $table->string('block');
            $table->string('floor');
            $table->string('unit');
            $table->string('street');
            $table->string('city');
            $table->string('state');

            $table->string('postal_code');
            $table->string('email');
            $table->string('currency');
            $table->string('balance');
            $table->string('vehicle_year');
            $table->string('driver_vehicle_registration_number');
            $table->string('driver_vehicle_make');
            $table->string('driver_vehicle_model');
            $table->string('driver_vehicle_category');
            $table->string('puc_expiry_date');

            $table->string('vehicle_mileage');
            $table->string('nric_number');
            $table->string('referral_code');
            $table->string('is_referred');
            $table->string('referred_by');
            $table->string('referred_by_type');
            $table->string('license_number');
            $table->string('license_expiry_date');
            $table->string('phone_number_country');
            $table->string('phone_number_country_code');
            $table->string('phone_number');
            $table->string('driver_vehicle_registration_image');
            $table->string('emergency_number_country_code');
            $table->string('emergency_number');
            $table->string('photo');
            $table->string('driver_ride_type');
            $table->string('registration_photo');
            $table->string('license_photo_front');
            $table->string('license_photo_back');
            $table->string('ph_license');
            $table->string('pdvl');
            $table->string('pan_card');
            $table->string('commercial_insurance');
            $table->string('nric_image_front');
            $table->string('nric_image_back');
            $table->string('aadhaar_image_front');
            $table->string('aadhaar_image_back');
            $table->string('rental_agreement_front');
            $table->string('rental_agreement_back');
            $table->string('car_registration_number');
            $table->string('car_passenger_capacity');
            $table->string('ph_decal_number');
            $table->string('verify_token');


            $table->string('is_available');
            $table->string('is_shift_started');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('heading');
            $table->string('status');
            $table->string('document_status');
            $table->string('access_token');
            $table->string('device_id');
            $table->string('device_type');
            $table->string('device_info');
            $table->string('razorpay_account_id');
            $table->string('razorpay_account_status');
            $table->string('api_log');

            $table->string('total_referral');
            $table->string('ride_earning');
            $table->string('ride_cash_earning');
            $table->string('ride_cash_received');
            $table->string('earning_owe_to_six');
            $table->string('toll_earning');
            $table->string('referral_earning');
            $table->string('bonus_earning');
            $table->string('total_earning');
            $table->string('earning_paid');
            $table->string('earning_balance');
            $table->string('last_login');
            $table->string('avg_rating');
            $table->string('build_version');
            $table->string('socket_status');
            $table->string('socket_id');
            $table->string('suspended_at');
            $table->string('created_at');
            $table->string('updated_at');
            $table->string('mondaystartend');
            $table->string('tuesdaystartend');
            $table->string('wednesdaystartend');
            $table->string('thursdaystartend');
            $table->string('fridaystartend');
            $table->string('saturdaystartend');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->enum('driver_ride_type', ['ev_city', 'outstation','rental','corporate']);
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
        Schema::dropIfExists('drivers');
        // Schema::table('drivers', function (Blueprint $table) {
        //     $table->dropColumn('drivers');
        // });

    }
}
