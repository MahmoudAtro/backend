<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MoneyController;
use App\Http\Controllers\Api\OfficeController;
use App\Models\User;
use App\Models\Office;
use App\Models\Money;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function(){

    Route::get('/have-middlewere', function(){
        return 'you have a middlewere';
    });

    Route::apiResource('/office' , OfficeController::class);

    Route::apiResource('/money' , MoneyController::class);
});

Route::get('/testonline' , function(){
    return 'website is online';
});


Route::get('/generate/api-token/{id}' , function($id){
    $user = User::findOrFail($id);
    if(!$user->api_token){
        $user->api_token = Str::random(20);
        $user->save();
    }
    return $user->api_token;
});