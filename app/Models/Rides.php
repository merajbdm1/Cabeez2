<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\admin\VehicleCategory;
use App\Models\admin\Driver;
class Rides extends Eloquent
{
    use HasFactory;
    protected $collection = 'rides';
    protected $fillable = [
        '_id',
        'ride_number',
        'drop2',
        'pickup2',
        'pick_up_address',
        'pick_up_postcode',
        'pick_up_latitude',
        'pick_up_longitude',
        'drop_off_address',
        'drop_off_postcode',
        'drop_off_latitude',
        'drop_off_longitude',
        'accept_latitude',
        'accept_longitude',
        'start_latitude',
        'start_longitude',
        'end_latitude',
        'end_longitude',
        'passenger_capacity',
        'accept_date',
        'arrive_date',
        'start_date',
        'end_date',
        'calling_pin',
        'otp',
        'is_otp_verified',
        'ride_amount',
        'ride_amount_without_fee',
        'ride_km',
        'estimate_time',
        'actual_time',
        'car_registration_number',
        'cancel_reason',
        'booking_date',
        'is_pre_booking',
        'payment_type',
        'is_paid',
        'status',
        'car_category',
        'car_category_icon',
        'base_fare',
        'minimum_fare',
        'per_min_fare',
        'per_km_fare',
        'per_km_fare_slab1',
        'per_km_fare_slab2',
        'per_km_fare_slab3',
        'per_km_fare_slab4',
        'per_km_fare_slab5',
        'minimum_fare_km',
        'toll_total',
        'night_fare_multiplier',
        'promo_code',
        'promo_discount',
        'promo_discount_type',
        'promo_discount_value',
        'promo_max_discount',
        'portal_percentage',
        'portal_earning',
        'driver_percentage',
        'driver_earning',
        'driver_rating',
        'driver_review',
        'customer_rating',
        'customer_review',
        'is_customer_rated',
        'is_driver_rated',
        'proxy_number',
        'proxy_service_sid',
        'proxy_session_sid',
        'capture_charge_id',
        'capture_amount',
        'order_id',
        'tax_percentage',
        'tax_value',
        'created_at',
        'updated_at',
        'driver_id',
        'category_id',
        'rider_id',
        'promo_id',

    ];

    public function categories()
    {
        
        return $this->belongsTo(VehicleCategory::class,'category_id','_id');

    }

    public function driver()
    {
 
        return $this->belongsTo(Driver::class,'driver_id','_id');   echo"code run";
        // dd($test);
    }
}
