<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Riders extends Eloquent
{
    use HasFactory;
    protected $collection = 'riders';
    protected $fillable = [
        'id' ,
        'first_name' ,
        'last_name' ,
        'email' ,
        'password' ,
        'phone_number_country',
        'phone_number_country_code',
        'phone_number' ,
        'photo' ,
        'address' ,
        'latitude' ,
        'longitude' ,
        'verify_token' ,
        'customer_type' ,
        'referral_code' ,
        'is_referred',
        'referred_by',
        'referred_by_type',
        'status',
        'access_token' ,
        'device_id' ,
        'device_type',
        'device_info',
        'razorpay_customer_id' ,
        'razorpay_account_id',
        'razorpay_account_status',
        'api_log',
        'last_login',
        'avg_rating' ,
        'total_referral' ,
        'referral_earning',
        'bonus_earning',
        'total_earning',
        'earning_paid',
        'earning_balance',
        'build_version',
        'otp',
        'expire_at',
        'created_at',
        'updated_at',

    ];
}
