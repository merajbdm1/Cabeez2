<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\Fare;
class CordinateFareController extends Controller
{

    public function cordinateFareDistance(Request $request){
        $faredistance =new Fare();

        // print_r($apifarer);exit();

        $distance=$request->input('distance');
        



        print_r($distance);exit;



    }




}
