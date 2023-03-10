<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PromoController;
use App\Http\Controllers\Api\CharginghubController;
use App\Http\Controllers\RidesController;
use App\Http\Controllers\Api\Webviews;
use App\Http\Controllers\Api\Vehicle;
;
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

Route::get('privacy_policy', [Webviews::class,'privacy_policy']);
Route::get('term_condition', [Webviews::class,'term_condition']);

Route::get('make', [Vehicle::class,'make']);
Route::get('model', [Vehicle::class,'model']);
Route::get('VehicleCategory', [Vehicle::class,'VehicleCategory']);