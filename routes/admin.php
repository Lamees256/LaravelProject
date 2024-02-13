<?php

use Illuminate\Support\Facades\Route;

// Dashboard
Route::middleware(['admin.auth','auth:admin'])->group(function(){
    Route::get('/dashboard', 'HomeController@index')->name('home');
    
    Route::get('/clients', 'ClientController@index')->name('clients');
    Route::get('/clients.edit/{id}', 'ClientController@edit')->name('clients.edit');
    Route::post('/clients.update/{id}', 'ClientController@update')->name('clients.update');
    Route::get('/clients.delete/{id}', 'ClientController@delete')->name('clients.delete');
    
    Route::get('/categories', 'CategoryController@index')->name('category');
    Route::get('/categories/create', 'CategoryController@create')->name('category.create');
    Route::post('/categories/store', 'CategoryController@store')->name('category.store');
    Route::get('/categories/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::get('/categories/delete/{id}', 'CategoryController@delete')->name('category.delete');
    Route::post('/categories/update/{id}', 'CategoryController@update')->name('category.update');

    Route::get('/posts/new', 'PostController@new')->name('post.new');
    Route::get('/posts', 'PostController@index')->name('post');

    Route::get('/posts/view/{id}', 'PostController@view')->name('post.view');
    Route::get('/posts/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::get('/posts/delete/{id}', 'PostController@delete')->name('post.delete');
    Route::get('/posts/publish/{id}', 'PostController@publish')->name('post.publish');
    Route::post('/posts/update/{id}', 'PostController@update')->name('post.update');
});


// Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Register
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Verify Email
// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
// Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
// Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
