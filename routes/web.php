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
    Route::get('/logout','LoginController@index')->name('logout');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('admin')->group(function(){
    /*后台首页*/
    Route::get('/index','IndexController@index')->name('index.index');
    /*管理员部分*/
    Route::get('/admin','AdminController@index')->name('admin.index');
    Route::get('/admin/edit','AdminController@edit')->name('admin.edit');
    Route::post('/admin/doEdit','AdminController@doEdit')->name('admin.doEdit');

    /*商品分类*/
    Route::get('/category','CategoryController@index')->name('category.index');


    /*会员部分*/
    Route::get('/user','UserController@index')->name('user.index');
    Route::get('/user/edit','UserController@edit')->name('user.edit');
    Route::get('/user/del','UserController@del')->name('user.del');


    Route::get('/user/coupon','UserController@coupon')->name('user.coupon');

    /*优惠券部分*/
    Route::get('/coupon','CouponController@index')->name('coupon.index');
    Route::get('/coupon/del','CouponController@del')->name('coupon.del');

});