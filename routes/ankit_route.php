<?php
use App\Http\Controllers\VehicleMakeController;
use App\Http\Controllers\VehicleCategoryController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Route;


Route::get('admin/driver', [DriverController::class,'index'])->name('search');
Route::post('admin/search', [DriverController::class,'searchdrivelist']);




Route::get('admin/status', [DriverController::class,'update_status']);

Route::get('admin/search', [DriverController::class,'search'])->name('search.list');
Route::get('admin/driver/fetch_data', [DriverController::class,'fetch_data']);



Route::get('admin/add_driver', [DriverController::class,'add'])->name('admin/add_driver')->middleware('adddriverroutemiddleware');
Route::post('admin/driver_process', [DriverController::class,'store']);
Route::get('admin/edit_driver/{id}', [DriverController::class,'edit']);
Route::post('admin/update_driver/{id}', [DriverController::class,'update']);
Route::get('admin/delete_driver/{id}', [DriverController::class,'destroy']);
Route::get('admin/view_driver/{id}', [DriverController::class,'show']);
Route::get('admin/ride_history/{id}', [DriverController::class,'ride_history']);



// Vehicle Category Route

Route::get('admin/vehicle/category', [VehicleCategoryController::class,'index']);
Route::post('admin/vehicle/add_category', [VehicleCategoryController::class,'store']);
Route::get('admin/vehicle/edit_category/{id}', [VehicleCategoryController::class,'edit']);
Route::post('admin/vehicle/update_category/{id}', [VehicleCategoryController::class,'update']);
Route::get('admin/vehicle/delete_category/{id}', [VehicleCategoryController::class,'destroy']);


// Vehicle Make Route

Route::get('admin/vehicle/make', [VehicleMakeController::class,'index']);
Route::post('admin/vehicle/add_make', [VehicleMakeController::class,'store']);
Route::get('admin/vehicle/edit_make/{id}', [VehicleMakeController::class,'edit']);
Route::post('admin/vehicle/update_make/{id}', [VehicleMakeController::class,'update']);
Route::get('admin/vehicle/delete_make/{id}', [VehicleMakeController::class,'destroy']);


// Vehicle Model Route

Route::get('admin/vehicle/model', [VehicleModelController::class,'index']);
Route::post('admin/vehicle/add_model', [VehicleModelController::class,'store']);
Route::get('admin/vehicle/edit_model/{id}', [VehicleModelController::class,'edit']);
Route::post('admin/vehicle/update_model/{id}', [VehicleModelController::class,'update']);
Route::get('admin/vehicle/delete_model/{id}', [VehicleModelController::class,'destroy']);
?>
