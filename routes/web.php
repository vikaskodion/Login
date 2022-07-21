<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserDetailController;
use App\http\Controllers\HomeController;
use App\http\Controllers\PostsController;
use App\http\Controllers\ProductController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users-list', [UserDetailController::class, 'usersList'])->name('users_list');
Route::get('edit/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('edituser', [HomeController::class, 'edit_user'])->name('edituser');
Route::post('/list', [HomeController::class, 'user_list'])->name('userlist');
Route::post('user/delete/{id}',[HomeController::class,'delete']);
Route::get('listedit/{id}', [HomeController::class, 'listedit'])->name('listedit');

Route::get('new-post', [PostsController::class, 'postForm'])->name('new_post');
Route::post('save-post', [PostsController::class, 'savePost'])->name('save_post');
Route::get('approve-post/{id}', [PostsController::class, 'approvePost'])->name('approve_post');
Route::get('posts-list', [PostsController::class, 'viewPosts'])->name('posts_list');
Route::get('post/{slug}', [PostsController::class, 'post'])->name('post');
//Route::post('post_slug', [PostsController::class, 'post_slug'])->name('post_slug');

Route::get('editpost/{id}', [PostsController::class, 'post_edit'])->name('edit_post');
Route::get('delete_post/{id}', [PostsController::class, 'delete'])->name('delete_post');
Route::get('add-product',[ProductController::class,'add_product']);
Route::post('save-post-review', [PostsController::class, 'saveReview'])->name('saveReview');
Route::get('testing', [PostsController::class, 'test']);
Route::get('archive/{id}',[PostsController::class, 'archive'])->name('archive');
Route::get('delete-comment/{review_id}',[PostsController::class, 'deleteComment'])->name('delete_comment');

// Request URL -> Route -> Controller -> function -> Model(Data Manipulate) -> Controller -> View