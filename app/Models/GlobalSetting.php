<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class GlobalSetting extends Eloquent
{
    use HasFactory;
    protected $collection = 'global_settings';
    protected $fillable = [
        'id',
        'rest_map_sdk_key',
        'map_my_india_client_key',
        'map_my_india_secret_key',
        'night_fare_start_time',
        'night_fare_end_time',
        'night_fare_multiplyaer'
    ];
}
