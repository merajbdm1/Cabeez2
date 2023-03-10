<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class RiderReviews extends Eloquent
{
    use HasFactory;
    protected $collection = 'rider_reviews';
    protected $fillable = ['rider_mobile_number','driver_name_from','rider_name_to','rider_rating','rider_reviews'];
}
