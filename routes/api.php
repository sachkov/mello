<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout');
    Route::post('/refresh', 'refresh');
    Route::get('/user-profile', 'userProfile');
});

Route::resource('posts', PostController::class)->except(['create', 'edit']);
Route::get('/my_posts', [PostController::class, 'my_posts'])->name('my_posts');

Route::resource('permissions', PermissionController::class)->except(['create', 'edit']);
Route::get('/routes', [PermissionController::class, 'routes'])->name('routes');
