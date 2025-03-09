<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\posts\PostsController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Categories\CategoriesController;

Auth::routes();

Route::get('/', [PostsController::class, 'index'])->name('welcome');

Route::get('/home', [PostsController::class, 'index'])->name('home');
Route::get('/contact', [PostsController::class, 'contact'])->name('contact');
Route::get('/about', [PostsController::class, 'about'])->name('about');


Route::prefix('posts')->group(function () {
    Route::get('/index', [PostsController::class, 'index'])->name('post.index');
    Route::get('/single/{id}', [PostsController::class, 'single'])->name('posts.single');
    Route::post('/comment-store', [PostsController::class, 'storeComment'])->name('comment.store');
    Route::get('/create-post', [PostsController::class, 'createPost'])->name('posts.create');
    Route::post('/post-store', [PostsController::class, 'storePost'])->name('post.store');
    Route::get('/post-delete/{id}', [PostsController::class, 'deletePost'])->name('post.delete');
    Route::get('/post-edit/{id}', [PostsController::class, 'editPost'])->name('post.edit');
    Route::post('/post-update/{id}', [PostsController::class, 'updatePost'])->name('post.update');
});



Route::group(['prefix' => 'categories'], function() {
   Route::get('/category/{name}', [CategoriesController::class, 'category'])->name('category.single');
});

Route::group(['prefix' => 'users'], function() {
   Route::get('/edit/{id}', [UsersController::class, 'editProfile'])->name('users.edit');
   Route::any('/update/{id}', [UsersController::class, 'updateProfile'])->name('users.update');
});
