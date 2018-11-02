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
    Route::get('/category/add','CategoryController@add')->name('category.add');
    Route::post('/category/doAdd','CategoryController@doAdd')->name('category.doAdd');
    Route::get('/category/edit','CategoryController@edit')->name('category.edit');
    Route::post('/category/doEdit','CategoryController@doEdit')->name('category.doEdit');

    /*商品列表*/
    Route::get('/goods','GoodsController@index')->name('goods.index');
    Route::get('/goods/add','GoodsController@add')->name('goods.add');
    Route::post('/goods/doAdd','GoodsController@doAdd')->name('goods.doAdd');
    Route::get('/goods/edit','GoodsController@edit')->name('goods.edit');
    Route::post('/goods/doEdit','GoodsController@doEdit')->name('goods.doEdit');
    Route::get('/goods/del','GoodsController@del')->name('goods.del');
    Route::get('/goods/collect','GoodsController@collect')->name('goods.collect');



    /*会员部分*/
    Route::get('/user','UserController@index')->name('user.index');
    Route::get('/user/edit','UserController@edit')->name('user.edit');
    Route::get('/user/del','UserController@del')->name('user.del');
    Route::get('/user/coupon','UserController@coupon')->name('user.coupon');

    /*优惠券部分*/
    Route::get('/coupon','CouponController@index')->name('coupon.index');
    Route::get('/coupon/del','CouponController@del')->name('coupon.del');

    /*广告部分*/
    Route::get('/banner','BannerController@index')->name('banner.index');
    Route::get('/banner/del','BannerController@del')->name('banner.del');
    Route::get('/banner/add','BannerController@add')->name('banner.add');
    Route::post('/banner/doAdd','BannerController@doAdd')->name('banner.doAdd');

    /*文章部分*/
    Route::get('/news','NewsController@index')->name('news.index');
    Route::get('/news/del','NewsController@del')->name('news.del');
    Route::get('/news/add','NewsController@add')->name('news.add');
    Route::post('/news/doAdd','NewsController@doAdd')->name('news.doAdd');

});

Route::namespace('Wap')->prefix('wap')->name('wap.')->group(function(){
    /*首页*/
    Route::get('/index','IndexController@index')->name('index.index');
    /*商品*/
    Route::get('/goods/index','GoodsController@index')->name('goods.index');
    Route::get('/goods/chapter','GoodsController@chapter')->name('goods.chapter');
    Route::get('/goods/buy','GoodsController@buy')->name('goods.buy');

    /*账号*/
    Route::get('/account/login','AccountController@login')->name('account.login');
    Route::get('/account/logout','AccountController@logout')->name('account.logout');
    Route::get('/account/check','AccountController@check')->name('account.check');

    Route::get('/coupon/index','CouponController@index')->name('coupon.index');


});


Route::namespace('Wap')->prefix('wap')->name('wap.')->middleware('account')->group(function(){

    /*商品*/
    Route::get('/goods/buy','GoodsController@buy')->name('goods.buy');

    Route::get('/user','UserController@index')->name('user.index');

    Route::get('/coupon/get','CouponController@getCoupon')->name('coupon.get');


});