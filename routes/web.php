<?php

use System\Router\Web\Route;

Route::get('', 'HomeController@index', 'index');
Route::get('create', 'HomeController@create', 'create');
Route::post('store', 'HomeController@store', 'store');
Route::get('edit/{id}', 'HomeController@edit', 'edit');
Route::put('/update/{id}', 'HomeController@update', 'update');
Route::delete('/delete/{id}', 'HomeController@destroy', 'delete');

//admin routes 
Route::get('/admin', 'Admin\AdminController@index', 'admin.index');

//category routes 
route::get('/admin/category', 'Admin\CategoryController@index', 'admin.category.index');
route::get('/admin/category/create', 'Admin\CategoryController@create', 'admin.category.create');
route::post('/admin/category/post', 'Admin\CategoryController@store', 'admin.category.store');
Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit', 'admin.category.edit');
Route::put('/admin/category/update/{id}', 'Admin\CategoryController@update', 'admin.category.update');
Route::delete('/admin/category/delete/{id}', 'Admin\CategoryController@destroy', 'admin.category.delete');

// post routes
route::get('/admin/post', 'Admin\PostController@index', 'admin.post.index');
route::get('/admin/post/create', 'Admin\postController@create', 'admin.post.create');
route::post('/admin/post/post', 'Admin\postController@store', 'admin.post.store');
Route::get('/admin/post/edit/{id}', 'Admin\postController@edit', 'admin.post.edit');
Route::put('/admin/post/update/{id}', 'Admin\postController@update', 'admin.post.update');
Route::delete('/admin/post/delete/{id}', 'Admin\postController@destroy', 'admin.post.delete');

// ads routes 
route::get('/admin/ads', 'Admin\adsController@index', 'admin.ads.index');
route::get('/admin/ads/create', 'Admin\adsController@create', 'admin.ads.create');
route::post('/admin/ads/store', 'Admin\adsController@store', 'admin.ads.store');
Route::get('/admin/ads/edit/{id}', 'Admin\adsController@edit', 'admin.ads.edit');
Route::put('/admin/ads/update/{id}', 'Admin\adsController@update', 'admin.ads.update');
Route::delete('/admin/ads/delete/{id}', 'Admin\adsController@destroy', 'admin.ads.delete');
Route::get('/admin/ads/gallery/{id}', 'Admin\adsController@gallery', 'admin.ads.gallery');
Route::post('/admin/ads/store-gallery-image/{id}', 'Admin\adsController@storeGalleryImage', 'admin.ads.store.gallery.image');
Route::get('/admin/ads/delete-gallery-image/{gallery_id}', 'Admin\adsController@deleteGalleryImage', 'admin.ads.delete.gallery.image');

//slidshow route
route::get('/admin/slide', 'Admin\SlideController@index', 'admin.slide.index');
route::get('/admin/slide/create', 'Admin\SlideController@create', 'admin.slide.create');
route::post('/admin/slide/pstore', 'Admin\SlideController@store', 'admin.slide.store');
Route::get('/admin/slide/edit/{id}', 'Admin\SlideController@edit', 'admin.slide.edit');
Route::put('/admin/slide/update/{id}', 'Admin\SlideController@update', 'admin.slide.update');
Route::delete('/admin/slide/delete/{id}', 'Admin\SlideController@destroy', 'admin.slide.delete');

//comment route
route::get('/admin/comment', 'Admin\commentController@index', 'admin.comment.index');
route::get('/admin/comment/show/{id}', 'Admin\commentController@show', 'admin.comment.show');
Route::get('/admin/comment/approved/{id}', 'Admin\commentController@approved', 'admin.comment.approved');
route::post('/admin/comment/answer/{id}', 'Admin\commentController@answer', 'admin.comment.answer');
 
//user route
Route::get('/admin/user', 'Admin\UserController@index', 'admin.user.index');
Route::get('/admin/user/edit/{id}', 'Admin\UserController@edit', 'admin.user.edit');
Route::put('/admin/user/update/{id}', 'Admin\UserController@update', 'admin.user.update');
Route::get('admin/user/change-status/{id}', 'Admin\UserController@changeStatus', 'admin.user.change.status');

// auth route 
Route::get('/login', 'Auth\LoginController@view', 'auth.login.view');
Route::post('/login', 'Auth\LoginController@login', 'auth.login');

Route::get('/register', 'Auth\RegisterController@view', 'auth.register.view');
Route::post('/register', 'Auth\RegisterController@register', 'auth.register');
Route::get('/activation/{token}', 'Auth\RegisterController@activation', 'auth.activation');
Route::get('/forgot', 'Auth\ForgotController@view', 'auth.forgot.password');
Route::post('/forgot', 'Auth\ForgotController@forgot', 'auth.forgot');
Route::post('/reset-password/{token}', 'Auth\ResetPasswordController@view', 'auth.reset-password.view');

Route::post('/forgot', 'Auth\ForgotController@forgot', 'auth.forgot');



