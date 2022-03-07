<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Admin'], function() {
    Route::group(['middleware' => 'guest:admin'],function() {
        Route::get('login', [LoginController::class, 'getLogin']) -> name('admin.login');
        Route::post('login', [LoginController::class, 'Login']) -> name('admin.post.login');
    });

    Route::group(['middleware' => 'auth:admin'],function() {
        Route::get('/', [DashboardController::class, 'inex']) -> name('admin.dashboard');
    });
});
