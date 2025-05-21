<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\HotelBuildingController;
// gloable routs
Route::get('/', function () {
    return view('login');
});
Route::post('/login', [UserController::class, 'login']);

// admin routs
Route::middleware(['auth'])->prefix('admin')->group(function () {


    Route::get('/register', function () {
        return view('index.register');
    })->name('adduser');

    // Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logOut');

    Route::post('/admin/createuser', [UserController::class, 'Registeration'])->name('createuser');
    Route::get('/rackinfo', [RackController::class, 'GetRackInfo']);
    Route::get('/hotels', [HotelsController::class, 'index'])->name('hotels.index');
    Route::get('/hotels/create', [HotelsController::class, 'create'])->name('hotels.create');
    Route::post('/hotels', [HotelsController::class, 'store'])->name('hotels.store');
    Route::get('/hotels/{id}/buildings', [HotelBuildingController::class, 'showBuildings'])->name('hotels.buildings');
});

// User Routes
Route::middleware(['auth'])->group(function () {
    // Route::get('/', function () {
    //     return view('login');
    // });
    // Route::post('/login', [UserController::class, 'login']);
    Route::get('/rackinfo', [RackController::class, 'GetRackInfo']);
    Route::get('/hotels/{id}', [HotelBuildingController::class, 'show']);
    Route::get('/hotels/{id}/buildings', [HotelBuildingController::class, 'showBuildings'])->name('hotels.buildings');

});



// Route::get('/', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('index.register');
// });
// Route::post('/login', [UserController::class, 'login']);
// Route::post('/createuser', [UserController::class, 'Registeration']);
// Route::get('/rackinfo', [RackController::class, 'GetRackInfo']);
// Route::get('/hotels', [HotelsController::class, 'index'])->name('hotels.index');
// Route::get('/hotels/create', [HotelsController::class, 'create'])->name('hotels.create');
// Route::post('/hotels', [HotelsController::class, 'store'])->name('hotels.store');

// Route::get('/hotels/{id}', [HotelBuildingController::class, 'show']);
// Route::get('/hotels/{id}/buildings', [HotelBuildingController::class, 'showBuildings'])->name('hotels.buildings');
