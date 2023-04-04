<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Fare extends Eloquent
{
    use HasFactory;
    protected $collection = 'fare';
    protected $fillable = [
        'base_fare',
        'minimum_fare',
        'per_min_fare',
        'per_km_fare',
        'per_km_fare_slab1',
        'per_km_fare_slab2',
        'per_km_fare_slab3',
        'per_km_fare_slab4',
        'per_km_fare_slab5',
        'per_km_fare_slab6',
        'status',
        'category_id'
    ];


    public function categories()
    {
        return $this->belongsTo(VehicleCategory::class,'category_id','_id');
    }
}
