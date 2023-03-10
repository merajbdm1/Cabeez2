<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PromoCode extends Eloquent
{
    use HasFactory;
    protected $collection = 'promo_codes';
    protected $fillable = [
        'promo_title',
        'promo_code',
        'discount_type',
        'discount',
        'used_cont',
        'limit_per_user',
        'start_date',
        'end_date',
        'status',
    ];
}
