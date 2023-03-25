<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class VehicleModel extends Eloquent
{
    use HasFactory;
    protected $collection = 'vehicle_make_models';
    protected $fillable = [
        'id',
        'name',
        // 'vehicle_model_status',
        // // 'vehicle_model',
        // 'ev_range_on_full_charge',
        // 'ev_conservative_range_on_full_charge',
        // 'ev_time_for_fast_charge',
        'icon',
        'status',
        // 'type',
        'brand_id',
        'category_id'

    ];

    public function make()
    {
        // print_r("dhfkadf");
        return $this->belongsTo(VehicleMake::class,'vehicle_make_id','id');
    }

    public function categories()
    {
        return $this->belongsTo(VehicleCategory::class,'vehicle_category_id','_id');
    }
}


?>
