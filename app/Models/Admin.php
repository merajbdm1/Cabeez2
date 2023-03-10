<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class Admin extends Authenticatable 
{
    use HasFactory;
    protected $collection = 'admins';
    protected $fillable = ['name','email','mobile','password'];

}
