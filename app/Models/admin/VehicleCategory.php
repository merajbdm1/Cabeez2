<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class VehicleCategory extends Eloquent
{
    use HasFactory;
    protected $collection = 'vehicle_categories';
    protected $fillable = ['id',
        'icon','name','capacity','status'
    ];

    public function Model()
    {
        return $this->hasMany(VehicleCategory::class,'vehicle_category_id');
    }
}

?>
