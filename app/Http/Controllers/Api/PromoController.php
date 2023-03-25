<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromoCode;

class PromoController extends Controller
{
    
    public function index(){

      
        $prmode=new PromoCode();
        echo "<pre>";
        $viewAll=$prmode->get();
        // foreach ($prmode as $prmode2){
        //    $prmode2[0]['promo_code'];
        // }

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
