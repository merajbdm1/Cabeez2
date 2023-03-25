<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Fare;

class FareController extends Controller
{
    function fare_data(){
        $all_fare_data = Fare::all();

        
        

    }
}
