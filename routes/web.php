<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomepageController;


Route::get('/', [HomepageController::class, 'homepage']);

# REGISTER #
Route::get('/register', function () {
    return view('register'); 
});
Route::post('/register', [UserController::class, "register"]);

# LOGIN #
Route::get('/login', function(){
    return view('login');
});
Route::post('/login', [UserController::class, "login"]);

# UPLOAD RESEP #
Route::get('/upload', function(){
    return view('upload');
});
Route::post('/upload', [RecipeController::class, "upload"]);

# COMMENTS #
Route::get('/recipes/{recipe_id}/comments', [RecipeController::class, 'showComments'])->name('recipes.comments');
Route::post('/recipe/{recipe_id}/comment', [CommentController::class, 'addComment'])->name('comment.addComment');

Route::get('/test', function(){
    view('Components.navbar');
});