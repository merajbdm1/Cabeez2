<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;

class PromoController extends Controller
{
    
    public function index(){
        $prmode=new PromoCode();

        $viewAll=$prmode->get();

        return response()->json(
            [
                "data" => [
                    "Data_List"=>"PromoCode",
                    "error" => "false",
                    "data" => $viewAll
                ],
         
            ]
        );
    }


}
