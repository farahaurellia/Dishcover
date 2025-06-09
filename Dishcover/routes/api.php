<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiRecipeController;

//REGISTER
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);

//LOGIN
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

//GET USER DATA
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//LOGOUT
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
});

//GET HOMEPAGE
//Logged In:
Route::middleware('auth:sanctum')->get('/homepage', [ApiRecipeController::class, 'homepageApi']);
//Guest:
Route::get('/homepage', [ApiRecipeController::class, 'homepageApi']);

//SEARCH
Route::get('/search', [ApiRecipeController::class, 'searchApi']);

//LIKES, HISTORY, MYRECIPES
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/likes', [ApiRecipeController::class, 'likesApi']);
    Route::get('/history', [ApiRecipeController::class, 'historyApi']);
    Route::get('/myrecipes', [ApiRecipeController::class, 'myrecipesApi']);
});

//VIEW
Route::middleware('auth:sanctum')->get('/recipes/{id}', [ApiRecipeController::class, 'showApi']);
Route::get('/recipes/{id}', [ApiRecipeController::class, 'showApi']);

//LIKE AND UNLIKE
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/like', [ApiRecipeController::class, 'addLikeApi']);
    Route::post('/unlike', [ApiRecipeController::class, 'deleteLikeApi']);
});

//UPLOAD, EDIT, DELETE
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/upload', [ApiRecipeController::class, 'uploadApi']);
    Route::get('/edit/{id}', [ApiRecipeController::class, 'editPageApi']);
    Route::post('/edit/{id}', [ApiRecipeController::class, 'editApi']);
    Route::post('/delete/{id}', [ApiRecipeController::class, 'destroyApi']);
});

//ADD COMMENT
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/recipes/{id}/comment', [ApiRecipeController::class, 'addCommentApi']);
});