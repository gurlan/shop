<?php

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


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/login','LoginController@index')->name('login');
    Route::post('/login','LoginController@login')->name('doLogin');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    Route::get('/index','IndexController@index')->name('index');
});