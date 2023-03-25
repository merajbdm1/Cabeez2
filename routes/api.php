<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PromoController;
use App\Http\Controllers\Api\ApiDriver;
use App\Http\Controllers\Api\ApiRider;
use App\Http\Controllers\CordinateFareController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('viewPromocode',[PromoController::class,'index']);



//Api Driver
Route::get('getDriverList',[ApiDriver::class,'index']);


//api Rider
Route::get('getRiderList',[ApiRider::class,'index']);

//api rider register
Route::Post('RegisterAndOldRiderNewOtp',[ApiRider::class,'store']);

//api rider login
Route::Post('verifyWithOtp',[ApiRider::class,'login']);
Route::Post('profileUpdate',[ApiRider::class,'UpdateProfile']);
Route::Post('ApiCordinateDistanceFare',[CordinateFareController::class,'cordinateFareDistance']);


