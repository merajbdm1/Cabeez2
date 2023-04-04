<?php
use App\Http\Controllers\VehicleMakeController;

use App\Http\Controllers\AllManuleRideBookingController;
use App\Http\Controllers\RidesController;
use App\Http\Controllers\SettlementController;
use Illuminate\Support\Facades\Route;


Route::get('admin/rides', [RidesController::class,'index']);
Route::get('admin/add_rides', [RidesController::class,'add']);
Route::post('admin/rides_process', [RidesController::class,'store']);
Route::get('admin/edit_rides/{id}', [RidesController::class,'edit']);
Route::post('admin/update_rides/{id}', [RidesController::class,'update']);
Route::get('admin/delete_rides/{id}', [RidesController::class,'destroy']);


// menual booking
Route::post('admin/add_menual_ride', [AllManuleRideBookingController::class,'store']);
Route::get('admin/view_menual_ride_booking', [AllManuleRideBookingController::class,'show2']);
Route::get('admin/edit_menual_ride_booking/{id}', [AllManuleRideBookingController::class,'edit']);
Route::get('admin/api', [AllManuleRideBookingController::class,'create']);
Route::get('show3', [AllManuleRideBookingController::class,'show3']);

Route::get('settlement', [SettlementController::class,'index']);
?>

