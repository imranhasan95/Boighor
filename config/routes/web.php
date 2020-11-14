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

// home page routes Controller
Route::get('/', 'FrontendController@index')->name('welcome');

// auth routes Controller
Auth::routes(['verify' => true]);

// home routes Controller
Route::get('/home', 'HomeController@index')->name('home');

//  product Controller
Route::get('/product', 'ProductController@product')->name('product');
Route::post('/product/insert', 'ProductController@productinsert')->name('productinsert');
Route::get('/product/delete/{product_id}', 'ProductController@productdelete')->name('productdelete');
Route::get('/product/restor/{product_id}', 'ProductController@productrestor')->name('productrestor');
Route::get('/product/force/delete/{product_id}', 'ProductController@productforcedelete')->name('productforcedelete');
Route::get('/product/edit/{product_id}', 'ProductController@producedit')->name('producedit');
Route::post('/product/edit', 'ProductController@producupdate')->name('producupdate');

// category routes Controller
Route::resource('/category', 'CategoryController');

// home routes Controller
Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/password/change', 'UserController@passwordchange')->name('passwordchange');

// home page routes Controller
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::get('/contact/messages', 'ContactController@contactmessages')->name('contactmessages');
Route::post('/contactinfo', 'ContactController@contactinfo')->name('contactinfo');
Route::get('/contact/download/{file_name}', 'ContactController@contactdownload')->name('contactdownload');

// category routes Controller
Route::resource('/slider', 'SliderController');

// Single_Product Controller page routes Controller
Route::get('/product/{product_id}/{product_slug}', 'SingleproductController@singleproduct')->name('singleproduct');


// Single_Product Controller page routes Controller
Route::get('/customer/dashboard', 'CustomerController@customerdashboard')->name('customerdashboard');
Route::get('/customer/register', 'CustomerController@customerregister')->name('customerregister');
Route::post('/customer/register/insert', 'CustomerController@customerregisterinsert')->name('customerregisterinsert');

// add to cart Controller page routes Controller
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/cart/{coupon_name}', 'CartController@cart')->name('cartcoupon');
Route::post('/addtocart', 'CartController@addtocart')->name('addtocart');
Route::get('/cart/remove/{cart_id}', 'CartController@cartremove')->name('cartremove');
Route::post('/cart/update', 'CartController@cartupdate')->name('cartupdate');

// add coupon to cart Controller page routes Controller
Route::get('/coupon', 'CouponController@coupon')->name('coupon');
Route::post('/coupon/store', 'CouponController@couponstore')->name('couponstore');

// GitHub  Socialite Controller
Route::get('login/github', 'GithubController@redirectToProvider');
Route::get('login/github/callback', 'GithubControllerr@handleProviderCallback');
