<?php
use App\Http\Controllers\VehicleMakeController;

use App\Http\Controllers\RidesController;
use Illuminate\Support\Facades\Route;

Route::get('admin/rides', [RidesController::class,'index']);
Route::get('admin/add_rides', [RidesController::class,'add']);
Route::post('admin/rides_process', [RidesController::class,'store']);
Route::get('admin/edit_rides/{id}', [RidesController::class,'edit']);
Route::post('admin/update_rides/{id}', [RidesController::class,'update']);
Route::get('admin/delete_rides/{id}', [RidesController::class,'destroy']);
?>

