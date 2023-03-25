<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Riders;
use App\Models\admin\Fare;


class ApiFarecordinate extends Controller
{
    public function cordinate_ditance(Request $request){

        $apifarer=new Fare();
        print_r($apifarer);exit();

        $x = $request->input('x');
        $y = $request->input('y');

        // Convert to km
        $x = $x / 1000;
        $y = $y / 1000;

        $distance = sqrt($x * $x + $y * $y);

        print_r($distance);exit;
    }
}
