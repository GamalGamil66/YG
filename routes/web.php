<?php

use App\Http\Controllers\AqelController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\DelegateController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\NeighborhoodController;
use Illuminate\Support\Facades\Auth;
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
// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(); i made it by my self

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('Manager', ManagerController::class);

Route::resource('Neighborhood', NeighborhoodController::class);

Route::resource('Aqel', AqelController::class);

Route::resource('DeliveryMan', DeliveryManController::class);

Route::resource('Delegate', DelegateController::class);

Route::resource('Citizen', CitizenController::class);




Route::group(['prefix' => 'manager'], function() {
    Route::group(['middleware' => 'manager.guest'], function(){
        Route::view('/login','Pages.Manager.login')->name('manager.login');
        Route::post('/login',[App\Http\Controllers\ManagerController::class, 'authenticate'])->name('manager.auth');
    });
    
    Route::group(['middleware' => 'manager.auth'], function(){
        Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'dashboard'])->name('manager.dashboard');
        Route::get('/logout', [App\Http\Controllers\ManagerController::class, 'logout'])->name('manager.logout');

    });
});




Route::group(['prefix' => 'super_manager'], function() {
    Route::group(['middleware' => 'super_manager.guest'], function(){
        Route::view('/login','Pages.SuperManager.login')->name('super_manager.login');
        Route::post('/login',[App\Http\Controllers\SuperManagerController::class, 'authenticate'])->name('super_manager.auth');
    });
    
    Route::group(['middleware' => 'super_manager.auth'], function(){
        Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'super_manager_dashboard'])->name('super_manager.dashboard');
        Route::get('/logout', [App\Http\Controllers\SuperManagerController::class, 'logout'])->name('super_manager.logout');

    });
});




Route::group(['prefix' => 'my_controller'], function() {
    Route::group(['middleware' => 'my_controller.guest'], function(){
        Route::view('/login','Pages.MyController.login')->name('my_controller.login');
        Route::post('/login',[App\Http\Controllers\MyCon::class, 'authenticate'])->name('my_controller.auth');
    });
    
    Route::group(['middleware' => 'my_controller.auth'], function(){
        Route::get('/dashboard',[App\Http\Controllers\DashboardController::class, 'my_controller_dashboard'])->name('my_controller.dashboard');
        Route::get('/logout', [App\Http\Controllers\MyCon::class, 'logout'])->name('my_controller.logout');

    });
});