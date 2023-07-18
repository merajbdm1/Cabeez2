<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PromoController;
use App\Http\Controllers\Api\ApiDriver;
use App\Http\Controllers\Api\ApiRider;
use App\Http\Controllers\CordinateFareController;
use App\Http\Controllers\Api\CharginghubController;
use App\Http\Controllers\RidesController;
use App\Http\Controllers\Api\Webviews;
use App\Http\Controllers\Api\Vehicle;
use App\Http\Controllers\Api\ApiFarecordinate;
use App\Http\Controllers\Api\TestController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\api\ApiCordinateFareCalculation;
use App\Http\Controllers\api\ApiCordinateMeasure;
use App\Http\Controllers\Api\AttendenceController;
use App\Http\Controllers\Api\ApiCategoryAndSubCategory;
use App\Http\Controllers\Api\ApiGlobalSetting;

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

});

Route::get('viewPromocode',[PromoController::class,'index']);
Route::get('chargingHub', [CharginghubController::class, 'index']);
Route::get('login', [CharginghubController::class, 'loginUser']);
Route::post('create_data', [RidesController::class,'create_data']);
Route::post('insert_driver_data', [DriverController::class,'insert_driver_data']);

Route::get('privacy_policy', [Webviews::class,'privacy_policy']);
Route::get('term_condition', [Webviews::class,'term_condition']);


//Api Driver
Route::get('getDriverList',[ApiDriver::class,'index']);


//api Rider
Route::get('getRiderList',[ApiRider::class,'index']);

//api rider register
Route::Post('RegisterAndOldRiderNewOtp',[ApiRider::class,'store']);

//api rider login
Route::Post('verifyWithOtp',[ApiRider::class,'login']);
Route::Post('profileUpdate',[ApiRider::class,'UpdateProfile']);



Route::get('make', [Vehicle::class,'make']);
Route::get('model', [Vehicle::class,'model']);
Route::get('VehicleCategory', [Vehicle::class,'VehicleCategory']);
Route::post('driver_data_get_id', [DriverController::class,'driver_data_get_id']);

Route::get('check_car_hub', [TestController::class,'check_car_hub']);
Route::get('fare_data', [FareController::class,'fare_data']);

//api Fare base calculate
Route::post('FareCalCordinate', [ApiCordinateFareCalculation::class,'cordinateFareCalculation']);
Route::post('cordinateDistanceMesaure', [ApiCordinateMeasure::class,'cordinateMeasure']);

// Attendence


Route::post('Attendence', [AttendenceController::class,'index']);

//Category and subcategory api
Route::post('searchParentCategory', [ApiCategoryAndSubCategory::class,'show']);
Route::post('searchChildCategory', [ApiCategoryAndSubCategory::class,'showChildCategory']);
Route::post('searchModelwithCategory', [ApiCategoryAndSubCategory::class,'searchmodelwithCategory']);


//Api global settings
Route::get('listMapMyIndia', [ApiGlobalSetting::class,'index']);
