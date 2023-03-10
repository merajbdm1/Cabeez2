<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UserActivityModel extends Eloquent
{
    use HasFactory;
    protected $collection = 'user_activity_logs';
    protected $fillable = ['log_type','done_by','ip_adress','data_table','server_ip_address'];
}
