<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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

Route::get('/posts/my', [PostController::class, 'my_posts'])->name('my_posts');
Route::resource('posts', PostController::class)->except(['create', 'edit']);


Route::resource('permissions', PermissionController::class)->except(['create', 'edit']);
Route::get('/routes', [PermissionController::class, 'routes'])->name('routes');

Route::put('/role_permission/{roleId}', [RoleController::class, 'bind_permissions']);
