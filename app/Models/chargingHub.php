<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class chargingHub extends Eloquent
{
    use HasFactory;
    protected $collection = 'charging_hubs';
    protected $fillable = [
        'id',
        'address',
        'hub_name',
        'hub_address',
        'hub_status',
    ];
}
