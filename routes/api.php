<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::resource('meter_datas', App\Http\Controllers\API\MeterDataAPIController::class);

Route::get('/add',[App\Http\Controllers\API\MeterDataAPIController::class,'api_store']);
Route::get('/add_system_info',[App\Http\Controllers\API\MeterDataAPIController::class,'add_system_info']);
Route::get('/add_system_alarm',[App\Http\Controllers\API\MeterDataAPIController::class,'add_system_alarm']);
Route::get('/rodata',[App\Http\Controllers\API\MeterDataAPIController::class,'get_ro']);