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

/*  Đây là route dành cho trang quản trị */
Route::group(['prefix'=>'admin','namespace'=>'Admin',"middleware"=>'auth'],function(){
	Route::get('/','AdminController@dashboard')->name('admin.dashboard');
	Route::resources([
		'home' => 'HomeController',
		'category' => "CategoryController",
		'producer' => "ProducerController",
		'product' => "ProductController",
		'color' => "ColorController",
		'size' => "SizeController",
		'user' => 'UserController',
		'banner'=>'BannerController',
		'slider'=>'SliderController',
		'customer'=>'CustomerController'

	]);

	Route::get('cate_search','CategoryController@search')->name('category.search');
	Route::get('producer_search','ProducerController@search')->name('producer.search');
	Route::get('products_search','ProductController@search')->name('product.search');
	Route::get('banner_search','BannerController@search')->name('banner.search');
	Route::get('slider_search','SliderController@search')->name('slider.search');
	Route::get('color_search','ColorController@search')->name('color.search');
	Route::get('customer_search','CustomerController@search')->name('customer.search');
	Route::get('search','UserController@search')->name('search');
	
    Route::get('/logout','AdminController@logout')->name('logout');
    Route::get('/category-modal','CategoryController@modal')->name('category.modal');
    Route::get('/producer-modal','ProducerController@modal')->name('producer.modal');
    Route::get('/product-modal','ProductController@modal')->name('product.modal');
    Route::get('/banner-modal','BannerController@modal')->name('banner.modal');
    Route::get('/slider-modal','SliderController@modal')->name('slider.modal');
    Route::get('/customer-modal','CustomerController@modal')->name('customer.modal');
    Route::get('/changeStatus','CategoryController@status')->name('category.status');
    Route::get('/userStatus','UserController@status')->name('user.status');
    Route::get('/producerStatus','ProducerController@status')->name('producer.status');
    Route::get('/productStatus','ProductController@status')->name('product.status');
    Route::get('/bannerStatus','BannerController@status')->name('banner.status');
    Route::get('/sliderStatus','SliderController@status')->name('slider.status');
    Route::match(['get', 'post'], '/botman', 'BotManController@handle');
   
});
	
Route::get('admin/login','Admin\AdminController@login')->name('login');
Route::post('admin/login','Admin\AdminController@post_login')->name('login');



// Route dành cho fontend

require_once 'fontend.php';