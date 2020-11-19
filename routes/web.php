<?php

Route::group(['middleware' => 'preventBackHistory'], function () {
//====================> Front Panel =========================

    Route::get('/', 'FrontController@showLoginForm')->name('front.login');
    Route::get('login', 'FrontController@showLoginForm')->name('front.login');
    Route::post('login', 'Front\LoginController@login');
    Route::get('register', 'FrontController@showRegistrationForm')->name('front.register');
    Route::post('register', 'FrontController@register');

    Route::group(['middleware'=>'front', 'prefix' => 'front', 'namespace' => 'Front', 'as' => 'front.'], function () {

        Route::post('login', 'Auth\LoginController@login');
        Route::get('/front-logout', 'FrontController@logout')->name('logout');


        Route::get('/post_listing', 'FrontController@post_listing')->name('post_listing');
        Route::get('/post_listing_details/{slug}', 'FrontController@post_listing_details')->name('post_listing_details');
        Route::get('/stores', 'FrontController@store_listing')->name('store_listing');

        Route::get('/likepost/{id}', 'FrontController@likepost')->name('likepost');
    });
    //====================> Admin Auth Panel =========================
    //Route::get('/', 'Admin\Auth\LoginController@showLoginForm')->name('admin.showLoginForm');
    Route::get('/admin', 'Admin\Auth\LoginController@showLoginForm')->name('admin.showLoginForm');
    Route::get('admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.showLoginForm');
    Route::post('admin/login', 'Admin\Auth\LoginController@login')->name('admin.login');
    //====================> Admin Auth Panel =========================

    //====================> Reset Password Panel =========================
    Route::get('admin/resetPassword', 'Admin\Auth\PasswordResetController@showPasswordRest')->name('admin.resetPassword');
    Route::post('admin/sendResetLinkEmail', 'Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.sendResetLinkEmail');
    Route::get('admin/find/{token}', 'Admin\Auth\PasswordResetController@find')->name('admin.find');
    Route::post('admin/create', 'Admin\Auth\PasswordResetController@create')->name('admin.sendLinkToUser');
    Route::post('admin/reset', 'Admin\Auth\PasswordResetController@reset')->name('admin.resetPassword_set');
    //====================> Reset Password Panel =========================

    Route::group(['prefix' => 'admin','middleware'=>'Admin','namespace' => 'Admin','as' => 'admin.'], function () {
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
        //====================> Dashboard =========================
        Route::get('/', 'MainController@dashboard');
        Route::get('/dashboard', 'MainController@dashboard')->name('dashboard');
        //====================> Dashboard =========================

//        Route::get('/test', 'MainController@test')->name('test');
        //====================> User Management =========================
        Route::get('/profile', 'UsersController@updateProfile')->name('profile');
        Route::post('/updatePassword', 'UsersController@updatePassword')->name('updatePassword');
        Route::post('/updateProfileDetail', 'UsersController@updateProfileDetail')->name('updateProfileDetail');
        Route::get('/users', 'UserController@index')->name('users.index');
        Route::post('/users/delete/{id}', 'UserController@delete')->name('users.delete');
        Route::post('/users/change_status', 'UserController@changeStatus')->name('users.change_status');
        Route::get('/users/profile/{id}', 'UserController@userProfile')->name('users.profile');

        //====================> Store Management =========================
        Route::get('/store', 'StoreController@index')->name('store.index');
        Route::get('/store/create', 'StoreController@create')->name('store.create');
        Route::get('/store/edit/{id}', 'StoreController@edit')->name('store.edit');
        Route::post('/store/update/{id}', 'StoreController@update')->name('store.update');
        Route::post('/store/delete/{id}', 'StoreController@delete')->name('store.delete');
        Route::post('/store/store', 'StoreController@store')->name('store.store');
        Route::post('/store/change_status', 'StoreController@changeStatus')->name('store.change_status');

        //====================> Gift Management =========================
        Route::get('/gift', 'StoreController@giftindex')->name('gift.index');
        Route::get('/gift/create', 'StoreController@gift_create')->name('gift.create');
        Route::post('/gift/delete/{id}', 'StoreController@gift_delete')->name('gift.delete');
        Route::post('/gift/store', 'StoreController@gift_store')->name('gift.store');
        Route::post('/gift/change_status', 'StoreController@gift_changeStatus')->name('gift.change_status');

        Route::get('/userlike', 'StoreController@postlikeindex')->name('userlike.index');
    });
});




//====================> comman controller and function================
Route::group(['middleware' => 'preventBackHistory'], function () {


    Route::get('/event-registration', 'FrontController@register')->name('event_registration');
    Route::post('payment', 'FrontController@order');
    Route::post('payment/status', 'FrontController@paymentCallback');


    Route::group(['middleware'=>'front','prefix' => 'front','namespace' => 'Front','as' => 'front.'], function () {
        Route::get('/', 'FrontController@post_listing')->name('post_listing');
        Route::get('/post_listing', 'FrontController@post_listing')->name('post_listing');

        Route::get('/event-registration', 'FrontController@register')->name('event_registration');
        Route::post('payment', 'FrontController@order');
    });
});
