<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class groupSaveRiderMobileByPromocodeId extends Eloquent
{
    use HasFactory;
    protected $collection = 'group_save_rider_mobile_by_promocode_ids';
    protected $fillable = [
        'id' ,
        'gp_pm_id',
        'rider_mobile'
    ];
}
