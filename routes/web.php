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



// Laravel Payment With Instamojo
Route::group(['prefix' => 'insta'], function(){
    Route::get('/checkout', 'InstaController@getCheckout');
    Route::post('/createRequest', 'InstaController@postCheckout');
    Route::get('/redirect', 'InstaController@instaRedirect');
});


Route::group(['prefix' => 'paytm'], function(){
Route::resource('/order', 'OrderController');
// Paytm callback url route
Route::post('/callback', 'OrderController@paytmCallback');
});