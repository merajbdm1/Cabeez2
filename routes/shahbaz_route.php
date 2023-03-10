<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\RidersController;

//PromoCodes Routers
Route::get('promocode', [PromoCodeController::class, 'index']);
Route::post('add_promocode', [PromoCodeController::class, 'store']);
Route::get('admin/edit_promocode/{id}', [PromoCodeController::class, 'edit']);
Route::post('admin/update_promocode', [PromoCodeController::class, 'update']);
Route::get('admin/delete_promocode/{id}', [PromoCodeController::class, 'destroy']);

//Riders Routers
Route::get('admin/riders', [RidersController::class, 'index'])->name('rider_review');
Route::get('admin/add_riders', [RidersController::class, 'create']);
Route::post('admin/store_riders', [RidersController::class, 'store']);
Route::get('admin/delete_rider/{id}', [RidersController::class, 'destroy']);
Route::get('admin/edit_rider/{id}', [RidersController::class, 'edit']);
Route::post('admin/update_rider', [RidersController::class, 'update']);

// Route::get('rider',function(){
//     return view('admin.pages.rider');
// });