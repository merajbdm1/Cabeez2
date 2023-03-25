<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\chargingHub;

class CharginghubController extends Controller
{
    public function index(){
        $chargingHub=new chargingHub();
        $viewAll=$chargingHub->all();
        if(count($viewAll) >0 ){
        return response()->json(
            [
                "data" => [
                    "Data_List"=>"chargingHub",
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
