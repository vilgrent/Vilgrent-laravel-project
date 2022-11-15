<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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




Route::get('users/search',[App\Http\Controllers\UserController::class,'getSearch']);
Route::get('village/details/{id}',[App\Http\Controllers\UserController::class,'getVillageId']); 
Route::get('village/image/{imgURL}',[App\Http\Controllers\UserController::class,'getImage']); 
Route::get('pincode',[App\Http\Controllers\UserController::class,'getpinCode']);
Route::post('users/insert',[App\Http\Controllers\UserController::class,'insertValue']);
Route::put('users/pincode/update',[App\Http\Controllers\UserController::class,'updateValues']);

// Route::get('villagedetails/{id}',[App\Http\Controllers\UserController::class,'village']);
// Route::get('villageSearch',[App\Http\Controllers\UserController::class,'searchVillage']);
