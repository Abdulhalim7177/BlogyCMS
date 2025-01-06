<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\posts\PostsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts/index', [App\Http\Controllers\posts\PostsController::class, 'index'])->name('post.index');
Route::get('/posts/single/{id}', [App\Http\Controllers\posts\PostsController::class, 'single'])->name('posts.single');
