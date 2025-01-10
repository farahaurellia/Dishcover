<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomepageController;


Route::get('/', [RecipeController::class, 'homepage']);

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
Route::post('/recipe/{id}/comment', [RecipeController::class, 'addComment'])->name('addComment');

# LIKE #
Route::get('/like', [UserController::class, 'like']);
Route::post('/like', [RecipeController::class, 'like'])->name('like');
Route::post('/unlike', [RecipeController::class, 'unlike'])->name('unlike');

# HISTORY #
Route::get('/history', [UserController::class, 'history']);

# SEARCH # 
Route::get('/search', [RecipeController::class, 'search']);

# VIEW # 
Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('show');

# DOWNLOAD #
Route::get('/recipes/download/{id}', [RecipeController::class, 'download'])->name('recipes.download');

# MY RECIPE #
Route::get('/myrecipe', [UserController::class, 'myrecipe'])->name('myrecipe');

# EDIT #
Route::get('/edit/{id}', [RecipeController::class, 'editPage'])->name('editPage');
Route::put('/edit/{id}', [RecipeController::class, 'edit'])->name('recipes.update');

# DELETE #
Route::post('/edit/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');