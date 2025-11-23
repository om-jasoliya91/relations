<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// if we want this hasone method then uncomment index function and comment hasMany Method
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/index', [AuthorController::class, 'index'])->name('authors.index');

// this is one to many example
// Route::get('/posts', [PostController::class, 'allPost'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/author/{author_id}', [PostController::class, 'showByAuthor'])->name('posts.byAuthor');

Route::get('/posts/{id}', [PostController::class, 'getAuthorPosts'])->name('posts.show');
