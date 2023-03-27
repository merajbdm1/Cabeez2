<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Fare;

class ApiCordinateFareCalculation extends Controller
{
    public function cordinateFareCalculation(Request $request)
    {

        $distance = $request->input('distance');
        $category_id = $request->input('category_id');
        $ETA = $request->input('ETA');

        $calFareModel = new Fare();
        $calfare = $calFareModel->where('category_id', $category_id)->first();
        $countdata = $calFareModel->where('category_id', $category_id)->count();
        $mini_fare_km = isset($calfare['minimum_fare_km'])?$calfare['minimum_fare_km']:null;
       // $minimum_fare = isset($calfare['minimum_fare'])?$calfare['minimum_fare']:null;

        $data = array();
        if ($distance > $mini_fare_km) {
                if ($countdata == true) {
                    $per_km_fare_slab1 = $calfare['per_km_fare_slab1'];
                    $per_km_fare_slab2 = $calfare['per_km_fare_slab2'];
                    $per_km_fare_slab3 = $calfare['per_km_fare_slab3'];
                    $per_km_fare_slab4 = $calfare['per_km_fare_slab4'];
                    $per_km_fare_slab5 = $calfare['per_km_fare_slab5'];
                    $per_min_fare = $calfare['per_min_fare'];
                    $base_fare = $calfare['base_fare'];
                    if ($distance  < 25) { //slab1
                        $eta = $per_min_fare * $ETA;
                        $data = $distance * $per_km_fare_slab1 + $eta + $base_fare;
                    } elseif ($distance > 25 && $distance < 50) { //slab2
                        $data = $distance * $per_km_fare_slab2;
                    } elseif ($distance > 50 && $distance < 100) { //slab3
                        $data = $distance * $per_km_fare_slab3;
                    } elseif ($distance > 100 && $distance < 250) { //slab4
                        $data = $distance * $per_km_fare_slab4;
                    } elseif ($distance > 250 && $distance < 500) { //slab5
                        $data = $distance * $per_km_fare_slab5;
                    }


// print_r($minimum_fare);exit;

                    return response()->json([
                        'status' => 200,
                        'message' => 'Fare Information',
                        "TotalFare" => [
                            "total_Fare" => $data,
                            'category_id' => $category_id,
                            'total_distance' => $distance,
                            'ETA' => $ETA,
                            'general_Base_Fare' => $calfare
                        ],

                        ], 200);



                }
                else{
                        return response()->json([
                            'status' => 404,
                            'message' => 'Vehicle category not found',

                        ], 404);
                    }

                }
                    else {
                        return response()->json([
                            'status' => 404,
                            'message' => 'Fare should be greater than '.$mini_fare_km.' KM',

                        ], 404);
                    }


    }

    }


