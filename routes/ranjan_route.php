<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FareSettingController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AllManuleRideBookingController;
use App\Http\Controllers\DriverReviewsController;
use App\Http\Controllers\RiderReviewsController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\RoleListController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\RoleAndPermissionController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\SideBarSetting;
use App\Http\Controllers\ChargingHubController;
use App\Http\Controllers\Api\AttendenceController;
use App\Http\Controllers\BookNowController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\DriverRequestController;
use App\Http\Controllers\SettlementController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\GlobalSettingController;
use App\Http\Controllers\GroupPromocodeController;

//Fare Settings

Route::group(['middleware' => 'prevent-back-history','auth'],function(){

	Auth::routes();

	Route::get('fare_view_setting',[FareSettingController::class,'index'])->name('search.name');
    Route::get('add_fare_setting',[FareSettingController::class,'create']);
    Route::post('fare_process',[FareSettingController::class,'store']);
    Route::get('edit_fare_view_setting/{id}',[FareSettingController::class,'edit']);
    Route::post('edit_fare_process/{id}',[FareSettingController::class,'update']);
    Route::get('delete_fare_view_setting/{id}',[FareSettingController::class,'destroy']);

    //User Activity logs
    Route::get('activity_delete/{id}',[UserActivityController::class,'delete']);
    Route::get('activity_delete/{id}',[UserActivityController::class,'delete']);
   // Route::post('activity_user_log',[UserActivityController::class,'activity_user_view'])->name('dateranger.fetch_data');
    Route::post('/daterange/fetch_data', [UserActivityController::class,'fetch_data'])->name('daterange.fetch_data');
    //Admin

    // Route::get('admin_register',[AdminController::class,'register_form']);
    // Route::post('admin_post',[AdminController::class,'register_post']);
    // Route::post('dashboard',[AdminController::class,'admin_login_post'])->name('dashboard');


// Route::get('logout',[AdminController::class,'logout']);
Route::get('dashboard',[LoginController::class,'dashboardcard']);

Route::post('dashboard', [LoginController::class, 'customLogin'])->name('dashboard');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
Route::get('admin_dashboard', function () {
    return view('admin.pages.index');
});

//Driver Reviews
Route::get('rider_reviews', [RiderReviewsController::class, 'index']);
Route::get('driver_reviews', [DriverReviewsController::class, 'index']);


//All Manual Ride Booking
Route::get('all_manual_ride_booking',[AllManuleRideBookingController::class,'index']);


// Route::get('activity_user_log', function () {
//     if(Session::get('name') != 'superadmin')
//     {
//        return Redirect::route('login');

//     }
//     else {
//         return  Redirect::route('activity_user_log');
//     }

// });



});
Route::get('activity_user_log',[UserActivityController::class,'activity_user_view'])->name('user_activity_search')->middleware('checksuperuseractivitylog');
//Admin
// Route::get('admin_login',[AdminController::class,'login_form']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');



//user Assgin role
Route::get('role_list', [RoleListController::class,'index']);
Route::get('add_role', [RoleListController::class,'create']);
Route::post('role_post',[RoleListController::class,'store']);
Route::get('user_role_edit/{id}',[RoleListController::class,'edit']);
Route::post('role_post_update/{id}',[RoleListController::class,'update']);


//roles and permissions
Route::get('role_list_and_permission',[RoleAndPermissionController::class,'index']);
Route::get('add_role_permission',[RoleAndPermissionController::class,'create']);
Route::post('role_permission_post',[RoleAndPermissionController::class,'store'])       ;
Route::get('driver_permission_view/{id}',[RoleAndPermissionController::class,'show']);



//Roles Permission Edit
Route::get('driver_permission_edit/{id}',[RoleAndPermissionController::class,'edit']);
Route::post('role_permission_post/{id}',[RoleAndPermissionController::class,'update']);


//sidebar settings
Route::get('sidebar_setting',[SideBarSetting::class,'index']);
Route::get('add_sidebar',[SideBarSetting::class,'create']);
Route::post('sidebar_post',[SideBarSetting::class,'store']);
Route::get('sidebar_edit/{id}',[SideBarSetting::class,'edit']);
Route::post('sidebar_update/{id}',[SideBarSetting::class,'update']);
Route::get('sidebar_delete/{id}',[SideBarSetting::class,'destroy']);


//Charging Hubs
Route::get('view_hubs',[ChargingHubController::class,'index']);
Route::get('add_hub',[ChargingHubController::class,'create']);
Route::post('hub_post',[ChargingHubController::class,'store']);
Route::get('charging_hub_edit/{id}',[ChargingHubController::class,'edit']);
Route::post('hub_update/{id}',[ChargingHubController::class,'update']);
Route::get('charging_hub_delete/{id}',[ChargingHubController::class,'destroy']);


//attendance
Route::get('list_attendance',[AttendenceController::class,'index']);


//book_now
Route::get('book_now/',[BookNowController::class,'index']);
Route::get('admin/booknow_view/{id}',[BookNowController::class,'show']);
Route::get('/search',[BookNowController::class,'product_search'])->name('search');

//Driver Request
Route::get('driver_request',[DriverRequestController::class,'index'])->name('driver_request');


//Driver Fare Settlemtnet
Route::get('admin/driver_settlemtnet',[SettlementController::class,'index']);


//promocode
Route::get('add_promocode',[PromoCodeController::class,'create']);
Route::post('post_promocode',[PromoCodeController::class,'store']);
Route::get('edit_promocode/{id}',[PromoCodeController::class,'edit']);
Route::post('edit_post_promocode/{id}',[PromoCodeController::class,'update']);
Route::get('delete_promocode/{id}',[PromoCodeController::class,'destroy']);



//global settings
Route::get('view_global', [GlobalSettingController::class,'index']);
Route::get('add_global_setting', [GlobalSettingController::class,'create']);
Route::post('post_mapindia', [GlobalSettingController::class,'store']);
Route::get('edit_global_map/{id}', [GlobalSettingController::class,'edit']);
Route::post('edit_post_mapindia/{id}', [GlobalSettingController::class,'update']);
Route::get('delete_map/{id}', [GlobalSettingController::class,'destroy']);

Route::get('view_global/{id}', [GlobalSettingController::class,'editsmkey']);
Route::post('updatemapsdkkey/{edimapsdkkey}', [GlobalSettingController::class,'updatemapsdkkey']);

Route::get('view_globalclientapikey/{id}', [GlobalSettingController::class,'edit_client_key']);
Route::post('updateClientApikey/{clientapikey}', [GlobalSettingController::class,'updateCleintApiKey']);

Route::get('view_global_map_my_india_secret_key/{id}', [GlobalSettingController::class,'edit_secret_key']);
Route::post('updateSecretKey/{clientapikey}', [GlobalSettingController::class,'updateSecretKey']);

Route::get('view_night_fare_start_time/{start_time}', [GlobalSettingController::class,'ng_start_time']);
Route::post('updateNightStartTime/{ng_start_time}', [GlobalSettingController::class,'update_ng_start_time']);

Route::get('view_end_time/{end_time}', [GlobalSettingController::class,'ng_end_time']);
Route::post('updateNightENDTime/{end_time}', [GlobalSettingController::class,'update_ng_end_time']);

Route::get('view_night_Player/{night_fare_multiplyaer}', [GlobalSettingController::class,'nightPlayer']);
Route::post('update_night_player/{night_fare_multiplyaer}', [GlobalSettingController::class,'update_night_player']);


//group promocode
Route::get('view_group_promocode', [GroupPromocodeController::class,'index']);
Route::get('add_group', [GroupPromocodeController::class,'create']);
Route::post('post_make_group', [GroupPromocodeController::class,'store']);
Route::get('edit_group_code/{id}', [GroupPromocodeController::class,'edit']);
Route::get('delete_group_code/{id}', [GroupPromocodeController::class,'destroy']);


Route::get('getDeleteitemrider_mobile/{id}/mobile_no/{mno_id}', [GroupPromocodeController::class,'deleteitemrider_mobile']);

Route::get('deletegpmridermobile/{gpridermobile}/mobile/{mno_id}', [GroupPromocodeController::class,'deleterider_mobile']);




Route::post('groupmakeadd', [GroupPromocodeController::class,'addgroupmake']);
Route::post('edit_make_group/{id}', [GroupPromocodeController::class,'editMakeGroup']);


Route::get('edit_addEdit_group/{id}', [GroupPromocodeController::class,'editaddeditGroup']);
Route::post('groupAdd_phone_number/{id}', [GroupPromocodeController::class,'groupPhonenNumber']);


?>
