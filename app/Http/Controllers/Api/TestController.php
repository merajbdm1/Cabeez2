<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\admin\VehicleMake;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function check_car_hub(Request $request){

        $car_number = $request->name;
        
        $VehicleModel2 = VehicleMake::where('name', $car_number)->first();
        // print_r($VehicleModel2);

        if($VehicleModel2){
            return response()->json(
                [
                    "data" => [
                        "Data_List"=>"chargingHub",
                        "status" => 201,
                        "error" => "false",
                        "data" => $VehicleModel2
                    ],
             
                ]
            );
        }
        else
        {
            return response()->json(
                [
                    "data" => [
                        "message"=>"Data not",
                        "error" => "true",
                        "status" => 200,
                       
                    ],
             
                ]);
    
        }
        // if($VehicleModel2){
        //     echo "data matches";
        // }else{
        //     echo "not matches";
        // }
    }
}
