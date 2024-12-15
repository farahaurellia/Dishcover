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
Route::post('/register', [UserController::class, "register"])->name('register');

# LOGIN #
Route::post('/login', [UserController::class, "login"])->name('login');
Route::post('/logout', [UserController::class, "logout"])->name('logout');

# UPLOAD RESEP #
Route::get('/upload', function(){
    return view('upload');
});
Route::post('/upload', [RecipeController::class, "upload"])->name('upload');

# COMMENTS #
Route::get('/recipes/{recipe_id}/comments', [RecipeController::class, 'showComments'])->name('recipes.comments');
Route::post('/recipe/{recipe_id}/comment', [CommentController::class, 'addComment'])->name('comment.addComment');

# LIKE #
Route::get('/like', [UserController::class, 'like']);

# HISTORY #
Route::get('/history', [UserController::class, 'history']);

# SEARCH # 
Route::get('/search', [RecipeController::class, 'search']);

# VIEW # 
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('show');