<?php

// Landingpage call
Route::get('/', 'RootController@index');
Route::get('/view-post/{id}','RootController@show')->name('show.post');

// multiple auth create
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/logout','Auth\LoginController@logout')->name('user.logout');

//route for admin authentication
Route::get('admin/home','AdminController@index')->name('admin.home');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@login');
Route::get('admin/logout','Admin\LoginController@logout')->name('admin.logout');

// not implemented next for routes
Route::post('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset','Admin\ResetPasswordController@reset');
Route::get('admin-password/reset{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

//admin post routes
Route::get('admin/home/create-post','AdminController@create')->name('admin.create.post');
Route::post('admin/home/create-post','AdminController@postStore')->name('admin.create.post');

Route::get('admin/home/create-video-Post','AdminController@createVideo')->name('admin.videoStore.post');
Route::post('admin/home/create-video-Post','AdminController@videoStore')->name('admin.videoStore.post');

Route::get('admin/home/publish','AdminController@show')->name('admin.publish.post');

//ajax data fetch for publish
Route::get('admin/home/nonPublish','AdminController@getData')->name('admin.viewNonPublishPost');
Route::post('admin/home/nonPublish/{id}','AdminController@update')->name('admin.confirmPublishPost');

Route::get('admin/home/unpublish','AdminController@showUnPublish')->name('admin.unpublish.post');
//ajax data fetch for unpublish
Route::get('admin/home/unPublishPost','AdminController@getPublishPostData')->name('admin.viewPublishPost');
Route::post('admin/home/unPublishPost/{id}','AdminController@updateUnpublish')->name('admin.confirmUnPublishPost');



