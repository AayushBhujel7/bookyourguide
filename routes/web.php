<?php

Route::get('/', 'PublicController@index');
Route::get('/tours', 'PublicController@tours')->name('tours');
Route::get('/guides', 'PublicController@guides')->name('guides');

Route::get('/search', 'PublicController@search');

Route::get('/user-detail/{username}', 'PublicController@userdetails');
Route::get('/tour/{slug}', 'PublicController@tourdetails');

Route::post('/booking-request', 'PublicController@bookingRequest');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin',  'middleware' => ['auth', 'checkRole'] ], function(){
    Route::get('/', 'AdminController@index');
    Route::get('/tours', 'AdminController@tours');
    Route::post('/add/tour', 'AdminController@addTour');
    Route::get('/deletetours/{id}', 'AdminController@deletetours');
    Route::get('/users', 'AdminController@users');
    Route::get('/deleteuser/{id}', 'AdminController@deleteuser');
    Route::get('/bookings', 'AdminController@bookings');
    Route::get('/profile', 'AdminController@profile');
    Route::post('/updateProfile', 'AdminController@updateProfile');
    Route::post('/changePassword', 'AdminController@changePassword');
    Route::get('/ads', 'AdsController@index');
    Route::post('/ads/create', 'AdsController@create');

});

Route::group(['prefix' => 'guide',  'middleware' => ['auth', 'checkRole']], function(){
    Route::get('/', 'GuideController@index');
    Route::get('/profile', 'GuideController@profile');
    Route::get('/requests', 'GuideController@requests');
    Route::get('/bookings', 'GuideController@bookings');
    Route::get('/selectRequest/{id}/{operation}', 'GuideController@selectRequest');
    Route::get('/mark-as-complete/{id}', 'GuideController@markascomplete');
    
    Route::get('/feedbacks', 'GuideController@feedbacks');
    Route::post('/submit-feedback', [GuideFeedbackController::class, 'submitFeedback'])->name('submit-feedback');

    Route::post('/updateProfile', 'GuideController@updateProfile');
    Route::post('/updateProfileDetail', 'GuideController@updateProfileDetail');
    Route::post('/changePassword', 'GuideController@changePassword');
});

Route::group(['prefix' => 'user',  'middleware' => ['auth', 'checkRole']], function(){
    Route::get('/', 'UserController@index');
    Route::get('/updateBooking/{id}/{operation}', 'UserController@updateBooking');
    Route::post('/givefeedback', 'UserController@givefeedback');
    Route::get('/profile', 'UserController@profile');
    Route::post('/updateProfile', 'UserController@updateProfile');
    Route::post('/changePassword', 'UserController@changePassword');
});

use App\Http\Controllers\UserBasedCollaborativeFilteringController;
Route::get('/recommend-guides/{userId}', [UserBasedCollaborativeFilteringController::class, 'recommendGuides']);