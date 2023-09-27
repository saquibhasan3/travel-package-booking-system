<?php

use App\Http\Controllers\Agent\DashboardController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\Agent\LoginController;
use App\Http\Controllers\Agent\TravelPackageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('travel_package/{package_slug}', [HomeController::class, 'travel_package'])->name('travel_package.details');


Route::group(['prefix' => 'agent', 'as' => 'agent.'], function () {
    Route::get('login',[LoginController::class,'agent_login'])->name('login');
    Route::post('process-login',[LoginController::class,'process_login'])->name('process.login');
    
    Route::group(['middleware'=>'agent'],function(){
        Route::post('logout',[LoginController::class,'logout'])->name('logout');
        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        
        Route::post('/package_bookings', [DashboardController::class, 'package_bookings'])->name('package_bookings');

        /* Travel Package Routes */
        Route::get('travel_package/create', [TravelPackageController::class, 'create'])->name('travel_package.create');
        Route::post('travel_package', [TravelPackageController::class, 'store'])->name('travel_package.store');
        Route::get('travel_package/{id}/edit', [TravelPackageController::class, 'edit'])->name('travel_package.edit');
        Route::put('travel_package/{id}', [TravelPackageController::class, 'update'])->name('travel_package.update');
        Route::delete('travel_package/{id}', [TravelPackageController::class, 'destroy'])->name('travel_package.destroy');
        Route::delete('travel_package-checked', [TravelPackageController::class, 'destroy_checked'])->name('travel_package.destroy_checked');
    });
});
Route::group(['prefix' => 'user'], function () {
    Auth::routes();
    Route::group(['middleware'=>'auth', 'as' => 'user.'],function(){
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::any('/package/book/{id}', [UserDashboardController::class, 'package_book'])->name('package.book');
        Route::get('/bookings', [UserDashboardController::class, 'bookings'])->name('bookings');
    });
});