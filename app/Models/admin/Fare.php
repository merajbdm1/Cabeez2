<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Fare extends Eloquent
{
    use HasFactory;
    protected $collection = 'fare';
    protected $fillable=['vehicle_category','base_fare','time_factor_for_travel','rate_per_km_25_kms','rate_per_km_25_to_50_kms','rate_per_km_50_to_100_kms','rate_per_km_100_to_250_kms','rate_per_km_250_to_500_kms','rate_per_km_500_kms','minimum_fare','km_for_min_fare','status'];

}
