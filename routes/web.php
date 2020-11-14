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
Route::get('/customerregister', 'CustomerController@customerregister')->name('customerregister');
Route::post('/customer/register/insert', 'CustomerController@customerregisterinsert')->name('customerregisterinsert');
Route::get('/download/pdf/{sale_id}','CustomerController@downloadpdf')->name('downloadpdf');

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


// Google  Socialite Controller
Route::get('login/google', 'GoogleController@redirectToProvider');
Route::get('login/google/callback', 'GoogleControllerr@handleProviderCallback');

//  Checkout controller
Route::get('/checkout','CheckoutController@checkout')->name('checkout');
Route::get('/checkout/{coupon_name}','CheckoutController@checkout')->name('checkoutcoupon');
Route::post('/getcitylist','CheckoutController@getcitylist')->name('getcitylist');

// Stripe Payment controller
Route::post('stripe/payment', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');

 // search Controller shop search all product
Route::get('/search-results', 'SearchController@search_results')->name('search_results');
Route::get('/search', 'SearchController@search')->name('search');


 // shop Controller shop search all product
Route::get('/shop', 'ShopController@shop')->name('shop');

 // BestsellerController shop search all product
Route::get('/bestseller', 'BestsellerController@bestseller')->name('bestseller');

 // wishlist Controller route
Route::get('/wishlist', 'WishlistController@wishlist')->name('wishlist');
Route::get('/wishlist/{product_id}','WishlistController@wishlist')->name('wishlistproduct_id');
Route::post('/addtowishlist', 'CartController@addtowishlist')->name('addtowishlist');

 // TeamControlle Controller route
Route::get('/team', 'TeamControlle@team')->name('team');

// TeaminfoController routes Controller
Route::resource('/teamin', 'TeaminfoController');

 // blogControlle Controller route
 Route::get('/blog', 'BlogControlle@blog')->name('blog');
 Route::get('/blogdetails/{blog_id}/{blog_slug}', 'BlogControlle@blogdetails')->name('blogdetails');

// BloginfoControlle Controller route
Route::get('/blog_details', 'BloginfoControlle@blog_details')->name('blog_details');
Route::post('/blog_category', 'BloginfoControlle@blog_category')->name('blog_category');
Route::post('/bloginsert', 'BloginfoControlle@bloginsert')->name('bloginsert');
Route::get('/blogcategory', 'BloginfoControlle@blogcategory')->name('blogcategory');

 // mailControlle Controller route
 Route::get('send-mail','MailSend@mailsend');

 // AboutControlle Controller route
 Route::get('/about', 'AboutControlle@about')->name('about');

 // Backabout Controller route
 Route::get('/backabout', 'BackaboutControlle@backabout')->name('backabout');

 // gift-cards Controller route
 Route::get('/giftcards', 'GiftcardsControlle@giftcards')->name('giftcards');

 // gift-cards Controller route
 Route::get('/giftcar', 'GiftcarControlle@giftcar')->name('giftcar');
 Route::post('/giftcarinsurt', 'GiftcarControlle@giftcarinsurt')->name('giftcarinsurt');

 // CampaignControlle Controller route
 Route::get('/campaign', 'CampaignControlle@campaign')->name('campaign');

 // CampaignControlle Controller route
 Route::get('/campaignadd', 'CampaignaddControlle@campaignadd')->name('campaignadd');
 Route::post('/campaigninsurt', 'CampaignaddControlle@campaigninsurt')->name('campaigninsurt');

 // Single_Product Controller page routes Controller
 Route::get('/campaign/{campaign_id}/{campaign_slug}', 'SinglecampaignController@singlecampaign')->name('singlecampaign');

 // LikeController Controller route
 Route::post('/like', 'LikeController@like')->name('like');
 Route::post('/like/{id}/act', 'LikeController@actOnlike');

 // CommentController Controller route
 Route::resource('post', 'PostController');


 // CommentController Controller route
 Route::post('/comment', 'CommentController@comment')->name('comment');
 Route::post('/comment/reply', 'CommentController@commentreply')->name('commentreply');
 // Route::get('/blogdetails/{blog_id}/{blog_slug}', 'CommentController@blogdetails')->name('blogdetails');
