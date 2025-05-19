<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\HotelBuildingController;



Route::get('/', function () {
    return view('login');
});
Route::get('/index', function () {
    return view('index.index');
});
Route::get('/register', function () {
    return view('index.register');
});


Route::post('/login', [UserController::class, 'login']);
Route::post('/createuser', [UserController::class, 'Registeration']);
Route::get('/rackinfo', [RackController::class, 'GetRackInfo']);
Route::get('/hotels', [HotelsController::class, 'index'])->name('hotels.index');
Route::get('/hotels/create', [HotelsController::class, 'create'])->name('hotels.create');
Route::post('/hotels', [HotelsController::class, 'store'])->name('hotels.store');

Route::get('/hotels/{id}', [HotelBuildingController::class, 'show']);
Route::get('/hotels/{id}/buildings', [HotelBuildingController::class, 'showBuildings'])->name('hotels.buildings');
