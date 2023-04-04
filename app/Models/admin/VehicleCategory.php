<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use App\Models\admin\VehicleModel;
class VehicleCategory extends Eloquent
{
    use HasFactory;
    protected $collection = 'vehicle_categories';
    protected $fillable = ['id',
        'icon','name','capacity','status','parent_id'
    ];

    public function Model()
    {
        return $this->hasMany(VehicleModel::class);
    }
}

?>
