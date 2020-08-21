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

Route::get('/dashboard', 'HomeController@index')->middleware('auth')->name('dashboard');

Route::group(['middleware' => 'auth', 'namespace' => 'Dashboard'], function () {

    Route::resource('categories', 'CategoryController')->except('show');

    Route::resource('users', 'UserController')->except('show');

    Route::resource('news', 'NewsController');

});
