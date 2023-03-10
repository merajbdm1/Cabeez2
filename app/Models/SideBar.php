<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SideBar extends Eloquent
{

    use HasFactory;
    protected $collection = 'side_bar';
    protected $fillable = [ 'id','side_bar_name' ];
}
