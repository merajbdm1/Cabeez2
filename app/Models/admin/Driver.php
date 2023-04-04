<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Driver extends Eloquent
{
    use HasFactory;


    protected $collection = 'drivers';
    protected $fillable = [

          'first_name',
          'last_name',
          'date_of_birth',
          'blood_group',
          'address',
         
          'block',
          'floor',
          'unit',
          'street',
          'city',
          'state',
          'postal_code',
          'email',
          'currency',
          'balance',
          'vehicle_year',
          'vehicle_mileage',
          'driver_vehicle_category',
          'driver_vehicle_model',
          'driver_vehicle_make',
          'nric_number',
          'referral_code',
          'is_referred',
          'referred_by',
          'referred_by_type',
          'license_number',
          'license_expiry_date',
          'phone_number_country',
          'phone_number_country_code',
          'phone_number',
          'emergency_number_country_code',
          'emergency_number',
          'photo',
          'registration_photo',
          'license_photo_front',
          'license_photo_back',
          'ph_license',
          'pdvl',
          'pan_card',
          'pan_card_image',
          'commercial_insurance',
          'nric_image_front',
          'nric_image_back',
          'aadhaar_number',
          'aadhaar_image_front',
          'aadhaar_image_back',
          'rental_agreement_front',
          'rental_agreement_back',
          'car_registration_number',
          'car_passenger_capacity',
          'ph_decal_number',
          'verify_token',
          
          'is_available',
          'is_shift_started',
          'latitude',
          'longitude',
          'heading',
          'status',
          'document_status',
          'access_token',
          'device_id',
          'device_type',
          'device_info',
          'razorpay_account_id',
          'razorpay_account_status',
          'api_log',
          'total_referral',
          'ride_earning',
          'ride_cash_earning',
          'ride_cash_received',
          'earning_owe_to_six',
          'toll_earning',
          'referral_earning',
          'bonus_earning',
          'total_earning',
          'earning_paid',
          'earning_balance',
          'last_login',
          'avg_rating',
          'build_version',
          'socket_status',
          'socket_id',
          'mondaystartend',
          'tuesdaystartend',
          'wednesdaystartend',
          'thursdaystartend',
          'fridaystartend',
          'saturdaystartend',
          'puc_expiry_date',
          'model_id',
          'brand_id',
          'category_id',
          'registration_year',
          'rc_book_front',
          'rc_book_back',
          'puc_expiry_date',

    ];



    public function driver_vehicle_category()
    {
        // print_r("dhfkadf");
        return $this->belongsTo(VehicleCategory::class,'category_id','_id');
    }


    public function driver_vehicle_make()
    {
        // print_r("dhfkadf");
        return $this->belongsTo(VehicleMake::class,'brand_id','_id');
    }

    public function driver_vehicle_make_model()
    {
        // print_r("dhfkadf");
        return $this->belongsTo(VehicleModel::class,'model_id','_id');
    }


// }

    }
