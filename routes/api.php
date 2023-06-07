<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware' => ['api']], function () {
    Route::group(['prefix' => 'citizen'], function () {
        Route::post('login', [App\Http\Controllers\Api\Citizen\AuthController::class, 'login']);

        Route::post('logout', [App\Http\Controllers\Api\Citizen\AuthController::class, 'logout'])->middleware(['auth.guard:citizen-api']);
        //invalidate token security side

        //broken access controller user enumeration
    });

    Route::group(['prefix' => 'delegate'], function () {
        Route::post('login', [App\Http\Controllers\Api\Delegate\AuthController::class, 'login']);

        Route::post('logout', [App\Http\Controllers\Api\Delegate\AuthController::class, 'logout'])->middleware(['auth.guard:delegate-api']);
        //invalidate token security side

        //broken access controller user enumeration
    });
    
    Route::group(['prefix' => 'delivery'], function () {
        Route::post('login', [App\Http\Controllers\Api\DeliveryMan\AuthController::class, 'login']);

        Route::post('logout', [App\Http\Controllers\Api\DeliveryMan\AuthController::class, 'logout'])->middleware(['auth.guard:delivery-api']);
        //invalidate token security side

        //broken access controller user enumeration
    });

    Route::group(['prefix' => 'aqel'], function () {
        Route::post('login', [App\Http\Controllers\Api\Aqel\AuthController::class, 'login']);

        Route::post('logout', [App\Http\Controllers\Api\Aqel\AuthController::class, 'logout'])->middleware(['auth.guard:aqel-api']);
        //invalidate token security side

        //broken access controller user enumeration
    });
    



    Route::group(['prefix' => 'citizen', 'middleware' => 'auth.guard:citizen-api'], function () {
        Route::post('profile', function () {
            return  Auth::user(); // return authenticated user data
        });
    });

});
