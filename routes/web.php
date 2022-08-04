<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\Images\ImageController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\LikeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Follower\FollowerController;
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

Route::get('/', HomeController::class )->name('home');


/* Login */
Route::get('/login', [ LoginController::class, 'index' ] )->name('login');
Route::post('/login', [ LoginController::class, 'store' ] );
Route::post('/logout', [ LogoutController::class, 'store' ] )->name('logout');

/* Crear cuenta */
Route::get('/sign-up',  [ SignUpController::class, 'index' ] )->name('sign-up.index');
Route::post('/sign-up', [ SignUpController::class, 'store' ] )->name('sign-up.store');

/* Perfil */
Route::get('/edit-profile', [ ProfileController::class, 'index' ] )->name('profile.index');
Route::post('/edit-profile', [ ProfileController::class, 'store' ] )->name('profile.store');

/* Posts */
Route::get('/posts/create', [ PostController::class, 'create' ] )->name('post.create');
Route::post('/posts', [ PostController::class, 'store' ] )->name('post.store');
Route::get('/{user:username}/posts/{post}', [ PostController::class, 'show' ] )->name('post.show');
Route::delete('/posts/{post}', [ PostController::class, 'destroy' ] )->name('post.destroy');

/* Comentarios */
Route::post('/{user:username}/posts/{post}', [ CommentController::class, 'store' ] )->name('comment.store');


/* Likes */
Route::post('/posts/{post}/likes', [ LikeController::class, 'store' ] )->name('post.likes.store');
Route::delete('/posts/{post}/likes', [ LikeController::class, 'destroy' ] )->name('post.likes.destroy');


Route::post('/images', [ ImageController::class, 'store' ] )->name('images.store');

Route::get('/{user:username}', [ PostController::class, 'index' ] )->name('post.index');


/* Follower */
Route::post('/{user:username}/follow', [ FollowerController::class, 'store' ] )->name('users.follow');
Route::delete('/{user:username}/unfollow', [ FollowerController::class, 'destroy' ] )->name('users.unfollow');
