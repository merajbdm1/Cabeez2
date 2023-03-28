<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



class ApiCordinateMeasure extends Controller
{
    public function cordinateMeasure(Request $request){

        $lat1 = $request->input('lat1');
        $lon1 = $request->input('lon1');
        $lat2 = $request->input('lat2');
        $lon2 = $request->input('lon2');
        $radius = 6371; // Earth's radius in kilometers

        // Convert degrees to radians
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        // Calculate distance using Haversine formula
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $radius * $c;

        return response()->json(['distance' => $distance]);

    }
}
