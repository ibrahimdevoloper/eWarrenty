<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mobileAppController\mobileAppController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::resource('Battery','App\Http\Controllers\Battery\BatteryController',['only'=>['show','index']]);
// Route::resource('CarProperty','App\Http\Controllers\CarProperty\CarPropertyController',['only'=>['show','index']]);
// Route::resource('CarType','App\Http\Controllers\CarType\CarTypeController',['only'=>['show','index']]);
// Route::resource('Country','App\Http\Controllers\Country\CountryController',['only'=>['show','index']]);
// Route::resource('ManufacturingCountry','App\Http\Controllers\ManufacturingCountry\ManufacturingCountryController',['only'=>['show','index']]);
// Route::resource('Market','App\Http\Controllers\Market\MarketController',['only'=>['show','index']]);
// Route::resource('Terminal','App\Http\Controllers\Terminal\TerminalController',['only'=>['show','index']]);
// Route::resource('Warranty','App\Http\Controllers\Warranty\WarrantyController',['only'=>['show','index','store']]);
Route::get('/initData',App\Http\Controllers\mobileAppController\mobileAppController::class.'@initData');
Route::get('/getWarrenty',App\Http\Controllers\mobileAppController\mobileAppController::class.'@getWarrenty');