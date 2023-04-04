<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class GroupPromocode extends Eloquent
{
    use HasFactory;
    protected $collection = 'group_promocodes';
    protected $fillable = [
        'group_name',
        'promocode_id',
        'rider_mobile'

    ];

    public function promcode(){
        return $this->belongsTo(PromoCode::class,'promocode_id','_id');
    }

}





