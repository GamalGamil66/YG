<?php

use App\Http\Controllers\AqelController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\DelegateController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\NeighborhoodController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('dashboard');
});

Route::resource('Manager', ManagerController::class);

Route::resource('Neighborhood', NeighborhoodController::class);

Route::resource('Aqel', AqelController::class);

Route::resource('DeliveryMan', DeliveryManController::class);

Route::resource('Delegate', DelegateController::class);

Route::resource('Citizen', CitizenController::class);