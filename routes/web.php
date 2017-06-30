<?php

//homepage
Route::get('/', 'RestaurantsController@index')->name('home');
Route::get('/category/{category}','RestaurantsController@show');
Route::post('/contactus','RestaurantsController@store');
Route::get('/promotion','RestaurantsController@promotion');
Route::get('/location','RestaurantsController@location');

//profile
Route::get('/profile','UserController@viewInforUser');

Route::get('/profile/edit','UserController@edit');
Route::put('/profile/update/{id}','UserController@update');

Route::get('/profile/change-password','UserController@changePassword');
Route::put('/profile/update-password/{id}','UserController@changePasswordUpdate');

//cart
Route::get('/cart','CartController@index')->name('cart');

Route::get('/addToCartGoCart/{id}','CartController@getToCartGoCart');
Route::get('/addToCartGoMenu/{id}','CartController@getToCartGoMenu');

Route::get('/removeOneCart/{id}','CartController@removeOneCart');

Route::get('/removeAllGoCart/{id}','CartController@removeAllGoCart');
Route::get('/removeAllGoMenu/{id}','CartController@removeAllGoMenu');

Route::post('/order','CartController@store');

Route::get('/vieworder/{user}','CartController@viewOrder');
Route::get('/vieworder/{user}/{order}','CartController@viewOrderId');


//login-out-register
Route::get('/register', 'RegistrationController@create');
Route::post('/register','RegistrationController@store');


Route::get('/login', 'LoginoutController@create')->name('login');
Route::post('/login', 'LoginoutController@store');
Route::get('/logout', 'LoginoutController@destroy');