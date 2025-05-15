<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('login');
});
Route::get('/index', function () {
    return view('index.index');
});
Route::get('/register', function () {
    return view('index.register');
});


Route::post('/login', [UserController::class,'login' ]);
Route::post('/createuser', [UserController::class,'Registeration' ]);
