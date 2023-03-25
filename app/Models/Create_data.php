<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Create_data extends Model
{
    use HasFactory;
    protected $collection = 'create_datas';  
    protected $fillable=['id','firstSos','secondSos','thirdSos',];

}
