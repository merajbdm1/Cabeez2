<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\admin\VehicleModel;
use App\Models\Rides;
class VehicleCategory extends Eloquent
{
    use HasFactory;
    protected $collection = 'vehicle_categories';
    protected $fillable = ['_id',
        'icon','name','capacity','status','parent_id'
    ];

    public function Model()
    {
        return $this->hasMany(VehicleModel::class);
    }
    
    public function rides()
    {
        return $this->hasMany(Rides::class);
    }
}

?>
