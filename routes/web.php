<?php

//homepage
Route::get('/','RestaurantsController@index')->name('home');
Route::get('/category/{category}','RestaurantsController@show')->name('category');
Route::post('/contactus','RestaurantsController@store')->name('contactus');
Route::get('/promotion','RestaurantsController@promotion')->name('promotion');
Route::get('/location','RestaurantsController@location')->name('location');

//profile
Route::group(['prefix' => 'profile','middleware' => 'auth'], function () {
    Route::get('/','UserController@viewInforUser')->name('profile');
    Route::get('/edit','UserController@edit')->name('profile-edit');
    Route::put('/update/{user}','UserController@update')->name('profile-update');
    Route::get('/change-password','UserController@changePassword')->name('profile-change-password');
    Route::put('/update-password/{user}','UserController@changePasswordUpdate')->name('profile-update-password');
});
//admin
Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {
    Route::group(['middleware' => 'CheckLevelOrder'], function () {
        Route::get('/order', 'AdminController@viewOrder')->name('admin-order');
        Route::post('/order/custom', 'AdminController@selectDay')->name('admin-order-cus');
        Route::post('/order/confirm/{order}','AdminController@ordered')->name('admin-order-confirm');
    });
    Route::group(['middleware' => 'CheckLevelProductAndContact'], function () {
        Route::get('/contact', 'AdminController@viewContact')->name('admin-contact');
        Route::post('/contact/destroy', 'AdminController@contactDestroy')->name('admin-contact-destroy');
        Route::get('/contact/{contact}', 'AdminController@viewContactDetail')->name('admin-contact-detail');
        Route::post('/contact/seen/{contact}', 'AdminController@contactDetailSeen')->name('admin-contact-seen');
        Route::get('/managerment', 'AdminController@manager')->name('admin-managerment');
        Route::get('/product/control/{product}','AdminController@managermentProduct')->name('admin-product');
        Route::put('/product/update/{product}','AdminController@managermentProductUpdate')->name('admin-product-update');
        Route::post('/product/remove/{product}','AdminController@managermentProductRemove')->name('admin-product-remove');
        Route::post('/product/search','AdminController@productSearch')->name('product-search');
    });
});
//cart
Route::group(['prefix' => 'cart'], function () {
    Route::get('/','CartController@index')->name('cart');

    Route::get('/add/{id}','CartController@addCartGoCart')->name('cart-add');
    Route::get('/add/gohome/{id}','CartController@addCartGoMenu')->name('cart-add-gohome');

    Route::get('/removeone/{id}','CartController@removeOneCart')->name('cart-remove-one');
    Route::get('/removeall/{id}','CartController@removeAllGoCart')->name('cart-remove-all');

    Route::get('/removeall/gohome/{id}','CartController@removeAllGoMenu')->name('cart-remove-all-gohome');
});
Route::group(['prefix' => 'order','middleware' => 'auth'], function () {
    Route::post('/','CartController@store')->name('order');
    Route::get('/view/{user}','CartController@viewOrder')->name('view-order');
    Route::get('/view/detail/{order}','CartController@viewOrderDetail')->name('view-order-detail');
});

//login-out-register
Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register','RegistrationController@store');


Route::get('/login', 'LoginoutController@create')->name('login');
Route::post('/login', 'LoginoutController@store');
Route::get('/logout', 'LoginoutController@destroy')->name('logout');