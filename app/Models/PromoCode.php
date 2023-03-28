<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class PromoCode extends Eloquent
{
    use HasFactory;
    protected $collection = 'promo_code';
    protected $fillable = [
        // 'promo_title',  before promocode
        // 'promo_code',
        // 'discount_type',
        // 'discount',
        // 'used_cont',
        // 'limit_per_user',
        // 'start_date',
        // 'end_date',
        // 'status',
        'code_type',
        'code',
        'title',
        'discount_type',
        'discount',
        'max_discount',
        'limit_per_user',
        'usage_limit',
        'code_rule',
        'category_id',
        'start_date',
        'end_date',
        'term_condition',

        'status',
        'created_at',
        'updated_at',

    ];
}
