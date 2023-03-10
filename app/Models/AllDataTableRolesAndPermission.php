<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AllDataTableRolesAndPermission extends Eloquent
{
    use HasFactory;

    protected $collection = '_all__data__roles__and__permissions';
    protected $fillable = [
        'role_name',
        'driver_permissions',
        'riders_permissions',
        'rides_persmissions',
        'promocode_permissions',
        'reports_permissions',
        'manual_ride_booking_permissions',
        'rider_reviews_permissions',
        'driver_reviews_permissions',
        'vehicle_categories_permissions',
        'vehicle_make_permissions',
        'vehicle_model_permissions',
    ];


}
