<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomepageController;


Route::get('/', [HomepageController::class, 'homepage']);
Route::post('/register', [UserController::class, "register"]);
//Route::get('/', [UserController::class, "showLogin"]);