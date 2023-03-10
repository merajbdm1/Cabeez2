<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Riders extends Eloquent
{
    use HasFactory;
    protected $collection = 'riders';
    protected $fillable = [
        'rider_id',
        'f_name',
        'l_name',
        'email',
        'contact',
        'status',
        'profile_pic',
        'created_at',
        'updated_at',

    ];
}
