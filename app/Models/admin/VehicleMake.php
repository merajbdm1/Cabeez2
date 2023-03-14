<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\admin\VehicleModel;

class VehicleMake extends Eloquent
{
    use HasFactory;
    protected $collection = 'vehicle_makes';
    protected $fillable = ['id',
        'name','status'
    ];


    public function df()
    {
        return $this->hasMany(VehicleModel::class,'vehicle_make_id');
    }

}


?>
