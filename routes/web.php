<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HotelsController;
use App\Http\Controllers\BuildingRackController;
use App\Http\Controllers\HotelBuildingController;
// gloable routs
Route::get('/', function () {
    return view('login');
})->name('login');
Route::post('/login', [UserController::class, 'login']);

// admin routs
Route::middleware(['auth'])->prefix('admin')->group(function () {


    Route::get('/register', function () {
        return view('index.register');
    })->name('adduser');

    // Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout'])->name('logOut');

    Route::post('/admin/createuser', [UserController::class, 'Registeration'])->name('createuser');
    
    Route::get('hotels/{hotel_id}/{buildingRId}/rackinfo', [RackController::class, 'GetRackInfo'])->name('rackinfo');
    
    Route::get('/hotels', [HotelsController::class, 'index'])->name('hotels.index');
    
    Route::get('/hotels/create', [HotelsController::class, 'create'])->name('hotels.create');
    
    Route::post('/hotels', [HotelsController::class, 'store'])->name('hotels.store');
    
    Route::get('/hotels/{id}/buildings', [HotelBuildingController::class, 'showBuildings'])->name('hotels.buildings');
    
    Route::get('/hotels/{id}/buildings/addbuilding', [HotelBuildingController::class, 'newBuildingForm'])->name('addbuilding');
    Route::post('/hotels/newBuilding', [HotelBuildingController::class, 'StoreBuilding'])->name('storebuilding');
    
    // Route::get('/buildings/{name}/racks', [BuildingRackController::class, 'showRacks'])->name('racks');
    
    Route::get('hotels/{hotel_id}/buildings/{name}/racks', [BuildingRackController::class, 'showRacks'])->name('racks');
    
    Route::get('hotels/{hotel_id}/addrack', [BuildingRackController::class, 'newRackForm'])->name('addrack');
    Route::post('/hotels/newRack', [BuildingRackController::class, 'StoreRack'])->name('storerack');
    
    Route::get('hotels/{hotel_id}/addswitch', [BuildingRackController::class, 'newSwitchForm'])->name('addswitch');
    Route::post('/hotels/newswitch', [BuildingRackController::class, 'StoreSwitch'])->name('storeswitch');


});

// User Routes
Route::middleware(['auth'])->group(function () {
 
    Route::get('/hotels/{id}', [HotelBuildingController::class, 'show']);
    Route::get('/hotels/{id}/buildings', [HotelBuildingController::class, 'showBuildings'])->name('hotels.buildings');
    Route::get('hotels/{hotel_id}/{buildingRId}/rackinfo', [RackController::class, 'GetRackInfo'])->name('rackinfo');
    Route::get('hotels/{hotel_id}/buildings/{name}/racks', [BuildingRackController::class, 'showRacks'])->name('racks');

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
