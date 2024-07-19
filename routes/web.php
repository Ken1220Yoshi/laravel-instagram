<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Adminmiddleware;


Auth::routes();



Route::group(["middleware" => "auth"],function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    Route::resource('post',PostController::class);

    Route::post('/comment/{post}',[CommentController::class,'store'])->name('comment');
    Route::delete('/comment/destroy/{comment}',[CommentController::class,'destroy'])->name('comment.destroy');

    Route::resource('profile',ProfileController::class);

    Route::post('/posts/{id}/like',[LikeController::class,'store'])->name('posts.like');
    Route::delete('/posts/{post}/like',[Likecontroller::class,'destroy'])->name('posts.unlike');
    Route::resource('follow',FollowController::class);
   
    Route::get('/profile/{id}/follower',[ProfileController::class,'followers'])->name('profile.follower');
    Route::get('/profile/{id}/following',[ProfileController::class,'following'])->name('profile.following');

    Route::group(['middleware' => 'admin'],function(){
        Route::get('/admin/users',[UsersController::class,'index'])->name('admin.users');
        Route::delete('/admin/{id}/delete',[UsersController::class,'delete'])->name('admin.users.deactive');
        Route::post('/admin/{id}/restore',[UsersController::class,'restore'])->name('admin.users.active');

        Route::get('/admin/posts',[PostsController::class,'index'])->name('admin.posts');
        Route::delete('/admin/{id}/posts/delete',[PostsController::class,'delete'])->name('admin.posts.hide');
        Route::post('/admin/{id}/posts/restore',[PostsController::class,'restore'])->name('admin.posts.unhide');

        Route::get('/admin/categories',[CategoriesController::class,'index'])->name('admin.categories');
        Route::resource('categories',CategoriesController::class);
    });

    Route::get('/search',[HomeController::class,'search'])->name('search');

    Route::get('/suggested',[HomeController::class,'suggestions'])->name('suggestion');
});