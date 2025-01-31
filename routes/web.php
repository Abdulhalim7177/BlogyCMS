<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\posts\PostsController;


Auth::routes();


Route::get('/', [PostsController::class, 'index'])->name('welcome');

Route::get('/home', [PostsController::class, 'index'])->name('home');


Route::get('/posts/index', [PostsController::class, 'index'])->name('post.index');
Route::get('/posts/single/{id}', [PostsController::class, 'single'])->name('posts.single');
Route::post('/posts/comment-store', [PostsController::class, 'storeComment'])->name('comment.store');
Route::get('/posts/create-post', [PostsController::class, 'createPost'])->name('posts.create');
Route::post('/posts/post-store', [PostsController::class, 'storePost'])->name('post.store');
Route::get('/posts/post-delete/{id}', [PostsController::class, 'deletePost'])->name('post.delete');
Route::get('/posts/post-edit/{id}', [PostsController::class, 'editPost'])->name('post.edit');
Route::post('/posts/post-update/{id}', [PostsController::class, 'updatePost'])->name('post.update');
