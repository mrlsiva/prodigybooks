<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::group(['middleware' => 'cors'], function()
{*/
	Route::group(['prefix' => 'auth'], function () {
		Route::post('login', 'API\AuthApiController@login');
		Route::post('signup','API\AuthApiController@register');
		Route::post('resetpass/email','API\AuthApiController@postForgotPassword');
		Route::post('resetpass/otp','API\AuthApiController@postVerifyOtpPassword');
		Route::post('resetpassword','API\AuthApiController@postResetPassword');
	});

	Route::middleware('auth:api')->group( function () {
		Route::post('logout', 'API\AuthApiController@logout');
		Route::get('user', 'API\AuthApiController@user');	
		Route::post('update-password-profile', 'API\AuthApiController@updateFirstProfile');
		Route::post('updatepassword','API\AuthApiController@postUpdatePassword');
		Route::post('updateprofile','API\AuthApiController@postUpdateProfile');
		Route::post('payment', 'API\HomeApiController@postPaymentDetails');
		Route::post('gps', 'API\HomeApiController@postGPSTrack');
		Route::get('membership', 'API\AuthApiController@membershipDetails');
	});
	
	Route::get('read-book/{cat}/{sku}', 'API\HomeApiController@getReadEbook');
	Route::get('coupons', 'API\HomeApiController@getCouponsList');

	Route::any('subscribe', 'API\HomeApiController@getSubscribe');
	Route::any('subscribe/process', 'API\HomeApiController@getSubscribeProcess');
	Route::any('subscribe/process/response', 'API\HomeApiController@getSubscribeResponse');
	Route::any('subscribe/cancel', 'API\HomeApiController@getSubscribeCancel');

	Route::get('home', 'API\HomeApiController@viewCategories');
	Route::get('home-categories', 'API\HomeApiController@getAllCategories');
	Route::get('product/{category}/{sku}', 'API\HomeApiController@viewProduct');
	Route::get('categoriesapp', 'API\HomeApiController@viewCategories');
	Route::get('distributors', 'API\HomeApiController@getDistributorship');
	Route::get('ebook/{id}', 'API\HomeApiController@getEbookDetails');

	Route::post('/categories', 'ApiController@store');
	Route::post('/categoriesapp', 'ApiController@categories');
	Route::post('/view-product', 'ApiController@viewProduct');
	Route::post('/ourdistributorship', 'ApiController@ourdistributorship');
	Route::post('/read-book', 'ApiController@readEbook');
	Route::post('/login', 'ApiController@authentication');
//});

//authentication

//Route::post('login', 'API\RegisterController@login');
//Route::post('logout', 'API\RegisterController@login');