<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\VehicleCategory;
use App\Models\admin\VehicleMake;
use App\Models\admin\VehicleModel;

class Vehicle extends Controller
{
    public function make(){
        $VehicleMake=new VehicleMake();

        $viewAll=$VehicleMake->all();
       
        if(count($viewAll) >0 ){
        return response()->json(
            [
                "data" => [
                    "Data_List"=>"VehicleMake",
                    "success" => 201,
                    "error" => "false",
                    "data" => $viewAll
                ],
         
            ]
        );
    }
    else
    {
        return response()->json(
            [
                "data" => [
                    "message"=>"Data not  ",
                    "error" => "true",
                    "success" => 200,
                   
                ],
         
            ]);

    }

    }
    public function model(){
        $VehicleModel=new VehicleModel();
        $viewAll=$VehicleModel->all();
       
        if(count($viewAll) >0 ){
        return response()->json(
            [
                "data" => [
                    "Data_List"=>"VehicleModel",
                    "success" => 201,
                    "error" => "false",
                    "data" => $viewAll
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
                    "success" => 200,
                   
                ],

         
            ]);

    }
     
    }
    public function VehicleCategory(){
        $VehicleCategory=new VehicleCategory();

        $viewAll=$VehicleCategory->all();
       
        if(count($viewAll) >0 ){
        return response()->json(
            [
                "data" => [
                    "Data_List"=>"VehicleCategory",
                    "success" => 201,
                    "error" => "false",
                    "data" => $viewAll
                ],
         
            ]
        );
    }
    else
    {
        return response()->json(
            [
                "data" => [
                    "message"=>"Data not  ",
                    "error" => "true",
                    "success" => 200,
                   
                ],
         
            ]);

    }
        
    }
}
