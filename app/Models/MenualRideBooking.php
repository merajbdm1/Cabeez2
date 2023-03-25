<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MenualRideBooking extends Model
{
    use HasFactory;
    protected $collection = 'menual_ride_bookings';
    protected $fillable = [
        '_id',
        'ride_contact_no',
        'ride_name',
        'rider_email',
        'ride_estimate',
        'pickup_address',
        'destination_address',
        'pickup_date',
        'pickup_time',
        'ride_eta',
        'assign_driver',
        'estimate_fare_total',
        'tax',
        'total_amount',
        'vehicle_cat_id',
    ];
}
