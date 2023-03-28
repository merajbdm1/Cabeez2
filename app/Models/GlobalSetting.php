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
        'map_my_india',
        'client_id',
        'client_secret_key',
        'api_map_sdk_key',


    ];
}
