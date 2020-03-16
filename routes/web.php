<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::middleware('auth')->group(function() {
    Route::get('/', 'DashboardController@index');
    Route::get('/home', 'DashboardController@index');

    Route::prefix('/users')->group(function() {
        Route::get('/', 'UsersController@index');
        Route::get('/create', 'UsersController@create');
        Route::get('/{id}', 'UsersController@get');
    });

    Route::prefix('/api')->group(function () {
        Route::get('/', 'ApiController@index');
        Route::get('/create', 'ApiController@create');
    });

    Route::get('/profile', 'ProfileController@index');
    Route::get('/password', 'ProfileController@password');
});